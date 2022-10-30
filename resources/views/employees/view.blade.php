@php
    $title = 'View Employee';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <tr><th  style="width: 30%">First Name</th><td>{{$employee->first_name}}</td></tr>
                 <tr><th  style="width: 30%">Last Name</th><td>{{$employee->last_name}}</td></tr>
                <tr><th  style="width: 30%">Gender</th><td>{{$employee->gender}}</td></tr>
                <tr> <th  style="width: 30%">Email</th><td>{{$employee->user['email']}}</td></tr>
                <tr><th  style="width: 30%">Phone</th><td>{{$employee->phone}}</td></tr>
            </table>
        </div>
    </div>
@endsection


