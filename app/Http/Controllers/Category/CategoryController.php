<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\AltCategoryFormRequest;
use App\Http\Requests\CategoryFormRequest;
use App\Models\AltCategory;
use App\Models\Category;
use App\Traits\CategoryTrait;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    use CategoryTrait;

    public function index()
    {
        $data = $this->listCategory();
        $categories = $data['categories'];
        $alt_categories = $data['altCategories'];
        return view('category.index', compact('categories', 'alt_categories'));
    }

    public function categoryStore(CategoryFormRequest $request)
    {

        $validatedData = $request->validated();
        $category = new Category();

        return  $this->storeCategory($validatedData, $category);
    }

    public function categoryDelete($category_id)
    {
        return   $this->deleteCategory($category_id);
    }

    public function categoryUpdate(CategoryFormRequest $request, $category_id)
    {

        $validatedData = $request->validated();
        $category = Category::where('id', $category_id)->first();

        return  $this->updateCategory($validatedData, $category);
    }


    public function  altcategoryUpdate(AltCategoryFormRequest $request, $altCategory_id)
    {

        $validatedData = $request->validated();
        $altCategory = AltCategory::where('id', $altCategory_id)->first();

        return  $this->updateAltCategory($validatedData, $altCategory);
    }



    public function altcategoryStore(AltCategoryFormRequest $request)
    {

        $validatedData = $request->validated();
        $altCategory = new AltCategory();

        return  $this->storeAltCategory($validatedData, $altCategory);
    }

    
    public function altcategoryDelete($altCategory_id)
    {
        return   $this->deleteAltCategory($altCategory_id);
    }
    
   
}
