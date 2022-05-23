@extends('layouts.tabledashboard')

@section('content')
  
 
<style type="text/css">

#dformat   {
   color: blue !important;
   background: #FFFACD !important;

 }

/*.pfrdt {
  color: blue ;
 }

.row {
  padding: 5px 0;
}

 .ptodt {
  color: blue ;
 }

#pyear {
  color: blue ;
 }

 #pmonth{
  color: blue ;
 }
*/   

  .border1 {
    border-style: solid;
    border-color: green;
  }

/*.myTable3 {
    color: blue;
  }*/
</style>

@php
      
    $local1 = new DateTime();
    $local= $local1->format('Y-m-d');

   // dd($month);die;
@endphp

<div class="container-fluid">
 <div class="row">
 <div class="card-group">
  <div class="col-md-6 col-sm-6">
   <div class="card card-default">
    <div class="card-heading">Daily Report</div>

   
   <div class="card-body border1">
      <form class="form-horizontal" id="rp" role="form" method="POST" 
       action="dailyreportexec">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
             
              {{-- <select name="dformat">
                  <option value="Preview">Preview</option>
                  <option value="Download">Download</option>
              </select>  --}}
             <div class="row">
              <div class="col-sm-6 col-md-offset-1">  
                  <div class="form-group">
                  
                     {!! Form::label('pfr_dt', 'For The Date', ['class' => 'control-label']) !!}
                     {!! Form::text('pfr_dt', $local, ['class' => 'form-control pfrdt', 'id' =>'pfr_dt']) !!}
                  </div>
              </div>
            </div>

          

            <div class="row">
              <div class="col-sm-6 col-md-offset-1">  
                  <div class="form-group">
                  
                    {!! Form::label('dformat', 'Print Format', ['class' => 'control-label']) !!}
                    {!! Form::select("dformat", ["Preview"=>"Preview", "Download"=>"Download"],
                    ['class' => 'required dfoo form-control', 'id'=>'dformat', 'required'=>'required', 'onfocus'=> 'this.size=2;']) !!}
                  </div>
              </div>
            </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button id="pbutton" type="submit" class="btn btn-primary">Proceed</button>
                        </div>
                       {{--  <div class="col-sm-6">
                            <button id="pdownload"  type="submit" class="btn btn-primary">Download</button>
                        </div> --}}
                    </div>
                     <input type="hidden" class=".pr" name="pr" value="1" >
              <input type="hidden" class= ".download" name="download" >
      </form>
    </div>
  
</div>
</div>
<!-- second card -->
<div class="col-md-6 col-sm-6">
   <div class="card card-default">
    <div class="card-heading">Daily Report With Criteria</div>
<div class="card-body border1">
      <form class="form-horizontal" id="rp" role="form" method="POST" 
       action="dailyreportexec1">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
             
              {{-- <select name="dformat">
                  <option value="Preview">Preview</option>
                  <option value="Download">Download</option>
              </select>  --}}
             <div class="row">
              <div class="col-sm-6 col-md-offset-1">  
                  <div class="form-group">
                  
                     {!! Form::label('pfr_dt1', 'For the Date', ['class' => 'control-label']) !!}
                     {!! Form::text('pfr_dt1', null, ['class' => 'form-control pfrdt1', 'id' =>'pfr_dt1']) !!}
                  </div>
              </div>
            </div>
            
            {{-- <div class="row">
            <div class="col-sm-4 form-group"> --}}
               
                 <table class="table table-condensed table-bordered table-hover myTable3" id="myTable3" > 
                    <thead>
                      <th> Select</th>
                      <th> Status</th>
                    </thead>
                    <tbody>
                 
                  
                    @foreach($status as $st)
                    
                      <tr>
                      <td><input type="checkbox" name="st[{{  $st }}]" value ="{{ $st }}"></td>
                      <td >{!! $st !!} </td>
                      </tr>
                     
                    
                    @endforeach
                          
                   
                    </tbody>
                  </table>
            
{{-- 
                 </div>
                </div>  --}}
          

            <div class="row">
              <div class="col-sm-6 col-md-offset-1">  
                  <div class="form-group">
                  
                    {!! Form::label('dformat', 'Print Format', ['class' => 'control-label']) !!}
                    {!! Form::select("dformat", ["Preview"=>"Preview", "Download"=>"Download"],
                    ['class' => 'required dfoo form-control', 'id'=>'dformat', 'required'=>'required', 'onfocus'=> 'this.size=2;']) !!}
                  </div>
              </div>
            </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button id="pbutton" type="submit" class="btn btn-primary">Proceed</button>
                        </div>
                       {{--  <div class="col-sm-6">
                            <button id="pdownload"  type="submit" class="btn btn-primary">Download</button>
                        </div> --}}
                    </div>
                     <input type="hidden" class=".pr" name="pr" value="1" >
              <input type="hidden" class= ".download" name="download" >
      </form>
    </div>
    </div>
    </div>

<!-- third panel -->
</div>
@endsection

@section('script')


<script>


$(document).ready(function(){

  //var formid = $(this).parents('form:first').attr('id');
  //var formid1 =  "#" + formid  ;
  //$("#rp").find('.pr').text("hello");
 //alert($("input[name='pr']").val()); 
 //perfectly identifying value;
 
 //$("#pbutton").click(function(event) {
//   /* Act on the event */
  //event.preventDefault();
 // debugger;
 
// });

 //$("#pdownload").click(function(event) {
   //* Act on the event */
 
 //});


 //$(".pfrdt").datetimepicker({ changeMonth: true, selectOtherMonths: true,
  // changeYear: true, dateFormat: 'dd-mm-yyyy'});
 $(".pfrdt").datepicker({dateFormat: 'yy/mm/dd'});
 $(".pfrdt1").datepicker({dateFormat: 'yy/mm/dd'});
 $(".ptodt").datetimepicker({dateFormat: 'dd-mm-yyyy'});
  
});


</script>
@endsection
