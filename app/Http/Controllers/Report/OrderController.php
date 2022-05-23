<?php

namespace App\Http\Controllers\Report;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Exports\OrderTargetExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
class OrderController extends Controller
{
    /**
     *    Missing Target Report function
     */

    public function missedTargetReport(Request $request)
    {
        $dateFrom=Carbon::parse($request->pfr_dt)->format('Y-m-d');
        $dateTo=Carbon::parse($request->pto_dt)->format('Y-m-d');

        $missTarget = Order::select(
            'file_name',
            'file_type',
            'file_price',
            'order_date_time',
            'order_dt',
            'allocation',
            'document_type',
            'note',
            DB::raw('DATE(order_completion_time) as order_date'),
            DB::raw('DATE(target_completion_time) as target_date'),
            'status',
            'order_id')
            ->whereColumn(DB::raw('DATE(order_completion_time)'),
                        '>',DB::raw('DATE(target_completion_time)'))
                                    
            ->where('allocation', '!=','0')
            ->where('status', '=','Completed')
            ->whereBetween('bill_dt', [$dateFrom,$dateTo])
            ->orderBy('id', 'desc')
            ->get();
            $date=array("from"=>$dateFrom,"to"=>$dateTo);

            $option =  $request->view_pdf;
            
            //  pdf export

            if ($option == 'pdf') {
                $pdf = PDF::loadView('reports.pdf.ordertarget_pdf',compact('missTarget','date'));
                return $pdf->download('Order_Missed_target ' . $dateFrom . ' to ' . $dateTo . '.pdf');
            }
            
            // excel export

            elseif ($option == 'excel') {
                return Excel::download(new OrderTargetExport($dateFrom,$dateTo), 
                'OrderMissedTarget'.$dateFrom.'--'.$dateTo.''.'.xlsx');
            }

            //  html view

            else {
                return view('reports.ordertarget',compact('missTarget','date'));
            }
            
    }

    /**
     *    loading daterange view
     */
    
    public function targetDateRange(Request $request){

        return view('reports.daterange.ordertargetdaterange');
    }
}
