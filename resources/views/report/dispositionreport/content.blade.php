<div class="">

  <form action="{{route('generate.allcomapnydispositionreport')}}" method="post">
    @csrf
    <div class="col-md-12"> 
       <div class="card border-light" style="background-color: #565759">
        <h5 class="ml-3 mt-3" style="color: white"><b>All Company Disposition Report</b><h5>
           <div class="card-body ">
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                    <label>Start Date</label>
                       <input type="text" name="startdate" value="" class="form-control" id="start_date">
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="text" name="enddate" value="" class="form-control" id="end_date">
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group mt-1">
                    <label class="" style="color: #565759">sasdsadaddasdasdsda</label>
                    <input name="submit1" type="submit" id="process" value="Generate" class="btn btn-primary btn-fill" />
                  </div>
              </div>
           </div>
                      
          </div>
         </div>
       </div>
    </form>  
    <form action="{{route('generate.allcomapnydispositionreport')}}" method="post">
      @csrf
    <div class="col-md-12"> 
       <div class="card border-light" style="background-color: #565759">
        <h5 class="ml-3 mt-3" style="color: white"><b>Selected Company Disposition Report</b><h5>
           <div class="card-body ">
            <div class="row">
         
              <div class="col-md-4">
                  <div class="form-group">
                    <label>Company Name</label>
                    <select class="form-control  selectpicker mt-1" multiple data-live-search="true" name="companyid[]">
                      @foreach($companyids as $companyid)
                        <option value="{{$companyid->id}}">{{$companyid->company_name}}</option>
                        @endforeach
                    </select>
                      <!--  <select class="form-control form-control2 mt-1" name="companyid[]" multiple="">
                       
                       </select> -->
                  </div>
              </div>
               
              <div class="col-md-2">
                  <div class="form-group">
                    <label>Start Date</label>
                       <input type="text" name="startdate" value="" class="form-control" id="companystart_date">
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="text" name="enddate" value="" class="form-control" id="companyend_date">
                  </div>
              </div>
             <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <select class="form-control  selectpicker mt-1" multiple data-live-search="true" name="companyid[]">
                      @foreach($userids as $userid)
                        <option value="{{$userid->email}}">{{$userid->email}}</option>
                        @endforeach
                    </select>
                      <!--  <select class="form-control form-control2 mt-1" name="companyid[]" multiple="">
                       
                       </select> -->
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group mt-1">
                    <label class="" style="color: #565759">sasdsadaddasdasdsda</label>
                    <input name="submit2" type="submit" id="process" value="Generate" class="btn btn-primary btn-fill" />
                  </div>
              </div>
           </div>
                      
          </div>
         </div>
       </div>
    </form>  
    <form action="{{route('generate.allcomapnydispositionreport')}}" method="post">
      @csrf
    <div class="col-md-12"> 
       <div class="card border-light" style="background-color: #565759">
        <h5 class="ml-3 mt-3" style="color: white"><b>All User Disposition Report</b><h5>
           <div class="card-body ">
            <div class="row">
         
              <div class="col-md-4">
                  <div class="form-group">
                    <label>User Name</label>
                       <select class="form-control selectpicker mt-1" name="userid[]" multiple data-live-search="true">
                        @foreach($userids as $userid)
                              <option value="{{$userid->id}}">{{$userid->name}}</option>
                        @endforeach
                       </select>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                    <label>Start Date</label>
                       <input type="text" name="startdate" value="" class="form-control" id="userstart_date">
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="text" name="enddate" value="" class="form-control" id="userend_date">
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                       <select class="form-control selectpicker mt-1" name="mailid[]" multiple data-live-search="true">
                        @foreach($userids as $userid)
                              <option value="{{$userid->email}}">{{$userid->email}}</option>
                        @endforeach
                       </select>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group mt-1">
                    <label class="" style="color: #565759">sasdsadaddasdasdsda</label>
                    <input name="submit3" type="submit" id="process" value="Generate" class="btn btn-primary btn-fill" />

                  
                  </div>
              </div>
           </div>
                      
          </div>
         </div>
       </div>
    </form>  
</div>