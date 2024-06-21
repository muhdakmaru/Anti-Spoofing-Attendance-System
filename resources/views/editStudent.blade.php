<x-layout>
    <h3 class="text-xl">Edit Student Information</h3>
    <form action="{{ url('updateStudent', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ isset($student['name']) ? $student['name'] : '' }}" required>
        </div>
        <div>
            <label>Matric</label>
            <input type="text" name="matric" value="{{ isset($student['name']) ? $student['name'] : '' }}" required>
        </div>
        <div>
            <label>Major</label>
            <input type="text" name="major" value="{{ isset($student['name']) ? $student['name'] : '' }}" required>
        </div>
        <div>
            <label>Year</label>
            <input type="text" name="year" value="{{ isset($student['name']) ? $student['name'] : '' }}" required>
        </div>
        <div>
            <label>Starting Year</label>
            <input type="text" name="starting_year" value="{{ isset($student['name']) ? $student['name'] : '' }}" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ isset($student['name']) ? $student['name'] : '' }}" required>
        </div>
        <div>
            <label>Image</label>
            <input type="file" name="image">
            @if(isset($student['image_url']))
                <img src="{{ $student['image_url'] }}" alt="Student Image" width="100">
            @endif
        </div>
        <button type="submit">Update</button>
    </form>
</x-layout>
