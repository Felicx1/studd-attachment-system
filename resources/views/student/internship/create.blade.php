@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form action="{{route('internships.store')}}" method="POST"
                
                
                style="margin-top: 50px">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="Company Name" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="county">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="county">County</label>
                            <input type="text" class="form-control" id="county" name="county" placeholder="">
                        </div>
               
                        <div class="form-group col-md-6">
                            <label for="county">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website">Website(Optional)</label>
                        <input type="url" class="form-control" id="website" name="website" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration <code>(weeks)</code></label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Eg 7 Weeks">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
