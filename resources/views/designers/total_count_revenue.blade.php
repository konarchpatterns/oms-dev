@extends('layouts.newdashbord')
@section('style')
@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Designer Count and Revenue</h4>
                <p class="card-category">Bill Date {{ $from_dt }} to {{ $till_dt }}</p>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    @php
                        $i = 1;
                    @endphp
                    <table class="table table-hover table-striped">
                        <caption class="px-3">{{ $footer }}</caption>
                        <thead>
                            <tr>
                                <th style="white-space: nowrap;">Sr No</th>
                                <th style="white-space: nowrap;">Designer</th>
                                <th style="text-align: right; white-space: nowrap;">Completed File Count</th>
                                <th style="text-align: right; white-space: nowrap;">Revenue Generated</th>
                                <th style="text-align: right; white-space: nowrap;">Revision File Count</th>
                                <th style="text-align: right; white-space: nowrap;">Changes File Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($final as $f)
                                <tr>
                                    <td style="white-space: nowrap;">
                                        {{ $i++ }}
                                    </td>
                                    <td style="white-space: nowrap;">
                                        {{ $f['designer'] }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ $f['count'] }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ number_format($f['total'], 2) }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ number_format($f['rev_count'], 0) }}
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        {{ number_format($f['ch_count'], 0) }}
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
