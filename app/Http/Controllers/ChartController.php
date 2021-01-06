<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use App\StockCategory;
use App\Expenses;
use App\Sales;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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
      // $sales = DB::table('sales')
      //   ->whereMonth('sales_date', '8')
      //   ->get()
      //   ->sum('sales_amount');

      // $expenses = DB::table('expenses')
      //   ->whereMonth('expenses_date', '8')
      //   ->get()
      //   ->sum('expenses_totalamount');
      //return response()->json($result);

      $expenses = Expenses::query()
      ->whereMonth('expenses_date', '8')
      ->where('expenses_totalamount')
      ->get();

     // $test = Sales::pluck( 'sales_totalamount', 'sales_date');
      //return $test->keys();
      //return $test->values();


      return view('layout.apptest', compact('expenses'));
    }

    public function testChart2(){
      $groups = Expenses::pluck('expenses_totalamount', 'expenses_date');
                
          // Generate random colours for the groups
          for ($i=0; $i<=count($groups); $i++) {
                      $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                  }
          // Prepare the data for returning with the view
          $chart = new LarapexChart;
                  $chart->labels = (array_keys($groups));
                  $chart->dataset = (array_values($groups));
                  $chart->colours = $colours;
          return view('layout.app', compact('chart'));
    }

    public function testChart3(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '8')
        ->where('expenses_totalamount')
        ->get();

      $chart = (new LarapexChart)->setTitle('Perbelanjaan Ogos')
                ->setSubtitle('Perbelanjaan')
                ->setType('bar')
                ->setXAxis(['Ogos'])
                ->setGrid(false)
                ->setDataset([
                  [
                    'name'  =>  'Active Users',
                    'data'  =>  []
                  ]
                ])
                  //Expenses::whereMonth('expenses_date', '=', '8'), Expenses::where('expenses_totalamount')]) 
                ->setStroke(1);
      return view('layout.app', compact('chart'));
    }

    public function testChart4(Request $request){
      $expensesMonth = Expenses::whereMonth('expenses_date','8')->get();
    	$exp_count = count($expensesMonth);    	
    	return view('layout.app', compact('exp_count'));
    }
}

