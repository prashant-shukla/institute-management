
@extends('student.layout')

@section('content')
<div class="space-y-6">

    {{-- Course Card --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-semibold">Fusion 360 masterclass</h2>
        <p class="text-gray-500 mt-1">Designing / Marketing</p>

        <div class="mt-4">
            <p class="font-medium">Ends on: <span class="text-red-500">2025/11/24</span></p>
        </div>

        <p class="mt-4 text-gray-700">
            🌟 3-Day Live Webinar on Autodesk Fusion 360
            <br> For Mechanical & Handicraft Industries
            <br> 21st – 23rd November
            <br> 🔥 Limited Seats | Certificate Included
        </p>
    </div>

    {{-- Content Summary --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="font-semibold text-lg">Content Summary</h3>

        <div class="flex justify-between mt-3 text-sm">
            <p>1 file(s)</p>
            <p>Remove Course: <strong>2025/11/24</strong></p>
        </div>
    </div>

    {{-- Payment Summary --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="font-semibold text-lg">Payment Summary</h3>

        <div class="mt-3 space-y-2 text-sm">
            <p>Amount Paid: <strong>₹1200</strong></p>
            <p>Purchased Date: <strong>2025/11/20</strong></p>
        </div>

        <div class="mt-4 flex space-x-3">
            <button class="px-4 py-2 bg-gray-200 rounded">Download Receipt</button>
            <button class="px-4 py-2 bg-gray-200 rounded">Platform Fee Invoice</button>
        </div>
    </div>

</div>

@endsection