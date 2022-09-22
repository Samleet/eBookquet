<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function enabled(string $key){

        return true;

    }
    
    static function prepare($user = null, $key = null){
        $settings = [];
        $getSetup = self::all();
        if($user){
            $getSetup = (object)$user->settings->all();
        }

        foreach($getSetup as $setting){
            if($key){
                if($setting->key == $key)
                $settings[$setting->key]=self::collect(
                    $setting
                );
            }
            else {
                $settings[$setting->key]=self::collect(
                    $setting
                );
            }
        }

        return $settings;        
    }

    static function collect($setting){

        return $setting->value=='true' ? true : false;

    }
}
