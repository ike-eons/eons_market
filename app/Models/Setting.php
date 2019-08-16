<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['key','value'];

    /*  querying the record by $key and return the value
     for the given $key 
     */
    public static function get($key)
    {
        $setting = new self();

        $entry = $setting->where('key',$key)->first();
        if (!$entry) {
            return;
        }
        return $entry->value;
    }

    // check if the given key has any $value in the database
    // update the $value for the given setting
    // 
    public static function set($key, $value = null)
    {
        $setting = new self();
        
        $entry = $setting->where('key',$key)->firstOrFail();
        $entry->value = $value;
        $entry->saveOrFail();

        //setting the current $key/$value for setting
        // to configuartion so we can load them
        // using the laravel config() helper function
        Config::set('key',$value);

        if (Config::get($key) == $value)
         {
            return true;
        }
        return false;
        
    }
}
