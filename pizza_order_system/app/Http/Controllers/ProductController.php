<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct Product list page
    public function list(){
        $pizzas = Product::select('products.*','categories.name as category_name')
                    ->leftJoin('categories', 'products.category_id', 'categories.id')
                    ->when(request('key'), function($query){
                        $query->where('products.name','like','%'.request('key').'%');
                    })
                    ->orderBy('products.created_at','desc')
                    ->paginate(3);
                    // dd($pizzas->toArray());

        return view('admin.product.productList', compact('pizzas'));
    }

    // product create
    public function createPage(){
        $categories = Category::select('id','name')->get();
        // dd($categories->toArray());
        return view('admin.product.createProduct', compact('categories'));
    }

    // Create Product
    public function create(Request $request){
        $this->productValidationCheck($request, "create");
        $data = $this->requestProductInfo($request);


            $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
           $request->file('productImage')->storeAs('public', $fileName);
           $data['image'] = $fileName;

        Product::create($data);
        return redirect()->route('product#list')->with(['createSuccess'=>'Category Created..']);
    }



    // product Delete
    public function delete($id){
        Product::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Category Deleted..']);
    }

    // direct product Details Page
    public function details($id){
        $product = Product::select('products.*','categories.name as category_name')
                            ->leftJoin('categories', 'products.category_id', 'categories.id')
                            ->where('products.id', $id)->first();
        return view('admin.product.productDetails', compact('product'));
    }

    // direct Edit Page
    public function edit($id){
        $product = Product::where('id', $id)->first();
        $category = Category::get();
        return view('admin.product.editProduct',compact('product','category'));
    }

    // product update
    public function update(Request $request){
        $this->productValidationCheck($request, "update");
        $data = $this->requestProductInfo($request);

        if($request->hasFile('productImage')){
            $oldImageName = Product::where('id', $request->productId)->first();
            $oldImageName = $oldImageName->image;

            if($oldImageName != null){
                Storage::delete('public/'.$oldImageName);
            }
            $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }

        Product::where('id',$request->productId)->update($data);
        return redirect()->route('product#list');

    }

    // product validator check
    private function productValidationCheck($request, $action){
        $validationRules = [
            'productName' => 'required|unique:products,name,'.$request->productId,
            'productCategory' => 'required',
            'productDescription' => 'required',
            'productPrice' => 'required',
            'waitingTime' => 'required',
        ];
        // .$request->productId ဆိုတာက သူကိုယ်သူတော့ရမယ် လို့ဆိုလိုတာ
        $validationRules['productImage'] = $action == "create" ? "required|mimes:jpg,jpeg,png,webp|file" : "mimes:jpg,jpeg,png,webp|file";
        // ဒါက create ပေးထားတဲ့ action မှာမျှဘဲ့ required တောင်းမယ်ဆိုတဲ့ပုံစံ
        Validator::make($request->all(),$validationRules)->validate();
    }

    // request Product Info
    private function requestProductInfo($request){
        return [
            'category_id' => $request->productCategory,
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
            'waiting_time' => $request->waitingTime,
        ];
    }
}
