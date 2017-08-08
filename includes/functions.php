<?php
function slug($postTitle){

    // replace non letter or digits with _
    $postTitle = preg_replace('~[^pLd]+~u', '_', $postTitle);

    // trim
    $postTitle = trim($postTitle, '_');

    // transliterate
    $postTitle = iconv('utf-8', 'us-ascii//TRANSLIT', $postTitle);

    // lowercase
    $postTitle = strtolower($postTitle);

    // remove unwanted characters
    $postTitle = preg_replace('~[^-w]+~', '', $postTitle);

    // if (empty($postTitle)) {
    //     return 'n-a';
    // }

    return $postTitle;
}
 ?>
