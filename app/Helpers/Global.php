<?php

use Illuminate\Support\Facades\Crypt;

function enkripsi($value){
    return Crypt::encryptString($value);
}
function dekripsi($value){
    return Crypt::decryptString($value);
}