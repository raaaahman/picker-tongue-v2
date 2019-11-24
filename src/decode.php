<?php 

function pnt_decode( $message, $dictionnary ) {

    foreach( $dictionnary as $code_name => $meaning ) {

        $message = preg_replace( '/' . $code_name . '/', $meaning, $message );
    }

    return $message;
}