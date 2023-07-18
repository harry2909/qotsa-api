@extends('layouts.generic')
@section('content')
    <div class="p-8">
        <h1 class="text-4xl font-bold mb-8">QOTSA API Documentation</h1>

        <div class="route mb-8">
            <h2 class="text-2xl font-bold"><code>/lyrics</code></h2>
            <p>Returns random lyrics</p>
        </div>

        <div class="route mb-8">
            <h2 class="text-2xl font-bold"><code>/song</code></h2>
            <p>Returns random song</p>
        </div>

        <div class="route mb-8">
            <h2 class="text-2xl font-bold"><code>/album</code></h2>
            <p>Returns random album</p>
        </div>
    </div>
@endsection
