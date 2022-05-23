<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{

    protected $start;
    protected $end;

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {

        return [
            'Order ID',
            'Target Date',
            'New Notes',
            'Mistake By',
            'Designer',
            'Team Leader',
            'Reason',
            'Username',
            'Last Status',
            'Created At',
            'File Name',
            'Mistake By',
            'Reason',
            'Designer',
            'Team Leader',
            'Last Status',
            'Username',
        ];
    }

    public function __construct($start, $end)
    {
        $this->start_date = $start;
        $this->end_date = $end;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(DB::select('select
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
    from
        (
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
        c.order_id asc', ['start' => $this->start_date . ' 00:00:00', 'end' => $this->end_date . ' 23:59:00']));
    }
}
