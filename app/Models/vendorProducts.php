<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
class vendorProducts extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
       'vendorID','ProductName','description','categoryID','price','Quantity_Available','minimum_order_quantity','SKU','Vendor_SKU','lead_time','manufacturer'
    ];
}
