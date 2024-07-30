<?php

namespace model\Trait;

trait TraitSlugify
{
    public function slugify(string $s): string
    {
        $text = strip_tags($s);
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;


    }
}