<?php

namespace App\Http\Controllers;

use App\Service\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class StudentController extends Controller
{
    public function __construct(
        private StudentService $studentService
    ) {

    }
    public function create(Request $request) {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'career_id' => 'required|exists:careers,id',
            'shift_id' => 'required|exists:shifts,id',
            'semester' => 'required|integer|min:1|max:10',
            'code_phone' => 'required|integer|max:10',
            'phone' => 'required|integer|max:20',
            'municipio_id' => 'required|exists:municipalities,id',
            'zona_id' => 'required|exists:zones,id',
            'number_door' => 'required|integer',
            'street' => 'required|string',
            'identity_card' => 'required|integer'
        ]);

        $student = $this->studentService->create($validated);
        Auth::login($student->user);
        return redirect()->route('dashboard');
    }
}
