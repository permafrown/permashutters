<?php
function slug($text){

    // replace non letter or digits with _
    $text = preg_replace('~[^pLd]+~u', '_', $text);

    // trim
    $text = trim($text, '_');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
 ?>
