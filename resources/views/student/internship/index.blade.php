@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Auth::user()->role !== 'admin')
        <div class="d-flex justify-content-end">
            <a href="{{ route('internships.create') }}" class="btn btn-primary">Add</a>
        </div>
        @endif
        <div class="card">

            <div class="card-body"> 
                {{ $dataTable->table() }}
            </div>

        </div>

    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
