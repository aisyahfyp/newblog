<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use App\ExpCategory;
use App\Expenses;
use Session;
//use Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    //use AuthenticatesUsers;

    public function dashboard (){
        // $chart = new LarapexChart();
        // $chart->setTitle('Users')->setXAxis(['Active', 'Guests'])->setDataset([100, 200]);
        $title = 'Utama';
    //     $data = DB::table('inventory')
    //    ->select(
    //     DB::raw('stock_category as category'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('stock_category')
    //     ->get();
    //  $array[] = ['Stock', 'Number'];
    //  foreach($data as $key => $value)
    //  {
    //   $array[++$key] = [$value->stock_category, $value->number];
    //  }
    //  return view('dashboard')->with('stock_category', json_encode($array));
        
        //return view('pages.index', compact('title'));
        return view('dashboard')->with('title', $title);
    }

    public function newDashboard(){
        return view ('layout.app');
    }

    public function testing(){
        return view ('layout.add');
    }

    public function expMonth(){
        return view ('layout.expByMonth');
    }

    public function salMonth(){
        return view ('layout.salByMonth');
    }

    public function pieChart() {
        $title = 'Utama';
        $data = Inventory::all();
        return view("dashboard", compact("data"));
    }

    public function index (){
        $title = 'Sistem Laporan';
        //return view('pages.index', compact('title'));
        return view('welcome')->with('title', $title);
    }

    public function login(Request $req){
        return $req->input();
    }

    public function expenses (){
        $title = 'Utama';
        //return view('pages.index', compact('title'));
        //$data = DB::table('expenses')->get();
        $expenses = Inventory::paginate(6);
        return view('expenses', ['data'=>$expenses]);
    }

    public function sales (){
        $title = 'Utama';
        //return view('pages.index', compact('title'));
        //$data = DB::table('sales')->get();
        $sales = Inventory::paginate(6);
        return view('sales', ['data'=>$sales]);
    }

    public function inventory (){
        $title = 'Utama';
        //return view('pages.index', compact('title'));
        $inventory = Inventory::paginate(6);
        //$data = DB::table('inventory')->get();
        return view('inventory', ['data'=>$inventory]);
        // return view('inventory')->with('title', $title);
    }

    public function addCategory(){
        $category=ExpCategory::all();
        return view('layout.addExp', compact('category'));
    }

    public function showAddSales(){
        return view('layout.addSales');
    }

    public function addExp(Request $request){
        $this->validate($request, array(
            'expenses_date'     =>  'required',
            'expcategory_id'    =>  'required',
            'expenses_amount'   =>  'required',
            'expenses_quantity' =>  'required',
            //'expenses_totalamount' => 'required',
        ));

        // $exp = Expenses::insert([
        //     'expenses_date'     =>  $request->expenses_date,
        //     'expcategory_id'    =>  $request->expcategory_id,
        //     'expenses_amount'   =>  $request->expenses_amount,
        //     'expenses_quantity' =>  $request->expenses_quantity,
        //     'expenses_totalamount' => setTotal(),
        // ]);   
        
        //$exp->save();
        
        // Session::flash('success', 'BERJAYA!');
        // return redirect('/testing');
        $exp = new Expenses();
        $exp->expenses_date = $request->input('expenses_date');
        $exp->expcategory_id = $request->input('expcategory_id');
        $exp->expenses_amount = $request->input('expenses_amount');
        $exp->expenses_quantity = $request->input('expenses_quantity');
        $exp->setExpTotal();
        $exp->save();
        return redirect('/expmonth-add')->with('success', 'Perbelanjaan Direkodkan!');
    }

    public function addSales(Request $request){
        $this->validate($request, array(
            'sales_date'     =>  'required',
            'sales_amount'   =>  'required',
            //'sales_totalamount' => 'required',
        ));

        $sales = new Sales();
        $sales->sales_date = $request->input('sales_date');
        $sales->sales_amount = $request->input('sales_amount');
        $exp->setSalTotal();
        $exp->save();
        return redirect('/salmonth-add')->with('success', 'Jualan Direkodkan!');
    }

}

     