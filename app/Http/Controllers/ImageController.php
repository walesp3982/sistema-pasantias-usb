<?php

namespace App\Http\Controllers;

use App\Models\Files\Picture;
use App\Service\ImagenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use function Pest\Laravel\call;

class ImageController extends Controller
{
    public function __construct(
        private ImagenService $imagenService
    ){}
    public function show(Picture $picture) {
        if(!Auth::check()) {
            abort(403, 'No autorizado');
        }
        try {
            $file = $this->imagenService->show($picture->id);
        } catch (\Throwable $th) {
            abort(404, $th->getMessage());
        }
        $type = $picture->extension;
        $filename = $picture->name;
        return Response::make($file, 200, [
            'Content-Type' => $type,
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
        ]);
    }
}
