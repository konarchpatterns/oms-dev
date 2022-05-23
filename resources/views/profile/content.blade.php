 <br> 
<form action="{{route('user.updateprofile')}}" method="post" >
         @csrf
<div class="">
   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row ">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card temcolor1">
             
                <div class="card-body ">
                   <div class="row">
        <div class="col-md-9">
               <h5 align="center"><b>Change Password</b></h5>      
        </div>

        <div class="col-md-3">
            <button  class="btn  btn-primary btnsave rightdiv mr-2" onClick = "return checkPassword(this)">Update</button>  
        </div>
    </div>
                    <div class="row">
                     
                     
                        <div class="col-md-12">
                            <label>New Password : </label>
                         
                            <input type="password" class="form-control" id="password" name="password" value="" required="">
                         
                        </div> 
                        <div class="col-md-12">
                            <label>Confirm Password : </label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" required="">
                            <span id='message'></span>
                        </div> 
                       
                    </div>
                    
                </div>
            </div>
        </div>
     
    </div>
</div>

</form>

           