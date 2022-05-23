<?php

namespace App\Http\Controllers;

use App\Exports\RevisionListExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RevisionListController extends Controller
{
    public function index()
    {
        return view('revision.index');
    }

    public function show(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $START_DATE = $request->start_date;
        $END_DATE = $request->end_date;


        if ($request->view == 1) {

            $revisions = DB::select('select
            c.order_id,
            c.target_date,
            c.new_notes,
            c.mistake_by,
            c.designer,
            c.teamleader,
            c.reason,
            c.user_name,
            c.last_status,
            c.created_at,
            c.file_name,
            d.mis,
            d.reas,
            d.des,
            d.team,
            d.last,
            d.user
        from (
            select
                a.order_id,
                a.target_date,
                a.new_notes,
                a.mistake_by,
                a.designer,
                a.teamleader,
                a.reason,
                a.user_name,
                a.last_status,
                a.created_at,
                b.file_name
            from
                file_reason a,
                orders b
            where
                a.last_status = "Revision" and a.created_at between :start and :end and a.order_id = b.order_id
            order by
                a.id
            desc
        ) as c
        inner join
            (
            select
                mistake_by as mis,
                reason as reas,
                designer as des,
                teamleader as team,
                last_status as last,
                user_name as user,
                order_id
            from
                file_reason
            where
                last_status = "Rev-QC OK"
        ) as d
        on
            c.order_id = d.order_id
        order by
            c.order_id asc', ['start' => $START_DATE, 'end' => $END_DATE]);

            return view('revision.view', compact('START_DATE', 'END_DATE', 'revisions'));
        } else {
            return Excel::download(new UsersExport($START_DATE, $END_DATE), 'Revision List From ' . $START_DATE . ' To ' . $END_DATE . '.xlsx');
        }
    }
}
