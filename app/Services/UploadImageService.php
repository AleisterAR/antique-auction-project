<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadImageService
{
    protected $file;
    public readonly string $extension;
    public readonly string $hashName;
    public readonly string $name;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
        $this->extension = $file->extension();
        $this->hashName = $file->hashName();
        $this->name = $file->getClientOriginalName();
    }

    public function toArray()
    {
        return [
            'extension' => $this->extension,
            'hashName' => $this->hashName,
            'name' => $this->name,
        ];
    }

    public function upload($path)
    {
        $this->file->store($path);
    }
}
