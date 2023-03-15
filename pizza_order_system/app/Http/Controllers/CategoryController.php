<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    //category list direct page
    public function list(){
        $categories = Category::when(request('key'), function($query){
                            $query->where('name','like','%'. request('key') .'%');
                         })
                            ->orderBy('id', 'desc')
                            ->paginate(4);
            // $categories->appends(request()->all()); //ဒါက ui ဖက်က link က appends မလုပ်ထားရင် ဆာဗာဖက် က လုပ်ပေးရတယ်
        return view('admin.category.list', compact('categories'));
    }

    // direct category create page
    public function createPage(){
        return view('admin.category.create');
    }

    // category creating
    public function create( Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        Category::create($data);
        return redirect()->route('category#list')->with(['createSuccess'=>'Category Created..']);
    }




    // Direct Category Delete page
    public function delete($id){
       Category::where('id', $id)->delete();
       return back()->with(['deleteSuccess'=>'Category Deleted..']);
    }

    // Edit Direct page
    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit', compact('category'));
    }

    // update page
    public function update( Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        Category::where('id', $request->categoryId)->update($data);
        return redirect()->route('category#list');
    }

    // create category validation
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' => 'required|unique:categories,name,'.$request->categoryId
        ])->validate();
    }
    // request category data
    private function requestCategoryData($request){
        return[
            'name' => $request->categoryName
        ];
    }
}
