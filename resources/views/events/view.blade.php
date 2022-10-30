@php
    $title = 'View Event';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <tr><th  style="width: 30%">Title</th><td>{{$event->title}}</td></tr>
                 <tr><th  style="width: 30%">Venue</th><td>{{$event->venue}}</td></tr>
                <tr><th  style="width: 30%">Description</th><td>{{$event->description}}</td></tr>
                <tr> <th  style="width: 30%">Start Date</th><td>{{$event->formatDate($event->start_date)}}</td></tr>
                <tr> <th  style="width: 30%">End Date</th><td>{{$event->formatDate($event->end_date)}}</td></tr>
                <tr><th  style="width: 30%">Photo</th><td>
                        <?= $event->photo !==null ? '<img width="250px" src="'.asset('/images'.$event->photo).'" alt="Event Image"/>':'No image uploaded'?>
                    </td></tr>
            </table>
        </div>
    </div>
@endsection


