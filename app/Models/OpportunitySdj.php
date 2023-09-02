<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OpportunitySdj extends Model
{
    use HasFactory;



    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
    public function sdj()
    {
        return $this->belongsTo(Sdj::class);
    }
}
