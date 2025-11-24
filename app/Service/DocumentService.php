<?php

namespace App\Service;

use App\Models\Files\Document;
use App\Repositories\DocumentRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentService
{
    private string $path = "documents/";
    public function __construct(
        private readonly DocumentRepository $documentRepository
    ) {}

    private function fullPath(string $name, string $extension):string {
        return $this->path . $name . "." . $extension;
    }
    public function save(UploadedFile $file, $class, $id): Document
    {
        /*
            Nota: Para subir archivos es necesario que
            el usuario esté loggeado
        */
        $uuid = Str::uuid();
        $extension = $file->getClientOriginalExtension();
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $size = $file->getSize();
        $user_id = Auth::id();
        if(is_null($user_id)) {
            throw new \Exception('Necesitas iniciar sesión para usar esto');
        }
        // $fileStorage = $uuid . '.' . $file->getClientOriginalExtension();

        $document = $this->documentRepository->create([
            'uuid' => $uuid,
            'name' => $name,
            'extension' => $extension,
            'size' => $size,
            'user_id' => $user_id,
            'path' => $this->path,
            'documentable_type' => $class,
            'documentable_id' => $id
        ]);

        Storage::putFileAs($this->path, $file, $uuid.'.'.$extension);
        return $document;
    }

    public function download(int $idDocument) {
        $document = $this->documentRepository->get($idDocument);

        $finalPath = $this->fullPath($document->uuid, $document->extension);
        $originalName = $document->name;
        return Storage::download($finalPath, $originalName);
    }

    public function getFile($idDocument) {
        $document = $this->documentRepository->get($idDocument);
        $path = $this->fullPath($document->uuid, $document->extension);
        return $path;
    }

    public function delete(int $idDocument) {
        $document = $this->documentRepository->get($idDocument);

        $finalPath = $this->fullPath($document->uuid, $document->extension);

        return Storage::delete($finalPath);
    }
}
