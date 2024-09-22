<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\customerquery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerQueryController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = customerquery::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#edit-product" aria-controls="edit-product">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm delete-product">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.customerQueryView.index');
    }
}
