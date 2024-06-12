@extends('layout')

@section('content')
    <div class = "container">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <form action ="{{ url('/registerStudent') }}" method="POST" class="ms-auto me-auto mt3-auto" style="width: 500px">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Major</label>
                <input type="major" class="form-control" name="major">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Year</label>
                <input type="year" class="form-control" name="year">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Starting Year</label>
                <input type="starting_year" class="form-control" name="starting_year">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
