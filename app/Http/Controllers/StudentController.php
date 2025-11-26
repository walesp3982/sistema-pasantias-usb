<?php

namespace App\Http\Controllers;

use App\Enums\StatusInternshipEnum;
use App\Models\Internship;
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
    public function showInternship() {
        $user = $this->userService->get(Auth::id());

        $student = $user->student;

        $internships = $this->studentService->enableInternships($student->id);

        return view('student.pasantias', ["internships" => $internships]);
    }

    public function submitInternship(int $idInternship) {
        $user = $this->userService->get(Auth::id());

        $student = $user->student;

        try {
            $this
                ->studentService
                ->postulation($student->id, $idInternship);
        } catch(Throwable $err) {
            return redirect()
                ->route("search.internship")
                ->with('error', $err->getMessage());
        }
        return redirect()->route('student.postulations')
            ->with('success', 'Postulación realizada con éxito');
    }

    public function getPostulations() {
        $student = $this->userService->get(Auth::id())->student;

        try {
            $createdPostulations = $this
                ->studentService
                ->getPostulationCreated($student->id);
            $sendPostulations = $this
                ->studentService
                ->getPostulationSend($student->id);
        } catch (Throwable $th) {
            //throw $th;
        }

        return view('student.postulations',
        compact('createdPostulations', 'sendPostulations'));
    }

    public function editPostulation(int $idPostulation) {
        $user = $this->userService->get(Auth::id());

        $student = $user->student;

        $postulation = $this
            ->studentService
            ->getPostulationById($student->id, $idPostulation);


        $documents = $this->studentService->getDocumentPostulation($idPostulation);

        $counter = 0;
        foreach ($documents as $document) {
            if ($document['data'] != null) {
                $counter++;
            }
        }
        $enable = $counter == 0 ? true : false;

        $select = $this->studentService->getDocuments();

        return view('student.edit-postulation', [
            'postulation' => $postulation,
            'documents' => $documents,
            'enable' => $enable,
            'select' => $select,
        ]);
    }

    public function uploadDocuments(int $idPostulation, Request $request) {
        //
        $validate = $request->validate([
            "typeDoc" => "required|integer|min:1|max:4",
            "document" => "required|file|mimes:pdf",
        ]
        );

        $this->studentService->saveDocumentPostulation(
            $idPostulation,
            $validate["typeDoc"],
            $validate["document"]
        );

        return redirect()->back();
    }

    public function sendPostulation(int $idPostulation) {

        $this->studentService->submitPostulation($idPostulation);

        return redirect()->route('student.postulations');
    }


}
