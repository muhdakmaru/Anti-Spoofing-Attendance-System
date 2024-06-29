<!-- resources/views/lecturer.blade.php -->

<x-adminLayout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <h3 class="text-xl">User Information Page</h3>

    <br>

    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- component -->
    <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <!-- Search Bar -->
                <div class="flex justify-end mb-4">
                    <input type="text" id="search" class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-200" placeholder="Search...">
                </div>
                <table class="w-full">
                    <thead>
                    <tr style="text-align: center" class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Lecturer ID</th>
                        <th class="px-4 py-3">Phone Number</th>
                        <th class="px-4 py-3">Department</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Created At</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white" id="userTable">
                    @foreach($users as $user)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $user->id }}</td>
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold text-black">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs border">{{ $user->lecturer_id }}</td>
                            <td class="px-4 py-3 text-xs border">{{ $user->phone_number }}</td>
                            <td class="px-4 py-3 text-xs border">{{ $user->department }}</td>
                            <td class="px-4 py-3 text-xs border">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-xs border">{{ $user->created_at }}</td>
                            <td class="px-4 py-3 text-xs border">
                                <a href="{{ url('/editUser', $user->id) }}" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Edit</a>
                                <form action="{{ url('/deleteUser', $user->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        function filterUsers() {
            let filterSearch = document.getElementById('search').value.toUpperCase();
            let rows = document.getElementById('userTable').getElementsByTagName('tr');

            let found = false;
            for (let i = 0; i < rows.length; i++) {
                let textValue = '';
                let td = rows[i].getElementsByTagName('td');

                for (let j = 0; j < td.length; j++) {
                    if (td[j]) {
                        textValue += td[j].textContent || td[j].innerText;
                    }
                }

                if (textValue.toUpperCase().indexOf(filterSearch) > -1) {
                    rows[i].style.display = '';
                    found = true;
                } else {
                    rows[i].style.display = 'none';
                }
            }

            if (!found) {
                document.getElementById('noUsersFound').style.display = 'table-row';
            } else {
                document.getElementById('noUsersFound').style.display = 'none';
            }
        }

        document.getElementById('search').addEventListener('keyup', filterUsers);
    </script>
</x-adminLayout>
