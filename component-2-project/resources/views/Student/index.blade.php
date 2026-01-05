@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    @if(session('success'))
        <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="bg-red-200 p-2 mb-4">{{ session('error') }}</div>
    @endif

    <h2 class="text-xl font-bold mb-4">Enrolled Modules</h2>
    <ul class="mb-6">
        @forelse($enrolledModules as $module)
            <li>{{ $module->module }} - Enrolled at: {{ $module->pivot->enrolled_at }}</li>
        @empty
            <li>No modules enrolled yet.</li>
        @endforelse
    </ul>

    <h2 class="text-xl font-bold mb-4">Available Modules</h2>
    <ul>
        @forelse($availableModules as $module)
            <li class="mb-2 flex justify-between items-center">
                <span>{{ $module->module }} ({{ $module->students()->count() }}/10)</span>
                <form action="{{ route('student.modules.enrol', $module) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Enrol</button>
                </form>
            </li>
        @empty
            <li>No available modules at the moment.</li>
        @endforelse
    </ul>

</div>
@endsection
