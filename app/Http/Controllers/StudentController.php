<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class StudentController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getStudents(Request $request)
    {
        if($request->ajax()){
            $data = Student::latest()->get();
            return FacadesDataTables::of($data)->addIndexColumn()->addColumn('action', function($row){
                $btnAction = "<a href='#' class='btn btn-success mr-2'>Edit</a>" . "<a href='#' class='btn btn-danger'>Delete</a>";
                return $btnAction;
            })->rawColumns(['action'])->make(true);


        }
    }

}

//  ->addColumn('action', function($row){
//                     $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
//                     return $actionBtn;
//                 })



    //    if ($request->ajax()) {
    //         $data = Student::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //            ->addColumn('action', function($row){
    //             $btnAction = '<a href="javascript:void" class="btn btn-success">Edit</a>'. '<a href="javascript:void" class="btn btn-danger ml-2">Delete</a>';
    //             return $btnAction;
    //            })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    // }
