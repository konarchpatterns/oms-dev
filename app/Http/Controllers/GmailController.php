<?php
namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\User ;

use App\Models\Role;

use App\Models\Permission;
use App\Models\Gmail ;
use App\Models\Client ;
use App\Models\ClientDtl ;
use App\Models\Us_State;
use App\Models\Order ;
use App\Models\Order_Status ;
use App\Models\Vendor;


use Illuminate\Support\Facades\Auth ;


class GmailController extends Controller
{
    //

    public function getIndex()
    {
       // return view('datatables.index');
         
       //$user->hasRole(['owner', 'admin']); 


      if (Auth::user()->hasRole(['owner', 'admin']) && can('read-gmails')) {
        $gmail=Gmail::first();
        return view('gmails.index',compact('gmail'));
      }
      else {
          return view('errors.403');
       }
 
    }

      public function read()
     {
     	//dd("hello");exit;
 		    //$gmails=Gmail::all();
        return view('readgmails.index');

     }

      public function index()
     {
      ///dd("hello");exit;
        //$gmails=Gmail::all();

       
        $gmail=Gmail::where('id',100)->get();
        return view('gmails.index',compact('gmail'));

     }

     public function create()
     {
     	
        return view('gmails.create');

     }

     public function store(Request $request)
		{
          $userid =   Auth::user()->id ;
          $deletedRows = Gmail::where('created_by', $userid)->delete(); 
          // $deletedRows = Gmail::truncate();
  		    //var_dump($request->all());die;
          $inputs = $request->all();
           // foreach ($inputs as $key ) {
              # code...


            $leaders= [];
            foreach ($inputs as $key => $value) {
              # code...
              //echo "<pre>";
               //   print_r($key);
                
               //echo "</pre>";

                // if ($key=='members') {
                     
                //      if (isset(array("id"))) {
                //         echo "<pre>";
                //         print_r($inputs[$key])  ;
                //         echo "</pre>";
                //       }

                // }
                
                if ($key=='members') {
                    $leaders[]= $value ;
                  }

              
              }
                        //echo "<pre>";
                        //echo $leaders[0]  ;
                        // echo "</pre>";die;
              $leaders1= [];
              foreach ($leaders as $key2) {
                     
                     foreach ($key2 as $key3) {
                       //echo $key3['id'];
                       //echo $key3['fromaddress'];
                       // echo $key3['toaddress'];
                       // echo $key3['subject'];

                      if ( !empty($key3['id']) ) 
                               {    


                      $string = $key3['fromaddress'];
                      $string1 = $key3['toaddress'];
                      $gmail_client_status = $key3['gmail_client_status'];

                      $fromaddress= self::getGmail($string);
                      $toaddress  = self::getGmail($string1);

                      // $clients = DB::table('client_dtls')
                      //   ->orWhere('client_email_primary', '=', $fromaddress )
                      // ->count();
                

                  // if ($clients> 0) {
                  //     $gmail_client_status = "Existing Client" ;
                  //   }
                  // else {

                  //       $gmail_client_status = "New Client" ;  
                  // }
                      
                      $cdate = Carbon::parse($key3['cdate']); 
                        
                          $data =  array('message_id' =>  $key3['uid'],
                           'fromemail' =>     (string)$fromaddress,
                           'toemail'   =>     (string)$toaddress,
                           'subject' =>  (string)$key3['subject'],
                           'received_date' => $cdate,
                           'body'  =>    $key3['email_body'],
                           'filename' =>  (string)$key3['filename'],
                           'gmail_client_status' => $gmail_client_status,
                           'created_by'    => $userid
                          );

                          Gmail::create($data);

                      }
                        }
                      

                     }
                     
                

			   Session::flash('flash_message', 'Gmail successfully added!');

        $gmail=Gmail::first();
        return view('gmails.index',compact('gmail'));
   			    //return redirect()->back();
		}

     public function  show($id)
     {
     		 $Gmail=Gmail::find($id);
   			 return view('gmails.show',compact('gmail'));
     }

     public function edit($id)
     {
          //dd($id);die;
           $perms = DB::table('permissions')
                    ->join('permission_user', 'permissions.id', '=', 'permission_user.permission_id')
                    ->join('users', function($join)
                      {
                        $join->on('users.id', '=', 'permission_user.user_id')
                        ->where('users.id', '=', Auth::user()->id);
                      })
                      ->select('permissions.*')
                      ->get();  

              //dd($perms);die;

              foreach ($perms as $key ) {
                      # code...
                      $rights[] =$key;
                    }     

        	$gmail  = Gmail::find($id);
          $users  = User::pluck('name', 'name');
          $status = Order_Status::pluck('status', 'status'); 
          $vendors = Vendor::pluck('name', 'name');
          $clientdtl = ClientDtl::where('client_email_primary', '=', $gmail->fromemail )->firstOrFail();
          return view('gmails.edit',compact('gmail' ,'users', 'status', 'clientdtl', 'perms' , 
                       'rights', 'vendors'));

     }

      public function newclient($id)
     {
          $gmail=Gmail::find($id);

         // $comp =  Client::pluck('client_company')->prepend('Select', 'Select');;
           $comp =  Client::all('client_company');
         
           $state =  Us_State::all('name_in_lc', 'code');

           return view('gmails.newclient',compact('gmail', 'comp', 'state'));


     }


     public function storenewclient(Request $request)
        {
              // dd("hello store"); die;
          $input = $request->all();
          $gmailid = $input['gmailid'];  


          $Gmail=Gmail::find($gmailid);
          Gmail::where('id', $gmailid)
               ->update(['gmail_client_status' => ' ']);

        
         // $Gmail->update($GmailUpdate);


              //$comment = new Comment();

             // $comment->save();
              // $id =  Client::create($input);

              //$clientid = $id->id ;
          $comp_name = $input['client_company'] ;

          $comp_count = DB::table('clients')->where('client_company',  '=', $comp_name)->count();
           
         // dd($comp_count);
          if ($comp_count===0) {
             $max_compid = 0 ;

             $max_compid = DB::table('clients')->max('company_id');
          
             $max_compid = substr($max_compid, 7,6) + 1 ;

             $cdt =  Carbon::now();
          //$new_dt =  $cdt->year . $cdt->month .$cdt->day .'C001' ;
             $new_dt =  substr($cdt->year, 2, 2) . $cdt->month  ;

             $data = array(
                    'company_id'  =>  'CO' . $new_dt . str_pad($max_compid, 4, '0', STR_PAD_LEFT) ,
                    'client_company' => $input['client_company'],
                    'website'    => $input['website'],
                    'phone'      => $input['phone']
                  );
              
             $j = DB::table('clients')->insertGetId($data);
 
               Session::flash('flash_message', 'Client successfully added!' );
            }   
             
    if($comp_count!=0)   {
        $jcount = DB::table('clients')->where('client_company', '=', $comp_name)->pluck('id'); 
       $j= $jcount[0] ;   
      //  dd($j);
    }
    
    //dd($j); die;
    $userid = Auth::id();
    $max_client_id = 0 ;

    $max_client_id = DB::table('client_dtls')->max('client_creation_id');
          
    $max_client_id = substr($max_client_id, 7,6);
    $max_client_id = $max_client_id + 1 ;

    $cdt =  Carbon::now();
          //$new_dt =  $cdt->year . $cdt->month .$cdt->day .'C001' ;
    $new_dt =  substr($cdt->year, 2, 2) . $cdt->month  ;

    if($j > 0)
    {
      for($i=0;$i <count($input['first_name']);$i++)
         {
            $datadetail = array(
                      'client_id' => $j,
                      'client_creation_id' => 'CL'. $new_dt . str_pad($max_client_id, 4, "0", STR_PAD_LEFT) ,
                      'first_name'=> $input['first_name'][$i],
                      'last_name' => $input['last_name'][$i],
                      'client_company' => $comp_name ,
                      'client_name' => $input['first_name'][$i] . $input['last_name'][$i],
                       'client_email_primary'=> $input['client_email_primary'][$i],
                       'client_contact_1'  => $input['client_contact_1'][$i],
                       'client_note'  => $input['client_note'][$i],
                       'client_creation_date_time' => $cdt,
                       'created_by' => $userid,
                       'updated_by' => $userid
                      // 'client_address1' => $input['client_address1'][$i],
                      // 'client_state'  => $input['client_state'][$i],
                      // 'client_country'    => $input['client_country'][$i]
                          );
             DB::table('client_dtls')->insert($datadetail);
          }

       
    }
          //$client=Client::find($j);
         
          // Gmail::find($gmailid)->delete();
          //dd($client->client_company);die;
        return redirect('gmails');
  }

		public function update($id ,Request $request)
			{
  				 //
 			   // $GmailUpdate=$request->all();
 			    //  $Gmail=Gmail::find($id)->delete();
 			   // $Gmail->update($GmailUpdate);
        $input = $request->all();
        // dd($input);
        $gmailid = $input['gmailid'];
        $Gmail=Gmail::where('id', $gmailid)->delete();

       

        $userid =   Auth::user()->id ;

        $us_time = Carbon::now('America/New_York');

        $new_dt = substr($us_time->year, 2, 2) . $us_time->month . $us_time->day ;


        $us_time =  date_format($us_time, 'Ymd');

        $cdt =  Carbon::now();
       
       $maxorderid = DB::table('orders')->select('order_id')->where('order_us_date','>=',$us_time)->orderBy('id','desc')->first();
          
        //dd($maxorderid->order_id);
        if( is_null($maxorderid)) {
          $max_id = 0;
          
         }
        else
            {
              
             
                    $max_id = $maxorderid->order_id;
                    $max_id = substr($max_id, 11);    
               
            }

         $max_id = (int)($max_id + 1) ;
        
       
        $time_original = strtotime($input['order_date_time']);
        $time_add      = $time_original + (3600*24); //add seconds of one day

        $new_date      = date("Y-m-d", $time_add);

        $input['order_dt'] = $input['order_date_time'] ;
        $input['order_completion_date_time'] = $new_date ;

       

       if ($input['document_type'] == "Rush") {
          $time_add  =  $time_original + 180 ;
          $new_date  =  date("Y-m-d H:i:s", $time_add);
       }
       elseif ($input['document_type'] == "SuperRush")
           {
             $time_add  =  $time_original + 90 ;
          $new_date  =  date("Y-m-d H:i:s", $time_add);
           }
            $input['order_completion_date_time'] = $new_date ;
    
     
     // $new_dt = substr($us_time->year, 2, 2) . str_pad($us_time->month, 2, "0", STR_PAD_LEFT)        . str_pad($us_time->day,2,"0", STR_PAD_LEFT) ;

       // $input['allocation'] =  join(',', $input['allocation1']);

      $new_dt  = $us_time ;
          
      $tmp = 'GPO' . $new_dt . str_pad($max_id, 4, "0", STR_PAD_LEFT);

    
// Arrange this column as per Model asc order        
        $input['order_id']             = (string)$tmp;
        $input['client_creation_id']   = (string)$input['client_creation_id'];
        $input['client_name']          = (string)$input['client_name'];
        $input['client_email_primary'] = (string)$input['client_email_primary'];
        $input['client_company']       = (string)$input['client_company'];
        $input['client_address1']      = (string)$input['client_address1'];
        $input['client_state']         = (string)$input['client_state'];
        
        $input['client_contact_1']     = (string)$input['client_contact_1'];
        $input['client_contact_2']     = (string)$input['client_contact_2'];
        $input['other_contact']        = (string)$input['other_contact'];
        $input['client_note']          = (string)$input['client_note'];
        $input['file_name']            = (string)$input['file_name'];
        $input['file_type']            = (string)$input['file_type'];
        // $input['digit_rate']           = (string)$input['digit_rate'];
        // $input['stiches_count']        = (string)$input['stiches_count'];

        if(is_array($input['allocation1'])) { 
            $alloc                     =  join(',', $input['allocation1']);
            $input['allocation']       = (string)$alloc;
          }
        else
        {
            $input['allocation']       = $input['allocation1'] ;    
        
        }

        $input['status']               = (string)$input['status'];
      
        $input['note']                 = (string)$input['note'];
        $input['created_by']           = $userid ;
        $input['updated_by']           = $userid ;



        $id = Order::create($input)->id;

            //    $OrderUpdate= array('order_id'=>'PO'.$id);
            //    $Rec=Order::find($id);
            //    $Rec->update($OrderUpdate);


  				 return redirect('gmails');
		}

     public function destroy($id)
		{
			Gmail::find($id)->delete();
            return redirect('gmails');

			}



/**   dd(Auth::user()->name);
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
      
        //dd($authemail);

        $authemail =  Auth::user()->name;
        $authemail = $authemail . '%';
        //$query = Gmail::query()->where('toemail','like', $authemail)->get();

        if ((Auth::user()->can('tallin-gmails'))) {
            $var[] = 'tallin@patternsindia.com';
                    }

        if ((Auth::user()->can('info-gmails'))) {
            $var[] = 'info@patternsindia.com';
                    }

        if ((Auth::user()->can('mike-gmails'))) {
            $var[] = 'mike@patternsindia.com';
                    }

        if ((Auth::user()->can('david-gmails'))) {
            $var[] = 'david@patternsindia.com';
                    }
        //$var = 'php@patternsindia.com';          
        $var[]  = 'orders@patternsindia.com' ;
       // $query = Gmail::query()->wherein('toemail',  $var)->get();

         $query = DB::table('gmails')->select('id', 'subject', 'gmail_client_status', 'received_date',
          'fromemail', 'toemail',
            'filename' )->wherein('toemail',  $var)->get();

        //dd($query);die;
        // return Datatables::of(Gmail::query())
        return Datatables::of($query)
      ->addColumn('action', function ($user) {
                return  view('partials.datatablesgmails', ['id' => $user->id])->render();
                 // \Form::open(array('method'=>'DELETE', 'route' => array('clients.destroy',".$user->client_id."))) .
                 //        \Form::submit('Delete', array('class'=>'btn')) .
                 //        \Form::close() ;             
            })
           
            // ->editColumn('client_id', '{{$client_id}}')
            // ->setRowId('client_id')
            // ->setRowClass(function ($user) {
            //     return $user->client_id % 2 == 0 ? 'alert-success' : 'alert-warning';
            // })
            // ->setRowData([
            //     'client_id' => 'test',
            // ])
                              
     ->addColumn('action1', function ($user) {
                return  view('partials.datatablenewclient', ['id' => $user->id])->render();
                  })
             ->filter(function($user){
            
                // $user->where('toemail','like', $authemail);
              })
            ->make(true);        
    }


public function getGmail($value) {
    
     $pattern="/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";

      
      
      preg_match_all($pattern, $value, $matches);

      foreach($matches[0] as $email){
            $fromaddress=  $email ;
  
      }

      return $fromaddress;      
   
}


public function search(Request $request = null)
     {
               // dd($request->search); die;
                $output =  0;
                $clients = 0 ;
                $clients = DB::table('client_dtls')
                 ->orWhere('client_email_primary', 'like', '%' . $request->search . '%')
                 ->count();
                

                //dd($clients);die;
                if ($clients> 0) {
                  
                    //$output = array ( msg =>'true' ) ;
                    $output = 1 ;
                }
                
                //return response()->json([$output]);
                return Response($output);


     } 


public function compdtl(Request $request = null)
     {
               // dd($request->search); die;
                
                $clients = 0 ;
                $clients = DB::table('clients')
                 ->Where('client_company', '=',  $request->search )
                 ->first();
                

                //dd($clients);die;
                
                  
                $output = array ( 

                'website' => $clients->website,
                'phone'   => $clients->phone,
                'client_address1' => $clients->client_address1,
                'client_state' => $clients->client_state,
                'client_country' => $clients->client_country,
                'timezone_type' => $clients->timezone_type,
                'unit_price' => $clients->unit_price,
                'digit_rate' => $clients->digit_rate,
                'store_type' => $clients->store_type


                       ) ;
                    
              
                
                return response()->json([$output]);
               // return Response($output);


     } 


public function fetchcomp(Request $request )
     {
               // dd($request->term); die;
                
                $clients = 0 ;
               $clients = DB::table('clients')->where('client_company','like', '%' . $request->term . '%')->where('delete_flag' ,'=', 'N')->get();
               

               //dd($clients);
                $output1 =[];
               foreach ($clients as $client) {
                   
                 $output =  array( 'client_company' => $client->client_company );
                // $output = array ( 
                // 'client_company' => $client->client_company
                // // 'website' => $clients->website,
                // // 'phone'   => $clients->phone,
                // // 'client_address1' => $clients->client_address1,
                // // 'client_state' => $clients->client_state,
                // // 'client_country' => $clients->client_country,
                // // 'timezone_type' => $clients->timezone_type,
                // // 'unit_price' => $clients->unit_price,
                // // 'digit_rate' => $clients->digit_rate,
                // // 'store_type' => $clients->store_type


                //        ) ;
                  $output1[] = $output ;

                }  
                    
                //dd($output);
                
                return response()->json($output1);
               // return Response($output);


     } 




}
