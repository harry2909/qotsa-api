@extends('layouts.generic')
@section('content')
    <div class="p-6 sm:p-12 md:p-24 min-h-screen">
        <div class="text-3xl mb-2">
            Introduction
            <span id="introduction" class="invisible"></span>
        </div>
        <hr class="border-black opacity-20 mb-8">
        <p class="mb-2">
            This API can be used to gather information on random QOTSA lyrics, songs and albums.<br>
            To get started, register below to generate your token.<br>
        </p>
        <div class="max-w-sm">
            <button
                class="js-show-registration-form bg-red hover:bg-darkred text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Register
            </button>
            <button
                class="mb-2 js-show-token-form bg-red hover:bg-darkred text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Request New Token
            </button>
            @include('components.user-management')
        </div>
        <div
            class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
            id="js-token"></div>
        <p class="my-2">
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
