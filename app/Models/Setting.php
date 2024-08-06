<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [''];
    
    static function prepare($cfg = null, $key = null){
        $settings = [];
        $getSetup = $cfg ?? self::all();

        foreach($getSetup as $set){
            if($key 
            && $set->key != $key) {
                continue;

            }

            $settings[$set->key] = self::collect($set);

        }

        return $settings;    

    }

    static function collect($setting){

        return $setting->value=='true' ? true : false;

    }
    
}
