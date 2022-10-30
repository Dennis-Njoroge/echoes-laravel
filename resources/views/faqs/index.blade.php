@php
    $title = 'Help Center';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="float-right mb-2">
                <a href="{{url('help/create')}}" class="btn btn-success btn-sm">Create FAQ</a>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="bg-secondary">
                    <tr>
                        <th>#</th><th>Category</th><th>Question</th><th>Answer</th><th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="faqData">
                        @forelse($faqs as $index => $faq)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$faq->title}}</td>
                                <td>{{$faq->question}}</td>
                                <td>{{$faq->answer}}</td>
                                <td style="width: 10px">
                                    <div class="btn-group ">
                                        <a href="{{url('help/'.$faq->id)}}" class="btn btn-sm text-primary bg-transparent"><i class="fa fa-eye"></i></a>
                                        <a  href="{{url('help/'.$faq->id.'/edit')}}" class="btn btn-sm bg-transparent"><i class="fa fa-pencil-alt text-success"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No records found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

