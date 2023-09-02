<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


class OpportunityAttachment extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $guarded = [];
    protected $translatable = [
        'name',
        'file',
    ];
    protected $touches = ['opportunity',];

    public function fileUrl(): Attribute
    {
        $file = (App::getLocale() == 'en') ? $this->file_en : $this->file_ar;
        return Attribute::get(fn () => $file ? Storage::url($file) : null);
    }
    public function getCreatedAtAttribute($createdAt)
    {
        $date = Carbon::parse($createdAt);
        return $date->isoFormat('dddd D MMMM | h:mm A');
    }

    // relations
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
