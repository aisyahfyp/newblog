<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model {

    public $table = "sales";
    public $timestamps = false;
    protected $fillable = [
        'sales_date',  
        'sales_amount', 
        'sales_totalamount',
    ];

    public function setSalTotal() {
        
        $this->sales_totalamount = $this->sum('sales_amount');
    }
}