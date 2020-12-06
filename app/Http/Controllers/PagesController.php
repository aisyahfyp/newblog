<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inventory;
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

    public function testing(){
        return view ('layout.app');
    }

    public function testingexp(){
        return view ('layout.2expensesMonth');
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
}

     