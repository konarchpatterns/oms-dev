@extends('layouts.dashboard')
@section('style')
<style type="text/css">
  table#mailrecords td, th {
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
  table-layout: fixed;
  word-wrap: break-word;
   max-width: 300px !important;
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
#mailrecords_info{
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
#mailrecords_next{
 background-color: white;
  margin-left: 10px;
   margin-right: 10px;
}
#mailrecords_last{
 background-color: white;
}
#mailrecords_previous{
  background-color: white;
   margin-left: 10px;
   margin-right: 10px;
}
#mailrecords_first{
  background-color: white;
}
</style>

@endsection

@section('content')
    
@include('mail.viewmail.content')

@endsection

@section('script')  

@include('mail.viewmail.script')

@endsection
