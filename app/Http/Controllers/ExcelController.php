<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Imports\TransactionsImport;
use App\Models\School;
class ExcelController extends Controller
{
    public function importExportView()
    {
       return view('index');
    }

    public function importExcel(Request $request) 
    {
        
        \Excel::import(new TransactionsImport,$request->import_file);
        
       
        \Session::put('success', 'Your file is imported successfully in database.');
        School::create($request->all());
        return ('$request');
        return back();
    }
}
