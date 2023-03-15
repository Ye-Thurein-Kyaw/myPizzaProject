<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{

    // direct password Change page
   public function changePasswordPage(){
    return view('admin.account.changePassword');
   }

    //    Password Change
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


    // direct account Profile Page
    public function accountProfile(){
        return view('admin.account.profile');
    }

    // direct profile edit
    public function edit (){
        return view('admin.account.edit');
    }

    // profile update
    public function update($id,Request $request){
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
        return redirect()->route('admin#accountProfile')->with(['updateSuccess' => 'Admin Account Updated']);
    }

    // accout Validator Check
    private function accountValidatorCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp| file',
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

    // driect Admin list page
    public function list(){
        $admin = User::when(request('key'), function($query){
                    $query->orWhere('name','like','%'.request('key').'%')
                          ->orWhere('email','like','%'.request('key').'%')
                          ->orWhere('phone','like','%'.request('key').'%')
                          ->orWhere('address','like','%'.request('key').'%');
                })
                ->where('role', 'admin')->paginate();
                // $admin->appends(request()->all());
        return view('admin.account.adminList', compact('admin'));
    }

    // admin acc deleteing
    public function deleteAcc($id){
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Delete Success']);
    }

    //Direct Role Change
    public function changeRole($id){
        $account = User::where('id', $id)->first();
        return view('admin.account.changeRole', compact('account'));
    }

    // Role Changing
    public function roleChange($id, Request $request){
        $data = $this->requestUserData($request);
        User::where('id', $id)->update($data);
        return redirect()->route('admin#list');
    }
    // requestUserData
    private function requestUserData($request){
        return [
            'role' => $request->role
        ];
    }

}
