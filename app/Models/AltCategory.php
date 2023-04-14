<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AltCategory extends Model
{
    use HasFactory;

    protected $table = 'alt_categories';
    protected $fillable = ['name','category_id'];

    public function setNameAttribute($value)
    {

        $this->attributes['name']  = Str::title($value);
    }

    // public function category()
    // {
    //     return  $this->belongsTo(TaskAndCategory::class, 'category_id', "id");
    // }

}
