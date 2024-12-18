<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaImportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls,csv',
        // ]);
        // Excel::import(new SiswaImport, $request->file('file'));
    }
}