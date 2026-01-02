<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\UserRole;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'users' => User::all(),
            'modules' => Module::all(),
            'roles' => UserRole::all(),
            'teachers' => User::whereHas('userRole', fn($q) => $q->where('role', 'teacher'))->get(),
        ]);
    }

    public function changeRole(Request $request, User $user)
    {
        $user->update(['user_role_id' => $request->role_id]);
        return back()->with('success', 'User role updated.');
    }

    public function toggleModule(Module $module)
    {
        $module->update(['active' => !$module->active]);
        return back()->with('success', 'Module status updated.');
    }

    public function assignTeacher(Request $request, Module $module)
    {
        $module->update(['teacher_id' => $request->teacher_id]);
        return back()->with('success', 'Teacher assigned.');
    }

    public function removeStudent(Module $module, User $student)
    {
        $module->students()->detach($student->id);
        return back()->with('success', 'Student removed.');
    }
}

