@php
    $title = 'Employees';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="float-right mb-2">
                <a href="{{url('employees/create')}}" class="btn btn-success btn-sm">Create Employee</a>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-bordered table-sm">
                    <thead class="bg-secondary">
                    <tr>
                        <th>#</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Phone</th><th>Email</th><th>Status</th><th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="employeeData">
                    @forelse($employees as $index => $employee)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$employee->first_name}}</td>
                            <td>{{$employee->last_name}}</td>
                            <td>{{$employee->gender}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->user['email']}}</td>
                            <td>
                                @php
                                    $status = [];
                                    $status = $employee->getStatus($employee->user['status']);
                                @endphp
                                <div class="dropdown">
                                    <button id="btn_status_{{$employee->id}}" class="btn btn-sm {{$status['class']}} dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$status['status']}}
                                    </button>
                                    <div class="dropdown-menu"aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-success" href="#" onclick="sendStatus({{$employee->id}},1)" type="button"><i class="fa fa-check"></i> Activate</a>
                                        <a class="dropdown-item text-danger" href="#" onclick="sendStatus({{$employee->id}},0)"><i class="fa fa-times"></i> Disable</a>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 10px">
                                <div class="btn-group ">
                                    <a href="{{url('employees/'.$employee->id)}}" class="btn btn-sm text-primary bg-transparent"><i class="fa fa-eye"></i></a>
                                    <a  href="{{url('employees/'.$employee->id.'/edit')}}" class="btn btn-sm bg-transparent"><i class="fa fa-pencil-alt text-success"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8">No records found!</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function sendStatus(id,value){
            $.ajax({
                type:'GET',
                url:'employees/'+id+'/status',
                data:{'_csrf':'{{csrf_token()}}','status':value},
                success: function (data) {
                    if (data == 1){
                        if (value == 0){
                            $('#btn_status_'+id).removeClass('btn-success').removeClass('btn-warning').addClass('btn-danger');
                            $('#btn_status_'+id).html('Disabled');
                        }
                        else if (value == 1){
                            $('#btn_status_'+id).removeClass('btn-danger').removeClass('btn-warning').addClass('btn-success');
                            $('#btn_status_'+id).html('Active');
                        }
                    }
                }
            })
        }
    </script>
@endsection
