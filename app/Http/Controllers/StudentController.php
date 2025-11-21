<?php

namespace App\Http\Controllers;

use App\Enums\StatusIntershipEnum;
use App\Models\Intership;
use App\Models\Postulation;
use App\Service\StudentService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class StudentController extends Controller
{
    public function __construct(
        private StudentService $studentService,
        private UserService $userService
    ) {

    }
    public function showIntership() {
        $user = $this->userService->get(Auth::id());

        $student = $user->student;

        $interships = Intership::where('career_id', "=", $student->career_id)
            ->where("status", "=", StatusIntershipEnum::PENDING)
            ->get();

        $postulation = Postulation::where("student_id", "=", $student->id )
            ->where("status");
        return view('student.pasantias', ["interships" => $interships]);
    }

    public function getStatus() {
        return view("student.status");
    }
}
