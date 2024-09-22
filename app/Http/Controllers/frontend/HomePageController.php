<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Models\addproducts;
use App\Models\customerquery;
use App\Models\orderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
    public function index()
    {
        return view('frontend.homePage.index');
    }
    public function allProducts()
    {
        $datas = addproducts::get();
        // echo $datas;
        return view('frontend.allProducts.index', compact('datas'));
    }

    public function oysterMushroom()
    {
        $datas = addproducts::where('Category', 'Oyster Mushroom')->get();
        // echo $datas;
        return view('frontend.oysterMushroom.index', compact('datas'));
    }

    public function buttomMushroom()
    {
        $datas = addproducts::where('Category', 'Button Mushroom')->get();
        // echo $datas;
        return view('frontend.buttonMushroom.index', compact('datas'));
    }
    public function productDetails($id)
    {
        $datas = addproducts::find($id);
        return view('frontend.productDetails.index', compact('datas'));
    }
    public function orderPage($id)
    {
        $datas = addproducts::find($id);
        // echo $datas;

        return view('frontend.orderPage.index', compact('datas'));
        // return view('/orderPage/orderPage');
    }
    public function orderSave(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
            // 'productName' => 'required',
            // 'weight' => 'required',
            'packSize' => 'required',
        ]);
        $orderDetails = new orderDetails();
        $orderDetails->name = $request->name;
        $orderDetails->mobile = $request->mobile;
        $orderDetails->email = $request->email;
        $orderDetails->address = $request->address;
        $orderDetails->productName = $request->productName;
        $orderDetails->weight = $request->weight;
        $orderDetails->packSize = $request->packSize;
        $orderDetails->save();
        // return $orderDetails;
        return back();
    }
    public function customerquery(Request $request)
    {

        $validateData = $request->validate([
            'customerName' => 'required',
            'email' => 'required',
            'contactNo' => 'required',
            'websiteRating' => 'required',
            'customerComment' => 'required',
        ]);
        $customerquery = new customerquery();
        $customerquery->customerName = $request->customerName;
        $customerquery->email = $request->email;
        $customerquery->contactNo = $request->contactNo;
        $customerquery->websiteRating = $request->websiteRating;
        $customerquery->customerComment = $request->customerComment;

        $customerquery->save();
        $test =  Mail::to($request->email)->send(new Mailer($request->all()));
        dd($customerquery);
        // return $customerquery;
        return redirect('/');
    }
}
