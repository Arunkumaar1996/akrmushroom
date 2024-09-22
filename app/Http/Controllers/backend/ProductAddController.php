<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\addproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class ProductAddController extends Controller
{
    public function index(Request $request){
        if($request->ajax())
        {
            $data = addproducts::latest()->get();
            // dd($data);
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#edit-product" aria-controls="edit-product">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm delete-product">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       return view('backend.products_list.index');
    }

}
