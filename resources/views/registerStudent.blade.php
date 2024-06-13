<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>{{ $title }}</x-slot:title>

    <h3 class="text-xl">Register Student Page</h3>

    <div class="alert-sucess">
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

    <div><br></div>
    <div class="wrapper">
        <h2>Register Student</h2>

            <form action="{{ url('/registerStudent') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter student name" required>
            </div>
            <div class="input-box">
                <input type="text" name="major" placeholder="Enter student major" required>
            </div>
            <div class="input-box">
                <input type="text" name="year" placeholder="Enter student year" required>
            </div>
            <div class="input-box">
                <input type="text" name="starting_year" placeholder="Enter student starting year" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Enter student email" required>
            </div>
            <div class="policy">
                <h3 class="text-xl">Upload Image</h3>
                <input type="file" class="form-control" name="image" accept="image/*" required>
            </div>
            <div class="input-box button">
                <input type="submit" value="Register Student">
            </div>
        </form>
    </div>

</x-layout>
