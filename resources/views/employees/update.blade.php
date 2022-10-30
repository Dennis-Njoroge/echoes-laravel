@php
$title = 'Update employee';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{url('employees/'.$employee->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter the first name" value="{{$employee->first_name}}" required>
                    @error('first_name')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter the last name" value="{{$employee->last_name}}" required>
                    @error('last_name')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select  id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option value="">Select Gender</option>
                        <option value="Male" {{$employee->gender=='Male'?'selected':''}} >Male</option>
                        <option value="Female"  {{$employee->gender=='Female'?'selected':''}}>Female</option>
                    </select>
                    @error('gender')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter the email address" value="{{$employee->user['email']}}" required>
                    @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter the phone number" value="{{$employee->phone}}" required>
                    @error('phone')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select  id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="">Assign Role</option>
                        <option value="0" {{$employee->role =='0'?'selected':''}} >Stock Manager</option>
                        <option value="1"  {{$employee->role =='1'?'selected':''}}>Finance Manager</option>
                        <option value="2"  {{$employee->role =='2'?'selected':''}}>Driver</option>
                    </select>
                    @error('role')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm" ><span id="btn-submit-label">Save</span></button>
                    <button type="reset" class="btn btn-danger btn-sm" >Cancel</button>
                </div>

            </form>
        </div>
    </div>
@endsection

