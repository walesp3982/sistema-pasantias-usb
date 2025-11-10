<?php

namespace App\Service;

use App\Models\Files\Picture;
use App\Repositories\Interfaces\PictureRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

use function Pest\Laravel\get;

class ImagenService
{

    private string $path = "images/";
    private string $pathMedium = "images/medium/";

    private string $pathThumbnail = "images/thumbnail";

    public function __construct(
        private readonly PictureRepositoryInterface $pictureRepository,
        private readonly UserService $userService
    ) {}


    public function getImagenOriginalPath(Picture $picture) {
        return $picture->path.$picture->uuid.'.'.$picture->extension;
    }

    public function getImagenMediumPath(Picture $picture) {
        return $picture->path_medium.$picture->uuid.'.'.$picture->extension;
    }

    public function getImagenThumbnailPath(Picture $picture) {
        return $picture->path_thumbnail.$picture->uuid.'.'.$picture->extension;
    }

    public function generatePathImage(string $path, Picture $picture) {
        return $path.$picture->uuid.'.'.$picture->extension;
    }
    /*
        A la imagen ya almacenada se la transforma a
        otro relación forma 1:1
    */
    public function squareRecortImage(UploadedFile $file)
    {
        $image = Image::read($file);

        // * Nota: implementar con crop si alcanza el tiempo
        $image->cover(1000, 1000);
        $image->save();
    }

    public function mediumImage(int $idPicture)
    {
        $picture = $this->pictureRepository->get($idPicture);

        $path = $this->getImagenOriginalPath($picture);

        $file = Storage::get($path);
        $image = Image::read($file);
        $image->scale(500);

        $finalPath = $this->generatePathImage(
            $this->pathMedium, $picture);

        Storage::put(
            $finalPath,
            $image->encodeByExtension($picture->extension));


        $this->pictureRepository->update(
            $idPicture,
            [
                "path_medium" => $this->pathMedium
            ]
        );
    }

    public function thumbnailImage(int $idPicture)
    {
        $picture = $this->pictureRepository->get($idPicture);

        $path = $this->getImagenOriginalPath($picture);

        $file = Storage::get($path);
        $image = Image::read($file);
        $image->scale(250);


        $finalPath = $this->generatePathImage($this->pathMedium, $picture);
        Storage::put($finalPath, $image->encodeByExtension($picture->extension()));

        $this->pictureRepository->update(
            $idPicture,
            ["path_thumbnail" => $this->pathThumbnail]
        );
    }

    public function toJpegImage(int $idPicture)
    {
        $picture = $this->pictureRepository->get($idPicture);

        $path = $this->getImagenOriginalPath($picture);

        $file = Storage::get($path);
        $image = Image::read($file);

        $imageJpeg = $image->toJpeg();
        $size = $imageJpeg->size();

        $this->pictureRepository->update($idPicture, [
            'extension' => 'jpeg',
            'size' => $size,
        ]);

        $newPath = $this->getImagenOriginalPath($picture);

        Storage::put($newPath, $imageJpeg);
        Storage::delete($path);
    }

    public function save(UploadedFile $picture, ?string $newName = null): Picture
    {
        $uuid = Str::uuid();
        $extension = $picture->getClientOriginalExtension();
        $user_id = Auth::id();

        if (is_null($newName)) {
            $name = $picture->getClientOriginalName();
        } else {
            $name = $newName;
        }

        $dataPicture = Image::read($picture);
        $height = $dataPicture->height();
        $width = $dataPicture->width();

        $pictureData = $this->pictureRepository->create([
            'uuid' => $uuid,
            'name' => $name,
            'path' => $this->path,
            'extension' => $extension,
            'user_id' => $user_id,
            'height' => $height,
            'width' => $width,
        ]);
        $finalPath = $this->path . $uuid . "." . $extension;

        Storage::put($finalPath, $picture);
        return $pictureData;
    }

    public function show(int $idPicture)
    {
        $picture = $this->pictureRepository->get($idPicture);
        if (is_null($picture)) {
            throw new \Exception("No se encontró la imagen");
        }
        $path = $this->getImagenOriginalPath($picture);

        $file = Storage::get($path);

        if (is_null($file)) {
            throw new \Exception("No se encontró el archivo en el storage");
        }
        return $file;
    }

    public function showMedium(int $idPicture)
    {
        $picture = $this->pictureRepository->get($idPicture);
        if (is_null($picture)) {
            throw new \Exception("No se encontró la imagen");
        }
        $path = $this->getImagenMediumPath($picture);
        $file = Storage::get($path);

        if (is_null($file)) {
            throw new \Exception("No se encontró el archivo en el storage");
        }
        return $file;
    }

    public function showThumbanail(int $idPicture)
    {
        $picture = $this->pictureRepository->get($idPicture);
        if (is_null($picture)) {
            throw new \Exception("No se encontró la imagen");
        }
        $path = $this->getImagenThumbnailPath($picture);

        $file = Storage::get($path);

        if (is_null($file)) {
            throw new \Exception("No se encontró el archivo en el storage");
        }
        return $file;
    }

    public function deletePictureOriginal(Picture $picture) {
        $path = $this->getImagenOriginalPath($picture);

        if(Storage::exists($picture)) {
            Storage::delete($path);
        }
        else {
            throw new \Exception("Image original no encontrada");
        }
    }

    public function deletePictureMedium(Picture $picture) {
        $path = $this->getImagenMediumPath($picture);

        if(Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    public function deletePictureThumbnail(Picture $picture) {
        $path = $this->getImagenThumbnailPath($picture);

        if(Storage::exists($path)) {
            Storage::delete($path);
        }
    }
    public function delete(int $idPicture) {
        $picture = $this->pictureRepository->get($idPicture);
        if(is_null($picture)) {
            throw new \Exception("No se encontró la imagen");
        }

        $this->deletePictureOriginal($picture);
        $this->deletePictureMedium($picture);
        $this->deletePictureThumbnail($picture);

        return $this->pictureRepository->delete($idPicture);
    }
}
