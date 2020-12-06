<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use App\StockCategory;
use App\Expenses;
use App\Sales;

//use DB;

class ChartController extends Controller
{
    function index()
    {
     $data = Inventory::query()
       ->select([
         'stock_category.category_name',
         'stock_category.category_id',
         'inventory.stock_quantity',
          DB::raw('sum(stock_quantity) as stock_quantity')
        ])
        //->sum('stock_quantity')
        ->leftJoin('stock_category', 'inventory.category_id', '=', 'stock_category.category_id')
        ->groupBy('stock_category.category_name')
        ->get();
        //DB::raw('stock_quantity as stock_quantity'),
        //DB::raw('count(*) as number'))
        //->groupBy('stock_quantity')
        //->get();
     $array[] = ['Kategori', 'Kuantiti'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->category_name, $value->stock_quantity];
     }
     //tukar sini
     return view('dashboard')->with('stock_quantity', json_encode($array));
    }

    public function barChart(){
      //$query1 = Expenses::query()
      $expenses = Expenses::query()
      ->select('expenses.expenses_totalamount')
      ->sum('expenses_totalamount');
      
      //$query2 = Sales::query()
      $sales = Sales::query()
      ->select('sales.sales_totalamount')
      ->sum('sales_totalamount')
      ->join($expenses)
      ->get();
      
      $array[] = ['Kategori', 'Kuantiti'];
      foreach($sales as $key => $value)
        {
      $array[++$key] = [$value->sales_totalamount, $value->expenses_totalamount];
        }
      //$unionQuery=$query1->union($query2)->get();

      return view('testingbar')->with('sales_totalamount', json_encode($array));

    }

    public function testChart(){

      // $expenses = Expenses::query()
      // ->select('expenses.expenses_totalamount')
      // ->sum('expenses_totalamount');
      
      
      //$query2 = Sales::query()
      // $sales = Sales::query()
      // ->select('sales.sales_totalamount')
      // ->sum('sales_totalamount')
      //->union($expenses)
      //->get();

      //$sales = Sales::all();
      //$expenses = Expenses::all();
      $sales = Sales::query()
        ->whereMonth('sales_date', '8')
        ->get();
        
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '8')
        ->get();

      return view("dashboard", compact("sales", "expenses"));
    }

}

