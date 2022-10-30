@php
$title = 'Dashboard';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h6>Customers Module</h6>
                            <p class="text-sm">Manage customers' accounts</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-alt"></i>
                        </div>
                        <a href="{{'/customers'}}" class="small-box-footer">Click here <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h6>Events' Module</h6>
                            <p class="text-sm">Manage Events</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                        <a href="{{'/events'}}" class="small-box-footer">Click here <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h6>Employees' Module</h6>
                            <p class="text-sm">Manage Employees' accounts</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-alt"></i>
                        </div>
                        <a href="{{'/employees'}}" class="small-box-footer">Click here <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered table-sm text-sm  table-striped elevation-1">
                <thead class="thead-dark">
                <tr>
                    <th colspan="5" class="text-center">User Accounts Summary</th>
                </tr>
                <tr class="text-center" >
                    <th rowspan="2" style="vertical-align: middle;">User Category</th><th colspan="3">Number of accounts</th><th rowspan="2" style="vertical-align: middle;">Total</th>
                </tr>
                <tr class="text-center">
                    <th class="text-success">Active</th><th class="text-danger">Inactive</th><th class="text-warning">Pending</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Customers</th>
                    <td class="text-right">{{$user->getUsers(1,1)}}</td>
                    <td class="text-right">{{$user->getUsers(0,1)}}</td>
                    <td class="text-right">{{$user->getUsers(2,1)}}</td>
                    <th class="text-right">{{$user->getUsers(1,1)+ $user->getUsers(0,1) +$user->getUsers(2,1)}}</th>

                </tr>
{{--                <tr>--}}
{{--                    <th>Farmers</th>--}}
{{--                    <td class="text-right">{{$user->getUsers(1,2)}}</td>--}}
{{--                    <td class="text-right">{{$user->getUsers(0,2)}}</td>--}}
{{--                    <td class="text-right">{{$user->getUsers(2,2)}}</td>--}}
{{--                    <th class="text-right">{{$user->getUsers(1,2)+ $user->getUsers(0,2) +$user->getUsers(2,2)}}</th>--}}
{{--                </tr>--}}
                <tr>
                    <th>Employees</th>
                    <td class="text-right">{{$user->getUsers(1,3)}}</td>
                    <td class="text-right">{{$user->getUsers(0,3)}}</td>
                    <td class="text-right">{{$user->getUsers(2,3)}}</td>
                    <th class="text-right">{{$user->getUsers(1,3)+ $user->getUsers(0,3) +$user->getUsers(2,3)}}</th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th class="text-right">{{$user->getUsers(1,1) + $user->getUsers(1,3)}}</th>
                    <th class="text-right">{{$user->getUsers(0,1) + $user->getUsers(0,3)}}</th>
                    <th class="text-right">{{$user->getUsers(2,1) + $user->getUsers(2,3)}}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
