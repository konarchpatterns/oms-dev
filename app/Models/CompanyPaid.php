<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CompanyPaid extends Model
{
    
    protected $table = 'company_paid';

    protected $fillable = [   
    'remarks' ,
  'payment_date' ,
  'client_company' ,
  'company_id' ,
  'conv_rate',
  'pay_channel' ,
  'amt_paid_usd' ,
  'amt_received_inr' ,
  'net_amt' ,
  'bank_charges' ,
  'tran_id' ,
  'created_at',
  'updated_at'
  
     
 ] ;


}
