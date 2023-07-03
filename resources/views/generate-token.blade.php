@extends('layouts.generic')
@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-200">
        <button id="js-generate-token" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
            Generate Token
        </button>
        <div class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
            Token: <div id="js-token"></div>
        </div>
    </div>
@endsection
