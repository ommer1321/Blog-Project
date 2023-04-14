<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAndAltCategory extends Model
{
    use HasFactory;
    protected $table = 'task_and_altcategories';
    protected $fillable = ['task_id','task_uuid', 'category_id', 'altcategory_id'];


    public function tasks()
    {
        return  $this->belongsTo(Task::class, 'task_id', "id");
    }

}


