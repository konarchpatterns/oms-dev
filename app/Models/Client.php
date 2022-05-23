<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;


class Client extends Model
{

	use LogsActivity;
    
    protected static $logFillable = true;
   protected static $logAttributes = ['*'];
    

   protected static $logOnlyDirty = true;

    protected static $ignoreChangedAttributes = ['created_by', 'updated_by','created_at','updated_at', 'status_change_date', 'child_status'];

   protected static $logAttributesToIgnore = ['created_by', 'updated_by' ,'created_at','updated_at'];
    
   protected static $submitEmptyLogs = false;

    
    protected $table = 'clients';

    protected $fillable = [  'client_company',  'website', 'phone' , 'client_address1', 'client_state', 'client_country', 'timezone_type', 'unit_price', 'digit_rate', 'store_type' , 'created_by', 'updated_by', 'other_state' , 'client_source', 'csr_person', 'client_specific' , 'csr_personid', 'red_list', 'red_list_details','email','unitno','client_address_line2','city','zipcode','about_company','industry'
       ] ;

     public function tapActivity(Activity $activity, string $eventName)
             {
                    $Order =DB::table('clients')->where('id','=', $activity->subject_id)->get();  

                    foreach ($Order as $key ) {
                        $order_id =  $key->client_company ;
                    }
                    $activity->note = 'Company : '. $order_id;
             }


    public function clientdtls()
    {
        return $this->hasMany('App\Models\ClientDtl');
    }
     
}
