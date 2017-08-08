<?php
function slug($str) {
    $str = strtolower(trim($str));
    $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
    $str = str_replace(' ', '', $str);
    $str = preg_replace('/\-{2,}/', '', $str);
    return $str;
}
?>
