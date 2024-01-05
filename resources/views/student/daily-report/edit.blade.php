@extends('admin.layouts.master') 

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <form action="{{ route('daily-reports.update', $dailyReport->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="form-group">
                        <label style="font: black; font-weight: bold" for="exampleFormControlTextarea1">Description Of Work Done:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descrption_of_work_done">{{ $dailyReport->descrption_of_work_done }}</textarea>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <p><code>Below should be filled by your supervisor</code></p>
                        </div>
                    </div>
                
                    {{-- @if (auth()->user()->role == 'internal_supervisor') --}}
                
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="county">Comments/Remarks<code>*</code></label>
                            <input type="text" class="form-control" id="remarks_or_comments" name="remarks_or_comments"
                                placeholder="">
                        </div>
                
                
                        <div class="form-group col-md-6">
                            <label for="county">Sign/Innitials<code>*</code></label>
                            <input type="text" class="form-control" id="sign_or_innitials" name="sign_or_innitials" placeholder="">
                        </div>
                
                    </div>
                
                    {{-- @endif --}}
                
                    <button type="submit" class="btn btn-primary">Update</button>
                
                </form>
                

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#exampleFormControlTextarea1',
            menubar: false,
            plugins: 'code table lists image',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table | image',
        });
    </script>
@endpush
