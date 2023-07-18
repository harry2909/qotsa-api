@extends('layouts.generic')
@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-200">
        <button id="js-generate-token" class="px-4 py-2 text-white bg-red rounded hover:bg-darkred">
            Generate Token
        </button>
        <div class="px-4 py-2 text-white bg-red rounded hover:bg-darkred">
            Token: <div id="js-token"></div>
        </div>
    </div>
@endsection
