<script type="text/javascript">
	
	$('#password,#confirm_password').on('keyup', function () {
        if($('#confirm_password').val() != "")
	     if ($('#password').val() == $('#confirm_password').val()) {
	       $('#message').html('Matching').css('color', 'green');
	  } else 
	    $('#message').html('Not Matching').css('color', 'red');
});
	function checkPassword(form) { 
                password1 = $('#password').val(); 
                password2 = $('#confirm_password').val(); 
  
                // If password not entered 
                if (password1 == '') 
                 
                     toastr.error("Please enter Password");     
                // If confirm password not entered 
                else if (password2 == '') 
                    toastr.error("Please enter confirm password");
                // If Not same return False.     
                else if (password1 != password2) { 
                    
                     toastr.error("Password did not match: Please try again...");
                    return false; 
                } 
  
                // If same return True. 
                else{ 
                  
                    return true; 
                } 
            } 
</script>