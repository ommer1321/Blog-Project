<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use App\Models\TaskAndAltCategory;
use App\Traits\CategoryTrait;
use App\Traits\TaskTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  use TaskTrait, CategoryTrait;

  public function index(Request $request)
  {
 
   
    $categories_and_altcategories = $this->listCategory();
    
    $categories = $categories_and_altcategories['categories'];
    
    $altCategories = $categories_and_altcategories['altCategories'];

    $taskList = $this->listTask($request);
    return view('task.index', compact('taskList','categories','altCategories'));
  }



  public function detail($task_id)
  {

    $categories_and_altcategories = $this->listCategory();
    $categories = $categories_and_altcategories['categories'];
    $altCategories = $categories_and_altcategories['altCategories'];
    $taskAndCategories = $this->getTaskAndCategories($task_id);
    $taskAndAltCategories = $this->getTaskAndAltCategories($task_id);

    $task = $this->getTask($task_id);

    return view('task.details', compact('task', 'categories', 'altCategories', 'taskAndCategories','taskAndAltCategories'));
  }




  public function update(TaskFormRequest $request, $task_id)
  {
   
     $validatedData =  $request->validated();
    
    $task = $this->getTask($task_id);

    return $this->updateTask($validatedData, $task);
  }





  public function store(TaskFormRequest $request)
  {
 
    $validatedData =  $request->validated();
    $task =  new Task();
    return $this->storeTask($validatedData, $task);
  }


  public function delete($task_id)
  {
    return  $this->deleteTask($task_id);
    //    $this->formControlTask($request,$task,$task_id);
  }


  public function test()
  {
  }
}
