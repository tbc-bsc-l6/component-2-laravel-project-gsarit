@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <h1 class="text-xl font-bold mb-4">My Modules</h1>

    <ul>
        @forelse($modules as $module)
            <li class="mb-2">
                <a href="{{ route('teacher.modules.show', $module) }}"
                   class="text-blue-600 underline">
                    {{ $module->module }}
                </a>
            </li>
        @empty
            <li>No modules assigned.</li>
        @endforelse
    </ul>

</div>
@endsection
