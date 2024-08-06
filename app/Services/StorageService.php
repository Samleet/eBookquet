<?php

namespace App\Services;

use App\Enums\ErrorMessage;
use App\Exceptions\ApplicationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StorageService
{
    public static function upload(string $file, array $data): bool {
        $name = @$data['name'];
        $disk = @$data['disk'];
        $type = @$data['type'];

        $file = self::process (
            $file, $type
        );

        if($file){
            //up to upload tmp
            if($name && is_dir($disk)){
                $disk = substr($disk, \strpos($disk, 'storage') + 8);
                
                Storage::disk('public')->put ("$disk/$name", $file );
                
                return true;
            }
        }

        return false;
    }

    public static function process(string $file, $type = ""): string {
        $type = $type ?? 'image';
        $base64 = strstr($file, ';base64,');

        if($base64){
            $file = $extract = substr($file, strpos($file, ',') + 1);
            return base64_decode($file);
        }
        else {
            $info = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $info->buffer($file);

            if(($type == '*')==true || preg_match("/$type/", $mime)){
                return $file;
            }
        }
        
        return false;
    }

    public static function delete(string $item){
        // function delete(string $item){

            $items = glob("$item/*"); // loopscanning through folders
            foreach($items as $file){
                if(is_dir($file))
                    self::delete($file);

                else
                @unlink($file); // run passive recursion on the object
            }

            @rmdir($item);

        // }

        // delete($item);
    }

    public static function sanitize(string $name){
        $blacklist = [
            //server side
            '.php','.php1','.php2', '.php3', '.phtml', '.cgi', '.py',

            //html format
            '.html', '.htm', '.html5'  ,

            //script code
            '.js', '.ts', '.jsx', '.tsx'
        ];

        foreach($blacklist as $ext){
            $name = str_replace($ext, '', $name);
        }

        return $name;

    }

    public static function file(string $name){

        return $name ? pathinfo($name, PATHINFO_FILENAME) : ( null) ;

    }
}
