<?php

namespace WM;

class Helper
{
    public static function pluralize($n, array $items)
    {
        if(!isset($items[0], $items[1], $items[2]))
            return false;
        if($n % 10 === 1 && $n % 100 !== 11)
            return $items[0];
        if($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 > 20))
            return $items[1];
        return $items[2];
    }
    public static function inSection($section)
    {
        $section = is_array($section) ? join('|', array_map('preg_quote', $section)) : preg_quote($section);
        return (bool) preg_match('~(?:' . $section . ')~ui', $GLOBALS['APPLICATION']->GetCurDir());
    }
    public static function inRootSection($section)
    {
        $section = is_array($section) ? join('|', array_map('preg_quote', $section)) : preg_quote($section);
        return (bool) preg_match('~^/(?:' . $section . ')~ui', $GLOBALS['APPLICATION']->GetCurDir());
    }
}