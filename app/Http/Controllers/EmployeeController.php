<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        $employees = Employee::all();
        return view('employees.index',[
            'employees'=>$employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'role' =>'required',
            'gender'=>'required',
            'email'=>'unique:users'
        ]);
        $password = '12345678';
        $status = '1';
        $user_type = '3';
        $user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'status'=>$status,
            'user_type'=>$user_type,
            'password' => Hash::make($password),
        ]);
        if ($user) {
            Employee::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'role' =>$request->input('role'),
                'user_id' => $user->id,
            ]);
            return redirect('/employees/');
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
        $employee = Employee::where('id',$id)->firstOrFail();
        return view('employees.view')->with(['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id',$id)->firstOrFail();
        return view('employees.update')->with(['employee'=>$employee]);
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
        $employee = Employee::where('id',$id)->firstOrFail();
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'role' =>'required',
            'gender'=>'required',
            'email'=>'unique:users,email,'.$employee->user['id']
        ]);

        Employee::where('id',$id)->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'role' => $request->input('role')
        ]);

        User::where('id',$employee->user['id'])->update([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
        ]);
        return redirect('/employees/');
    }


    public function status(Request $request, $id){
        $employee = Employee::where('id',$id)->firstOrFail();
        $user = User::where('id',$employee->user['id'])->update([
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
