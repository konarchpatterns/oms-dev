<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Illuminate\Support\Facades\DB;
class Work_detail extends Model
{
    use LogsActivity;
    protected static $logName = 'Work Detail';
	protected $table = 'work_details';
	  protected $fillable = [
        'client_id','department','seattype','seattype','noofhours','wcountry','wtimezone','billing','invoice','currency','amount','days','hours','worktime','work_created_user_id','work_updated_user_id','csr1','csr2','emp1','emp2'
    ];
      protected static $logOnlyDirty = true;
          protected static $logFillable = true;  
}
