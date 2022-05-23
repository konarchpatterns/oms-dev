<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;



class OrderDtl extends Model
{
    use LogsActivity;
    
   // protected static $logFillable = true;
    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    //protected static $ignoreChangedAttributes = ['created_by', 'updated_by' ,'created_at','updated_at', 'status_change_date' , 'child_status'];
    
    protected static $logAttributesToIgnore = ['created_by', 'updated_by' ,'created_at','updated_at', 'status_change_date' , 'child_status' , 'alloc_id' , 'old_status' ,'order_completion_time' ,'approval_us_time' , 'approval_time' , 'old_price',
      'status_change_date', 'file_count'];
    

    protected static $submitEmptyLogs = false;



    protected $table = 'order_dtls';

    protected $fillable = [ 'master_id',
         'order_id' ,   
    	 'client_creation_id' , 
     	 'client_name' ,
     	 'client_email_primary' ,    
     	 'client_company' ,   
     	 'client_address1' , 
     	 'client_state' ,  
     	 'client_contact_1',  
     	 'client_contact_2', 
     	 'other_contact',
     	 'client_note',    
     	 'file_name' , 
     	 'file_type' ,  
     	 'vendor',
     	 'digit_rate' ,  
     	 'stiches_count' , 
     	 'file_price' , 
     	 'vendor_digit_rate' ,  
     	 'vendor_digit_price', 
     	 'order_date_time' , 
     	 'order_dt' , 
     	 'order_us_date' ,
     	 'target_completion_time' ,  
     	 'allocation' , 
     	 'status' ,  
     	 'document_type' , 
     	 'note' ,  
     	 'unit_price' ,
     	 'order_completion_time',
     	 'approval_time',
         'approval_us_time',
     	 'status_change_date',
     	 'created_by', 
     	 'updated_by',
     	 'ip_address',
     	 'company_id',
     	 'file_count',
         'alloc_id',
         'old_price',
         'deleted_flag',
         'old_status',
          'rev_mistake',
            'rev_mistake_reason'
    
 	] ;

   
  public function tapActivity(Activity $activity, string $eventName)
             {
                    $Order =DB::table('order_dtls')->where('id','=', $activity->subject_id)->get();  
                    foreach ($Order as $key ) {
                        $order_id =  $key->file_name ;
                    }
                    $activity->note = 'Child-Dtl: '. $order_id;
             }
           

 
}
