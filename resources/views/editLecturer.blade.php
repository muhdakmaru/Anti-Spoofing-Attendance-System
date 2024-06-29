<x-adminLayout xmlns:x-slot="http://www.w3.org/1999/xlink">


    <h3 class="text-xl">Lecturer Profile</h3>

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
        <h2>Register Lecturer</h2>

        <form action="{{ url('/editUser', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
                <input type="text" name="lecturer_id" value="{{ $user->id }}" required readonly>
            </div>
            <div class="input-box">
                <input type="text" name="email" value="{{ $user->email }}" required readonly>
            </div>
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter Lecturer Name" value="{{ $user->name }}" required>
            </div>
            <div class="input-box">
                <input type="text" name="phone_number" placeholder="Enter Lecturer Phone Number" value="{{ $user->phone_number }}" required>
            </div>
            <div class="input-box">
                <input type="text" name="department" placeholder="Enter Lecturer Department" value="{{ $user->department }}" required>
            </div>
            <div class="input-box button">
                <input type="submit" value="Update Profile">
            </div>
        </form>
    </div>

</x-adminLayout>
