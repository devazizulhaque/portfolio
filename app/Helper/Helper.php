<?php


namespace App\Helper;


class Helper
{
    public static function uploadFile ($fileObject, $directory, $existFileUrl = null)
    {
        if ($fileObject)
        {
            if ($existFileUrl)
            {
                if (file_exists($existFileUrl))
                {
                    unlink($existFileUrl);
                }
            }
            $fileName = time().rand(10, 1000).$fileObject->getClientOriginalName();
            $fileDirectory = 'upload-images/'.$directory.'/';
            $fileObject->move($fileDirectory, $fileName);
            $fileUrl = $fileDirectory.$fileName;
        } else {
            if ($existFileUrl)
            {
                $fileUrl = $existFileUrl;
            } else {
                $fileUrl = null;
            }
        }
        return $fileUrl;
    }
}
