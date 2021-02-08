<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Expenses extends Model {

    public $table = "expenses";
    protected $primaryKey = 'expcategory_id';
    //protected $dates = ['expenses_date'];
    public $timestamps = false;
    protected $fillable = [
        'expenses_date', 
        'expcategory_id', 
        'expenses_amount', 
    ];

    
    //$table->date('expenses_date')->unique();
    //$table->primary('expenses_date');

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