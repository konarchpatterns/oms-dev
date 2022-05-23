@extends('layouts.newdashbord')
@section('style')
@section('content')



    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Missing Order Targets</h4>
                <p class="card-category">Bill Date From : {{$date['from']}}  To : {{$date['to']}}</p>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    @php
                        $i = 1;
                    @endphp
                    <table class="table table-hover table-striped" id="sorting">
                        <caption class="px-3"></caption>
                        <thead>
                            <tr>
                                <th style="white-space: nowrap;">Sr No</th>
                                <th style="white-space: nowrap;">Order Id</th>
                                <th style="text-align: right; white-space: nowrap;">Document Type</th>
                                <th style="text-align: right; white-space: nowrap;">Status</th>
                                <th style="text-align: right; white-space: nowrap;">Order Completion Date</th>
                                <th style="text-align: right; white-space: nowrap;">Target Completion Date</th>
                                <th style="text-align: right; white-space: nowrap;">Time Laps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($missTarget as $missedTarget)
                                <tr>
                                    <td style="white-space: nowrap;">
                                        {{ $i++ }}
                                    </td>
                                    <td style="white-space: nowrap;">
                                        {{ $missedTarget['order_id'] }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ $missedTarget['document_type'] }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ $missedTarget['status'] }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ $missedTarget['order_date'] }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ $missedTarget['target_date'] }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap; color:red;">
                                        {{ date_diff(new \DateTime($missedTarget['order_date']), new \DateTime($missedTarget['target_date']))
                                            ->format("%m Months, %d days") }}
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                  
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('script')
<script>
    $(document).ready(function(){
    $('#sorting').DataTable({searching: false, paging: false, info: false});
    })
        
    </script> 
@endsection

 