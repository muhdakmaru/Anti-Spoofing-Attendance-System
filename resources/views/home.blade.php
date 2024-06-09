<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class = "text-xl">This is HomePage</h3>
    <h2>{{ auth()->user() }}</h2>

</x-layout>
