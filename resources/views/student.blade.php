<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <h3 class="text-xl">Student Information Page</h3>

    <br>

    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- component -->
    <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <!-- Class Selection Dropdown -->
                <div class="flex justify-end mb-4">
                    <select id="classFilter" class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-200 mr-4">
                        <option value="All">All Classes</option>
                        <option value="SECJH">SECJH</option>
                        <option value="SECVH">SECVH</option>
                    </select>
                    <!-- Search Bar -->
                    <input type="text" id="search" class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-200" placeholder="Search...">
                </div>
                <table class="w-full">
                    <thead>
                    <tr style="text-align: center" class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Major</th>
                        <th class="px-4 py-3">Year</th>
                        <th class="px-4 py-3">Starting Year</th>
                        <th class="px-4 py-3">Total Attendance</th>
                        <th class="px-4 py-3">Standing</th>
                        <th class="px-4 py-3">Last Attendance Time</th>
                        <th class="px-4 py-3">Class</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white" id="studentTable">
                    @forelse($students as $id => $student)
                        <tr class="text-gray-700" data-class="{{ $student['class'] ?? '' }}">
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $id }}</td>
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="{{ $student['image_url'] ?? 'default_image_url' }}" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-black">{{ $student['name'] }}</p>
                                        <p class="text-xs text-gray-600">{{ $student['matric'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $student['major'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $student['year'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $student['starting_year'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $student['total_attendance'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $student['standing'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $student['last_attendance_time'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $student['class'] ?? '' }}</span>
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                <a href="{{ url('/editStudent', $id) }}" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Edit</a>
                                <a href="{{ url('/deleteStudent', $id) }}" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">No students found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        function filterStudents() {
            let filterClass = document.getElementById('classFilter').value.toUpperCase();
            let filterSearch = document.getElementById('search').value.toUpperCase();
            let rows = document.getElementById('studentTable').getElementsByTagName('tr');

            let found = false;
            for (let i = 0; i < rows.length; i++) {
                let rowClass = rows[i].getAttribute('data-class').toUpperCase();
                let textValue = '';
                let td = rows[i].getElementsByTagName('td');

                for (let j = 0; j < td.length; j++) {
                    if (td[j]) {
                        textValue += td[j].textContent || td[j].innerText;
                    }
                }

                if ((filterClass === 'ALL' || rowClass === filterClass) && textValue.toUpperCase().indexOf(filterSearch) > -1) {
                    rows[i].style.display = '';
                    found = true;
                } else {
                    rows[i].style.display = 'none';
                }
            }

            if (!found) {
                document.getElementById('noStudentsFound').style.display = 'table-row';
            } else {
                document.getElementById('noStudentsFound').style.display = 'none';
            }
        }

        document.getElementById('search').addEventListener('keyup', filterStudents);
        document.getElementById('classFilter').addEventListener('change', filterStudents);
    </script>
</x-layout>
