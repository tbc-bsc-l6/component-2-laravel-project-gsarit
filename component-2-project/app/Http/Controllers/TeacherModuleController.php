<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherModuleController extends Controller
{
    // Show modules assigned to teacher
    public function index()
    {
        $teacher = Auth::user();

        // assuming teacher_id exists on modules table
        $modules = Module::where('teacher_id', $teacher->id)->get();

        return view('teacher.modules.index', compact('modules'));
    }

    // Show students in a module
    public function show(Module $module)
    {
        return view('teacher.modules.show', compact('module'));
    }

    // Set PASS / FAIL
    public function grade(Request $request, Module $module, $studentId)
    {
        $request->validate([
            'pass_status' => 'required|in:PASS,FAIL',
        ]);

        $module->students()->updateExistingPivot($studentId, [
            'pass_status' => $request->pass_status,
            'completed_at' => now(),
        ]);

        return back()->with('success', 'Result updated successfully.');
    }
}
