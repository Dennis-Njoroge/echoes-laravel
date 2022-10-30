@php
$title = 'Create Event';
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{url('events/')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label for="title">Event Title</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter the Event Title" value="{{old('title')}}" required>
                            @error('title')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Event Venue</label>
                            <input type="text" id="venue" name="venue" class="form-control @error('venue') is-invalid @enderror" placeholder="Enter the Event Venue" value="{{old('venue')}}" required>
                            @error('venue')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="4" name="description" id="description" class="form-control  @error('description') is-invalid @enderror" placeholder="Type Description" >{{old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="Select Date" value="{{old('start_date')}}">
                                    @error('start_date')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" placeholder="Select Date" value="{{old('end_date')}}" >
                                    @error('end_date')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="custom-file justify-content-center">
                            <input type="file" accept="image/*" name="image_file" class="custom-file-input" style="display: none" id="img-input">
                            <label for="img-input" class="btn btn-primary btn-sm">Choose Image</label><br/>
                            <label class="" for="img-input">
                                <img class="img-fluid rounded mx-auto d-block" id="preview" width="250px" src="{{asset('images/no-image-placeholder.png')}}"/>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm" ><span id="btn-submit-label">Create</span></button>
                    <button type="reset" class="btn btn-danger btn-sm" >Cancel</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#preview').attr('src', '<?= asset('images/no-image-placeholder.png') ?>');
            }
        }

        $("#img-input").change(function() {
            readURL(this);
        });
    </script>
@endsection
