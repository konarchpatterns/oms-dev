$(document).ready(function () {
    $('input').on('ifChecked ifUnchecked', function(event){
        if (event.type == 'ifChecked') {
            $('.chk_box').each(function () {
                $(this).iCheck('check');
            });
        } else {
            $('.chk_box').each(function () {
                $(this).iCheck('uncheck');
            });
        }
    });

    $.validator.addMethod('positiveNumber',
    function (value) {
        return Number(value) > 0;
    }, 'enter a positive number.');

    $(".verify_all,.unverify_all,.delete_all,.restore_all").click(function () {
        var chk_all = [];
        var type = $(this).data("type");

        //console.log(type);return false;

        $(".chk_box:checked").each(function () {
            chk_all.push($(this).data("id"))
        });
        if (chk_all == "")
        {
            swal(' ','Please select atlease one checkbox!', 'warning');
            return false;
        } else {
            var errs = 'no';
            $(".chk_box:checked").each(function ()
            {

                if(type == 'verify'){
                    if ($(this).data("is_verified") == 1) {
                        errs = 'yes';
                    }
                }

                if(type == 'unverify'){
                    if ($(this).data("is_verified") == 0) {
                        errs = 'yes';
                    }
                }
            });
            if (errs == 'yes')
            {
                if(type == 'verify'){
                    swal(' ','Some users are already verified!', 'warning');
                }

                if(type == 'unverify'){
                    swal(' ','Some users are already un-verify!', 'warning');
                }
                return false;
            } else {
                if(type == 'remove'){
                    swal({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#7bb94d',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, remove it!',
                        cancelButtonText: 'Cancel'
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            var status = type;
                            var url = site_path + "/user/update_state";
                            var post_data = {chk_values: chk_all, status: type}
                            send_data(url, post_data, status);
                        }
                    }).catch(swal.noop);
                }else{
                    var status = type;
                    var url = site_path + "/user/update_state";
                    var post_data = {chk_values: chk_all, status: type}
                    send_data(url, post_data, status);
                }
            }

        }
    });

    $(".add_wallet").click(function () {
        var chk_all = [];
        var type = $(this).data("type");

        //console.log(type);return false;

        $(".chk_box:checked").each(function () {
            chk_all.push($(this).data("id"))
        });
        if (chk_all == "")
        {
            swal(' ','Please select atlease one checkbox!', 'warning');
            return false;
        } else {

            $("#addWallet").modal('show');
            $("#add_wallet").validate({
                rules: {
                    "amount": {required: true,number: true,positiveNumber:true}
                },
                messages: {
                    "amount": {required: "Please enter amount",number: "Please enter numbers only"}
                },
                submitHandler: function (form) {
                    var url = site_path + "/user/update_wallet";
                    var post_data = {chk_values: chk_all, type : 'add',amount:$("#add_wallet #amount").val()}
                    var status = 'add';
                    send_data(url, post_data, status);
                    $("#add_wallet #amount").val("");
                    $("#addWallet").modal('hide');
                    swal(' ','Wallet amount added successfully!', 'success');
                    return false;
                }
            });



            /*var status = type;
            var url = site_path + "/driver/update_state";
            var post_data = {chk_values: chk_all, status: type}
            send_data(url, post_data, status);            */
        }
    });

    $(".approve_claim,.reject_claim").click(function () {
        var chk_all = [];
        var type = $(this).data("type");

        //console.log(type);return false;

        $(".chk_box:checked").each(function () {
            chk_all.push($(this).data("id"))
        });
        if (chk_all == "")
        {
            swal(' ','Please select atlease one checkbox!', 'warning');
            return false;
        } else {
            var status = type;
            var url = site_path + "/claim_updatestate";
            var post_data = {chk_values: chk_all, status: type}
            send_data(url, post_data, status);
        }
    });


});
function send_data(url, post_data, status) {
    $.ajax({
        method: 'GET',
        url: url,
        data: post_data,
        beforeSend: function () {
        },
        success: function (response) {
          console.log(JSON.parse(response).success);
          if(!JSON.parse(response).success)
          {
            //alert(JSON.parse(response).message);
            swal(' ',JSON.parse(response).message, 'warning');
          }
            $('input').iCheck('uncheck');
            $('.table').DataTable().ajax.reload(null, false);
        },
        error: function(xhr, status, error) {
            console.log('dsadas');


//            var err = eval("(" + xhr.responseText + ")");
//            alert(err.Message);
        }
    });
}

/*
 * Functions for customer module start
 */

function remove_user(user_id) {
    swal({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7bb94d',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'Cancel'
    }).then(function (isConfirm) {
        if (isConfirm) {
            var status = 'remove';
            var url = site_path + "/user/update_state";

            var values_chk = new Array();
            values_chk.push(user_id);
            var post_data = {chk_values: values_chk, status: 'remove'};

            send_data(url, post_data, status);
        }
    }).catch(swal.noop);
}
function verify_user(user_id) {
    swal({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7bb94d',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, verify it!',
        cancelButtonText: 'Cancel'
    }).then(function (isConfirm) {
        if (isConfirm) {

            var status = 'verify';
            var url = site_path + "/user/update_state";


            var values_chk = new Array();
            values_chk.push(user_id);
            var post_data = {chk_values: values_chk, status: 'verify'};

            send_data(url, post_data, status);
        }
    }).catch(swal.noop);
}
function unverify_user(user_id) {
    swal({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7bb94d',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, un-verify it!',
        cancelButtonText: 'Cancel'
    }).then(function (isConfirm) {
        if (isConfirm) {
            var status = 'unverify';
            var url = site_path + "/user/update_state";

            var values_chk = new Array();
            values_chk.push(user_id);
            var post_data = {chk_values: values_chk, status: 'unverify'};

            send_data(url, post_data, status);
        }
    }).catch(swal.noop);
}


function restore_user(user_id) {
    swal({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7bb94d',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, restore it!',
        cancelButtonText: 'Cancel'
    }).then(function (isConfirm) {
        if (isConfirm) {
            var status = 'restore';
            var url = site_path + "/user/update_state";

            var values_chk = new Array();
            values_chk.push(user_id);
            var post_data = {chk_values: values_chk, status: 'restore'};

            send_data(url, post_data, status);
        }
    }).catch(swal.noop);
}

jQuery.fn.DigitsOnly = function() {
  return this.each(function() {
    $(this).on('keydown paste',function(e) {
      var key = e.charCode || e.keyCode || 0;
      console.log(key);
      var str = $(this).val();
      if (key == 109) {
        return false;
      }
      return (key == 8 || key == 9 || key == 13 || key == 46 || key == 190 || key == 110 || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
    });
  });

};
$(".digitsonly").DigitsOnly();
