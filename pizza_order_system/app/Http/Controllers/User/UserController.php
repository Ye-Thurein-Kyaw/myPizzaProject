<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // user home page
    public function home(){
        $product = Product::orderBy('created_at','desc')->get();
        $category = Category::get();
        return view('user.main.home',compact('product','category'));
    }

    // direct User Password Change Page
    public function changePasswordPage(){
        return view('user.password.change');
    }

    // password change
    public function changePassword(Request $request){
        $this->passwordValidatorCheck($request);

        $currentUserid = Auth::user()->id;

        $user = User::select('password')->where('id', $currentUserid)->first();
  // ဒီမာ passwordမပေးဘူးဆိုရင် user model ထဲက  hidden မှာ  password ကို ဖြုတ်

        $dbHashPassword = $user->password;

        if(Hash::check($request->oldPassword, $dbHashPassword)){
            $data = ['password' => Hash::make($request->newPassword)];

            User::where('id', $currentUserid)->update($data);

            Auth::logout();
            // ဒီလိုရေးလို့မရဘူးဆိုရင် web.php မှာ authနောက်ကဟာကို ဖြုတ်
            return redirect()->route('auth#loginPage')->with(['changeSuccess' => 'Login again with new Password']);
        }

        return back()->with(['updateFail' => 'Old password is incorrect.']);
    }

    private function passwordValidatorCheck($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ],[
            'oldPassword.required' => 'စကားဝှက် ကို ထည့်ပါ',
            'newPassword.required' => 'စကားဝှက် အသစ် ကို ထည့်ပါ',
            'confirmPassword.required' => 'စကားဝှက် အသစ် ကို ထပ်ထည့်ပါ',

        ])->validate();
    }

    // user Account Change
    public function accountChangePage(){
        return view('user.profile.account');
    }

    // edit Account
    public function accountChange($id, Request $request){
        $this->accountValidatorCheck($request);
        $data = $this->getUserData($request);

        // image
        if($request->hasFile('image')){
            $dbImage = User::where('id', $id)->first();
            $dbImage =$dbImage->image;

            if($dbImage != null){
                Storage::delete(['public', $dbImage]);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }

        User::where('id', $id)->update($data);
        return back()->with(['updateSuccess' => 'Account Updated']);
    }

     // accout Validator Check
     private function accountValidatorCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg, jpeg, webp| file',
            'gender' => 'required',
            'address' => 'required',
        ])->validate();
    }

    // get user data
    private function getUserData($request){
        return [
            'name' =>$request->name ,
            'email' => $request->email ,
            'phone' => $request->phone ,
            'gender' => $request->gender ,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ];

    }
}
