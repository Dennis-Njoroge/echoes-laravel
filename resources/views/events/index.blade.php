@php
    $title = 'Events';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="float-right mb-2">
                <a href="{{url('events/create')}}" class="btn btn-success btn-sm">Create Event</a>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="bg-secondary">
                    <tr>
                        <th>#</th><th>Event Title</th><th>Venue</th><th>Description</th><th>Status</th><th>Start Date</th><th>End Date</th><th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="eventsData">
                    @forelse($events as $index => $event)
                        @php
                        $status = $event->getStatus($event->status);
                        @endphp
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$event->title}}</td>
                            <td>{{$event->venue}}</td>
                            <td>{{$event->description}}</td>
                            <td><span class="badge {{$status['class']}}">{{$status['label']}}</span></td>
                            <td>{{$event->formatDate($event->start_date)}}</td>
                            <td>{{$event->formatDate($event->end_date)}}</td>
                            <td style="width: 10px">
                                <div class="btn-group ">
                                    <a href="{{url('events/'.$event->id)}}" class="btn btn-sm text-primary bg-transparent"><i class="fa fa-eye"></i></a>
                                    <a  href="{{url('events/'.$event->id.'/edit')}}" class="btn btn-sm bg-transparent"><i class="fa fa-pencil-alt text-success"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7">No records found!</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
