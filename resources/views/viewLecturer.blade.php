<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>{{ $title }}</x-slot:title>

    <h3 class="text-xl">Lecturer Profile</h3>

    <!--<h10>{{ auth()->user()}}</h10> -->

    <div class="alert-success">
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
        <h2>Edit Profile</h2>

        <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
                <input type="text" name="lecturer_id" placeholder="Enter your ID" value="{{ auth()->user()->lecturer_id }}" required readonly>
            </div>
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter Your Name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Enter your email" value="{{ auth()->user()->email }}" required readonly>
            </div>
            <div class="input-box">
                <input type="text" name="phone_number" placeholder="Enter your Phone Number" value="{{ auth()->user()->phone_number }}" required>
            </div>
            <div class="input-box">
                <input type="text" name="department" placeholder="Select your Faculty" value="{{ auth()->user()->department }}" required readonly>
            </div>
            <div class="input-box button">
                <input type="submit" value="Update Profile">
            </div>
        </form>
    </div>

</x-layout>
