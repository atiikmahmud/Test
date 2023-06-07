<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use Illuminate\Http\Request;
use App\Exports\EmployeeExprot;
use Excel;
use App\Imports\EmployeeImport;

class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('employee');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExprot, 'employeelist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new EmployeeExprot, 'employeelist.csv');
    }

    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file);
        return 'Record are imported successfully!';
    }
}
