<?php

namespace App\Http\Controllers\Backend\excel;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UsersImport,$file);

        return back()->with('success','đã tải lên thành công');
    }
}
