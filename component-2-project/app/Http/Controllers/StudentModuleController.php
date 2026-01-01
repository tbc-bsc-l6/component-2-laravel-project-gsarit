<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class StudentModuleController extends Controller
{
    // Show available modules for enrolment
    public function index()
    {
        $student = Auth::user();

        // Only show modules that are active, have space, and student not already enrolled
        $availableModules = Module::where('active', true)
            ->whereDoesntHave('students', function ($query) use ($student) {
                $query->where('user_id', $student->id);
            })
            ->get()
            ->filter(function ($module) {
                return $module->students()->count() < 10;
            });

        $enrolledModules = $student->modules;

        return view('student.modules.index', compact('availableModules', 'enrolledModules'));
    }

    // Enrol student into module
    public function enrol(Request $request, Module $module)
    {
        $student = Auth::user();

        // Check max 4 modules
        if ($student->modules()->count() >= 4) {
            return back()->with('error', 'You can only enrol in 4 modules at a time.');
        }

        // Check module capacity
        if ($module->students()->count() >= 10) {
            return back()->with('error', 'This module is full.');
        }

        // Attach student
        $student->modules()->attach($module->id, ['enrolled_at' => now()]);

        return back()->with('success', 'Enrolled successfully!');
    }
}
