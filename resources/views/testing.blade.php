<x-layout2 xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class = "text-xl">Home Page</h3>
    <h2>{{ auth()->user() }}</h2>

</x-layout2>
