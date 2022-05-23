<header class="header-section">
    <div class="d-flex justify-content-between align-middle text-white bg-primary align-items-center">
        <div class="logo d-flex align-items-center">
            <a href="#" class="navbar-brand mr-3 p-0"><img src="{{asset('css/images/new-logo.png')}}" class="img-fluid" /></a>
        </div>
        <div class="profile-block d-flex align-items-center justify-content-center">
           <div class="ipaddress text-white mr-3">
                <img src="{{asset('css/images/internet.png')}}" class="img-fluid mr-2" />
                <span id="client_ip">192.168.0.122</span>
            </div>
            <div class="time-block mr-3">
              <img src="{{asset('css/images/clock.png')}}" class="img-fluid mr-2" />
              <span id="date-time">01/01/2018 00:00:00 AM</span>
            </div>
        </div>
    </div>
</header>
        <script type="text/javascript">


        // Usage

        getUserIP(function(ip){
        		document.getElementById("client_ip").innerHTML =  ip;
        });
        window.onload = setInterval(clock,1000);
        function clock()
        {
            var d = new Date();

            var date = d.getDate();

            var month = d.getMonth();
            var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
            month=month+1;

            var year = d.getFullYear();
            var day = d.getDay();
            //day=dayarr[day];

            var hour =d.getHours();
            var min = d.getMinutes();
            var sec = d.getSeconds();

            var apm = (hour < 12) ? "AM" : "PM";
            hour = (hour > 12) ? hour - 12 : hour;
            hour = (hour == 0) ? 12 : hour;



            hour = (hour < 10 ? "0" : "") + hour;
            date = (date < 10 ? "0" : "") + date;
            month = (month < 10 ? "0" : "") + month;
            min = (min < 10 ? "0" : "") + min;
            sec = (sec < 10 ? "0" : "") + sec;

            //document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
            //01/01/2018 04:10:31 PM
            document.getElementById("date-time").innerHTML=date+"/"+month+"/"+year+" "+hour+":"+min+":"+sec+" "+apm;
        }
        </script>
