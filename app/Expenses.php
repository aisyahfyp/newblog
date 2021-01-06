<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Expenses extends Model {

    public $table = "expenses";
    public $timestamps = false;
    protected $fillable = [
        'expenses_date', 
        'expcategory_id', 
        'expenses_amount', 
        'expenses_quantity',
        'expenses_totalamount',
    ];

    public function category(){
        return $this->belongsTo('App\ExpCategory', 'expcategory_id');

    }
    public function setExpTotal() {
        // $total = DB::table('expenses')
        //     ->sum(DB::raw('expenses.expenses_amount * expenses.expenses_quantity'))
        //     ->get();

        // return view('layout.add', compact('total'));
        
        //   $exp = Expenses::where('')
        $this->expenses_totalamount = $this->expenses_amount * $this->expenses_quantity;
    }

}