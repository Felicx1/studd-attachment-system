@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <form action="{{route('daily-reports.store')}}"  method="POST">
                    @csrf
                   
               
                    <div class="form-group">
                      <label style="font: black; font-weight: bold" for="exampleFormControlTextarea1">Description of work done:</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descrption_of_work_done"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

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

