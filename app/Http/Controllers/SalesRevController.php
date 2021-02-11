<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Expenses;
use App\Sales;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
//use Auth;

class SalesRevController extends Controller
{
    public function showSales(){
      $sales = Sales::paginate(20);
      return view('sales', compact('sales'));
    }

    public function showExpenses(){
        $expenses = Expenses::paginate(20);
        // $expenses["sum"] = Expenses::get()->sum("total");
        // ->select(DB::raw("SUM(expenses_totalamount) as expenses_totalamount"))
        // ->get();
        
        return view('layout.2expensesMonth', [
          'expenses' => $expenses,
          'expenses_totalamount' => $expenses->sum('expenses_totalamount')
        ]);
      }

///////SHOW BY MONTH///////////////////////////////////////////////////////////////////

public function showExpByMonth(){
  $title = 'Bulanan';
  return view('layout.expByMonth')->with('title', $title);
  }

public function showSalByMonth(){
  $title = 'Bulanan';
  return view('layout.salByMonth')->with('title', $title);
  }
  

///////////EXPENSES BY MONTH///////////////////////////////////////////////////////////

public function showJanExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '1')
        ->get();
      // return view('expensesMonth', compact('expenses'));

      // if($expenses){
      //   echo "--Tiada perbelanjaan untuk dipaparkan--";
      // }

        // if (!$expenses) {
        //   return redirect('/expsalmonth');
        // }
      $sumExp["sum"] = Expenses::whereMonth('expenses_date', '1')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");
      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }
      

public function showFebExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '2')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '2')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showMarExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '3')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '3')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");
      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showAprExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '4')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '4')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showMayExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '5')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '5')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showJuneExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '6')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '6')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showJulyExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '7')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '7')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showAugExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '8')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '8')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      
      if(!$expenses){
        echo "--Tiada perbelanjaan untuk dipaparkan--";
      }
      
    }

public function showSeptExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '9')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '9')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");
      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showOctExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '10')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '10')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showNovExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '11')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '11')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }

public function showDecExpenses(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '12')
        ->get();
        $sumExp["sum"] = Expenses::whereMonth('expenses_date', '12')->whereYear('expenses_date', '2021')->get()->sum("expenses_amount");      return view('layout.expMonth', compact('expenses', 'sumExp'));
      }



//////////////SALES BY MONTH//////////////////////////////////////////////////////////

public function showJanSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '1')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '1')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showFebSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '2')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '2')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showMarSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '3')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '3')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showAprSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '4')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '4')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showMaySales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '5')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '5')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showJuneSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '6')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '6')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showJulySales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '7')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '7')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showAugSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '8')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '8')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showSeptSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '9')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '9')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showOctSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '10')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '10')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showNovSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '11')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '11')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }

public function showDecSales(){
      $sales = Sales::query()
        ->whereMonth('sales_date', '12')
        ->get();
      $sumSales["sum"] = Sales::whereMonth('sales_date', '12')->get()->sum("sales_amount");
      return view('layout.salMonth', compact('sales', 'sumSales'));
      }


///////////////////////////// PDF SALES /////////////////////////////////////////////////////////
    public function createPDFSales() {
      // retreive all records from db
      $sales = Sales::all();

      // share data to view
      view()->share('sales',$sales);
      $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);

      // download PDF file with download method
      return $pdf->stream('sales.pdf');

      // return $pdf->download('pdf_file.pdf');
      // $pdf = PDF::loadView('email.sample', $data)->setPaper('letter', 'landscape')->save(public_path($path));
      //   return $pdf->stream("Halloa.pdf");
    }

    public function salJanPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '1')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salFebPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '2')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salMarPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '3')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salAprPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '4')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salMayPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '5')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salJunePDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '6')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salJulyPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '7')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salAugPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '8')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salSeptPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '9')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salOctPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '10')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salNovPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '11')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }

    public function salDecPDF() {
      $sales = Sales::query()
        ->whereMonth('sales_date', '12')
        ->get();        
        view()->share('sales',$sales);
        $pdf = PDF::loadView('pdf-sales.pdf_viewSales', $sales);
      return $pdf->stream('sales.pdf');
    }


//////////////////////////////// PDF EXPENSES //////////////////////////////////////////////////////

  public function createPDFExpenses() {
    // retreive all records from db
    $expenses = Expenses::all();

    // share data to view
    view()->share('expenses',$expenses);
    $pdf = PDF::loadView('pdf_viewExp', $expenses);

    // download PDF file with download method
    return $pdf->stream('expenses.pdf');

    // return $pdf->download('pdf_file.pdf');
    // $pdf = PDF::loadView('email.sample', $data)->setPaper('letter', 'landscape')->save(public_path($path));
    //   return $pdf->stream("Halloa.pdf");
  }

    public function expJanPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '1')
        ->get(); // model or null

        // if (!$expenses) {
        //   return redirect('/testing');
        // }
      //$month = 'Januari';
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }
    
    public function expFebPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '2')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expMarPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '3')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expAprPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '4')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expMayPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '5')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expJunePdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '6')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expJulyPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '7')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expAugPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '8')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expSeptPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '9')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expOctPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '10')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expNovPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '11')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

    public function expDecPdf(){
      $expenses = Expenses::query()
        ->whereMonth('expenses_date', '12')
        ->get(); // model or null

        if (!$expenses) {
          return redirect('/testing');
        }
        view()->share('expenses',$expenses);
        $pdf = PDF::loadView('pdf-exp.pdf_viewExp', $expenses);
      
        return $pdf->stream('expenses.pdf');
    }

/////////////////////////////// CATEGORY //////////////////////////////////////////////////////////////



////////////////////////////// TESTING ////////////////////////////////////////////////////////////

public function testAugExpenses(){
  $expenses = Expenses::query()
    ->whereMonth('expenses_date', '8')
    ->get();
  return view('layout.expMonth', compact('expenses'));
  }

public function expByYear(){
  $expenses = DB::select('select year(expenses_date) as year, month(expenses_date) as month, sum(expenses_amount) as total_amount from expenses where year(expenses_date)=2020 group by year(expenses_date), month(expenses_date)');
  $expenses2 = DB::select('select expcategory_id as id, sum(expenses_amount) as total_amount from expenses where year(expenses_date)=2020 group by expcategory_id');
  view()->share('expenses', 'expenses2',$expenses, $expenses2);
  $pdf = PDF::loadView('pdf-exp.pdf_viewMonthExp', compact('expenses', 'expenses2'));
  return $pdf->stream('expensesMonth.pdf');
  }

  public function salesByYear(){
    $sales = DB::select('select year(sales_date) as year, month(sales_date) as month, sum(sales_amount) as total_amount from sales where year(sales_date)=2020 group by year(sales_date), month(sales_date)');
    //return view('total_amount',['expenses'=>$expenses]);
    view()->share('sales',$sales);
    $pdf = PDF::loadView('pdf-sales.pdf_viewMonthSales', $sales);
    return $pdf->stream('salesMonth.pdf');
    }

}