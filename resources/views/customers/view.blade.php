@php
    $title = 'View Customer';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <tr><th  style="width: 30%">First Name</th><td>{{$customer->first_name}}</td></tr>
                 <tr><th  style="width: 30%">Last Name</th><td>{{$customer->last_name}}</td></tr>
                <tr><th  style="width: 30%">Gender</th><td>{{$customer->gender}}</td></tr>
                <tr> <th  style="width: 30%">Email</th><td>{{$customer->user['email']}}</td></tr>
                <tr><th  style="width: 30%">Phone</th><td>{{$customer->phone}}</td></tr>
            </table>
        </div>
    </div>
@endsection


