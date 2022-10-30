@php
    $title = 'View Faq';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <tr><th  style="width: 30%">Category</th><td>{{$faq->title}}</td></tr>
                 <tr><th  style="width: 30%">Question</th><td>{{$faq->question}}</td></tr>
                <tr><th  style="width: 30%">Answer</th><td>{{$faq->answer}}</td></tr>
            </table>
        </div>
    </div>
@endsection


