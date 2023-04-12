<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Models\AltCategory;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

trait CategoryTrait
{

    public function redirectToCategory($categoryResult)
    {
        if ($categoryResult) {

            return redirect()->route('index.category')->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        
        } else {

            return redirect()->route('index.category')->with('failed', 'Maalesef Başarısız');
        
        }
    }

   
    public function listCategory()
    {
        $categories = Category::get();
        $altCategories = AltCategory::get();
        return (['categories'=>$categories,'altCategories'=>$altCategories ]);
    }


    public function deleteCategory($category_id)
    {
        $category = Category::where('id', $category_id)->first();

        $deletedcategory = $category->delete();
        
        return  $this->redirectToCategory($deletedcategory);

      
    }


    public function storeCategory($validatedData, $category)
    {
        $category->name =$validatedData['name'];

        $categoryResult = $category->save();

        return   $this->redirectToCategory($categoryResult);
    }


    public function updateCategory($validatedData, $category)
    {
        $categoryResult = $category->update([
            'name'=>$validatedData['name'],
        ]);

        return   $this->redirectToCategory($categoryResult);
    }


    public function updateAltCategory($validatedData, $altCategory)
    {
        $altCategoryResult = $altCategory->update([
            'name'=>$validatedData['name'],
            'category_id'=>$validatedData['category_id'],
        ]);

        return   $this->redirectToCategory($altCategoryResult);
    }


    public function storeAltCategory($validatedData, $altCategory)
    {
        $altCategory->name =$validatedData['name'];
        $altCategory->category_id = $validatedData['category_id'];
        
        $altCategoryResult = $altCategory->save();

        return   $this->redirectToCategory($altCategoryResult);
    }




    public function deleteAltCategory($altCategory_id)
    {
        $altCategory = AltCategory::where('id', $altCategory_id)->first();

        $deletedAltCategory = $altCategory->delete();
        
        return  $this->redirectToCategory($deletedAltCategory);

      
    }







}
