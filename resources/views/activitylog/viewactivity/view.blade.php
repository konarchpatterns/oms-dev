@extends('layouts.dashboard')
@section('style')
<style type="text/css">

  table#activityrecords td, th {
  position: relative;
  /*background: transparent ; */
 /* padding: 2px 4px !important;*/
 padding-left: 4px !important;
  padding-right: 4px !important;
  /*text-align: left;*/
  vertical-align: middle;
  overflow: hidden !important;
  text-overflow: ellipsis !important;
/*  border-top: 0px;*/
  font-size: 14px;
  clear: both;
  border-collapse: collapse;
 /* table-layout: fixed;*/
  word-wrap: break-word;
   max-width: 200px !important;
   
 /*color: white !important;
  color: blue !important; */
  white-space: nowrap !important;  
  color:white;
 background-color: #565759;
  /*max-height: 1.1em ;
  border-collapse: separate;
   empty-cells: hide;*/
   
   border-color: white;
}
.No{
width: 80%;
}
.Reco{
  width: 90%;
}
.Acti{
  width:90%;
}

#activityrecords_info{
  color: white;
}
.paginate_input {
   width: 30px;
    color: blue !important;
   font-weight: bold !important;
   font-style: 10px;
   font-weight: solid !important;

}
.paginate_page{
  color: white;
}
.paginate_of{
  color: white;

}
#activityrecords_next{
 background-color: white;
  margin-left: 10px;
   margin-right: 10px;
}
#activityrecords_last{
 background-color: white;
}
#activityrecords_previous{
  background-color: white;
   margin-left: 10px;
   margin-right: 10px;
}
#activityrecords_first{
  background-color: white;
}
</style>
@endsection
@section('content')
    
@include('activitylog.viewactivity.content')

@endsection

@section('script')  

@include('activitylog.viewactivity.script')

@endsection