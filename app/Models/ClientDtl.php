<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;



class ClientDtl extends Model
{

  	use LogsActivity;
    
    protected static $logFillable = true;
    protected static $logAttributes = ['*'];
    

   protected static $logOnlyDirty = true;

    protected static $ignoreChangedAttributes = ['created_by', 'updated_by','created_at','updated_at', 'status_change_date', 'child_status'];

    protected static $logAttributesToIgnore = ['created_by', 'updated_by' ,'created_at','updated_at'];
    
    protected static $submitEmptyLogs = false;
    
    protected $table = 'client_dtls';

    protected $fillable = [ 'client_id',  'first_name', 'last_name', 'client_name',  'client_email_primary',    'client_contact_1',  'client_note' , 'client_company', 'delete_flag' , 'black_list' , 'black_list_reason','cunitno', 'cstreetname', 'ccountry', 'cstate', 'ccity', 'czipcode', 'designation', 'linkedin_url', 'self_client_specification'] ;

    public function tapActivity(Activity $activity, string $eventName)
             {
                    $Order =DB::table('client_dtls')->where('id','=', $activity->subject_id)->get();  
                    foreach ($Order as $key ) {
                        $order_id =  $key->client_name ;
                    }
                    $activity->note = 'Client : '. $order_id;
             }


}
