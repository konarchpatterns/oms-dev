<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Excel as ExcelType; 

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;

class DesignerRevenueExport implements FromCollection
{
    
    protected $bp;
    public function __construct($bp)
    {

        $this->bp = $bp;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $exp=[];
        $exp['fg']="sfg";
        $exp['fggf']="sfg";
        $exp['fgfg']="sfg";
        return collect($exp);
    }
}
