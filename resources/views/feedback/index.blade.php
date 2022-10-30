@php
    $title = 'Customer Feedback';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-sm">
                    <thead class="bg-secondary">
                    <tr>
                        <th>#</th><th>From</th><th>Subject</th><th>Message</th><th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="customerData">
                    @forelse($feedbacks as $index => $feedback)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>
                                <span class="text-bold">{{$feedback->user['name']}}</span>
                                <a href="mailto:{{$feedback->user['email']}}">{{$feedback->user['email']}}</a>
                            </td>
                            <td>
                                {{$feedback->title ?? '-'}}
                            </td>
                            <td>
                                {{$feedback->message}}
                            </td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-id="{{$feedback->id}}" data-bs-target="#replyModal" class="btn btn-primary btn-sm ">Reply</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7">No records found!</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @include('feedback.modal')
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        var replyModal = document.getElementById('replyModal')
        replyModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            var messageId = button.getAttribute('data-bs-id')
            var modalTitle = replyModal.querySelector('.modal-title')
            var modalBodyInput = replyModal.querySelector('.modal-body input');
            var subject = replyModal.querySelector('#subject');
            var message = replyModal.querySelector('#message');

            $.ajax({
                type:'GET',
                dataType:'json',
                url:'feedback/'+messageId,
                data:{'_csrf':'{{csrf_token()}}'},
                success: function (data) {
                    if( data !== 0){
                        modalTitle.textContent = 'Reply to ' + data?.from;
                        modalBodyInput.value = data?.id;
                        subject.innerHTML = data?.title;
                        message.value = data?.message;
                    }
                }
            })



        })
    </script>
@endsection
