<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\User;
use App\Models\onBoardProperties;
class expensesModel extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'propertyID',
      'ownerID',
      'expenses_type',
      'date',
      'amount',
      'Expense_Description',
      'file_name',
      'file_path'
    ];
    public function Owner()
    {
        return $this->hasOne(User::class,'id','ownerID');
    }
    public function propertyName()
    {
        return $this->hasOne(onBoardProperties::class,'id','propertyID');
    }
}
