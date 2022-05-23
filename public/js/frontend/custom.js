$(document).ready(function(){
   /*Enter number into textbox*/
    $(".numbers").click(function(e) {
        e.preventDefault();
        var num = $(this).attr("value");
        var srval = $(".screen").val();
        var final = srval + num;
        $(".screen").val(final);
    });
    /*clear textbox*/
    $(".clear").click(function(e) {
        e.preventDefault();
        $(".screen").val("");
    });
    /*remove last enter number*/
    $('.backspace').click(function() {
        var inputString = $('.screen').val();
        var shortenedString = inputString.substr(0, (inputString.length - 1));
        $('.screen').val(shortenedString);
    });
});
/**
* Get the user IP throught the webkitRTCPeerConnection
* @param onNewIP {Function} listener function to expose the IP locally
* @return undefined
*/
function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
    //compatibility for firefox and chrome
    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    var pc = new myPeerConnection({
        iceServers: []
    }),
    noop = function() {},
    localIPs = {},
    ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
    key;

    function iterateIP(ip) {
        if (!localIPs[ip]) onNewIP(ip);
        localIPs[ip] = true;
    }

     //create a bogus data channel
    pc.createDataChannel("");

    // create offer and set local description
    pc.createOffer(function(sdp) {
        sdp.sdp.split('\n').forEach(function(line) {
            if (line.indexOf('candidate') < 0) return;
            line.match(ipRegex).forEach(iterateIP);
        });

        pc.setLocalDescription(sdp, noop, noop);
    }, noop);

    //listen for candidate events
    pc.onicecandidate = function(ice) {
        if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
        ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
    };
}
