<?php

namespace App\Http\Controllers;

use App\Service\DocumentService;
use App\Service\StudentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //

    public function __construct(
        private DocumentService $documentService,
        private StudentService $studentService,
    ) {

    }
    public function showDocumentPostulation(int $idDocumentPostulation)
    {
        return $this->documentService->showDocument($idDocumentPostulation);
    }
}
