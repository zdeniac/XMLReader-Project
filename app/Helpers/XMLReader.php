<?php

namespace App\Helpers;

use \Illuminate\Http\UploadedFile;

class XMLReader
{
    public function __construct(private UploadedFile $file)
    {}

    public function readAsArray(): array
    {
        $xmlContent = simplexml_load_file($this->file);
        $json = json_encode($xmlContent);

        return json_decode($json, true);
    }

}