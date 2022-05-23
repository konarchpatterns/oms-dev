@extends('layouts.newdashbord')
@section('style')
      
  <style type="text/css">
     
  .dash-unit1 {
    color: white;
  }

  .unlimitwidth  {

    width : 2000px;
    overflow-x: scroll; 
    overflow-y:hidden;
    
    white-space: nowrap;
  }

 


    </style>

  
<style type="text/css">
	

	.boldtext {
		
		font-weight: bold;
		
	}

	.clienttab {
		line-height: 1px !important;
		border-bottom: 0px !important;

	}

	.rightval {
		 text-align: right;
	}

	.pswd {
		padding: 0px !important;
	}

	.pass {
		color: blue;
	}

	.cpass {
		color: blue;
	}

    .tooltiptext {
    	visibility: hidden;
    	font-size: 12px;
    	
    }
  .navbar-brand
    {
       padding: 1.5px 5px !important; 
    }
	
  img.logo1 
{
 /* width: 100%;
  height: 10vh;*/
  padding: 12px;
} 

</style>
@endsection
@section('content')
  
  	<!-- NAVIGATION MENU -->


   

<div class="container">

  <!-- FIRST ROW OF BLOCKS -->     
  <div class="row">

    <!-- First Row  First BLOCK -->
    <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt30,0 ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>

          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata30 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata30 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
              @foreach($dtotalloted30 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 

            </tr>
            <tr>
              <td>Approved:</td>
               @foreach($dtotapproved30 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC-Pending:</td>
               @foreach($dtotqcpending30 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc30 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>Vect.Compl.:</td>
               @foreach($dcompvectordata30 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            <tr>
              <td>Digit.Compl.:</td>
              @foreach($dcompdigitdata30 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>
               @foreach($dtotcompl30 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
        </div>

    </div>

<!-- II ND  BLOCK -->
    <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt29,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata29 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata29 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted29 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved29 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending29 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc29 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata29 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata29 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl29 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
        </div>

    </div>


<!--  II ND BLOCK OVER -->       
  
<!-- III RD BLOCK START -->  
        
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
		  		<dtitle class="boldtext">Daily Status {{ substr($cdt28,'0' ,-1) }}  <span  class="dmm_td"> </span> </dtitle>
		  		<table class="table table-bordered table-condensed chgtable">
		  		<thead>
		  			<th></th>
		  			<th>Count</th>
		  			<th>Price</th>
		  		</thead>
		  		 <tbody>
		  		 	<tr>
		  		      <td>Vector</td>
                @foreach($dtotvectordata28 as $key)
		  		      	<td> {{ $key->dtotvect }} </td>
		  		        @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
		  		 	</tr>
		  		 	<tr>
		  		 		<td>Digitize</td>
		  		 		@foreach($dtotdigitdata28 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
		  		 	</tr>
		  		 	<tr>
		  		 		<td>Alloted:</td>
		  		 		 @foreach($dtotalloted28 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 

		  		 	</tr>
		  		 	<tr>
		  		 		<td>Approved:</td>
		  		 		 @foreach($dtotapproved28 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
		  		 		
		  		 	</tr>
		  		 	<tr>
		  		 		<td>QC-Pending:</td>
		  		 		 @foreach($dtotqcpending28 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
		  		 		
		  		 	</tr>
		  		 	<tr>
		  		 		<td>QC Ok:</td>
		  		 		 @foreach($dtotqc28 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
		  		 		
		  		 	</tr>
		  		 	<tr>
		  		 		<td>Vect.Compl.:</td>
		  		 		@foreach($dcompvectordata28 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
		  		 		
		  		 	</tr>
		  		 	<tr>
		  		 		<td>Digit.Compl.:</td>
		  		 		@foreach($dcompdigitdata28 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
		  		 		
		  		 	</tr>
		  		 
		  		 	<tr>
		  		 	<td>Tot. Completed:</td>

                @foreach($dtotcompl28 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              	
		  		 	</tr>
		  		 	
		  		 </tbody>
		  			
		  		</table>
		  
	</div>

</div>

<!-- III RD BLOCK OVER -->

<!-- 4TH  BLOCK START  -->
 <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt27,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata27 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata27 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted27 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved27 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending27 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc27 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata27 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata27 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl27 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

</div>
<!--  4TH BLOCK OVER -->       

<!-- 5TH  BLOCK START-->
 <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt26,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata26 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata26 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted26 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved26 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending26 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc26 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata26 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata26 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl26 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

</div>
<!-- 5TH BLOCK OVER -->       

<!-- 6TH BLOCK START -->
 <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt25,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata25 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata25 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted25 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved25 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending25 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc25 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata25 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata25 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl25 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

</div>
<!--  6TH BLOCK OVER -->     

<!-- </div>  1st row ends -->

<!-- second row   starts here  -->


 
<!-- 1st  BLOCK START-->
 <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt24,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata24 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata24 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted24 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved24 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending24 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc24 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata24 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata24 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl24 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

</div>
<!--  1st  BLOCK OVER   -->    

 <!-- II ND  BLOCK START -->
 <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt23,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata23 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata23 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted23 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved23 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending23 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc23 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata23 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata23 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl23 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

</div>

  <!--  IInd  BLOCK OVER -->       

  <!-- IIIrd BLOCK START -->

  <div class="col-sm-3 col-lg-3">
    <div class="dash-unit">
     <dtitle class="boldtext">Daily Status {{ substr($cdt22,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
           <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
          <tbody>
  
          <tr>
                <td>Vector</td>
                @foreach($dtotvectordata22 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata22 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted22 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved22 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending22 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc22 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata22 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata22 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl22 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
                      
           </tbody>
            
          </table>
      
      </div>

    </div>
    <!--III rd Block Over -->

    <!--1V th  BLOCK START-->
    <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt21,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata21 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata21 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted21 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved21 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending21 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc21 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata21 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata21 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl21 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  IVTH  BLOCK OVER -->    
 
  <!-- VTH  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt20,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata20 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata20 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted20 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved20 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending20 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc20 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata20 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata20 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl20 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  5TH  BLOCK OVER -->    
  <!-- 6TH  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

      <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt19,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata19 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata19 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted19 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved19 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending19 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc19 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata19 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata19 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl19 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

  </div>
  <!--  6TH  BLOCK OVER -->    

</div><!-- 2nd row ends-->

<div class="row"><!-- 3rd row starts -->
 

  <!-- 1st  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt18,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata18 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata18 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted18 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved18 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending18 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc18 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata18 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata18 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl18 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  1st  BLOCK OVER -->    

  <!-- II ND  BLOCK -->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt17,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata17 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata17 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted17 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved17 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending17 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc17 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata17 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata17 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl17 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  IInd  BLOCK OVER -->       

  <!--  IIIrd BLOCK START -->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt16,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
          <tbody>
          <tr>
                <td>Vector</td>
                @foreach($dtotvectordata16 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata16 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted16 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved16 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending16 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc16 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata16 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata16 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl16 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
            
          </tbody>
            
          </table>
      
    </div>
  </div>
  <!-- IIIrd Block Over -->

  <!-- 4TH  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt15,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata15 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata15 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted15 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved15 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending15 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc15 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata15 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata15 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl15 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  4TH  BLOCK OVER -->    
  <!--  5TH  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt14,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata14 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata14 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted14 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved14 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending14 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc14 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata14 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata14 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl14 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  5TH  BLOCK OVER -->    
  <!-- 6TH  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt13,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata13 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata13 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted13 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved13 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending13 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc13 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata13 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata13 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl13 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  6TH  BLOCK OVER -->    

<!-- </div> --><!-- 3rd row ends-->

      
<!-- <div class="row"> --> <!-- 4th row starts -->
 

  <!-- 1st  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt12,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata12 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata12 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted12 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved12 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending12 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc12 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata12 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata12 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl12 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

  </div>
  <!--  1st  BLOCK OVER -->    

  <!-- II ND  BLOCK -->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt11,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata11 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata11 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted11 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved11 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending11 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc11 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata11 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata11 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl11 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  IInd  BLOCK OVER -->       
  
  <!--  IIIrd BLOCK START -->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
             <dtitle class="boldtext">Daily Status {{ substr($cdt10,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
       <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
              <tr>
                <td>Vector</td>
                @foreach($dtotvectordata10 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata10 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted10 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved10 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending10 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc10 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata10 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata10 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl10 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
          
           </tbody>
            
          </table>
      
      </div>

  </div>
  <!-- 3rd Block Over -->

<!-- 10TH  BLOCK START-->
{{--  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt10,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata10 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata10 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted10 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved10 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending10 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc10 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata10 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata10 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl10 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

</div> --}}
<!--  10TH  BLOCK OVER -->    


<!-- 4TH  BLOCK START-->
 <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt09,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata09 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata09 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted09 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved09 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending09 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc09 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata09 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata09 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl09 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  4TH  BLOCK OVER -->    

  <!-- 5TH  BLOCK START-->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt08,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata08 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata08 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted08 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved08 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending08 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc08 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata08 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata08 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl08 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  5TH  BLOCK OVER -->    

  <!-- </div> --><!-- 4TH row ends-->

<!-- <div class="row"> --> <!-- 5th row starts -->
 

  <!-- 1st  BLOCK START-->
 <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt07,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata07 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata07 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted07 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved07 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending07 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc07 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata07 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata07 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl07 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>
  <!--  1st  BLOCK OVER -->    

  <!-- II ND  BLOCK -->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt06,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata06 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata06 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted06 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved06 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending06 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc06 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata06 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata06 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl06 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div>

  <!-- IInd  BLOCK OVER -->       

  <!--IIIrd BLOCK START -->

  <div class="col-sm-3 col-lg-3">

    <div class="dash-unit">
      <dtitle class="boldtext">Daily Status {{ substr($cdt05,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
    <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
           <tr>
                <td>Vector</td>
                @foreach($dtotvectordata05 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata05 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted05 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved05 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending05 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc05 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata05 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata05 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl05 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
            
           </tbody>
            
          </table>
      
      </div>

  </div>
  <!-- IIIrd Block Over -->

  <!-- 4TH  BLOCK START-->
 
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt04,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th>
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata04 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata04 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted04 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved04 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending04 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc04 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata04 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata04 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl04 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

    </div><!-- 4th Block Over -->
 <!--  </div> --> <!-- Last Second Row -->
  

<!-- <div class="row"> -->  <!-- Last Row -->

  <div class="col-sm-3 col-lg-3"> <!-- First Block-->

      <div class="dash-unit">
          <dtitle class="boldtext">Daily Status {{ substr($cdt03,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th><
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata03 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata03 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted03 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved03 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending03 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc03 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata03 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata03 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl03 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
  </div>

  </div>  <!-- 1ST Block over-->
 

  <!--  IInd  block start -->
  <div class="col-sm-3 col-lg-3">

     <div class="dash-unit">
         <dtitle class="boldtext">Daily Status {{ substr($cdt02,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th><
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata02 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata02 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted02 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved02 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending02 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc02 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata02 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata02 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl02 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div> <!-- 2ND Block over -->

  
  <div class="col-sm-3 col-lg-3"> <!--IIIrd block start -->

     <div class="dash-unit">
         <dtitle class="boldtext">Daily Status {{ substr($cdt01,'0' ,-1) }} <span  class="dmm_td"> </span> </dtitle>
          <table class="table table-bordered table-condensed ">
          <thead>
            <th></th>
            <th>Count</th>
            <th>Price</th><
          </thead>
           <tbody>
            <tr>
                <td>Vector</td>
                @foreach($dtotvectordata01 as $key)
                  <td> {{ $key->dtotvect }} </td>
                  @role('admin')
                  <td>{{ $key->dtotvectprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Digitize</td>
              @foreach($dtotdigitdata01 as $key)
                  <td> {{ $key->dtotdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dtotdigitprice }}</td>
                  @endrole 
            
                @endforeach 
            </tr>
            <tr>
              <td>Alloted:</td>
               @foreach($dtotalloted01 as $key)
                  <td> {{ $key->dtotallot }} </td>
                  @role('admin')
                  <td>{{ $key->dtotallotedprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>Approved:</td>
                @foreach($dtotapproved01 as $key)
                  <td> {{ $key->dtotapprov }} </td>
                  @role('admin')
                  <td>{{ $key->dtotapprovprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            <tr>
              <td>QC-Pending:</td>
                @foreach($dtotqcpending01 as $key)
                  <td> {{ $key->dtotqcpend }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcpendprice }}</td>
                  @endrole 
            
              @endforeach 
              
            </tr>
            <tr>
              <td>QC Ok:</td>
               @foreach($dtotqc01 as $key)
                  <td> {{ $key->dtotqcok }} </td>
                  @role('admin')
                  <td>{{ $key->dtotqcokprice }}</td>
                  @endrole 
            
              @endforeach 
            </tr>
            
           
            <tr>
             <td>Vect.Compl.:</td>

              @foreach($dcompvectordata01 as $key)
                  <td> {{ $key->dcompvect }} </td>
                  @role('admin')
                  <td>{{ $key->dcompvectprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
             <tr>
              <td>Digit.Compl.:</td>

              @foreach($dcompdigitdata01 as $key)
                  <td> {{ $key->dcompdigit }} </td>
                  @role('admin')
                  <td>{{ $key->dcompdigitprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
           
            <tr>
              <td>Tot. Completed:</td>

                @foreach($dtotcompl01 as $key)
                  <td> {{ $key->dcompl }} </td>
                  @role('admin')
                  <td>{{ $key->dtotcomplprice }}</td>
                  @endrole 
            
              @endforeach
              
            </tr>
            
           </tbody>
            
          </table>
      
    </div>

  </div><!--IIIrd block ends -->


</div> <!-- Last Row ends here -->
 

</div><!-- 5TH row ends-->

      
	</div> <!-- /container -->
	
          

<!-- change password modal-->
<!-- Modal -->
<meta name="_token" content="{!! csrf_token() !!}" />


@endsection
@section('script') 
<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

</script>  
@endsection
 