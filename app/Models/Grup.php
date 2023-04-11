<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Grup extends Model
{
    use HasFactory;
    protected $table = 'grups';
    protected $fillable = ['teacher_id', 'grup_id', 'status', 'branch','name','details'];

    







    // Set Functions

    public function setBranchAttribute($value)
    {

        $this->attributes['branch']  =  Str::title($value);
    }

    public function setNameAttribute($value)
    {

        $this->attributes['name']  = Str::title($value);
    }

    public function setDetailsAttribute($value)
    {

        $this->attributes['details']  = Str::ucfirst($value);
    }


}
