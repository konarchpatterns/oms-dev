<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Models\Client;

use App\Models\FileReason;
use App\Models\OrderDtl;
use App\Models\Order;
use App\Http\Controllers\Controller as Controller;

class CwordpressController extends Controller
{
  public function register(Request $request)
  {
    $ed = DB::table('inactiveclients')->pluck('company_id');

    if ($request->userrole == "bde") {
      if ($request->id == "DA") {
        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.client_country', '=', "US"],
            ['clients.lastdisposition', '!=', ' '],
            ['clients.store_type', '=', 'Retail']
          ])
          ->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )
          ->get();
      } elseif ($request->id == "ALL") {
        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.client_country', '=', "US"],
            ['clients.store_type', '=', 'Retail']
          ])
          ->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
      } else if ($request->id == "NA") {
        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.client_country', '=', "US"],
            ['clients.lastdisposition', '=', NULL],
            ['clients.store_type', '=', 'Retail']
          ])
          ->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
      } else if ($request->id == "3 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.created_at',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.store_type', '=', 'Retail']
          ])
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
      } else if ($request->id == "6 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.created_at',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.store_type', '=', 'Retail']
          ])
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
      } else {
        $data = "No Data";
      }
    } elseif ($request->userrole == "salse") {
      if ($request->id == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '!=', ' '], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } elseif ($request->id == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "3 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.created_at', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')
          ->get();
      } else if ($request->id == "6 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.created_at', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else {
        $data = "No Data";
      }
    } else {
      $data = "No Data";
    }

    return $data;
  }

  public function assignapi(Request $request)
  {
    $ed = DB::table('inactiveclients')->pluck('company_id');
    if ($request->userrole == "bde") {

      if ($request->id == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '!=', ' '], ['clients.store_type', '=', 'Retail'], ['clients.salseuser', '!=', null]])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } elseif ($request->id == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.store_type', '=', 'Retail'], ['clients.salseuser', '!=', null]])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '=', NULL], ['clients.store_type', '=', 'Retail'], ['clients.salseuser', '!=', null]])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else {

        $data = "No Data";
      }
    } elseif ($request->userrole == "salse") {

      if ($request->id == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '!=', ' '], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } elseif ($request->id == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else {

        $data = "No Data";
      }
    } else {
      $data = "No Data";
    }

    return $data;
  }
  public function unassignapi(Request $request)
  {
    $ed = DB::table('inactiveclients')->pluck('company_id');
    if ($request->userrole == "bde") {

      if ($request->id == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '!=', ' '], ['clients.store_type', '=', 'Retail'], ['clients.salseuser', '=', null]])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } elseif ($request->id == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.store_type', '=', 'Retail'], ['clients.salseuser', '=', null]])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '=', NULL], ['clients.store_type', '=', 'Retail'], ['clients.salseuser', '=', null]])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else {

        $data = "No Data";
      }
    } elseif ($request->userrole == "salse") {

      if ($request->id == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '!=', ' '], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } elseif ($request->id == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else {

        $data = "No Data";
      }
    } else {
      $data = "No Data";
    }

    return $data;
  }


  public function clientdata(Request $request)
  {
    $companydeatils = DB::table('clients')->where('company_id', 'CO' . $request->id)->select('client_company')->get();
    foreach ($companydeatils as $value) {
      # code...
    }
    return $value->client_company;
  }

  public function clientlastdisposition(Request $request)
  {
    $lastdispo = DB::table('clients')->where('company_id', 'CO' . $request->company_id)->get();
    foreach ($lastdispo as $value) {
      # code...
    }
    if ($value->lastdisposition == "") {
      $lastdispodata = $request->lastdisposition;
    } else {
      $lastdispodata = $request->lastdisposition . ',' . $value->lastdisposition;
    }

    DB::table('clients')->where('company_id', 'CO' . $request->company_id)->update(['lastdisposition' => $lastdispodata]);



    return $value->client_company;
  }

  public function orderdetailapi(Request $request)
  {
    $companydeatils = DB::table('clients')->where('company_id', 'CO' . $request->id)->get();
    foreach ($companydeatils as $companydeatil) {
    }
    $noofordercount = DB::table('orders')->where('company_id', '=', $companydeatil->company_id)->count();
    $completedcount = DB::table('orders')->where('company_id', '=', $companydeatil->company_id)->whereIN('status', ['Completed', 'Rev-Completed', 'Ch-Completed'])->count();
    $revisioncount = DB::table('file_reason')->leftJoin('orders', 'file_reason.order_id', '=', 'orders.order_id')->where([['file_reason.last_status', '=', 'Revision'], ['orders.company_id', '=', $companydeatil->company_id]])->count();
    $changecount = DB::table('file_reason')->leftJoin('orders', 'file_reason.order_id', '=', 'orders.order_id')->where([['file_reason.last_status', '=', 'Changes'], ['orders.company_id', '=', $companydeatil->company_id]])->count();
    $lastorder = DB::table('orders')->select(
      'order_id',
      'order_us_date',
      'client_creation_id',
      'client_name',
      'client_email_primary',
      'client_contact_1',
      'file_type',
      'file_name',
      'status'
    )->where('company_id', '=', $companydeatil->company_id)->orderBy('id', 'desc')->limit(1)->get();
    $data = "No Detail";
    foreach ($lastorder as $lastdtl) {
      $data = "<div class='row'><div class='col-md-6'><h5>Order id : " . $lastdtl->order_id . "</h5><h5>Order Date : " . $lastdtl->order_us_date . "</h5><h5>Client Name : " . $lastdtl->client_name . "</h5><h5>Email : " . $lastdtl->client_email_primary . "</h5><h5>Contact : " . $lastdtl->client_contact_1 . "</h5><h5>File Type : " . $lastdtl->file_type . "</h5><h5>File Name : " . $lastdtl->file_name . "</h5><h5>Status : " . $lastdtl->status . "</h5></div><div class='col-md-6'><h5>Company Id : " . $companydeatil->company_id . "</h5><h5>Company Name : " . $companydeatil->client_company . "</h5><h5>Total Orders : " . $noofordercount . "</h5><h5>Total Orders : " . $noofordercount . "</h5><h5>completed : " . $completedcount . "</h5><h5>Revision : " . $revisioncount . "</h5><h5>Change : " . $changecount . "</h5></div></div>";
    }
    return $data;
  }
  public function clickassignuserapi(Request $request)
  {

    DB::table('clients')->where('company_id', 'CO' . $request->company_id)->update(['salseuser' => $request->assignuser, 'salseassignuser' => $request->assignby]);
    return $request->userid;
  }

  public function clicknewcompanyapi(Request $request)
  {
    $output =  'No Data';
    if (isset($request->selectedoption)) {
      $selectedvalue = $request->selectedoption;
    } else {
      $selectedvalue = "Last 3 Months";
    }



    $output1 = 0;

    if ($selectedvalue == "Last 3 Months") {
      $dateS = Carbon::now()->startOfMonth()->subMonth(2);
      $dateE = Carbon::now()->startOfMonth();

      if ($request->filteroption == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else if ($selectedvalue == "Current Month") {
      if ($request->filteroption == "ALL") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else if ($selectedvalue == "Last 6 Months") {
      if ($request->filteroption == "ALL") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else {
      $monthyear = explode("-", $request->newvsalue2);
      $year = $monthyear[1];
      $month = $monthyear[0];

      if ($request->filteroption == "ALL") {


        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    }



    return $data;
  }

  public function unassignclicknewcompanyapi(Request $request)
  {
    $output =  'No Data';
    if (isset($request->selectedoption)) {
      $selectedvalue = $request->selectedoption;
    } else {
      $selectedvalue = "Last 3 Months";
    }



    $output1 = 0;

    if ($selectedvalue == "Last 3 Months") {
      $dateS = Carbon::now()->startOfMonth()->subMonth(2);
      $dateE = Carbon::now()->startOfMonth();

      if ($request->filteroption == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else if ($selectedvalue == "Current Month") {
      if ($request->filteroption == "ALL") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else if ($selectedvalue == "Last 6 Months") {
      if ($request->filteroption == "ALL") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else {
      $monthyear = explode("-", $request->newvsalue2);
      $year = $monthyear[1];
      $month = $monthyear[0];

      if ($request->filteroption == "ALL") {


        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.salseuser', '=', NULL], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '=', NULL], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', NULL], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    }



    return $data;
  }

  public function assignclicknewcompanyapi(Request $request)
  {
    $output =  'No Data';
    if (isset($request->selectedoption)) {
      $selectedvalue = $request->selectedoption;
    } else {
      $selectedvalue = "Last 3 Months";
    }



    $output1 = 0;

    if ($selectedvalue == "Last 3 Months") {
      $dateS = Carbon::now()->startOfMonth()->subMonth(2);
      $dateE = Carbon::now()->startOfMonth();

      if ($request->filteroption == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else if ($selectedvalue == "Current Month") {
      if ($request->filteroption == "ALL") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $dateE = Carbon::now()->startOfMonth();
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else if ($selectedvalue == "Last 6 Months") {
      if ($request->filteroption == "ALL") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->where('clients.created_at', ">=", $dateS)->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    } else {
      $monthyear = explode("-", $request->newvsalue2);
      $year = $monthyear[1];
      $month = $monthyear[0];

      if ($request->filteroption == "ALL") {


        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.salseuser', '!=', NULL], ['clients.red_list', '=', 'N'], ['clients.salseuser', '!=', NULL], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.lastdisposition', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->filteroption == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))->whereMonth('clients.created_at', '=', $month)->whereYear('clients.created_at', '=', $year)->where([['clients.delete_flag', '=', 'N'], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '!=', NULL], ['clients.salseuser', '!=', NULL], ['clients.red_list', '=', 'N'], ['clients.store_type', '=', 'Retail']])
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      }
    }



    return $data;
  }

/**
 * 
 *  client api for fetching inactive orders starts
 */

 public function clientApi(Request $request)
 {
   // start date detail for 3 months
   $dateStart = Carbon::now()->startOfMonth()->subMonth(12);
   // end date detail
   $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1);

   $ed = DB::table('inactiveclients')->pluck('company_id');

    if ($request->userrole == "bde") {
      if ($request->id == "DA") {

        if($request->status)
        {
          //  if duration is 3 months
            if($request->status == "3 months")
            {
              $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
              $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
             }
              //  if duration is 6 months
              else if($request->status == "6 months")
              {
                $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
              }
              //  default duration settings
              else
              {
                $dateStart =Carbon::now()->format('Y-m-d');
                $dateEnd = Carbon::now()->format('Y-m-d');
              }
            }

                $data = Client::select(
                'clients.id',
                'clients.client_company',
                'clients.phone',
                'clients.client_state',
                'clients.client_country',
                'clients.timezone_type',
                DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
                'clients.company_id',
                'clients.salseuser',
                'clients.salseassignuser',
                DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
                )
                ->where([
                ['clients.delete_flag', '=', 'N'],
                ['clients.red_list', '=', 'N'],
                ['clients.client_country', '=', "US"],
                ['clients.lastdisposition', '!=', ' '],
                ['clients.store_type', '=', 'Retail']
                ])
                ->whereIN('clients.company_id', $ed)
                ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                ->distinct()
                ->groupBy(
                  'clients.id',
                  'clients.client_company',
                  'clients.phone',
                  'clients.client_state',
                  'clients.client_country',
                  'clients.timezone_type',
                  'clients.company_id',
                  'clients.lastdisposition',
                  'clients.salseuser',
                  'clients.salseassignuser')
                  ->get();
                } 
                elseif ($request->id == "ALL") {
                  if($request->status)
                  {
                    //  if duration is 3 months
                    if($request->status == "3 months")
                    {
                      $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                      $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                    }
                      //  if duration is 6 months
                      else if($request->status == "6 months")
                      {
                        $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                        $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                      }
                      //  default duration settings
                      else
                      {
                        $dateStart = Carbon::now()->format('Y-m-d');
                        $dateEnd = Carbon::now()->format('Y-m-d');
                      }
                    }
                
                $data = Client::select(
                'clients.id',
                'clients.client_company',
                'clients.phone',
                'clients.client_state',
                'clients.client_country',
                'clients.timezone_type',
                DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
                'clients.company_id',
                'clients.salseuser',
                'clients.salseassignuser',
                DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
                )
                ->where([
                  ['clients.delete_flag', '=', 'N'],
                  ['clients.red_list', '=', 'N'],
                  ['clients.client_country', '=', "US"],
                  ['clients.store_type', '=', 'Retail']
                  ])
                  ->whereIN('clients.company_id', $ed)
                  ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                  
                ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                  ->distinct()
                  ->groupBy(
                  'clients.id',
                  'clients.client_company',
                  'clients.phone',
                  'clients.client_state',
                  'clients.client_country',
                  'clients.timezone_type',
                  'clients.company_id',
                  'clients.lastdisposition',
                  'clients.salseuser',
                  'clients.salseassignuser'
                  )->get();
                }

                else if ($request->id == "AA") {
                  if($request->status)
                  {
                    //  if duration is 3 months
                    if($request->status == "3 months")
                    {
                      $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                      $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                    }
                      //  if duration is 6 months
                      else if($request->status == "6 months")
                      {
                        $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                        $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                      }
                      //  default duration settings
                      else
                      {
                        $dateStart = Carbon::now()->format('Y-m-d');
                        $dateEnd = Carbon::now()->format('Y-m-d');
                      }
                    }
                  
                
                    $data = Client::leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                    ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                    ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                    ->select('clients.id', 
                             'clients.client_company', 'clients.phone',
                              'clients.client_state', 'clients.client_country', 
                              'clients.timezone_type', 
                              DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                              'clients.company_id', 
                              'clients.salseuser', 
                              'clients.salseassignuser', 
                              DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                      ->where([['clients.delete_flag', '=', 'N'], 
                             ['clients.red_list', '=', 'N'], 
                             ['clients.client_country', '=', "US"], 
                             ['clients.store_type', '=', 'Retail'], 
                             ['clients.salseuser', '!=', null]])
                      ->whereIN('clients.company_id', $ed)
                      ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                      ->distinct()
                      ->groupBy('clients.id', 
                                'clients.client_company', 
                                'clients.phone', 
                                'clients.client_state', 
                                'clients.client_country', 
                                'clients.timezone_type', 
                                'clients.company_id', 
                                'clients.lastdisposition', 
                                'clients.salseuser', 
                                'clients.salseassignuser')
                        ->get();
                }

                else if ($request->id == "UA") {
                  if($request->status)
                  {
                    //  if duration is 3 months
                    if($request->status == "3 months")
                    {
                      $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                      $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                    }
                      //  if duration is 6 months
                      else if($request->status == "6 months")
                      {
                        $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                        $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                      }
                      //  default duration settings
                      else
                      {
                        $dateStart = Carbon::now()->format('Y-m-d');
                        $dateEnd = Carbon::now()->format('Y-m-d');
                      }
                    }
                    $data = Client::leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                            ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                            ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                            ->select('clients.id', 
                                     'clients.client_company', 
                                     'clients.phone', 
                                     'clients.client_state', 
                                     'clients.client_country', 
                                     'clients.timezone_type', 
                                     DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                                     'clients.company_id', 
                                     'clients.salseuser', 
                                     'clients.salseassignuser',
                                     DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                              ->where([['clients.delete_flag', '=', 'N'], 
                                     ['clients.red_list', '=', 'N'], 
                                     ['clients.client_country', '=', "US"], 
                                     ['clients.store_type', '=', 'Retail'], 
                                     ['clients.salseuser', '=', null]])
                              ->whereIN('clients.company_id', $ed)
                              ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                ->distinct()
                                ->groupBy('clients.id', 'clients.client_company', 
                                          'clients.phone', 'clients.client_state',
                                          'clients.client_country', 'clients.timezone_type', 
                                          'clients.company_id', 'clients.lastdisposition', 
                                          'clients.salseuser', 'clients.salseassignuser')
                                          ->get();
                }

                else if ($request->id == "NA") {
                  if($request->status)
                  {
                    //  if duration is 3 months
                    if($request->status == "3 months")
                    {
                      $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                      $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                    }
                    //  if duration is 6 months
                    else if($request->status == "6 months")
                    {
                      $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                      $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                    }
                    //  default duration settings
                    else
                    {
                      $dateStart =  Carbon::now()->format('Y-m-d');
                      $dateEnd = Carbon::now()->format('Y-m-d');
                    }
                    }
                              $data = Client::select(
                                'clients.id',
                                'clients.client_company',
                                'clients.phone',
                                'clients.client_state',
                                'clients.client_country',
                                'clients.timezone_type',
                                DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
                                'clients.company_id',
                                'clients.salseuser',
                                'clients.salseassignuser',
                                DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
                                )
                              ->where([
                                ['clients.delete_flag', '=', 'N'],
                                ['clients.red_list', '=', 'N'],
                                ['clients.client_country', '=', "US"],
                                ['clients.lastdisposition', '=', NULL],
                                ['clients.store_type', '=', 'Retail']
                                ])
                              ->whereIN('clients.company_id', $ed)
                              ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                              
                              ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                              ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                              ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                              ->distinct()
                              ->groupBy(
                                'clients.id',
                                'clients.client_company',
                                'clients.phone',
                                'clients.client_state',
                                'clients.client_country',
                                'clients.timezone_type',
                                'clients.company_id',
                                'clients.lastdisposition',
                                'clients.salseuser',
                                'clients.salseassignuser'
                                )->get();
                              } else if ($request->id == "3 months") {
                                
                                $dateStart = Carbon::now()->startOfMonth()->subMonth(3);
                                $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1);
                                $data = DB::table('clients')
                                        ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                        ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                        ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                                        ->select(
                                          'clients.id',
                                          'clients.client_company',
                                          'clients.phone',
                                          'clients.client_state',
                                          'clients.client_country',
                                          'clients.timezone_type',
                                          DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
                                          'clients.company_id',
                                          'clients.salseuser',
                                          'clients.salseassignuser',
                                          DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
                                          )
                                          ->where([
                                            ['clients.delete_flag', '=', 'N'],
                                            ['clients.red_list', '=', 'N'],
                                            ['clients.client_country', '=', "US"],
                                            ['clients.store_type', '=', 'Retail']
                                            ])
                                          ->whereIN('clients.company_id', $ed)
                                          ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                          ->distinct()
                                          ->groupBy(
                                            'clients.id',
                                            'clients.client_company',
                                            'clients.phone',
                                            'clients.client_state',
                                            'clients.client_country',
                                            'clients.timezone_type',
                                            'clients.company_id',
                                            'clients.lastdisposition',
                                            'clients.salseuser',
                                            'clients.salseassignuser'
                                            )->get();
                                          } else if ($request->id == "6 months") {
                                            $dateStart = Carbon::now()->startOfMonth()->subMonth(6);
                                            $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1);

                                            $data = DB::table('clients')
                                                    ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                    ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                                    ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                                                    ->select(
                                                      'clients.id',
                                                      'clients.client_company',
                                                      'clients.phone',
                                                      'clients.client_state',
                                                      'clients.client_country',
                                                      'clients.timezone_type',
                                                      DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
                                                      'clients.company_id',
                                                      'clients.salseuser',
                                                      'clients.salseassignuser',
                                                      DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
                                                      )
                                                      ->where([
                                                        ['clients.delete_flag', '=', 'N'],
                                                        ['clients.red_list', '=', 'N'],
                                                        ['clients.client_country', '=', "US"],
                                                        ['clients.store_type', '=', 'Retail']
                                                        ])
                                                      ->whereIN('clients.company_id', $ed)
                                                      ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                      ->distinct('clients.id')
                                                      ->groupBy(
                                                        'clients.id',
                                                        'clients.client_company',
                                                        'clients.phone',
                                                        'clients.client_state',
                                                        'clients.client_country',
                                                        'clients.timezone_type',
                                                        'clients.company_id',
                                                        'clients.lastdisposition',
                                                        'clients.salseuser',
                                                        'clients.salseassignuser')->get();
                                                      }
                                                      else
                                                      {
                                                        $data = "No Data";
                                                      }
                                                    }
                                                    elseif ($request->userrole == "salse")
                                                    {
                                                      if ($request->id == "DA") 
                                                      {
                                                        if($request->status)
                                                        {
                                                          //  if duration is 3 months
                                                          if($request->status == "3 months")
                                                          {
                                                            $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                                                            $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                          }
                                                            //  if duration is 6 months
                                                            else if($request->status == "6 months")
                                                            {
                                                              $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                            }
                                                            //  default duration settings
                                                            else
                                                            {
                                                              $dateStart =  Carbon::now()->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->format('Y-m-d');
                                                            }
                                                          }
                                                            $data = DB::table('clients')
                                                            ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                            ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                                            ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")    
                                                            ->select('clients.id',
                                                                'clients.client_company', 
                                                                'clients.phone', 
                                                                'clients.client_state', 
                                                                'clients.client_country', 
                                                                'clients.timezone_type', 
                                                                DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                                                                'clients.company_id', 
                                                                'clients.salseuser', 
                                                                'clients.salseassignuser', 
                                                                DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                                                            ->where([['clients.delete_flag', '=', 'N'], 
                                                                ['clients.red_list', '=', 'N'], 
                                                                ['clients.client_country', '=', "US"], 
                                                                ['clients.lastdisposition', '!=', ' '], 
                                                                ['clients.salseuser', '=', $request->username], 
                                                                ['clients.store_type', '=', 'Retail']
                                                                ])
                                                            ->whereIN('clients.company_id', $ed)
                                                            ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                            ->distinct()
                                                            ->groupBy('clients.id', 
                                                                  'clients.client_company', 
                                                                  'clients.phone', 'clients.client_state', 
                                                                  'clients.client_country', 
                                                                  'clients.timezone_type', 
                                                                  'clients.company_id', 
                                                                  'clients.lastdisposition', 
                                                                  'clients.salseuser', 
                                                                  'clients.salseassignuser')
                                                            ->get();
                                                      } elseif ($request->id == "ALL") 
                                                      {
                                                        if($request->status)
                                                        {
                                                          //  if duration is 3 months
                                                          if($request->status == "3 months")
                                                          {
                                                            $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                                                            $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                          }
                                                            //  if duration is 6 months
                                                            else if($request->status == "6 months")
                                                            {
                                                              $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                            }
                                                            //  default duration settings
                                                            else
                                                            {
                                                              $dateStart =  Carbon::now()->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->format('Y-m-d');
                                                            }
                                                          }
                                                            $data = DB::table('clients')
                                                                ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                                ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                                                ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")    
                                                                ->select('clients.id', 
                                                                  'clients.client_company', 
                                                                  'clients.phone', 
                                                                  'clients.client_state', 
                                                                  'clients.client_country', 
                                                                  'clients.timezone_type', 
                                                                  DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                                                                  'clients.company_id', 
                                                                  'clients.salseuser', 
                                                                  'clients.salseassignuser', 
                                                                  DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                                                                ->where([['clients.delete_flag', '=', 'N'], 
                                                                          ['clients.red_list', '=', 'N'], 
                                                                          ['clients.client_country', '=', "US"], 
                                                                          ['clients.salseuser', '=', $request->username], 
                                                                          ['clients.store_type', '=', 'Retail']
                                                                          ])
                                                                ->whereIN('clients.company_id', $ed)
                                                                ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                                ->distinct()
                                                                ->groupBy('clients.id', 
                                                                  'clients.client_company', 
                                                                  'clients.phone', 
                                                                  'clients.client_state', 
                                                                  'clients.client_country', 
                                                                  'clients.timezone_type', 
                                                                  'clients.company_id', 
                                                                  'clients.lastdisposition', 
                                                                  'clients.salseuser', 
                                                                  'clients.salseassignuser')
                                                                ->get();
                                                      }


                                                      else if ($request->id == "AA") {
                                                        if($request->status)
                                                        {
                                                          //  if duration is 3 months
                                                          if($request->status == "3 months")
                                                          {
                                                            $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                                                            $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                          }
                                                            //  if duration is 6 months
                                                            else if($request->status == "6 months")
                                                            {
                                                              $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                            }
                                                            //  default duration settings
                                                            else
                                                            {
                                                              $dateStart = Carbon::now()->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->format('Y-m-d');
                                                            }
                                                          }
                                                        
                                                      
                                                          $data = Client::leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                          ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                                          ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                                                          ->select('clients.id', 
                                                                   'clients.client_company', 'clients.phone',
                                                                    'clients.client_state', 'clients.client_country', 
                                                                    'clients.timezone_type', 
                                                                    DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                                                                    'clients.company_id', 
                                                                    'clients.salseuser', 
                                                                    'clients.salseassignuser', 
                                                                    DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                                                            ->where([['clients.delete_flag', '=', 'N'], 
                                                                   ['clients.red_list', '=', 'N'], 
                                                                   ['clients.client_country', '=', "US"], 
                                                                   ['clients.store_type', '=', 'Retail'], 
                                                                   ['clients.salseuser', '!=', null]])
                                                            ->whereIN('clients.company_id', $ed)
                                                            ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                            ->distinct()
                                                            ->groupBy('clients.id', 
                                                                      'clients.client_company', 
                                                                      'clients.phone', 
                                                                      'clients.client_state', 
                                                                      'clients.client_country', 
                                                                      'clients.timezone_type', 
                                                                      'clients.company_id', 
                                                                      'clients.lastdisposition', 
                                                                      'clients.salseuser', 
                                                                      'clients.salseassignuser')
                                                              ->get();
                                                      }
                                                      



                                                      else if ($request->id == "UA") {
                                                        if($request->status)
                                                        {
                                                          //  if duration is 3 months
                                                          if($request->status == "3 months")
                                                          {
                                                            $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                                                            $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                          }
                                                            //  if duration is 6 months
                                                            else if($request->status == "6 months")
                                                            {
                                                              $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                            }
                                                            //  default duration settings
                                                            else
                                                            {
                                                              $dateStart = Carbon::now()->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->format('Y-m-d');
                                                            }
                                                          }
                                                          $data = Client::leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                                  ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                                                  ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")
                                                                  ->select('clients.id', 
                                                                           'clients.client_company', 
                                                                           'clients.phone', 
                                                                           'clients.client_state', 
                                                                           'clients.client_country', 
                                                                           'clients.timezone_type', 
                                                                           DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                                                                           'clients.company_id', 
                                                                           'clients.salseuser', 
                                                                           'clients.salseassignuser',
                                                                           DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                                                                    ->where([['clients.delete_flag', '=', 'N'], 
                                                                           ['clients.red_list', '=', 'N'], 
                                                                           ['clients.client_country', '=', "US"], 
                                                                           ['clients.store_type', '=', 'Retail'], 
                                                                           ['clients.salseuser', '=', null]])
                                                                    ->whereIN('clients.company_id', $ed)
                                                                    ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                                      ->distinct()
                                                                      ->groupBy('clients.id', 'clients.client_company', 
                                                                                'clients.phone', 'clients.client_state',
                                                                                'clients.client_country', 'clients.timezone_type', 
                                                                                'clients.company_id', 'clients.lastdisposition', 
                                                                                'clients.salseuser', 'clients.salseassignuser')
                                                                                ->get();
                                                      }
                                                      
                                                      
                                                      
                                                      else if ($request->id == "NA")
                                                      {
                                                        if($request->status)
                                                        {
                                                          //  if duration is 3 months
                                                          if($request->status == "3 months")
                                                          {
                                                            $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                                                            $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                          }
                                                            //  if duration is 6 months
                                                            else if($request->status == "6 months")
                                                            {
                                                              $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                            }
                                                            //  default duration settings
                                                            else
                                                            {
                                                              $dateStart =  Carbon::now()->format('Y-m-d');
                                                              $dateEnd = Carbon::now()->format('Y-m-d');
                                                            }
                                                          }
                                                            $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                                    ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                                                    ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")    
                                                                    ->select('clients.id', 
                                                                        'clients.client_company', 
                                                                        'clients.phone', 
                                                                        'clients.client_state', 
                                                                        'clients.client_country', 
                                                                        'clients.timezone_type', 
                                                                        DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                                                                        'clients.company_id', 
                                                                        'clients.salseuser', 
                                                                        'clients.salseassignuser',
                                                                        DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                                                                ->where([['clients.delete_flag', '=', 'N'], 
                                                                          ['clients.red_list', '=', 'N'], 
                                                                          ['clients.client_country', '=', "US"], 
                                                                          ['clients.lastdisposition', '=', NULL], 
                                                                          ['clients.salseuser', '=', $request->username], 
                                                                          ['clients.store_type', '=', 'Retail']
                                                                          ])
                                                                ->whereIN('clients.company_id', $ed)
                                                                ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                                ->distinct()
                                                                ->groupBy('clients.id', 
                                                                          'clients.client_company', 
                                                                          'clients.phone', 
                                                                          'clients.client_state', 
                                                                          'clients.client_country', 
                                                                          'clients.timezone_type', 
                                                                          'clients.company_id', 
                                                                          'clients.lastdisposition', 
                                                                          'clients.salseuser', 
                                                                          'clients.salseassignuser')->get();
                                                              }
                                                              else if ($request->id == "3 months")
                                                              {
                                                                if($request->status)
                                                                {
                                                                  //  if duration is 3 months
                                                                  if($request->status == "3 months")
                                                                  {
                                                                    $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                                                                    $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                                  }
                                                                    //  if duration is 6 months
                                                                    else if($request->status == "6 months")
                                                                    {
                                                                      $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                                                                      $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                                    }
                                                                    //  default duration settings
                                                                    else
                                                                    {
                                                                      $dateStart =  Carbon::now()->format('Y-m-d');
                                                                      $dateEnd = Carbon::now()->format('Y-m-d');
                                                                    }
                                                                  }
                                                                    $dateS = Carbon::now()->startOfMonth()->subMonth(3);
                                                                    $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();
                                                                    $data = DB::table('clients')
                                                                        ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                                        ->leftJoin('orders', 'clients.email', '=', 'orders.client_email_primary')
                                                                        ->leftJoin("order_dtls","orders.id",'=',"order_dtls.master_id")    
                                                                        ->select('clients.id', 'clients.created_at', 'clients.client_company', 
                                                                                  'clients.phone', 'clients.client_state', 'clients.client_country', 
                                                                                  'clients.timezone_type', 
                                                                                  DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 
                                                                                  'clients.company_id', 'clients.salseuser', 'clients.salseassignuser',
                                                                                   DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                                                                        ->whereBetween(
                                                                          'clients.created_at',
                                                                          [$dateS, $dateE]
                                                                          )
                                                                        ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], 
                                                                                  ['clients.client_country', '=', "US"], 
                                                                                  ['clients.salseuser', '=', $request->username], 
                                                                                  ['clients.store_type', '=', 'Retail']
                                                                                  ])
                                                                        ->whereIN('clients.company_id', $ed)
                                                                        ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                                        ->distinct()
                                                                        ->groupBy('clients.id', 'clients.client_company', 
                                                                                  'clients.phone', 'clients.client_state', 'clients.client_country', 
                                                                                  'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 
                                                                                  'clients.salseuser', 'clients.salseassignuser')
                                                                        ->get();
                                                                      }
                                                                      else if ($request->id == "6 months")
                                                                      {
                                                                        if($request->status)
                                                                        {
                                                                          //  if duration is 3 months
                                                                          if($request->status == "3 months")
                                                                          {
                                                                            $dateStart = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d');
                                                                            $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                                          }
                                                                            //  if duration is 6 months
                                                                            else if($request->status == "6 months")
                                                                            {
                                                                              $dateStart = Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d');
                                                                              $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1)->format('Y-m-d');
                                                                            }
                                                                            //  default duration settings
                                                                            else
                                                                            {
                                                                              $dateStart = Carbon::now()->format('Y-m-d');
                                                                              $dateEnd = Carbon::now()->format('Y-m-d');
                                                                            }
                                                                          }
                                                                            $dateS = Carbon::now()->startOfMonth()->subMonth(6);
                                                                            $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();
                                                                            $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
                                                                            ->select('clients.id', 'clients.created_at', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
                                                                            ->whereBetween(
                                                                              'clients.created_at',
                                                                              [$dateS, $dateE]
                                                                              )
                                                                            ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], 
                                                                                    ['clients.client_country', '=', "US"], 
                                                                                    ['clients.salseuser', '=', $request->username], 
                                                                                    ['clients.store_type', '=', 'Retail']])
                                                                            ->whereIN('clients.company_id', $ed)
                                                                            ->whereNotBetween('orders.bill_dt',[$dateStart,$dateEnd])
                                                                            ->distinct()
                                                                            ->groupBy('clients.id', 'clients.client_company', 
                                                                                  'clients.phone', 'clients.client_state', 'clients.client_country', 
                                                                                  'clients.timezone_type', 'clients.company_id', 
                                                                                  'clients.lastdisposition', 'clients.salseuser', 
                                                                                  'clients.salseassignuser')->get();
                                                                        } else {
                                                                          $data = "No Data";
                                                                        }
                                                                      } else {
                                                                        $data = "No Data";
                                                                      }
                                                                      return $data;
                                                                    }

/**
 * 
 *  client api for fetching inactive orders ends
 */

  public function apiRegister(Request $request)
  {
    $ed = DB::table('inactiveclients')->pluck('company_id');

    if ($request->userrole == "bde") {
      if ($request->id == "DA") {
        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.client_country', '=', "US"],
            ['clients.lastdisposition', '!=', ' '],
            ['clients.store_type', '=', 'Retail']
          ])
          ->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )
          ->get();
      } elseif ($request->id == "ALL") {
        /*
        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.client_country', '=', "US"],
            ['clients.store_type', '=', 'Retail']
          ])
          ->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
          */

          $dateStart = Carbon::now()->startOfMonth()->subMonth(3);
          $dateEnd = Carbon::now()->endOfMonth()->subDays()->subMonth(1);
          $data=CLient::select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
         )
         ->join("client_dtls","clients.id",'=',"client_dtls.client_id")
         ->join("order_dtls","clients.company_id",'=',"order_dtls.company_id")
         ->join("orders","orders.id",'=',"order_dtls.master_id")
         ->whereNotBetween('order_dtls.created_at',[$dateStart, $dateEnd])
         ->distinct('order_dtls.client_creation_id')
         ->groupBy(
           'clients.id',
           'clients.client_company',
           'clients.phone',
           'clients.client_state',
           'clients.client_country',
           'clients.timezone_type',
           'clients.company_id',
           'clients.lastdisposition',
           'clients.salseuser',
           'clients.salseassignuser'
         )->take(6)->get();
      
               


      } else if ($request->id == "NA") {
        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.client_country', '=', "US"],
            ['clients.lastdisposition', '=', NULL],
            ['clients.store_type', '=', 'Retail']
          ])
          ->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
      } else if ($request->id == "3 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.created_at',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.store_type', '=', 'Retail']
          ])
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
      } else if ($request->id == "6 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'),
            'clients.company_id',
            'clients.salseuser',
            'clients.created_at',
            'clients.salseassignuser',
            DB::raw('group_concat(client_dtls.client_name) AS cdclient_name')
          )
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )->where([
            ['clients.delete_flag', '=', 'N'],
            ['clients.red_list', '=', 'N'],
            ['clients.store_type', '=', 'Retail']
          ])
          ->distinct()
          ->groupBy(
            'clients.id',
            'clients.client_company',
            'clients.phone',
            'clients.client_state',
            'clients.client_country',
            'clients.timezone_type',
            'clients.company_id',
            'clients.lastdisposition',
            'clients.salseuser',
            'clients.salseassignuser'
          )->get();
      } else {
        $data = "No Data";
      }
    } elseif ($request->userrole == "salse") {
      if ($request->id == "DA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '!=', ' '], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } elseif ($request->id == "ALL") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "NA") {
        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.lastdisposition', '=', NULL], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else if ($request->id == "3 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')
          ->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.created_at', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )
          ->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()
          ->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')
          ->get();
      } else if ($request->id == "6 months") {

        $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        $dateE = Carbon::now()->endOfMonth()->subDays(1)->subMonth();

        $data = DB::table('clients')->leftJoin('client_dtls', 'clients.id', '=', 'client_dtls.client_id')
          ->select('clients.id', 'clients.created_at', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', DB::raw('SUBSTRING(clients.lastdisposition,1,50) AS lastdispo'), 'clients.company_id', 'clients.salseuser', 'clients.salseassignuser', DB::raw('group_concat(client_dtls.client_name) AS cdclient_name'))
          ->whereBetween(
            'clients.created_at',
            [$dateS, $dateE]
          )->where([['clients.delete_flag', '=', 'N'], ['clients.red_list', '=', 'N'], ['clients.client_country', '=', "US"], ['clients.salseuser', '=', $request->username], ['clients.store_type', '=', 'Retail']])->whereIN('clients.company_id', $ed)
          ->distinct()->groupBy('clients.id', 'clients.client_company', 'clients.phone', 'clients.client_state', 'clients.client_country', 'clients.timezone_type', 'clients.company_id', 'clients.lastdisposition', 'clients.salseuser', 'clients.salseassignuser')->get();
      } else {
        $data = "No Data";
      }
    } else {
      $data = "No Data";
    }

    return $data;
  }


}
