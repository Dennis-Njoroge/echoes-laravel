 <div class="modal fade" id="replyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-theme">
                    <h5 class="modal-title" id="exampleModal">Reply</h5>
                </div>
                <form method="POST" action="{{url('feedback/')}}" >
                    @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id"/>
                    <div class="form-group">
                        <label for="message">Subject</label>
                        <span class="form-control" id="subject"></span>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea disabled rows="4" name="message" id="message" class="form-control" placeholder="Message" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="reply">Reply Message</label>
                        <textarea rows="4" name="reply" id="reply" class="form-control  @error('reply') is-invalid @enderror" placeholder="Type reply message..." required>{{old('reply')}}</textarea>
                        @error('reply')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success">Send <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
