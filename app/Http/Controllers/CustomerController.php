<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('id','desc')->get();
        return view('customers.index', [
        'customers' => $customers
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender'=>'required',
            'email'=>'unique:users'
        ]);
        $password = '12345678';
        $status = '1';
        $user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'status'=>$status,
            'password' => Hash::make($password),
        ]);
        if ($user) {
            Customer::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'user_id' => $user->id,
            ]);
            return redirect('/customers/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::where('id',$id)->firstOrFail();
        return view('customers.view')->with(['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::where('id',$id)->firstOrFail();
        return view('customers.update')->with(['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::where('id',$id)->firstOrFail();
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender'=>'required',
            'email'=>'unique:users,email,'.$customer->user['id']
        ]);

        Customer::where('id',$id)->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
        ]);

        $user = User::where('id',$customer->user['id'])->update([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
        ]);
       return redirect('/customers/');
    }

    public function status(Request $request, $id){
        $customer = Customer::where('id',$id)->firstOrFail();
        $user = User::where('id',$customer->user['id'])->update([
            'status'=>$request->input('status')
        ]);
        if ($user){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
