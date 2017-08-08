<?php
function slug($str) {
    $str = str_ireplace(strtolower(trim($str)));
    $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
    $str = str_replace(' ', '', $str);
    return preg_replace('/\-{2,}/', '', $str);
}
