<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected static $data = array();

    private static function initData() {
        $data = array();
        foreach (self::all() as $row) {
            $data[$row['key']] = $row['value'];
        }

        return $data;
    }

    public static function get($key) {
        if (empty(self::$data)) {
            self::$data = self::initData();
        }

        return self::$data[$key] ?: null;
    }
}
