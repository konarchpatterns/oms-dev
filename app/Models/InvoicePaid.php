<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InvoicePaid extends Model
{
    
    protected $table = 'invoice_paid';

    protected $fillable = [   
    
'remarks' ,
  'payment_date',
  'invoice_no',
  'conv_rate',
  'pay_channel',
  'amt_paid_usd',
  'amt_received_inr' ,
  'net_amt' ,
  'bank_charges' ,
  'tran_id' ,
  'created_at' ,
  'updated_at' 
  
     
 ] ;


}
