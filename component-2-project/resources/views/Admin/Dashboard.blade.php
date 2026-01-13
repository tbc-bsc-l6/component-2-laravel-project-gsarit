@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

<h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

@if(session('success'))
    <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
@endif

<h2 class="text-xl font-semibold mb-2">Users</h2>
<table class="w-full mb-6 border">
@foreach($users as $user)
<tr class="border">
    <td class="p-2">{{ $user->name }}</td>
    <td class="p-2">{{ $user->userRole->role }}</td>
    <td class="p-2">
        <form method="POST" action="{{ route('admin.users.role', $user) }}">
            @csrf
            <select name="role_id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
            </select>
            <button class="bg-blue-500 text-white px-2 py-1">Change</button>
        </form>
    </td>
</tr>
@endforeach
</table>

<h2 class="text-xl font-semibold mb-2">Modules</h2>

@foreach($modules as $module)
<div class="border p-3 mb-4">
    <strong>{{ $module->module }}</strong>
    <p>Status: {{ $module->active ? 'Active' : 'Archived' }}</p>

    <form method="POST" action="{{ route('admin.modules.toggle', $module) }}">
        @csrf
        <button class="bg-yellow-500 text-white px-2 py-1">
            Toggle Availability
        </button>
    </form>

    <form method="POST" action="{{ route('admin.modules.assignTeacher', $module) }}" class="mt-2">
        @csrf
        <select name="teacher_id">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
        <button class="bg-green-600 text-white px-2 py-1">Assign Teacher</button>
    </form>

    <h4 class="font-semibold mt-2">Students</h4>
    @foreach($module->students as $student)
        <form method="POST"
              action="{{ route('admin.modules.removeStudent', [$module, $student]) }}">
            @csrf
            <span>{{ $student->name }}</span>
            <button class="bg-red-600 text-white px-2 py-1">Remove</button>
        </form>
    @endforeach
</div>
@endforeach

</div>
@endsection
