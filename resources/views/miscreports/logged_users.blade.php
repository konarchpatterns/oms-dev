@extends('layouts.bootswatchold030117')


@section('content')
<style type="text/css">
	
	th{
		text-align: center;
	}
</style>

	<div class="row">
         
	    <div class="col-lg-12 margin-tb">

	        <div class="pull-left">

	            <h2>Failed Login Attempts</h2>

	        </div>

	        <div >



	           <!--  <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New permission</a> -->



	        </div>

	    </div>

	</div>

	@if ($message = Session::get('success'))

		<div class="alert alert-success">

			<p>{{ $message }}</p>

		</div>

	@endif

	<table class="table table-bordered">

		<tr>

			<th>No</th>

			<th>Name</th>



			<th>Ip</th>

			<th>Userid</th>

			<th>Created at</th>

			

		</tr>

	@foreach ($failedusers as $key => $failed)
                 
	       @php  $name=''; @endphp
           @if( $failed->user_id ==0)
          
               @php $name = ''; @endphp
            @else
               @php    $name= \App\User::findorfail($failed->user_id)->name; @endphp
           
            @endif
	<tr>

		<td>{{ ++$i }}</td>

		<td> 
              {{  $name  }}
            
		 </td>

		<td>{{ $failed->ip_address }}</td>

		<td>{{ $failed->email_address }}</td>

		<td>{{ $failed->created_at }}</td>

		

	</tr>

	@endforeach

	</table>

	{!! $failedusers->render() !!}


<div class="row">
         
	    <div class="col-lg-12 margin-tb">

	        <div class="pull-left">

	            <h2>Online Users </h2>

	        </div>

	        <div >



	           <!--  <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New permission</a> -->



	        </div>

	    </div>

	</div>
	<table class="table table-bordered">

		<tr>

			<th>No</th>

			<th>Name</th>

			<th>Role</th>

			<th>Ip</th>

			<th>Userid</th>

			<th>last activity time</th>

			<th>Web Browser</th>

			

		</tr>

@php  $dept = array(); $cnt = 0; $tmp =''; @endphp
	@foreach ($logusers as $key => $logged)
            @php 
                    $roleid = \App\Models\RoleUser::where('user_id', $logged->id)->first();
                     $rolename= \App\Models\Role::find($roleid->role_id)->name;
                     $cnt = $cnt + 1;
                   

                     if (array_key_exists($rolename,$dept)) {


                           $dept[$rolename]= $dept[$rolename] + 1;
                              
                     }
                     else
                     {
                     	 $dept[$rolename]= 1;
                     	
                     }
                       $tmp = $rolename;
            @endphp
	<tr>
           
		<td>{{ ++$i }}</td>

		<td>{{ $logged->name }}</td>

		<td>{{  $rolename }}</td>

		<td>{{ $logged->ip_address }}</td>

		<td>{{ $logged->email }}</td>

		<td>{{ Carbon\Carbon::parse(date("Y-m-d\TH:i:s", $logged->last_activity))->diffForHumans() }}</td>

        <td>{{ $logged->user_agent }}</td>
		

	</tr>

	@endforeach

	

	</table>
     <h4> Total Users </h4>
	<table class="table summ" >
		<thead>
		<tr><th>Role</th><th>count</th></tr>
		
		@foreach($dept as $key=>$value)
		   <tr><td>{{ $key }}</td><td>{{ $value }}</td></tr>
		@endforeach
	   </thead>

		
	</table>



	



	

@endsection