<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Expenses extends Model {

    public $table = "expenses";
    public $timestamps = false;
    protected $fillable = [
        'expenses_date', 
        'expcategory_id', 
        'expenses_amount', 
        'expenses_quantity'
    ];

    

    public function category(){
        return $this->belongsTo('App\ExpCategory', 'expcategory_id');

    }

}