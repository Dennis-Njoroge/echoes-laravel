@php
$title = 'Update Customer';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{url('customers/'.$customer->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter the first name" value="{{$customer->first_name}}" required>
                    @error('first_name')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter the last name" value="{{$customer->last_name}}" required>
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
                        <option value="Male" {{$customer->gender=='Male'?'selected':''}} >Male</option>
                        <option value="Female"  {{$customer->gender=='Female'?'selected':''}}>Female</option>
                    </select>
                    @error('gender')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter the email address" value="{{$customer->user['email']}}" required>
                    @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter the phone number" value="{{$customer->phone}}" required>
                    @error('phone')
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

