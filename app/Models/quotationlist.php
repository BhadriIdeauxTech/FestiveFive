<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotationlist extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'company_name', 'phone', 'email', 'message'];

    public function quotationProducts()
    {
        return $this->hasMany(quotationproduct::class, 'quotationlists_id');
    }
}
