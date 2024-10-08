<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    use HasFactory;
    protected $table="order_details";
    protected $fillable=['name','mobile','email','address','productName','weight','packSize'];
}
