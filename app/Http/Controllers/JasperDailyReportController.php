<?php

namespace App\Http\Controllers;

use Session;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Excel as ExcelType; 
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Exports\DesignerRevenueExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Http\Requests;
use JasperPHP\JasperPHP as JasperPHP;
use SoapBox\Formatter\Formatter;
use Auth;
use File;
use SSH;
use PDF;
use App\Models\Order;

class JasperDailyReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {

        $yr = Carbon::now();
        $yr = $yr->year;

        // $year[0] = $yr;
        for ($i = 0; $i < 10; $i++) {
            $year[$yr] = $yr;
            $yr--;
        }

        //dd($year);die;
        $month[0] = 'JAN';
        $month[1] = 'FEB';
        $month[2] = 'MAR';
        $month[3] = 'APR';
        $month[4] = 'MAY';
        $month[5] = 'JUN';
        $month[6] = 'JUL';
        $month[7] = 'AUG';
        $month[8] = 'SEP';
        $month[9] = 'OCT';
        $month[10] = 'NOV';
        $month[11] = 'DEC';




        return view('reports.invoicereport', compact('year', 'month'));
    }


    public function newclientlist()
    {
        //dd("hello");die;
        return view('reports.clientlist');
    }

    public function  Designer_rangereport()
    {

        return view('reports.designer_rangereport');
    }
    //
    public function DesignerRevenue(Request $request)
    {
        // dd($request->all());
        $pfr_dt =  $request->pfr_dt;
        $pto_dt =  $request->pto_dt;

        //dd($pfr_dt.$pto_dt);
        $option =  $request->view_pdf;

        //dd($option);

        if (!isset($pfr_dt) || !isset($pto_dt)) {
            Session::flash('alert-warning', 'warning');
            Session::flash('flash_message1', 'Date cannot be blank');
            //  $request->session()->put('msg', 'Status Cannot be Blank, Select Status');
            return redirect()->back();
        }
        $pfr_dt1  = str_replace('-', '/',  $pfr_dt);
        $pto_dt1  = str_replace('-', '/',  $pto_dt);

        //dd($pto_dt1 . $pfr_dt1);

        $pfr_dt  =  date('Y-m-d',  strtotime($pfr_dt));
        $pto_dt  =  date('Y-m-d',  strtotime($pto_dt));

        $from_dt  =  date('d-m-Y',  strtotime($pfr_dt));
        $till_dt  =  date('d-m-Y',  strtotime($pto_dt));

        $footer =  'Printed by :'  . Auth::user()->name . ' at ' . Carbon::now('Asia/Kolkata')->format('d-m-Y H:i:s');

        //dd($pfr_dt. $pto_dt);

        $pfr_dt2  =  date('Ymd',  strtotime($pfr_dt));
        $pto_dt2  =  date('Ymd',  strtotime($pto_dt));

        //dd($pfr_dt.$pto_dt);

        // $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');
        // $pto_dt = Carbon::parse($pto_dt)->format('Y-m-d');
        if ($pfr_dt2 > $pto_dt2) {
            Session::flash('alert-warning', 'warning');
            Session::flash('flash_message1', 'To Date cannot beless than from date');
            //  $request->session()->put('msg', 'Status Cannot be Blank, Select Status');
            return redirect()->back();
        }
        $designer_revenue_query =   DB::table('orders')
            ->select(DB::raw(' allocation as f1, sum(file_price) as f2, sum(file_count) as f3'))
            ->whereRaw("bill_dt >= '$pfr_dt'")
            ->whereRaw("bill_dt <= '$pto_dt'")
            ->whereRaw("allocation <> ' '")
            ->whereRaw("allocation not like  '%0%'")
            ->whereRaw("alloc_id not like  0")
            ->whereRaw("allocation <> 'admin'")
            //->whereRaw("status in ('Completed','Rev-Completed','Ch-Completed')")
            ->whereRaw("status = 'Completed'")
            ->whereRaw("file_type = 'Vector'")
            ->groupBy('allocation')->get();


        $rev_orderids =   Order::where('status', '=', 'Rev-Completed')->where('bill_dt', '>=', $pfr_dt)->where('bill_dt', '<=', $pto_dt)->pluck('order_id', 'order_id')->toArray();


        $ch_rev_status = array();
        $ch_rev_status = ['QC Pending' => 'QC Pending'];

        $rev_allotted_name =  DB::table('user_allocation_log')->select('alloc_person')
            ->wherein('order_id', $rev_orderids)->wherein('status',  $ch_rev_status)->get()->toArray();

        $ch_orderids =   Order::where('status', '=', 'Ch-Completed')->where('bill_dt', '>=', $pfr_dt)->where('bill_dt', '<=', $pto_dt)->pluck('order_id', 'order_id')->toArray();


        $ch_allotted_name =  DB::table('user_allocation_log')->select('alloc_person')
            ->wherein('order_id', $ch_orderids)->wherein('status', $ch_rev_status)->get()->toArray();


        //dd($designer_revenue_query);
        $designer_revenue = array();

        $file_count = 0;
        $rev_count = 0;
        $ch_count = 0;
        foreach ($designer_revenue_query as $value) {
            $alloc =  explode(',', $value->f1);
            $alloc = array_filter($alloc);
            $file_count =  $value->f3;
            $rev_count = 0;
            $ch_count = 0;
            //dd($alloc);
            $cnt =  count($alloc);
            //dd(count($alloc));
            if ($cnt > 1) {
                //dd($alloc);
                $revenue =  ($value->f2) / count($alloc);
                $file_count =  $file_count / count($alloc);
                foreach ($alloc as $a) {
                    // dd($a);
                    $a = rtrim($a, ',. ');

                    $designer_revenue[] =  array('designer' => trim($a), 'count' => $file_count, 'revenue' => $revenue);
                }
                // dd($designer_revenue);
            } else {
                $revenue =   $value->f2;
                // $designer_revenue[] =  array('designer' => (string)implode('' ,$alloc), 'revenue' =>$revenue );
                //dd($alloc[0]);
                $designer_revenue[] =  array('designer' => rtrim($alloc[0], ',. '), 'count' => $file_count, 'revenue' => $revenue);
            }
        }
        if (empty($designer_revenue)) {
            Session::flash('alert-warning', 'warning');
            Session::flash('flash_message1', 'No Records for given range');

            return redirect()->back();
        }
        // dd($designer_revenue);
        $final = array();
        $excelArray = array();
        $name = '';
        $tmpname = '';
        $count = 0;
        $totcount = 0;
        $tot = 0;
        $designer = array();
        asort($designer_revenue);
        $counterArr=0;
        foreach ($designer_revenue as $key) {
            $name =  $key['designer'];
            $count = $key['count'];
            if ($name <> $tmpname) {
                if ($tmpname <> '') {
                    foreach ($rev_allotted_name as $key1) {
                        if (rtrim($key1->alloc_person, ',. ') == $tmpname) {
                            $rev_count = $rev_count + 1;
                        }
                    }

                    foreach ($ch_allotted_name as $key2) {
                        if (rtrim($key2->alloc_person, ',. ') == $tmpname) {
                            $ch_count = $ch_count + 1;
                        }
                    }
                    $final[] =  array('designer' => $tmpname, 'count' => $totcount, 'ch_count' => $ch_count, 'rev_count' => $rev_count, 'total' => $tot);

                    if($counterArr!=0){
                        if($ch_count==0)
                        {
                            $ch_count="0";
                        }
                        if($rev_count==0)
                        {
                            $rev_count="0";
                        }
                        if($tot==0)
                        {
                            $tot="0";
                        }
                        if($totcount==0)
                        {
                            $totcount="0";
                        }

                        $excelArr[] =  array('designer' => $tmpname, 'count' => $totcount, 'ch_count' => $ch_count, 'rev_count' => $rev_count, 'total' => $tot);
                    }
                    else{

                        $excelArr[] =  array('designer' => 'Designer', 'count' => 'Count', 'ch_count' => 'Ch_count', 'rev_count' => 'Rev_count', 'total' => 'Total');
                   
                    }
                    $counterArr++;
                }

                $tmpname = $name;
                $tot = 0;
                $totcount = 0;
                $rev_count = 0;
                $ch_count = 0;
            }
            $tot = $tot + $key['revenue'];
            $totcount = $totcount + $key['count'];
        }

        if ($option == 'pdf') {
            $pdf = PDF::loadView('designers.total_count_revenue_pdf', compact('final', 'footer', 'from_dt', 'till_dt'));
            return $pdf->download('Designers revenue count ' . $pfr_dt2 . ' to ' . $pto_dt2 . '.pdf');
        } 
        if ($option == 'excel') {
            
            return  \Excel::download(new class($excelArr) implements FromArray{ 
                public function __construct($excelArr)
                {
                    $this->excelArr = $excelArr;
                }
                public function array(): array
                {
                    return $this->excelArr;
                }
            },'DesignerRevenue'.$pfr_dt2.'-'.$pto_dt2.'.xlsx', ExcelType::XLSX);  
             

        }
        else {
            return view('designers.total_count_revenue', compact('final', 'footer', 'from_dt', 'till_dt'));
        }


        //dd($final);
        //  return view('designers.total_count_revenue', compact('final'));
    }

    //
    public function DailyReportParameters()
    {
        //dd("hello");die;
        $ordstat = DB::table('order_status')->pluck('status');

        foreach ($ordstat as $st) {
            $status[] = $st;
        }

        return view('miscreports.dailyreport', compact('status'));
    }

    public function DailyReportParameters1()
    {
        //dd("hello");die;
        return view('miscreports.dailyreport1');
    }

    public function DailyReportExecute(Request $request)
    {
        // dd("hello");die;

        //dd($request->pfr_dt);

        $pfr_dt =  str_replace('/', '-', $request->pfr_dt);
        $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');

        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        //$output = public_path() . '/report/'.time().'_Daily_Order_Report';
        $output = public_path() . '/report/' . time() . 'Daily_Report';
        //dd($output);die;
        $ext = "pdf";

        // $jasper->process(
        //    public_path() . '/report/Daily_Order_Report.jrxml')->execute();   

        // $jasper->compile(
        //   public_path() . '/report/hello_world.jrxml')->execute();   

        $jasper->process(
            public_path() . '/report/Daily_Order_Report.jasper',
            $output,
            array($ext),
            array("PFR_DT" => $pfr_dt),
            array(
                'driver' => 'mysql', 'host' => 'localhost', 'port' => '3306', 'database' => 'omsv4', 'username' => 'php',
                'password' => '4{h}fPvcf4Qyer%--'
            ),
            false,
            false
        )->execute();

        // dd($jasper);



        $pathToFile = $output . '.' . $ext;
        return response()->file($pathToFile);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . time() . '_Patterns_Invoice.' . $ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output . '.' . $ext));
        flush();
        readfile($output . '.' . $ext);
    }

    public function DailyReportExecute1(Request $request)
    {
        //dd("hello");die;
        // dd($request->all());
        $pfr_dt =  str_replace('/', '-', $request->pfr_dt1);
        $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');

        $pstatus  = $request->st;
        foreach ($pstatus as $p) {
            $pstat[] = (string)$p;
        }
        //dd($pcompany);
        //$P_company_id = implode(',' , $pcompany );

        $P_status = "'" . implode("','", $pstat) . "'";



        $P_status = stripslashes($P_status);

        $var1 =   "status IN (";
        $var2 =   ")";

        $param2  =  '"' . $var1 .  $P_status . $var2 .  '"';

        // $param2 = "status in ('QC OK','Completed')";
        $param2   =  stripslashes($param2);



        //dd($param2);

        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        //$output = public_path() . '/report/'.time().'_Daily_Order_Report';
        $output = public_path() . '/report/' . time() . 'Daily_Report';
        //dd($output);die;
        $ext = "pdf";


        $jasper->process(
            public_path() . '/report/Daily_Order_Report_1.jasper',
            $output,
            array($ext),
            array('param2' => $param2, 'PFR_DT' => $pfr_dt),
            array('driver' => 'mysql', 'host' => 'localhost', 'port' => '3306', 'database' => 'omsv4_2', 'username' => 'php', 'password' => '4{h}fPvcf4Qyer%--'),
            false,
            false
        )->execute();


        // dd($jasper);

        $pathToFile = $output . '.' . $ext;
        return response()->file($pathToFile);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . time() . '_Patterns_Invoice.' . $ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output . '.' . $ext));
        flush();
        readfile($output . '.' . $ext);
    }

    public function post(Request $request)
    {
        //dd($request->dformat);exit;


        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $output = public_path() . '/report/' . time() . '_Patterns_Invoice';

        $ext = "pdf";

        // \JasperPHP::process(
        //     public_path() . '/report/Patterns_Invoice.jasper',
        //     $output,
        //     array($ext),
        //     array(),
        //     array('driver' => 'mysql', 'host' => '127.0.0.1', 'port' => '3306', 'database' => 'patterns', 'username' => 'root', 'password' => ''),
        //     false,
        //     false
        // )->execute();

        //array('driver' => 'mysql', 'host' => '127.0.0.1', 'port' => '3306', 'database' => 'patterns',  'username' => 'root', 'password' => ''),

        $jasper->process(
            public_path() . '/report/Patterns_Invoice.jasper',
            $output,
            array($ext),
            array(),
            array('driver' => 'mysql', 'host' => 'localhost', 'port' => '3306', 'database' => 'omslaravel56', 'username' => 'root', 'password' => 'root'),
            false,
            false
        )->execute();

        $pathToFile = $output . '.' . $ext;
        return response()->file($pathToFile);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . time() . '_Patterns_Invoice.' . $ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output . '.' . $ext));
        flush();
        readfile($output . '.' . $ext);


        //return response()->file($pathToFile);
        //unlink($output.'.'.$ext); // deletes the temporary file

        //return Redirect::to('reports');
    }


    public function printinvoice(Request $request)
    {

        //dd($request->dformat);exit;
        $pfr_dt =  str_replace('/', '-', $request->pfr_dt);
        $pto_dt =  str_replace('/', '-', $request->pto_dt);
        $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');
        $pto_dt = Carbon::parse($pto_dt)->format('Y-m-d');
        //dd($pfr_dt); die;
        //dd($request->all());die;
        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $output = public_path() . '/report/' . time() . '_Patterns_Invoice';

        $ext = "pdf";




        $jasper->process(
            public_path() . '/report/Patterns_Invoice.jasper',
            $output,
            array($ext),
            array("PFR_DT" => $pfr_dt, "PTO_DT" => $pto_dt),
            array(
                'driver' => 'mysql', 'host' => 'localhost', 'port' => '3306',
                'database' => 'omslaravel56', 'username' => 'root', 'password' => 'root'
            ),
            false,
            false
        )->execute();
        //dd($jasper);
        //array("PFR_DT"=>"2017-07-01","PTO_DT"=>"2017-07-10")

        $pathToFile = $output . '.' . $ext;
        return response()->file($pathToFile);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . time() . '_Patterns_Invoice.' . $ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output . '.' . $ext));
        flush();
        readfile($output . '.' . $ext);


        //return response()->file($pathToFile);
        //unlink($output.'.'.$ext); // deletes the temporary file

        //return Redirect::to('reports');
    }



    public function printinvoice_monthly(Request $request)
    {



        $pyear  =  $request->pyear;
        $pmonth =  $request->pmonth;
        $pmonth = $pmonth + 1;
        //dd($pyear);die;



        $mon = $pmonth + 1;
        $new_dt = Carbon::createFromDate($pyear, $pmonth, null, null);
        $new_dt = new Carbon($new_dt);
        $new_dt1 = new Carbon($new_dt);
        $pfr_dt = $new_dt->startOfMonth();
        //dd($pfr_dt);die;
        $pto_dt = $new_dt1->endOfMonth();


        $mon = str_pad($mon, 2, '0', STR_PAD_LEFT);
        //dd($mon);die;
        $yrmon =  $pyear . "-" . $mon;

        //dd($pfr_dt); die;
        //dd($request->all());die;
        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $client_names = DB::table('orders')->select('client_creation_id', 'client_company')
            ->whereYear('order_us_date', $pyear)
            ->whereMonth('order_us_date', $pmonth)
            ->where('status', '=', 'Completed')
            ->where('file_price', '>', 0)
            ->orderBy('client_company', 'desc')
            ->get();

        // dd($client_names);die;

        $client_names = collect($client_names);

        foreach ($client_names as $cl) {
            //dd($cl->client_name);

            if (!empty($cl->client_company)) {
                $pclient_company =  $cl->client_company;
                $newcl =  substr($cl->client_company, 0, 10);
            } else {
                $pclient_company =  $cl->client_name;
                $newcl =  substr($cl->client_name, 0, 10);
            }



            //dd($newcl);
            $newcl =  preg_replace('/\s+Oâ€™/ ', '_', $newcl);
            $newcl =  str_replace(' ', '_', $newcl);
            // dd($newcl);die;


            // SSH::run(array('cd $Home'));
            //$output = shell_exec('pwd');


            $folderPath = public_path() . '/report/' . $yrmon;
            //mkdir("$folderPath");
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath);
                File::makeDirectory($folderPath, $mode = 0777, true, true);
            }

            // $files = File::allFiles(getcwd());
            //    foreach ($files as $file)
            //    {
            //        echo (string)$file, "\n";
            //    }
            //$output = public_path() . '/report/'.time().'_Patterns_Invoice_ClientWise';

            $output =  $folderPath . '/' .  $newcl;
            //dd($output);die;

            $ext = "pdf";



            $jasper->process(
                public_path() . '/report/Patterns_Invoice_CompanyWise.jasper',
                $output,
                array($ext),
                array(
                    "PFR_DT" => $pfr_dt, "PTO_DT" => $pto_dt,
                    "P_client_company" => $pclient_company
                ),
                array(
                    'driver' => 'mysql', 'host' => 'localhost', 'port' => '3306',
                    'database' => 'omslaravel56', 'username' => 'root', 'password' => ''
                ),
                false,
                false
            )->execute();
            // dd($jasper);

        }
    }


    public function printinvoice_clientwise(Request $request)
    {



        $pyear  =  $request->pyear;
        $pmonth =  $request->pmonth;
        $pmonth = $pmonth + 1;
        //dd($pyear);die;



        $mon = $pmonth + 1;
        $new_dt = Carbon::createFromDate($pyear, $pmonth, null, null);
        $new_dt = new Carbon($new_dt);
        $new_dt1 = new Carbon($new_dt);
        $pfr_dt = $new_dt->startOfMonth();
        //dd($pfr_dt);die;
        $pto_dt = $new_dt1->endOfMonth();


        $mon = str_pad($mon, 2, '0', STR_PAD_LEFT);
        //dd($mon);die;
        $yrmon =  $pyear . "-" . $mon;

        //dd($pfr_dt); die;
        //dd($request->all());die;
        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $company_names = DB::table('orders')->select('company_id', 'client_company')
            ->whereYear('order_us_date', $pyear)
            ->whereMonth('order_us_date', $pmonth)
            ->groupBy('company_id', 'desc')
            ->get();

        // dd($client_names);die;

        $company_names = collect($company_names);

        foreach ($company_names as $cl) {
            //dd($cl->client_name);
            $newcl =  substr($cl->client_company, 0, 10);
            //dd($newcl);
            $newcl =  preg_replace('/\s+/', '_', $newcl);
            // dd($newcl);die;
            $pcompany_id =  $cl->company_id;

            // SSH::run(array('cd $Home'));
            //$output = shell_exec('pwd');


            $folderPath = $yrmon;
            //mkdir("$folderPath");
            //File::makeDirectory($folderPath);
            // File::makeDirectory($folderPath, $mode = 0777, true, true);

            // $files = File::allFiles(getcwd());
            //    foreach ($files as $file)
            //    {
            //        echo (string)$file, "\n";
            //    }
            //$output = public_path() . '/report/'.time().'_Patterns_Invoice_ClientWise';

            $output =  public_path() . '/' . $folderPath . '/' . $pclient_id . $newcl;
            // dd($output);die;

            $ext = "pdf";




            $jasper->process(
                public_path() . '/report/Patterns_Invoice_CompanyWise.jasper',
                $output,
                array($ext),
                array(
                    "PFR_DT" => $pfr_dt, "PTO_DT" => $pto_dt,
                    "P_company_id" => $pclient_id
                ),
                array(
                    'driver' => 'mysql', 'host' => '192.168.0.30', 'port' => '3306',
                    'database' => 'omslaravel56', 'username' => 'root', 'password' => 'root'
                ),
                false,
                false
            )->execute();
            //dd($jasper);

        }

        // return;
        //dd($jasper);
        //array("PFR_DT"=>"2017-07-01","PTO_DT"=>"2017-07-10")

        // $pathToFile = $output.'.'.$ext ;
        // return response()->file($pathToFile);
        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // header('Content-Disposition: attachment; filename='.time().'_Patterns_Invoice_Monthly.'.$ext);
        // header('Content-Transfer-Encoding: binary');
        // header('Expires: 0');
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        // header('Pragma: public');
        // header('Content-Length: ' . filesize($output.'.'.$ext));
        // flush();
        // readfile($output.'.'.$ext);


        //return response()->file($pathToFile);
        //unlink($output.'.'.$ext); // deletes the temporary file

        //return Redirect::to('reports');
    }


    public function invoicestatus(Request $request)
    {


        //dd($request->dformat);exit;
        $pfr_dt =  str_replace('/', '-', $request->pfr_dt);
        $pto_dt =  str_replace('/', '-', $request->pto_dt);
        $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');
        $pto_dt = Carbon::parse($pto_dt)->format('Y-m-d');
        //dd($pfr_dt); die;
        //dd($request->all());die;
        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $output = public_path() . '/report/' . time() . '_Flower_Landscape_Table_Based';

        $ext = "pdf";




        $jasper->process(
            public_path() . '/report/Flower_Landscape_Table_Based',
            $output,
            array($ext),
            array("PFR_DT1" => $pfr_dt),
            array(
                'driver' => 'mysql', 'host' => '192.168.0.30', 'port' => '3306',
                'database' => 'omslaravel56', 'username' => 'root', 'password' => 'root'
            ),
            false,
            false
        )->execute();
        //dd($jasper);
        //array("PFR_DT"=>"2017-07-01","PTO_DT"=>"2017-07-10")

        $pathToFile = $output . '.' . $ext;
        return response()->file($pathToFile);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . time() . '_Patterns_Invoice.' . $ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output . '.' . $ext));
        flush();
        readfile($output . '.' . $ext);


        //return response()->file($pathToFile);
        //unlink($output.'.'.$ext); // deletes the temporary file

        //return Redirect::to('reports');
    }


    public function orderstatusdetail(Request $request)
    {


        //dd($request->dformat);exit;
        $pfr_dt =  str_replace('/', '-', $request->pfr_dt);
        $pto_dt =  str_replace('/', '-', $request->pto_dt);
        $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');
        $pto_dt = Carbon::parse($pto_dt)->format('Y-m-d');
        //dd($pfr_dt); die;
        //dd($request->all());die;
        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $output = public_path() . '/report/' . time() . '_Order_Details';

        $ext = "pdf";




        $jasper->process(
            public_path() . '/report/Order_Details',
            $output,
            array($ext),
            array("pfr_dt" => $pfr_dt, "pto_dt" => $pto_dt),
            array(
                'driver' => 'mysql', 'host' => '192.168.0.30', 'port' => '3306',
                'database' => 'omslaravel56', 'username' => 'root', 'password' => 'root'
            ),
            false,
            false
        )->execute();
        //dd($jasper);
        //array("PFR_DT"=>"2017-07-01","PTO_DT"=>"2017-07-10")

        $pathToFile = $output . '.' . $ext;
        return response()->file($pathToFile);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . time() . '_Order_Details.' . $ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output . '.' . $ext));
        flush();
        readfile($output . '.' . $ext);


        //return response()->file($pathToFile);
        //unlink($output.'.'.$ext); // deletes the temporary file

        //return Redirect::to('reports');
    }


    public function client_list(Request $request)
    {


        //dd($request->dformat);exit;
        $pfr_dt =  str_replace('/', '-', $request->pfr_dt);
        $pto_dt =  str_replace('/', '-', $request->pto_dt);
        $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');
        $pto_dt = Carbon::parse($pto_dt)->format('Y-m-d');
        //dd($pfr_dt); die;
        //dd($request->all());die;
        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        //$output = public_path() . '/report/'.time().'_New_Client_List';
        $output = public_path() . '/report/' . time() . '_Companywise_list';

        $ext = "pdf";
        if ($request->dformat == "Preview" || $request->dformat == "Download") {
            $ext = "pdf";
        } else {
            $ext = $request->dformat;
        }



        if ($ext != 'csv') {
            $jasper->process(
                public_path() . '/report/Companywise_list',
                $output,
                array($ext),
                array("PFR_DT" => $pfr_dt, "PTO_DT" => $pto_dt),
                array(
                    'driver' => 'mysql', 'host' => '192.168.0.30', 'port' => '3306',
                    'database' => 'omslaravel56', 'username' => 'root', 'password' => 'root'
                ),
                false,
                false
            )->execute();
        }
        //dd($jasper);
        //array("PFR_DT"=>"2017-07-01","PTO_DT"=>"2017-07-10")

        if ($ext == "csv") {
            //$entitiesArray = $this->entities->toArray();
            $entitiesArray = DB::table('client_dtls')->select(
                'client_id',
                'client_creation_id',
                'client_name',
                'client_email_primary',
                'client_company',
                'client_contact_1',
                'client_creation_date_time',
                'client_note'
            )->where('client_creation_date_time', '>=', $pfr_dt)->where('client_creation_date_time', '<=', $pto_dt)->get();

            //dd($entitiesArray);die;
            $entitiesArray = collect($entitiesArray)->map(function ($x) {
                return (array) $x;
            })->toArray();


            $formatter = Formatter::make($entitiesArray, Formatter::ARR);

            //dd($formatter);die;

            $csv = $formatter->toCsv();

            header('Content-Disposition: attachment; filename="export.csv"');
            header("Cache-control: private");
            header("Content-type: application/force-download");
            header("Content-transfer-encoding: binary\n");

            echo $csv;

            exit;
            //   $filename = "New_Client_List.csv";
            //  header("Content-Type: application/force-download");
            // header("Content-Type: application/octet-stream");
            // header("Content-Type: application/download");
            // header('Content-Type: text/x-csv');

            // // disposition / encoding on response body
            //     if (isset($filename) && strlen($filename) > 0)
            //         header("Content-Disposition: attachment;filename={$filename}");
            //         if (isset($filesize))
            //             header("Content-Length: ".$filesize);
            //             header("Content-Transfer-Encoding: binary");
            //             header("Connection: close");

        } else {

            $pathToFile = $output . '.' . $ext;
            return response()->file($pathToFile);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . time() . '_New_Client_List.' . $ext);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($output . '.' . $ext));
            flush();
            readfile($output . '.' . $ext);
        }


        //return response()->file($pathToFile);
        //unlink($output.'.'.$ext); // deletes the temporary file

        //return Redirect::to('reports');
    }


    public function completed(Request $request)
    {


        //dd($request->dformat);exit;
        $pfr_dt =  str_replace('/', '-', $request->pfr_dt);
        $pto_dt =  str_replace('/', '-', $request->pto_dt);
        $pfr_dt = Carbon::parse($pfr_dt)->format('Y-m-d');
        $pto_dt = Carbon::parse($pto_dt)->format('Y-m-d');
        //dd($pfr_dt); die;
        //dd($request->all());die;
        $jasper = new JasperPHP;
        $database = \Config::get('database.connections.mysql');
        $output = public_path() . '/report/' . time() . '_Order_Completed_Status';

        $ext = "pdf";




        $jasper->process(
            public_path() . '/report/Order_Completed_Status',
            $output,
            array($ext),
            array("PFR_DT1" => $pfr_dt, "PTO_DT1" => $pto_dt),
            array(
                'driver' => 'mysql', 'host' => '192.168.0.30', 'port' => '3306',
                'database' => 'omslaravel56', 'username' => 'root', 'password' => 'root'
            ),
            false,
            false
        )->execute();
        //dd($jasper);
        //array("PFR_DT"=>"2017-07-01","PTO_DT"=>"2017-07-10")

        $pathToFile = $output . '.' . $ext;
        return response()->file($pathToFile);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . time() . '_Order_Completed_Status' . $ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output . '.' . $ext));
        flush();
        readfile($output . '.' . $ext);


        //return response()->file($pathToFile);
        //unlink($output.'.'.$ext); // deletes the temporary file

        //return Redirect::to('reports');
    }
}
