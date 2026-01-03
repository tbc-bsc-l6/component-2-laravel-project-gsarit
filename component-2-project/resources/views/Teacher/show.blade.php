@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <h1 class="text-xl font-bold mb-4">
        Students - {{ $module->module }}
    </h1>

    @if(session('success'))
        <div class="bg-green-200 p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Name</th>
                <th class="border px-2 py-1">Enrolled At</th>
                <th class="border px-2 py-1">Status</th>
                <th class="border px-2 py-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($module->students as $student)
                <tr>
                    <td class="border px-2 py-1">{{ $student->name }}</td>
                    <td class="border px-2 py-1">{{ $student->pivot->enrolled_at }}</td>
                    <td class="border px-2 py-1">
                        {{ $student->pivot->pass_status ?? 'Pending' }}
                    </td>
                    <td class="border px-2 py-1">
                        <form method="POST"
                              action="{{ route('teacher.modules.grade', [$module, $student->id]) }}">
                            @csrf
                            <select name="pass_status" class="border">
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                            <button class="bg-blue-500 text-white px-2 py-1 ml-2">
                                Save
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
