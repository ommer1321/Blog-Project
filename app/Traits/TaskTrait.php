<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Models\AltCategory;
use App\Models\Task;
use App\Models\TaskAndAltCategory;
use App\Models\TaskAndCategory;
use Illuminate\Support\Facades\Auth;

trait TaskTrait
{


    public function redirectBackTask($taskResult)
    {
        if ($taskResult) {
            return redirect()->back()->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {
            return redirect()->back()->with('failed', 'Maalesef Başarısız');
        }
    }


    public function redirectToTasks($taskResult)
    {
        if ($taskResult) {

            return redirect()->route('index.task')->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {

            return redirect()->route('index.task')->with('failed', 'Maalesef Başarısız');
        }
    }
    public function allTask()
    {
        $tasks = Task::OrderBy('finished_at', 'asc')->get();

        return ($tasks);
    }


    public function listTask($request)
    {


        $tasks = TaskAndAltCategory::when($request == null, function ($q) use ($request) {

            return $q->all();
        })->when($request->category != null, function ($q) use ($request) {

            return $q->where('category_id', $request->category);
        })->when($request->altcategory != null, function ($q) use ($request) {

            return $q->where('altcategory_id', $request->altcategory);
        })->get();

        foreach ($tasks as $key => $value) {

            $task_array[] = Task::where('task_id', $value->task_uuid)->first();
        }
        if (isset($task_array)) {
            $a = array_unique($task_array);
            return ($a);
        } else {
            return array();
        }

        //Eğer Burayı okuyorsanız burada yapmış olduğum mantık hatasını düzeltmek için biraz kod karmaşası oluştu  







    }

    public function getTask($task_id)
    {
        return  $task = Task::where('task_id', $task_id)->first();
    }



    public function resultCheck($functionResult)
    {

        return $functionResult;
    }


    public function updateTask($validatedData, $task)
    {

        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

        $taskResult = $task->update([
            'title' => $validatedData['title'],
            'note' => $validatedData['note'],
            'status' => $validatedData['status'],
            'finished_at' => $validatedData['finished_at'],

        ]);

        // KATEGORİ İSLEMLERİ
        if (isset($validatedData['category'])) {
            $categories = $validatedData['category'];
        } else {
            $categories = array();
        }
        // KATEGORİ İSLEMLERİ
        if (isset($validatedData['altcategory'])) {
            $altcategories = $validatedData['altcategory'];
            $categories = $validatedData['category'];
        } else {
            $altcategories = array();
        }

        $task_uuid  = $task->task_id;
        $task_id =  $task->id;

        $this->restoreCategory($categories, $task_id, $task_uuid);
        $this->restoreAltCategory($altcategories, $task_id, $task_uuid);
        return   $this->redirectBackTask($taskResult);
    }

    public function reDeleteCategory($task_id)
    {

        $deleteCategory = TaskAndCategory::where('task_id', $task_id)->get();

        if ($deleteCategory) {
            foreach ($deleteCategory as   $deleteCategory_item)
                $deleteCategory_item->delete();
        }
    }

    public function reDeletealtCategory($task_id)
    {

        $deleteAltCategory = TaskAndAltCategory::where('task_id', $task_id)->get();

        if ($deleteAltCategory) {
            foreach ($deleteAltCategory as   $deleteAltCategory_item)
                $deleteAltCategory_item->delete();
        }
    }

    public function restoreCategory($categories, $task_id, $task_uuid)
    {

        $this->reDeleteCategory($task_id);

        foreach ($categories as $category_id) {

            $TaskAndCategory = new TaskAndCategory();


            $TaskAndCategory->category_id = $category_id;
            $TaskAndCategory->task_id = $task_id;
            $TaskAndCategory->task_uuid = $task_uuid;
            $TaskAndCategory->save();
        }
    }

    public function restoreAltCategory($altcategories, $task_id, $task_uuid)
    {

        $this->reDeletealtCategory($task_id);

        foreach ($altcategories as $altcategory_id) {

            $altCategory = AltCategory::where('id', $altcategory_id)->first();

            $TaskAndAltCategory = new TaskAndAltCategory();


            $TaskAndAltCategory->altcategory_id = $altcategory_id;
            $TaskAndAltCategory->task_id = $task_id;
            $TaskAndAltCategory->task_uuid = $task_uuid;
            $TaskAndAltCategory->category_id =  $altCategory->category_id;
            $TaskAndAltCategory->save();
        }
    }


    public function storeTask($validatedData, $task)
    {
        $task->admin_id = Auth::user()->id;
        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

        $taskResult = $task->save();

        return   $this->redirectBackTask($taskResult);
    }


    public function deleteTask($task_id)
    {
        $task = Task::where('task_id', $task_id)->first();

        $deletedTask = $task->delete();

        return  $this->redirectToTasks($deletedTask);
    }


    public function formControlTask(TaskFormRequest $validatedData, $task, $task_id)
    {
        if ($validatedData->has('deleteTaskButton')) {

            return $this->deleteTask($task_id);
        } elseif ($validatedData->has('updateTaskButton')) {

            return $this->updateTask($validatedData, $task);
        }
    }
}
