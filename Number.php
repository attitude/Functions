<?php

namespace attitude\Functions;

class Number
{
    /**
     * Returns formatted file size
     *
     * Inspired by {@link http://betterwp.net/wordpress-tips/size_format/}, modified
     * to work outside of WordPress environment.
     *
     * @param   int     $bytes      Size in bytes
     * @param   int     $decimals   Number of decimal places
     * @returns string
     *
     */
    public static function file_size_format($bytes, $decimals = 0, $dec_point = '.', $thousands_sep = ',')
    {
        $quant = array(
            // ========================= Origin ====
            'TB' => 1099511627776,  // pow( 1024, 4)
            'GB' => 1073741824,     // pow( 1024, 3)
            'MB' => 1048576,        // pow( 1024, 2)
            'kB' => 1024,           // pow( 1024, 1)
            'B ' => 1,              // pow( 1024, 0)
        );
     
        foreach ($quant as $unit => $mag) {
            if ( doubleval($bytes) >= $mag ) {
                return function_exists('number_format_i18n') ? number_format_i18n( $bytes / $mag, $decimals ) . ' ' . $unit : number_format( $bytes / $mag, $decimals, $dec_point, $thousands_sep) . ' ' . $unit;
            }
        }
     
        return false;
    }
}
