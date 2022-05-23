<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\DB;
class OrderTargetExport implements FromCollection, WithHeadings
{
    protected $dateFrom,$dateTo;
    public function __construct($dateFrom,$dateTo) {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::select(
            'order_id',
            'document_type',
            'status',
            'order_completion_time',
            'target_completion_time',
            'note'
        )
        ->whereColumn(DB::raw('DATE(order_completion_time)'),
                    '>',DB::raw('DATE(target_completion_time)'))
            ->where('allocation', '!=','0')
            ->where('status', '=','Completed')
            ->whereBetween('bill_dt', [$this->dateFrom,$this->dateTo])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Order Id',
            'Document Type',
            'Status',
            'Order Completion Date',
            'Target Completion Date',
            'Notes'
        ];
    }
}
