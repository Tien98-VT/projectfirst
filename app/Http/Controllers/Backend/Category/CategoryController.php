<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('backend.category.category', compact('categories'));
    }
    public function store(AddCategoryRequest $request){
       $category = new Category;

       $category->name = $request->name;
       $category->parent_id = $request->parent_id;
       $category->slug = Str::slug($request->name,'-');

       $category->save();

       return redirect()->back()->with('success','Thêm danh mục thành công');
    }
    public function edit($id){
        $categories = Category::all();
        $category = Category::find($id);
        return view('backend.category.editcategory', compact('categories','category'));
    }
    public function update(EditCategoryRequest $request, $id){
        $category= Category::find($id);

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($request->name,'-');

        $category->save();

        return redirect()->back()->with('success','Đã sửa danh mục thành công');
    }

    public function delete($id){
        $category= Category::find($id);
        $categories = Category::all();
        foreach ($categories as $key => $value) {
            if($value['parent_id']== $id){
                $value->delete();
            }
        }
        $category->delete();
        return redirect()->back()->with('success','Đã xóa danh mục thành công');
    }
}
