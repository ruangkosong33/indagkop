<?php

use Illuminate\Support\Facades\Storage;

if(! function_exists('upload'))
{
    function upload($directory, $file, $filename = "")
    {
        $extension=$file->getClientOriginalExtension();
        $filename="{$filename}_". date('Ymdhis').".{$extension}";

        Storage::disk('public')->putFileAs("/$directory", $file, $filename);

        return "/$directory/$filename";
    }
}
