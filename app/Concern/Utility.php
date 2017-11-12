<?php
namespace App\Concern;

trait Utility
{
    /**
     * @return array
     */
    public static function lists()
    {
        $result = [];
        self::whereNotNull('name')->get()->map(function($item) use (&$result) {
            return $result[$item->id] = $item->name;
        });
        return $result;
    }
}