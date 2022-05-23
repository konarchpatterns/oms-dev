<!DOCTYPE html>
<html>

<head>
    <title> Order Target</title>
</head>

<body>
    <h2> Missed Order Target </h2> Bill Date <span>From : {{$date['from']}}  To : {{$date['to']}}</span>

    <div class="container">
        <div class="panel">
            @php
                
                $i = 1;
            @endphp
            <table class="table table-responsive table-striped table-hover  table-bordered" id="designer-table">
                <thead>
                    <tr>
                        <th >Sr No</th>
                        <th style="white-space: nowrap;">Order Id</th>
                        <th>Document Type</th>
                        <th>Status</th>
                        <th>Order Completion Date</th>
                        <th>Target Completion Date</th>
                        <th>Time Laps</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($missTarget as $missedTarget)
                    <tr>
                        <td style="white-space: nowrap;">
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $missedTarget['order_id'] }}
                        </td>
                        <td style="text-align: right;">
                            {{ $missedTarget['document_type'] }}
                        </td>
                        <td style="text-align: right;">
                            {{ $missedTarget['status'] }}
                        </td>
                        <td style="text-align: right;">
                            {{ $missedTarget['order_date'] }}
                        </td>
                        <td style="text-align: right;">
                            {{ $missedTarget['target_date'] }}
                        </td>
                        <td style="text-align: right;color:red;">
                            {{ date_diff(new \DateTime($missedTarget['order_date']), new \DateTime($missedTarget['target_date']))
                                ->format("%m Months, %d days") }}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>

</body>


</html>
