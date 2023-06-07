<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;

class EmpController extends Controller
{
    public function getAllEmployee()
    {
        $employees = Employee::all();
        return view('employees', compact('employees'));
    }

    public function downloadPDF()
    {
        $employees = Employee::all();
        $pdf = PDF::loadView('employees',compact('employees'));
        return $pdf->download('employee.pdf');
    }
}
