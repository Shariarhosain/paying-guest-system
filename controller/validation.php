<?php


function validatePassword($password) {
    // A. Password must not be less than eight (8) characters
    // B. Password must contain at least one of the special characters (@, #, $, %)
    $validChars = '@#$%';
    if (strlen($password) >= 8) {
        return strpbrk($password, $validChars) !== false;
    }
    return false;
}


?>