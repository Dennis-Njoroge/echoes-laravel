@php
$title = 'Update FAQ';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{url('help/'.$faq->id)}}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Category</label>
                    <select class="form-control" id="title" name="title" required>
                        <option value="">Select Option</option>
                        @foreach($faq->getCategories() as $option)
                            <option value="{{$option}}" {{$faq->title === $option ? 'selected':''}}>{{$option}}</option>
                        @endforeach
                    </select>
                    @error('title')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea rows="4" name="question" id="question" class="form-control   @error('question') is-invalid @enderror" placeholder="Type Question..." required >{{$faq->question}}</textarea>
                            @error('question')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea rows="4" name="answer" id="answer" class="form-control   @error('answer') is-invalid @enderror" placeholder="Type Answer..." required >{{$faq->answer}}</textarea>
                            @error('answer')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm" ><span id="btn-submit-label">Save</span></button>
                    <button type="reset" class="btn btn-danger btn-sm" >Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
