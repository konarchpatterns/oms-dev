@extends('layouts.newdashbord')
@section('style')
    <style>
        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: height 0.2s ease-in-out;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            border: none !important;
            background: none !important;
        }

        .pagination>li>a,
        .pagination>li>span,
        .pagination>li:first-child>a,
        .pagination>li:first-child>span,
        .pagination>li:last-child>a,
        .pagination>li:last-child>span {
            border-radius: none !important;
        }

        .card .table tbody td:last-child,
        .card .table thead th:last-child {
            display: table-cell;
        }

        .card .table tbody td:last-child,
        .card .table thead th:last-child {
            display: table-cell;
        }

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card mt-3" style="overflow-x: hidden">
                <div class="card-header">
                    <h4 class="card-title">
                        Revision List From {{ \Carbon\Carbon::parse($START_DATE)->isoFormat('LL') }} To
                        {{ \Carbon\Carbon::parse($END_DATE)->isoFormat('LL') }}
                    </h4>
                    <p class="card-category">{{ count($revisions) }} Records Found!</p>
                </div>
                <div style="overflow-x: auto" class="card-body">
                    <table id="revision-list" class="table table-striped">
                        <thead>
                            <tr scope='rowgroup'>
                                <th scope='colgroup' style="white-space: nowrap;">ORDER ID</th>
                                <th scope='colgroup' style="white-space: nowrap;">TARGET DATE</th>
                                <th scope='colgroup' style="white-space: nowrap;">NOTES</th>
                                <th scope='colgroup' style="white-space: nowrap;">MISTAKE BY</th>
                                <th scope='colgroup' style="white-space: nowrap;">DESIGNER</th>
                                <th scope='colgroup' style="white-space: nowrap;">TEAM LEADER</th>
                                <th scope='colgroup' style="white-space: nowrap;">REASON</th>
                                <th scope='colgroup' style="white-space: nowrap;">USERNAME</th>
                                <th scope='colgroup' style="white-space: nowrap;">LAST STATUS</th>
                                <th scope='colgroup' style="white-space: nowrap;">CREATED AT</th>
                                <th scope='colgroup' style="white-space: nowrap;">FILE NAME</th>
                                <th scope='colgroup' style="white-space: nowrap;">MISTAKE BY</th>
                                <th scope='colgroup' style="white-space: nowrap;">REASON</th>
                                <th scope='colgroup' style="white-space: nowrap;">DESIGNER</th>
                                <th scope='colgroup' style="white-space: nowrap;">TEAM LEADER</th>
                                <th scope='colgroup' style="white-space: nowrap;">USERNAME</th>
                                <th scope='colgroup' style="white-space: nowrap;">LAST STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($revisions as $revision)
                                <tr scope='row'>
                                    <td scope='col' style="white-space: nowrap;">
                                        {{ $revision->order_id }}
                                    </td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->target_date }}</td>
                                    <td scope='col'>
                                        <article class="article">{{ $revision->new_notes }}</article>
                                    </td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->mistake_by }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->designer }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->teamleader }}</td>
                                    <td scope='col'>
                                        <article class="article">{{ $revision->reason }}</article>
                                    </td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->user_name }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->last_status }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->created_at }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->file_name }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->mis }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->reas }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->des }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->team }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->user }}</td>
                                    <td scope='col' style="white-space: nowrap;">{{ $revision->last }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#revision-list').DataTable({
                pagingType: 'full_numbers',
                stateSave: true,
                "bInfo": false
            });
            $('.article').readmore({
                speed: 75,
                collapsedHeight: 60,
                moreLink: '<a href="#">Show more</a>',
                lessLink: '<a href="#">Show Less</a>',
            });
        });
    </script>
@endsection
