<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class = "text-xl">Home Page</h3>
    <h9>{{ auth()->user() }}</h9>

</x-layout>
