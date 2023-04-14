<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAndCategory extends Model
{
    use HasFactory;
    protected $table = 'task_and_categories';
    protected $fillable = ['task_id','task_uuid', 'category_id'];
    
    public function tasks()
    {
        return  $this->belongsTo(Task::class, 'task_id', "id");
    }


}
