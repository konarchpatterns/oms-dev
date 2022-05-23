<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PersonLog extends Model
{
    
    protected $table = 'person_log';

    protected $fillable = [ 'person_id' ,
  'person_name' ,
  'columns_modified' ,
  'what_modify' ,
  'model_used' ,
  'program_no' ,
  'url_direct' ,
  'admin_remarks' ,
  'trans_id',
  'trans_child_id'
 ] ;


}
