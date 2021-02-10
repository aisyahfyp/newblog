<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Inventory;
use PDF;
use App\StockCategory;
use Illuminate\Support\Facades\DB;
//use Auth;

class InventoryController extends Controller
{
    public function showInventory(){
      $inventory = Inventory::paginate(20);
      //$inventory = Inventory::all();
      return view('layout.2Inventory', compact('inventory'));
    }

    public function showMonthInventory(){

      $inventory = DB::table('inventory', 'stock_category')
      ->select([
        'stock_category.category_name',
        'inventory.stock_category',
       ])
       //->sum('stock_quantity')
       ->join('stock_category', 'inventory.stock_category', '=', 'stock_category.category_id')
      //  ->groupBy('stock_category.category_name')
       ->get();
        
      return view('expensesMonth', compact('inventory'));
      }



    public function createPDFInv() {
      // retreive all records from db
      //$inventory = Inventory::all();
      $inventory = DB::table('stock_category')
      ->select('stock_category.category_id','stock_category.category_name')
      ->join('inventory','inventory.category_id','=','stock_category.category_id')
      ->get();

      dd($inventory);
      //$inventory = Inventory::all()->groupBy('category_id');   
       
      // share data to view
      view()->share('inventory',$inventory);
      $pdf = PDF::loadView('pdf_view', $inventory);

      // download PDF file with download method
      return $pdf->stream('inventory.pdf');

      // return $pdf->download('pdf_file.pdf');
      // $pdf = PDF::loadView('email.sample', $data)->setPaper('letter', 'landscape')->save(public_path($path));
      //   return $pdf->stream("Halloa.pdf");
    }

}