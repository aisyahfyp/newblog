<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model {

    public $table = "inventory";

    public function category(){
        return $this->belongsTo('App\StockCategory', 'category_id');

    }
}