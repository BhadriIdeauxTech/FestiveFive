<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotationproduct extends Model
{
    use HasFactory;
    protected $fillable = ['quotationlists_id', 'product_image', 'product_name'];

    public function quotationList()
    {
        return $this->belongsTo(quotationlist::class, 'quotationlists_id');
    }
}
