<!DOCTYPE html>
<html>

<head>
    <title> Designer Total Count and Revenue</title>
</head>

<body>
    <h2> Designer Count and Revenue</h2> Bill Date <span> {{ $from_dt }} to {{ $till_dt }} </span>

    <div class="container">
        <div class="panel">
            @php
                
                $i = 1;
            @endphp
            <table class="table table-responsive table-striped table-hover  table-bordered" id="designer-table">
                <thead>
                    <tr>
                        <th> Sr No </th>
                        <th> Designer</th>
                        <th> Completed File Count</th>
                        <th> Revenue Generated</th>
                        <th> Revision File Count</th>
                        <th> Changes File Count</th>
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
                    @foreach ($final as $f)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <td>{{ $f['designer'] }}</td>
                            <td style="text-align: right;">{{ $f['count'] }}</td>
                            <td style="text-align: right;">{{ number_format($f['total'], 2) }}</td>
                            <td style="text-align: right;">{{ number_format($f['rev_count'], 0) }}</td>
                            <td style="text-align: right;">{{ number_format($f['ch_count'], 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <p>
                {{ $footer }}
            </p>


        </div>

    </div>

</body>


</html>
