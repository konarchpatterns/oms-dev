$(document).ready(function () {
    /*$.validator.addMethod("emailregx", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Please enter a valid email address.");
    */
   
    $.validator.addMethod("emailregx", function (value, element) {
        var regexpr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return regexpr.test(value);
    }, "Please enter a valid email-id");
    
    $.validator.addMethod("phone_validate", function (value, element) {
        
        var regexpr = /\+[0-9]{2}\s[0-9]{5}\-[0-9]{5}/;
        return regexpr.test(value);        
    }, "Please enter valid phone no");
    
    //form validation for customer edit
    $("#user_add").validate({
        rules: {
            "parent_id": {required: true},
            "fullname": {required: true},
            "email":{
                        //required: true,
                        email: true,
                        emailregx: true,
                        remote: {
                            url: site_path + "/user/uniqueemail",
                            type: "get",
                        },
                    },
            "phone_no": {required: true,phone_validate:true,
                        remote: {
                            url: site_path + "/user/uniquephone",
                            type: "get",
                        },
                    },
            "country" : {required: true},
            "city" : {required: true}
        },
        messages: {
            "parent_id": {required: "Please select refference member"},
            "fullname": {required: "Please enter full name"},
            "email": {required: "Please enter email-id", email: "Please enter valid email-id",remote:"Email-id already used"},
            "phone_no": {required: "Please enter phone no",remote:"Phone no already used"},
            "country": {required: "Please select country"},
            "city": {required: "Please enter city"},
        }
    });
    
    //form validation for customer edit
    $("#driver-edit").validate({
        rules: {
            "fullname": {required: true},
            "email":
                    {
                        required: true,
                        email: true,
                        emailregx: true,
                    },
            "phone": {required: true,phone_validate:true},
            "ssn_id": {required: true},
            "paypal_id": {required: true},
        },
        messages: {
            "fullname": {required: "Please enter full name"},
            "email": {required: "Please enter email-id", email: "Please enter valid email-id"},
            "phone": {required: "Please enter phone no"},
            "ssn_id": {required: "Please enter ssn id"},
            "paypal_id": {required: "Please enter paypal id"},
        }
    });
    
    
    //form validation for user change password
    $("#change-pwd").validate({
        rules: {
            "old_pwd": {required: true},
            "new_pwd": {required: true},            
            "confirm_pwd": {required: true,equalTo: "#new_pwd"},            
        },
        messages: {
            "old_pwd": {required: "Please enter password"},
            "new_pwd": {required: "Please enter new password"},
            "confirm_pwd": {required: "Please enter confirm password",equalTo: "Password does not match"},
        }
    });
    
    
    //form validation for customer edit
    $("#setting").validate({
        rules: {
            "default_email": {required: true,email: true,emailregx: true,},
            "default_currency": {required: true},
            "commission_type": {required: true},            
            "commission_value": {required: true,number: true},            
            "playstore_fee": {required: true,number: true},            
            "applestore_fee": {required: true,number: true},            
            "min_claimamount": {required: true,number: true}           
        },
        messages: {
            "default_email": {required: "Please enter default email", email: "Please enter valid email"},
            "default_currency": {required: "Please enter default currency"},
            "commission_type": {required: "Please select commission type"},
            "commission_value": {required: "Please enter commission value",number: "Please enter number only"},
            "playstore_fee": {required: "Please enter playstore fee",number: "Please enter number only"},
            "applestore_fee": {required: "Please enter applestore fee",number: "Please enter number only"},
            "min_claimamount": {required: "Please enter min claimamount",number: "Please enter number only"}
        }
    });

     $("#employee-create").validate({
        rules: {
            "email":
                    {required: false,
                        email: true,
                        emailregx: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
                    },
            "access_code": 
                    {
                        minlength: 4,
                        digits: true,
                        maxlength: 4,
                    }        
                },
        messages: {
            "email": {digits: "Please add only digits", minlength: "Min Value", maxlength: "Max Value"},
        }
    });
    
});