<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InvoiceSummary extends Model
{
    
    protected $table = 'invoice_summary';

    protected $fillable = [   
     'company_id' ,   
     'client_company' , 
     'yr_month',
     'inv_amount',
     'paid_amt',
     'out_amt',
     'bank_charges',
     'created_by',
     'paid_dt',
     'remarks',
      'file_url',
      'discount',
      'discount_reason'
  
     
 ] ;


}
