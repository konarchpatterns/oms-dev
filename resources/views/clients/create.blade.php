@extends('layouts.newdashbord')

@section('style')

<style type="text/css">

/*   above code added on 22-05-20  */

 input.largerCheckbox { 
            width: 30px; 
            height: 30px; 
        } 

.bootbox-input {
  height: 100px !important;
}

.bootbox.modal {
  position: absolute;
  float: left;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  overflow-y: hidden;
}


.bootbox .modal-content  {
  background: #fff !important;
}

button.bootbox-close-button.close {
  color: black !important;
}

.bootbox .modal-title {
  color:  blue !important;
}

.sweet-alert title {
  color: blue !important;
}



.bootbox-alert div div div button.btn-primary{
         background-color: orange ;
     }

 .bootbox-alert div.bootbox-body{
       /*  background-color: blue !important;*/
       color:  black;
     }
   

    

 </style>
 @endsection

 @section('content')

<h3>Add Client </h3>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif


                        
@if(Session::has('alert-warning'))
    <div class="alert alert-warning">
        {{ Session::get('flash_message1') }}
    </div>
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
{!! Form::open(['route'=>'clients.store',  'id'=>'clientadd']) !!}

<meta name="csrf-token" content="{{ csrf_token() }}" />

 
<div class="card temcolor1">


<div class="card-body">
  <div class="row"> 
    <div class="col-md-4"> 
      <div class="form-group">
        {!! Form::label('client_company', 'Company', ['class' => 'control-label']) !!}
        {!! Form::text('client_company', null, [ 'class' => 'form-control compinput' , 'minlength' => '2', 'required'=>'required' , 'autofocus' =>'autofocus' ]) !!}
        <label id="client_company_error" class="client_company_error" for="client_company"></label>
        <label id="client_company_success" class="success" for="client_company"></label>
      </div>  
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        {!! Form::label('website', 'Website', ['class' => 'control-label']) !!}
        {!! Form::text('website', null, ['class' => 'form-control addwebsite', 'pattern'=>'(https?://)?(www\.)?([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?'
         ]) !!}
         <label id="website_error" class="website_error" for="website"></label>
        <label id="website_success" class="success" for="website"></label>
      </div> 
    </div>
  

    <div class="col-md-4"> 
      <div class="form-group">
        {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control ', 'required' => 'required']) !!}
    	 <label id="phone_error" class="phone_error" for="phone"></label>
        <label id="phone_success" class="success" for="phone"></label>
        <input type="hidden" name="btnvalue" value="" class="btnvalue">
      </div>
    </div>  
  </div>


  <div class="row" id="addclient">
    <div class="col-md-2">
      <div class="form-group"> 
        <label for="first_name">First Name</label><input type="text" name="first_name[]"  class=" form-control addfname" 
          value="{{ old('first_name.0') }}"  required="required"> 
        
           <label id="first_name_error" class="first_name_error" for="first_name"></label>
           <label id="first_name_success" class="success" for="first_name"></label>
      </div>   
    </div>

    <div class="col-md-2">
      <div class="form-group">
         <label for="last_name">Last Name</label><input type="text" name="last_name[]"   value="{{ old('last_name.0') }} " class="form-control addlname" required="required">
     </div>     
    </div>

    <div class="col-md-3 cemail" >
      <div class="form-group">
         <label for="client_email_primary">Email</label><input type="email" name="client_email_primary[]"  value="{{ old('client_email_primary.0') }} " class=" form-control    emailcheck" required="required">{{-- <a href="#" data-toggle="tooltip" data-placement="left" title="Check for Duplicate"  class="emailcheck btn btn-primary btn-sm"></a> --}}
        <span id="client_email_primary_error" class="client_perror"></span>
        <label id="client_email_primary_success" class="success client_perror" for="client_email_primary"></label>
     </div> 
    </div>

    <div class="col-md-2">
      <div class="form-group"> 
         <label for="client_contact_1">Contact</label><input type="text" name="client_contact_1[]"  value="{{ old('client_contact_1.0') }} " class="form-control" required="required">
     </div>
    </div> 
    
    <div class="col-md-2">
     <div class="form-group"> 
       <label for="client_note">Note</label><input type="textarea" name="client_note[]"  value="{{ old('client_note.0') }} " class="form-control" >
     </div>
    </div> 

    <div class="col-md-1">
      <div class="form-group">
        <label  style="color: white">sadasd</label>
        <a href="#" class="btn btn-danger btn-outline">Clear</a>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-2">
       <label  style="color: white">sadasdddfs</label>
       <a id="addrow" href="#" class="btn btn-success btn-outline add">Add Client</a> 
    </div>
    <div class="col-md-2">
      <label  for="client_specific">CLIENT SPECIFICATION</label>
       <a  href="javascript:void(0);" class="btn btn-primary btn-outline clientspecific">Click to Display</a>
    <!--   <input type="checkbox" class="clientspecific largerCheckbox"  name="select-check"> -->
    </div>
    <div class="col-md-4">
      {!! Form::label('client_specific', 'Client Special Details') !!}
      {!! Form::textarea('client_specific', "", ["class" => "form-control client_specific", "rows"=>'3', "cols"=>'10', "readonly" =>"readonly"]) !!}
    </div>
  </div>     

  <div class="row othdtl">

    <div class="col-md-4">
      <div class="form-group">
        {!! Form::label('client_address1', 'Address', ['class' => 'control-label']) !!}
        {!! Form::text('client_address1', "", ['class' => 'form-control addaddr']) !!}
        <input type="text" placeholder="Address line 2" class="form-control mt-2" name="client_address2">
        
      </div>
    </div> 

    <div class="col-md-3">
      <div class="form-group">
        {!! Form::label('client_country', 'Country', ['class' => 'control-label']) !!}
        {!! Form::select('client_country', ['select' =>'Select Country First', 'US' =>'US', 'UK' =>'UK','CANADA' =>'CANADA', 'AUSTRALIA' => 'AUSTRALIA', 
            'NEW ZEALAND' =>'NEW ZEALAND','other'=>'other'] , 'Select Country First',  ['class' => 'form-control clcountry']) !!}
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
          {!! Form::label('client_state', 'State', ['class' => 'control-label stateupd']) !!}
          {{-- <div id="unq" class="stateupd"></div>  --}}
        
          <select required="required" class="form-control clstate"  id="client_state" name="client_state">
          
        
          </select>
        
          <input name="other_state" class="editOption" style="display:none;" placeholder="Text " val="">

      </div>
    </div> 

    <div class="col-md-2">
      <div class="form-group">
        {!! Form::label('timezone_type', 'TimeZone Type', ['class' => 'control-label']) !!}
        {!! Form::select('timezone_type', ['EST' => 'EST', 'CDT' => 'CDT','MDT' => 'MDT', 'PDT' => 'PDT'], 'EST', ['class' => 'form-control timez'] ) !!}
        <div class="hidemsg">Press Enter to Select</div>
      </div> 
    </div>
   
  </div>  
 

  <div class="row othdtl">
      

    <div class="col-md-2">
      <div class="form-group">
        {!! Form::label('unit_price', 'Vector Price', ['class' => 'control-label']) !!}
        {!! Form::text('unit_price', 0.00, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
         {!! Form::label('digit_rate', 'Emb. Rate', ['class' => 'control-label']) !!}
         {!! Form::text('digit_rate', 1.75, ['class' => 'form-control']) !!}
      </div>
    </div> 

    <div class="col-md-2">
      <div class="form-group">
   
        {!! Form::label('store_type', 'Client Type', ['class' => 'control-label']) !!}
      
           {!! Form::select('store_type', ['Retail' => 'Retail', 'Contract' => 'Contract','Other' => 'Other'], 'Retail', ['class' => 'form-control stype']) !!}
           <div class="hidemsg1">Press Enter to Select</div>
      </div> 
    </div>

    <div class="col-md-3">
      <div class="form-group">
         {!! Form::label('client_source', 'Client Source', ['class' => 'control-label']) !!}
         {!! Form::select('client_source', ['Telephone' => 'Telephone', 'Email' => 'Email',
         'Internet' => 'Internet', 'Other' => 'Other'], 'Telephone', ['class' => 'form-control clsource']) !!}
      </div>
    </div> 

    <div class="col-md-3"> 
      <div class="form-group">
         {!! Form::label('csr_personid', 'Sales Executive', ['class' => 'control-label']) !!}
         {!! Form::select('csr_personid', $csr, '', ['class' => 'form-control ']) !!}
        
      </div>
    </div> 
  </div>
   <div class="row"> 
    <div class="col-md-7 "> 
       {!! Form::submit('Submit',['class' => 'btn btn-warning btn-wd chkerror rightdiv']) !!}
    </div>
   </div>
 </div>
 </div>   

        

{!! Form::close() !!}

<!-- client specification modal popup -->


<div class="modal fade"  tabindex="-1" role="dialog" id="clientspecificmodal" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Client Specification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <textarea class="form-control" id="specificationtext"  placeholder="Enter Text Here" style="height: 90px;"></textarea>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success btn-outline" id="writespecification">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script type="text/javascript">


function validatemyform() {

//debugger;
 
 value  =  $(".compinput").val();
 //alert(value);


 if (value ==  null )
 {
    //alert('error in company');
     swal({
              icon: 'error',
              title: 'Error',
              text: "Error in Company"
                                          
          })
    return  1

 }

  if (value == '' )
 {
    return  1

 }

   var iChars = "`~!$%^*()+=[]\\\';,/{}|\":<>?";

    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) != -1) {
              alert ("Company Name has special characters. \nThese are not allowed.\n Please remove them and try again.");
              return 1;
         
            }
    }


 

 $email = [];
 var proceed = 0 ;
 $('input[name^="client_email_primary"]').each(function(e) {
          ///debugger;
           var $email1 = this.value;
           //  alert($email1);
           var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
     
            //var v1 = $(this).val();
            var v1 = this.value;
          // alert(v1);
            if (!filter.test(v1)) {
                $(this).closest("tr").find(".client_perror").text("Invalid Email Id "); 
                //alert("invalid");
                proceed  = 1 ;
                return false;

            }
       $email.push($email1);

   });   

   if (proceed == 1)
   {
    return 1 ;
   }
         
       // alert($email.length);
       for (var i = 0; i < $email.length; i++) 
        {
            for (var j = i+1; j < $email.length; j++) 
            {                  
                    if ($email[i] == $email[j]) 
                    {
                        //$(this).closest("tr").find(".client_perror").show();
                        $(this).closest("tr").find(".client_perror").text("Duplicate Email Id");
                        $(this).closest('tr').find('.emailcheck').focus();
                       // alert("duplicate email id");
                        // e.preventDefault();
                       
                        return 1; // means there are duplicate values
                    }

            }
        }
    
      return 0;


}



$( document ).ready(function() {
    // alert("hello");
  $("Form").validate();

   // prevent enter key on any text box  added on 14/01/2020

   $("input:text").keypress(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

   $('textarea').keypress(function(event) {

if ((event.keyCode || event.which) == 13) {

    event.preventDefault();
    return false;

  }

});

    // very important script for trapping key over

    $(".timez").focusout(function(event) {
      /* Act on the event */

        $(".hidemsg").css("display", "none");
    });

    $(".timez").focusin(function(event) {
      /* Act on the event */
         $(".hidemsg").css("display", "inline-block");
    });

     $(".stype").focusout(function(event) {
      /* Act on the event */

        $(".hidemsg1").css("display", "none");
    });

    $(".stype").focusin(function(event) {
      /* Act on the event */
         $(".hidemsg1").css("display", "inline-block");
    });


  //  $(".clientspecific").click(function(event){

 $(".clientspecific").on('click', function() { 
     var text1 =  $(".client_specific").val();
           $("#specificationtext").val(text1);
           $( "#clientspecificmodal" ).modal("show");
            // debugger;
        // if(this.checked) {
     
        //   bootbox.prompt({
        //      title: "Enter Details",
        //      inputType: 'textarea',
        //       callback: function (result) {
        //         console.log(result);
        //             $(".client_specific").val(result);
        //       }
        //   });

        // }
    });
//add client specification in textbox 
   $("#writespecification").on('click', function() {    
       var text1 =  $("#specificationtext").val();
        var text2=$(".client_specific").val(text1);
        if(text1 == ""){
           Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Enter Text..'
          })
        }
        else{
           $( "#clientspecificmodal" ).modal("hide");
        }

   });   
    $(".chkerror").click(function(event) {
      /* Act on the event */
       event.preventDefault();
       var proceed = false;
       //debugger;
       proceed = validatemyform();

      //alert(proceed);

      if (proceed == 1 ) 
      {
        bootbox.alert("Error in Form \n Please Correct and then Continue");

      }

    
       if (proceed == 0)
       {

          $("#clientadd").submit();
       }
         
    
      
    });


$("div.row.othdtl").on("change", "select#client_country.form-control.clcountry", function(e){
    //$(".othdtl").on('change','.clcountry',function(e){
//$(".clcountry").change(function(e) {  removed as sometime not working for multiple rows

  //alert(this.value);
  $value =  this.value ;

  $('#client_state').empty().append('<option value="">none</option>').find('option:first').attr("selected","selected");

    if (this.value == 'US') {

      
        // var state=["Mumbai","Delhi","Chennai","Goa"];
        var state = "{{ json_encode($usstates) }}" ;
        var state =  state.replace(/&quot;/g,'"')
        //alert(state);
        var myselect = $('<select>');
       
        $.each(JSON.parse(state), function(index, key) {
               myselect.append( $('<option></option>').val(key).html(key) );
        });
      
        $('#client_state').append(myselect.html());

    }
     else if (this.value == 'UK') {

        var state = "{{ json_encode($ukcities) }}" ;
        var state =  state.replace(/&quot;/g,'"')
        alert(state);
        var myselect = $('<select>');
       
        $.each(JSON.parse(state), function(index, key) {
               myselect.append( $('<option></option>').val(key).html(key) );
        });
      
        $('#client_state').append(myselect.html());


    }
    else if (this.value == 'CANADA') {

        var state = "{{ json_encode($canadastates) }}" ;
        var state =  state.replace(/&quot;/g,'"')
        //alert(state);
        var myselect = $('<select>');
       
        $.each(JSON.parse(state), function(index, key) {
               myselect.append( $('<option></option>').val(key).html(key) );
        });
      
        $('#client_state').append(myselect.html());


    }
    else if (this.value == 'NEW ZEALAND') {

        var state = "{{ json_encode($newzealandcities) }}" ;
        var state =  state.replace(/&quot;/g,'"')
        //alert(state);
        var myselect = $('<select>');
       
        $.each(JSON.parse(state), function(index, key) {
               myselect.append( $('<option></option>').val(key).html(key) );
        });
      
        $('#client_state').append(myselect.html());


    }
      else if (this.value == 'AUSTRALIA') {

        var state = "{{ json_encode($australiacities) }}" ;
        var state =  state.replace(/&quot;/g,'"')
        //alert(state);
        var myselect = $('<select>');
       
        $.each(JSON.parse(state), function(index, key) {
               myselect.append( $('<option></option>').val(key).html(key) );
        });
      
        $('#client_state').append(myselect.html());


    }
    else {

        var myselect = $('<select>');

        myselect.append( $('<option></option>').val('other').html('other') );
        $('#client_state').append(myselect.html());


    }
    


});

    $(".clstate").change(function(e) {
  
  var optionText = $('.clstate').val();
  var optionText = optionText.trim();
  /* Act on the event */
  if (optionText =="other" ){
        $('.editOption').show();  
        $('.editOption').focus(); 
  
        $('.editOption').keyup(function(){
            var editText = $('.editOption').val();
            $(".editOption").val(editText);
            $(".editOption").html(editText);
            
        });

       }
  else{
        $(".editOption").val("");
        $('.editOption').hide();
    }
});


});



// $(".compadd").focusout(function(event) {
//   /* Act on the event */
//   // alert($(this).val());
//   if ($(this).val() == "") {
//       $(this).closest("tr").find("#client_company_error").text("This field is required"); 
//   }
//   else {
//        $(".compadd").css("text-transform", "capitalize");
//   }

// });

$( ".fullname" ).on( "focusout", '.addfname',  function() {
    //$(".addfname").focusout(function(event) {
      /* Act on the event */
  // alert($(this).val());

  var iChars = "`~!@#$%^&*()+=[]\\\';,/{}|\":<>?";

// for (var i = 0; i < document.formname.fieldname.value.length; i++) {
//     if (iChars.indexOf(document.formname.fieldname.value.charAt(i)) != -1) {
//         alert ("Your username has special characters. \nThese are not allowed.\n Please remove them and try again.");
//         return false;
//     }
// }

for (var i = 0; i < this.value.length; i++) {
    if (iChars.indexOf(this.value.charAt(i)) != -1) {
        alert ("Your First Name has special characters. \nThese are not allowed.\n Please remove them and try again.");
         // return false;

    }
}


      var value =  $.trim($(this).val());
      var value =  $.trim(this.value);
      $(this).val(value);

  if (value  == "") {
      $(this).closest("tr").find(".first_name_error").text("This field is required"); 
  }
  else {
      $(this).closest("tr").find(".addfname").css("text-transform", "capitalize");
      $(this).closest("tr").find(".first_name_error").text(" ");
      $(this).closest("tr").find("#first_name_success").text("Success"); 
      $(this).closest("tr").find("#first_name_success").fadeIn('fast').animate({opacity: 1.0}, 1500).effect("pulsate", { times: 2 }, 800).fadeOut('slow');
  }

});



//$(".addlname").focusout(function(event) {
$( ".fullname" ).on( "focusout", '.addlname',  function() {  
  /* Act on the event */
  // alert($(this).val());
  // if ($(this).val() == "") {
  //     $(this).closest("tr").find("#last_name_error").text("This field is required"); 
  // }
  // else {
      var value =  $.trim($(this).val());
      $(this).val(value);
      $(".addlname").css("text-transform", "capitalize");
  //}

    var iChars = "`!@#$%^&*()+=[]\\\';,/{}|\":<>?";

    for (var i = 0; i < this.value.length; i++) {
    if (iChars.indexOf(this.value.charAt(i)) != -1) {
        alert ("Your Last Name has special characters. \nThese are not allowed.\n Please remove them and try again.");
         // return false;

    }
} 

});

$(".addaddr").focusout(function(event) {
 
  $(".addaddr").css("text-transform", "capitalize");
  if($(".addaddr").val()=="") {
      return false;
  }
 
});


$(".addwebsite").focusout(function(event) {
  /* Act on the event */
  // alert($(this).val());
  var websiteval =  $(this).val();

  //ar urlregex = new RegExp(         "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
  //alert(websiteval);

  var urlregex = /^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)/ ;
  // var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

  if (!urlregex.test(websiteval)) {
       //alert("error");
      $(this).closest("tr").find(".website_error").text("Not Valid Url"); 
  }
  else {
     $(this).closest("tr").find(".website_error").text(" ");
           $(this).closest("tr").find("#website_success").text("Success"); 

          $(this).closest("tr").find("#website_success").fadeIn('fast').animate({opacity: 1.0}, 1500).effect("pulsate", { times: 2 }, 800).fadeOut('slow');
  }

});



$( ".fullname" ).on( "focusout", '.dupl',  function() {
     /* Act on the event */
     //$("form").validate();
      // alert("hello");
      var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      
      var v1 = $(this).closest('tr').find('.dupl').val();
      //alert(v1);
      if (!filter.test(v1)) {
          $(this).closest("tr").find(".client_perror").text("Invalid Email Id "); 
        }
      else {   

           $(this).closest("tr").find(".client_perror").text(" ");
           $(this).closest("tr").find(".client_perror").text("Success"); 

          $(this).closest("tr").find(".client_perror").fadeIn('fast').animate({opacity: 1.0}, 1500).effect("pulsate", { times: 2 }, 800).fadeOut('slow');
        }
      // $(".dupl").each(function() {
      //      var val = $(".dupl").val(); 
      //       alert(val);
      //     if (!filter.test(val)) {
      //         alert("Invalid Email");
      //        return false;
      //       }
      //  });

     //alert('Enter right email');

 });
   
   
    $('.add').click(function(){
        // var product = $('.product_id').html();  <th class="no">'+n+'</th>' 
          // '<td><input type="text" name="client_email_primary[]" class="qty form-control"></td>' +
          //         '<td><input type="text" name="client_email_secondary[]" class="price form-control"></td>' +
          //         '<td><input type="text" name="client_address1[]" class="dis form-control"></td>' +
          //         '<td><input type="text" name="client_state[]" class="dis form-control"></td>' +
          //         '<td><input type="text" name="client_country[]" class="dis form-control"></td>' +

         // check_duplicate();
   
        // var n = ($('#clienttable .fullname tr').length-0)+1;

        // var jump = $(this);
       
        var tr = '<div class="row pr-4 pl-3"><div class="col-md-2"><div class="form-group"><label for="first_name">First Name</label><input type="text" name="first_name[]"  class=" form-control addfname"><label id="first_name_error" class="first_name_error" for="first_name"></label><label id="first_name_success" class="success" for="first_name"></label></div></div><div class="col-md-2"><div class="form-group"><label for="last_name">Last Name</label><input type="text" name="last_name[]" class="form-control addlname"></div></div><div class="col-md-3"><div class="form-group cemail"><label for="client_email_primary">Email</label><input type="email" name="client_email_primary[]"  value=" " class="form-control  emailcheck" required="required"><span id="client_email_primary_error" class="client_perror"></span> <label id="client_email_primary_success" class="success client_perror" for="client_email_primary"></label></div></div>'
                           +
               '<div class="col-md-2"><div class="form-group"><label for="client_contact_1">Contact</label><input type="text" name="client_contact_1[]"  value=" " class="form-control" required="required"></div></div>'
            +  '<div class="col-md-2"><div class="form-group row1-note"><label for="client_note" >Note</label>'
            + '<input type="textarea" name="client_note[]"  value=" " class="form-control" required="required"></div></div>'
            +  '<div class="col-md-1"><div class="form-group"><label style="color:white;">saadasd</label><a href="#" class="btn btn-danger btn-outline delete">Delete</a></div></div></div>';
        $('#addclient').append(tr);
        // $(jump).next('.addfname').focus();
    });

    $( "#addclient" ).on( "click", '.delete',  function() {
    // $( ".delete" ).click(function() {
         //alert('delete');

      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            $(this).closest('.row').remove();
          }
          else{
             Swal.fire(
              'You canceled delete operation.',
            )
          }
        })
       
        
            
          
        
    });

   
    $(".compinfo").on("click", function() {
        $('#comp').toggle();
    });
    

    // Routing for  multiple email insert

function check_duplicate_email() {
    // debugger;
    var $email= [];
    var cnt = 0 ;
    //var form = $(this).parents('form:first');
    //debugger;
    $('input[name^="client_email_primary"]').each(function() {
    
  
       //var $email1 = $(this).closest('tr').find('.dupl').val();
       var $email1 =  $(this).val();
       //  alert($email1);
       $email.push($email1);
         
       // alert($email.length);
       for (var i = 0; i < $email.length; i++) 
        {
            for (var j = i+1; j < $email.length; j++) 
            {                  
                    if ($email[i] == $email[j]) 
                    {
                       // $(this).closest("tr").find(".client_perror").show();
                        $(this).closest("tr").find(".client_perror").text("Duplicate Email Id"); 
                        //alert("duplicate email id");
                        return false; // means there are duplicate values
                    }

            }
        }
    
      //     var _token = $('#_token').val(); 
           //alert($email);
            var formData = {   email: $email1 }
                           // console.log(formData);
                        $.ajax({
                              type: "GET",
                              cache: false,
                              async: true,
                              datatype: "json",
                              url: "{{ URL::to('clients/getemail') }}",
                              data: formData,
                            beforesend : function(data) {  console.log(data) ;},
                            error       : function(err) { alert("Could not connect to the registration server."); },
                            success: function(response)
                            { 
                            console.log(response) ; 
                             // $( "#orderdatedialog .success" ).html("Data Updated Successfully");  
                           
                             if (response == 0 || response == 1) {

                                  $(this).closest("tr").find(".client_perror").text("Email is Valid"); 
                                  $(".client_perror").fadeIn('normal', function(){
                                  setTimeout(function(){
                                  $(".client_perror").fadeOut("slow");
                                                  },4000);
                                              });
                                 return true;
                               }
                              else
                              {
                                  $(this).closest("tr").find(".client_perror").show();
                                  $(this).closest("tr").find(".client_perror").text("Duplicate Email Id, Already used"); 
                                  // $(".messg").fadeIn('normal', function(){
                                  // setTimeout(function(){
                                  // $(".messg").fadeOut("slow");
                                  //                 },4000);
                                  //             });
                                  console.log("duplicate email id");

                                 return false ;
                              }
        
                            }
                        });
                        return true;
              });

     }




(function( $ ){
 
     $.fn.multipleInput = function() {
 
          return this.each(function() {
 
               // create html elements
 
               // list of email addresses as unordered list
               $list = $('<ul />');
 
               // input
               //alert('hello');
               var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

               var $input = $('<input type="text" />').keyup(function(event) {
 
                    if(event.which == 32 || event.which == 188) {
                         // key press is space or comma
                         var val = $(this).val().slice(0, -1); // remove space/comma from value
                         //alert(val);
                          if (!filter.test(val)) {
                                alert("Invalid Email");
                                return false;
                              }


                         // append to list of emails with remove button
                         $list.append($('<li class="multipleInput-email"><span>' + val + '</span></li>')
                              .append($('<a href="#" class="multipleInput-close" title="Remove" />')
                                   .click(function(e) {
                                        $(this).parent().remove();
                                        e.preventDefault();
                                   })
                              )
                         );
                         $(this).attr('placeholder', '');
                         // empty input
                         $(this).val('');
                    }
 
               });
 
               // container div
               var $container = $('<div class="multipleInput-container" />').click(function() {
                    $input.focus();
               });
 
               // insert elements into DOM
               $container.append($list).append($input).insertAfter($(this));
 
               // add onsubmit handler to parent form to copy emails into original input as csv before submitting
               var $orig = $(this);
               $(this).closest('form').submit(function(e) {
 
                    var emails = new Array();
                    $('.multipleInput-email span').each(function() {
                         emails.push($(this).html());
                    });
                    emails.push($input.val());
 
                    $orig.val(emails.join());
 
               });
 
               return $(this).hide();
 
          });
 
     };
})( jQuery );
 
  // $(".fullname tr td  .tm-input").each(function () {
  //    alert('hello');
  //   $(this).closest('td').find('.tm-input').multipleInput();
  // }); 
  //$('this').closest('td').find('.tm-input').multipleInput();



 $('.compinput1').on('focusout', function() {
      //alert( this.value ); // or $(this).val()
     // $(".compselect").val( this.value );
     // $(".progSelect").hide();
       //alert(this.value);
      
       $value = this.value ;
       var jdata= null ;
       $.ajax({
            type: "GET",
            cache: false,
            async:false,
            datatype: "json",
            url: "{{ URL::to('clients/compdtl') }}",
            data: {"search": $value},
            success:function(data)
                {
                  //console.log(data);

                    //jdata = data ;
                    // var json = $.parseJSON(data);

                  $("#website").val(data[0].website);
                  $("#phone").val(data[0].phone);
                  $("#client_address1").val(data[0].client_address1);
                  $("#client_state").val(data[0].client_state);
                  $("#client_country").val(data[0].client_country);
                  $("#timezone_type").val(data[0].timezone_type);
                  $("#unit_price").val(data[0].unit_price);
                  $("#digit_rate").val(data[0].digit_rate);
                  $("#store_type").val(data[0].store_type);
                  // make read only
                  $("#website").prop("readonly",true);
                   $("#phone").prop("readonly",true);
                    $("#client_address1").prop("readonly",true);

                }
        
        });
 
});



$( ".fullname" ).on( "focusout", '.emailcheck',  function(event) {
  var eml = $(this);
   //debugger;
  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
     
      //var v1 = $(this).val();
      var v1 = this.value;
     // alert(v1);
      if (!filter.test(v1)) {
          $(this).closest("tr").find(".client_perror").text("Invalid Email Id "); 
          //alert("invalid");
          return false;
        }
      else {   

           $(this).closest("tr").find(".client_perror").text(" ");
           $(this).closest("tr").find(".client_perror").text("Success"); 

          $(this).closest("tr").find(".client_perror").fadeIn('fast').animate({opacity: 1.0}, 1500).effect("pulsate", { times: 2 }, 800).fadeOut('slow');
        }
  
    $(this).closest("tr").find(".client_perror").text(" "); 
   var $email= [];
    var cnt = 0 ;
    $('input[name^="client_email_primary"]').each(function(e) {
          //debugger;
          
           var $email1 =  this.value;
            $email.push($email1);
    });  

       // alert($email.length);
       for (var i = 0; i < $email.length; i++) 
        {
            for (var j = i+1; j < $email.length; j++) 
            {                  
                    if ($email[i] == $email[j]) 
                    {
                         //debugger;
                        //$(v1).closest("tr").find(".client_perror").show();
                        $(eml).closest("tr").find(".client_perror").text("Duplicate Email Id"); 
                        //alert("duplicate email id");
                        // e.preventDefault();
                         $(eml).closest('tr').find('.emailcheck').focus();
                        return false; // means there are duplicate values
                    }

            }
        }

 
            var formData = {   email: v1 }
                           // console.log(formData);
                        $.ajax({
                              type: "GET",
                              cache: false,
                              async: true,
                              datatype: "json",
                              url: "{{ URL::to('clients/getemail') }}",
                              data: formData,
                            beforesend : function(data) {  console.log(data) ;},
                            error       : function(err) { alert("Could not connect to the registration server."); },
                            success: function(response)
                            { 
                            console.log(response) ; 
                             // $( "#orderdatedialog .success" ).html("Data Updated Successfully");  
                           
                             if (response === 0 ) {

                                  $(eml).closest("tr").find(".client_perror").text("Email is Valid"); 
                                  $(".client_perror").fadeIn('normal', function(){
                                  setTimeout(function(){
                                  $(".client_perror").fadeOut("slow");
                                                  },4000);
                                              });
                                 return true;
                               }
                              else
                              {
                                 
                                  $(eml).closest("tr").find(".client_perror").text("Duplicate Email Id, Already used"); 
                                   $(eml).closest("tr").find(".client_perror").show();
                                   $(eml).closest('tr').find('.emailcheck').focus();
                                  
                                  console.log("duplicate email id");
                                  //event.preventDefault();
                                 return false ;
                              }
        
                            }
                        });
                        return true;
  
});

//$('#clienttable tbody').on( 'click', 'td a.emailcheck', function (e) {
//$('#clienttable .emailcheck').click(function(){
  //  e.preventDefault();
   //var eml = $(this).closest('tr').find('.dupl').val();
   //alert ('this is' +eml);
     //alert($(this));
   //  var eml = $(this) ;
   //  check_duplicate(eml);

//});


function check_duplicate(var1) {
    //alert(var1.val());
   // debugger;
    var $email= [];
    $('input[name^="client_email_primary"]').each(function() {
  
       //var $email1 = $(this).closest('tr').find('.dupl').val();
       var $email1 = $(this).val();
       alert($email1);
       $email.push($email1);
           });


       for (var i = 0; i < $email.length; i++) 
        {
            for (var j = i+1; j < $email.length; j++) 
            {                  
                    if ($email[i] == $email[j]) 
                    {
                        //$(this).closest("tr").find(".error").show();
                        var xyz =  $(var1).closest("tr").find(".client_perror").val("ok");
                        //$(this).closest("tr").find(".client_perror").show();
                        $(var1).closest("tr").find(".client_perror").html("Duplicate Email Id");
                        $(eml).closest('tr').find('.emailcheck').focus(); 
                        //$(this).closest("tr").find(".error").text("Duplicate Email Id"); 
                        return false; // means there are duplicate values
                    }

            }
        }
    
      //     var _token = $('#_token').val(); 
           //alert($email);
            var formData = {   email: $email }
                            console.log(formData);
                        $.ajax({
                              type: "GET",
                              cache: false,
                              async: true,
                              datatype: "json",
                              url: "{{ URL::to('clients/getemail') }}",
                              data: formData,
                            beforesend : function(data) {  console.log(data) ;},
                            error       : function(err) { alert("Could not connect to the registration server."); },
                            success: function(response)
                            { 
                            console.log(response) ; 
                             // $( "#orderdatedialog .success" ).html("Data Updated Successfully");  
                           
                             if (response == 0) {

                                  $(var1).closest("tr").find(".error").text("Email is Valid"); 
                                  $(".error").fadeIn('normal', function(){
                                  setTimeout(function(){
                                  $(".error").fadeOut("slow");
                                                  },4000);
                                              });
                                 return true;
                               }
                              else
                              {
                                  $(var1).closest("tr").find(".error").show();
                                  $(var1).closest("tr").find(".error").text("Duplicate Email Id, Already used"); 
                                  // $(".messg").fadeIn('normal', function(){
                                  // setTimeout(function(){
                                  // $(".messg").fadeOut("slow");
                                  //                 },4000);
                                  //             });

                                 return false ;
                              }
        
                            }
                        });

     }
                   



// avoid this routine as no company help required on 02-dec-16
$('.compinput').on("focus", function(e) {

     var value = this.value ;
     //debugger;

     if (value  == "") {
             //alert("This field is required"); 
            // $(this).closest("tr").find(".client_company_error").text("This field is required");
              // swal({
              //                             icon: 'error',
              //                             title: 'Error',
              //                             text: "Company cannot be Blank"
                                          
              //                       })
            e.preventDefault();
            return false;
             //$("input#client_company").focus();
       }

    var comp = $("#client_company").val() ;
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
       // e.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');
    $(this).autocomplete({
        
        //source: "{{ URL::to('gmails/fetchcomp') }}",
       source: function(request, response) {
      $.post("{{ URL::to('gmails/fetchcomp') }}", {_token:token, term: request.term, comp1: comp},
         response, "json");
    },

        minLength: 1 ,
      
    
    select: function(event, ui) {
            //var $itemrow = $(this).closest('tr');
                   
          
          $('#client_company').val(ui.item.client_company);
                    
          //$('#client_company').focus();

            return false;
      }
    
      }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
  return $( "<li>" )
    .data( "ui-autocomplete-item", item )
    .append( "<a>" +  item.client_company  +  "</a>" )
    .appendTo( ul );
};

$(document).on("keyup", "input#client_company", function(e){
    //debugger;
    var value = this.value ;

     if (value  == "") {
             //alert("This field is required"); 
               swal({
                                          icon: 'error',
                                          title: 'Error',
                                          text: "Company Field is Required"
                                          
                                    })
               
               // alertify.alert("Error", "Company Field is Required", function(){
               //              alertify.message('OK');
               //      });

             //bootbox.alert("Company Field is Required");  
             $(this).closest("tr").find(".client_company_error").text("This field is required");
             $("input#client_company").focus();
             return false;
       }

});



// $(document).on("focusout", "input#client_company", function(e){
//     //debugger;
//     var value = this.value ;

//      if (value  == "") {
//          // alertify.alert("Error", "Company Field is Required", function(){
//                        //     alertify.message('OK');
//            //         });
//            bootbox.alert("Company Field is Required");  
//            //  alert("This field is required"); 
//           $(this).closest("tr").find(".client_company_error").text("This field is required"); 
//           $(this).focus();
//        }

// });


$('.compinput').on("focusout", function() {

      // debugger;
       var value  = $.trim(this.value);
       //alert(value);
       if (value  == "") {
            // alert("This field is required"); 
              //alertify.alert("Error", "Company Field is Required", function(){
                  //          alertify.message('OK');
                //    });
             // bootbox.alert("Company Field is Required");  
            $(this).closest("tr").find(".client_company_error").text("This field is required"); 
             $(".compinput").focus();
       }


    var iChars = "`~!$%^*()+=[]\\\';,/{}|\":<>?";

    var special_char = 0 ;
    for (var i = 0; i < this.value.length; i++) {
        if (iChars.indexOf(this.value.charAt(i)) != -1) {
             // alert ("Company Name has special characters. \nThese are not allowed.\n Please remove them and try again.");
               // alertify.alert("Error", "Company Name has special characters. \nThese are not allowed.\n Please remove them and try again.", function(){
               //              alertify.message('OK');
               //      });
              special_char = 1;
              return false;
            }
    }

    if ( special_char == 1)  {
         bootbox.alert("Company Name has special characters. \nThese are not allowed.\n Please remove them and try again.");
             return false;
    }
      
       //var value =  $.trim($(this).val());

       $(this).val(value);
     $(".compinput").css("text-transform", "capitalize");
     return false;
});     





});


$(document).ready(function(){
   $("input").not(".addaddr").on("cut copy paste",function(e) {
      e.preventDefault();
   });
});

</script>


@endsection