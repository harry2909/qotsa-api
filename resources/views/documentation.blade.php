@extends('layouts.generic')
@section('content')
    <div class="p-6 sm:p-12 md:p-24 h-screen">
        <div class="text-3xl mb-2">
            Introduction
            <span id="introduction" class="invisible"></span>
        </div>
        <hr class="border-black opacity-20 mb-8">
        <p class="mb-2">
            This API can be used to gather information on random QOTSA lyrics, songs and albums.<br>
            To get started, register for an account and login. You will then be able to generate an API token which you
            can use to make requests to the API.<br>
            API requests will need to be made with a bearer token in the header, like so:<br>
        </p>
        <div class="bg-gray-100 border-black border-2 border-opacity-20">
        <pre>
        <code>
        fetch('/api/lyrics', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            `Authorization: Bearer ${token}`,
          },
        })
        </code>
        </pre>
        </div>
        <div class="text-3xl mt-8 mb-2">
            API Endpoints
            <span id="apiendpoints" class="invisible"></span>
        </div>
        <hr class="border-black opacity-20 mb-8">
        <table class="bg-gray-100 border-opacity-20 table-auto">
            <thead>
            <tr>
                <th class="border border-black p-2 text-left border-opacity-20">Endpoint</th>
                <th class="border border-black p-2 text-left border-opacity-20">Method</th>
                <th class="border border-black p-2 text-left border-opacity-20">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border border-black p-2 border-opacity-20"><code>/lyrics</code></td>
                <td class="border border-black p-2 border-opacity-20">GET</td>
                <td class="border border-black p-2 border-opacity-20">Returns random lyrics</td>
            </tr>
            <tr>
                <td class="border border-black p-2 border-opacity-20"><code>/song</code></td>
                <td class="border border-black p-2 border-opacity-20">GET</td>
                <td class="border border-black p-2 border-opacity-20">Returns random song</td>
            </tr>
            <tr>
                <td class="border border-black p-2 border-opacity-20"><code>/album</code></td>
                <td class="border border-black p-2 border-opacity-20">GET</td>
                <td class="border border-black p-2 border-opacity-20">Returns random album</td>
            </tr>
            </tbody>

        </table>
    </div>
@endsection
