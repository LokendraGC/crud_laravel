<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
  public function index()
  {
    return view("customers");
  }

  public function create()
  {
    $url  = url('customers/store');
    $title = "Customer Registration";
    $btn = "Submit";
    $data = compact('url', 'title', 'btn');
    return view('create')->with($data);
  }

  public function store(Request $request)
  {

    $customer = new Customer();
    // echo "<pre>";
    // print_r($request->all());

    $customer->name = $request['name'];
    $customer->address = $request['address'];
    $customer->email = $request['email'];
    $customer->password = md5($request['password']);
    $customer->gender = $request['gender'];
    $customer->dob = $request['dob'];
    $customer->status = $request['status'];

    // $fileName = time() . "-ws." . $request->file('image')->getClientOriginalName();
    // $imageName = $request->file('image')->storeAs('public/uploads', $fileName);

    // $customer->image = $imageName;

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $extention =  $file->getClientOriginalName();
      $fileName = time() . '.' . $extention;
      $file->move('uploads/images/', $fileName);
      $customer->image = $fileName;
    }
    $customer->save();

    session()->flash('success', 'Customer Added Successfully.');

    return redirect('/customers/view');
  }

  public function view(Request $request)
  {

    $search = $request['search'] ?? "";
    if ($search != "") {
      // dd($search);
      $customers = Customer::where('name', 'LIKE', "%" . $search . "%")->get();
    } else {
      // $customers = Customer::paginate(5);
      $customers = Customer::get();
    }



    // $customers = Customer::all();
    // echo '<pre>';
    // print_r($customers->toArray());
    // echo '</pre>';

    $data = compact('customers', 'search');
    return view('customer-view')->with($data);
  }

  public function delete($id)
  {
    Customer::find($id)->delete();
    return redirect()->back();
    //  echo "<pre>";
    //  print_r($customer->toArray());
  }
  public function edit($id)
  {
    $customer = Customer::find($id);
    if (is_null($customer)) {
      return redirect('customers/view');
    } else {
      $url = url('customers/update') . '/' . $id;
      $title = "Customer Update";
      $btn = "Update";
      $data = compact('customer', 'url', 'title', 'btn');
      return view('/customers')->with($data);
    }
  }

  public function update($id, Request $request)
  {

    $customer = Customer::find($id);
    $customer->name = $request['name'];
    $customer->address = $request['address'];
    $customer->email = $request['email'];
    $customer->gender = $request['gender'];
    $customer->dob = $request['dob'];
    $customer->status = $request['status'];
    // $customer->image = $request['image'];

    // dd($request->all());


    // Delete the old image if it exists
    if ($request->image) {

      // $filePath = public_path('uploads/images/' . $customer->image);

      // if (File::exists($filePath)) {
      //   // Delete the file
      //   unlink($filePath);
      // }

      if ($request->hasFile('image')) {

        $file = $request->image;
        $extention =  $file->getClientOriginalName();
        // dd($extention);
        $fileName = time() . '.' . $extention;
        $file->move('uploads/images/', $fileName);
        $customer->image = $fileName;
      }
      // else {
      //   dd($request);
      // }
    }
    $customer->save();

    return redirect('customers/view');
  }
}
