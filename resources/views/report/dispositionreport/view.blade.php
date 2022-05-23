@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


<style type="text/css">
.cc{
  display: none;
}
</style>
@endsection

@section('content')
    
@include('report.dispositionreport.content')

@endsection

@section('script')  

@include('report.dispositionreport.script')

@endsection