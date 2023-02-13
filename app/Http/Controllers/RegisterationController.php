<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registeration;
class RegisterationController extends Controller
{
    // Registeration Customer
    public function index(){
        $title = "Registration Customer";
        $url = url("/register");
        $data = compact('title','url');
        return view('form')->with($data);
    }

    // public function show(Request $request){
    //     $search = $request['search'] ?? "";
    //     if($search !=""){
    //         $customers = Registeration::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->get();
    //     }
    //     else{
    //         $customers = Registeration::all();
    //     }
    //     $data = compact('customers','search');
    //     return view('customer-view')->with($data);
    // }

    // Trash
    public function trash(Request $request){
        // echo "<pre>";
        $searchi = $request['searchi'];
        if($searchi !=""){
            $customers = Registeration::where('name','LIKE',"%$searchi%")->orWhere('email','LIKE',"%$searchi%")->get();
        }
        else{
            $customers = Registeration::onlyTrashed()->get();
        }
        $data = compact('customers','searchi');
        return view('customer_trash')->with($data);

    }
    // Restore
    public function restore($id){
        $customers_restore = Registeration::withTrashed()->find($id);
        if(!is_null($customers_restore)){
            $customers_restore->restore();
        }
        return redirect()->back();
    }

    // forceDelete
    public function forceDelete($id){
        $customers_forceDelete = Registeration::withTrashed()->find($id);
        if(!is_null($customers_forceDelete)){
            $customers_forceDelete->forceDelete();
        }
        return redirect()->back();
    }

    public function register(Request $request){
        $registration = new Registeration;
        $registration->name	 = $request['name'];
        $registration->email = $request['email'];
        $registration->password	 = $request['password'];
        $registration->gender = $request['gender'];
        $registration->dob = $request['dob'];
        $registration->save();

        return redirect('/customer/view');
    }

    public function show(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $customers = Registeration::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->get();
        }
        else{
            $customers = Registeration::paginate(10);
        }
        $data = compact('customers','search');
        return view('customer-view')->with($data);
    }



    public function delete($id){
        $customers = Registeration::find($id);
        if(!is_null($customers)){
            $customers->delete();
        }
        return redirect('customer/view');
    }
    // Edit Customers

    public function edit($id){
        $customers = Registeration::find($id);
        if(!is_null($customers)){
            $title = "Update Customer";
            $url = url("/customer/update") . "/" . $id;
            $data = compact('customers','url','title');
            return view('form')->with($data);
        }
        else{
            return redirect('customer/view');
        }
    }

    // Update Customers
    public function update($id,Request $request){
        $customers = Registeration::find($id);

        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->gender = $request->gender;
        $customers->dob = $request->dob;
        $customers->save();
        return redirect('/customer/view');

    }

}


