<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use App\StockCategory;
use App\Expenses;
use App\Sales;
use App\User;
use Carbon\Carbon;
use Auth;

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
      //   ->whereMonth('expenses_date', '8')
      //   ->get();

      // $sales = Sales::query()
      //   ->whereMonth('sales_date', '8')
      //   ->get();

      $sumExp["sum"] = Expenses::whereYear('expenses_date', '2021')->get()->sum("expenses_amount");
      // $results["sum"] = array (DB::table('expenses')
      //   ->select(DB::raw('SUM(expenses_totalamount) as total_expenses'))
      //   ->get()); 
      $sumSales["sum"] = Sales::whereYear('sales_date', '2021')->get()->sum("sales_amount");

      //$inventory = Inventory::all();

      $inventory = Inventory::query()
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

        //$data = Sales::whereMonth('sales_date', '8')->get()->sum("sales_amount");
        
        //dd($data);
        // $data = Expenses::query()
        // ->select([
        //    DB::raw('sum(expenses_totalamount) as expenses_total')
        //  ])
        //->whereMonth('expenses_date', '8')
        //  ->whereIn(DB::raw('MONTH(expenses_date)'), [1,2,3,4,5,6,7,8,9,10,11,12])
        //  ->get();  

        // $data = Expenses::whereYear('expenses_date', '=', 2020)
        // ->orWhere(function ($query) {
        //   $query->whereMonth('expenses_date', '=', 1)
        //       ->whereMonth('expenses_date', '=', 2)
        //       ->whereMonth('expenses_date', '=', 3)
        //       ->whereMonth('expenses_date', '=', 4)
        //       ->whereMonth('expenses_date', '=', 5)
        //       ->whereMonth('expenses_date', '=', 6)
        //       ->whereMonth('expenses_date', '=', 7)
        //       ->whereMonth('expenses_date', '=', 8)
        //       ->whereMonth('expenses_date', '=', 9)
        //       ->whereMonth('expenses_date', '=', 10)
        //       ->whereMonth('expenses_date', '=', 11)
        //       ->whereMonth('expenses_date', '=', 12);
        //     })
        //     ->select([DB::raw('sum(expenses_totalamount) as expenses_total')])
        //     ->get();
    
    $data = DB::table("expenses")
            ->whereDate('expenses_date', '>', Carbon::now()->subDays(30))
            ->get();
    
    $data2 = DB::table("sales")
            ->whereDate('sales_date', '>', Carbon::now()->subDays(30))
            ->get();
      // $data2 = Sales::query()
      //         ->select(DB::raw('MONTH(sales_date) as month_name'))
      //         ->whereMonth('sales_date', date('m'))
      //         ->groupBy('month_name')
      //         ->get()
      //         ->sum('sales_amount');

      $getMonth = [];
        foreach (range(1, 12) as $m) {
            $getMonth[] = date('m - F', mktime(0, 0, 0, $m, 1));
            $expenses = Expenses::query()
              ->whereMonth('expenses_date', $m )
              ->get();
        }
      //$username = Auth::user();
      // dd($user);
      // $user = User::all();
      return view('layout.app', compact('sumExp', 'sumSales', 'inventory', 'data2', 'data'));
    }

    public function testChart2(){
      $groups = Expenses::pluck('expenses_totalamount', 'expenses_date');
                
          return view('layout.app', compact('chart'));
    }

    public function googleLineChart()
    {
        $sample = Expenses::select(
                        DB::raw("MONTH(expenses_date) as year"),
                        DB::raw("SUM(expenses_totalamount) as total"))
                    ->orderBy(DB::raw("MONTH(expenses_date)"))
                    ->groupBy(DB::raw("MONTH(expenses_date)"))
                    ->get();
  
        $result[] = ['Month','Expenses'];
        foreach ($sample as $key => $value) {
            $result[++$key] = [$value->month, (int)$value->total];
        }
  
        return view('layout.app2')
                ->with('sample',json_encode($result));
    }

    
}

