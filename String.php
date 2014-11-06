<?php

namespace attitude\Functions;

class String
{
    /**
     * Function to generate a slug (a normalized URL sanitized string)
     * 
     * Turns 'Any impressive headline' to 'any-impressive-headline'
     *
     * @param   string $str     String to use to generate slug
     * @return  string          Returns slug
     * @author                  internet
     * @license                 public domain
     *
     */
    public static function slug($str)
    {
        setlocale(LC_ALL, 'en_US.UTF8');
    
        $r = '';
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    
        for ($i = 0; $i < strlen($str); $i++) {
            $ch1 = $str[$i];
            $ch2 = mb_substr($str, $i, 1);
            $r .= $ch1 == '?' ? $ch2 : $ch1;
        }
    
        $str = str_replace(
            array('&auml;', '&ouml;', '&uuml;', '&szlg', '&amp;', ' & ', '&', ' - ', '/', ' / ', ' ', '='),
            array('ae', 'oe', 'ue', 'ss', '-and-', '-and-', '-and-', '-', '-', '-', '-', '-'),
            strtolower($r)
        );
    
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789_-";
        $replace = '';
    
        for ($i=0; $i<strlen($str); $i++) {
            if (false !== strpos($chars, $str{$i})) {
                $replace .= $str{$i};
            }
        }
    
        return $replace;
    }
    
    /**
     * Handy function to return file name without extension
     *
     * @param   string  $str    Any file name, path or url
     * @returns mixed           File name without extension (string) or false (bool)
     * @author                  Martin Adamko <@martin_adamko>
     * @license                 The MIT license <http://opensource.org/licenses/MIT>
     *
     */
    public static function filename($str)
    {
        return substr($str,0, strpos($str, get_file_extension($str))-1);
    }
    
    /**
     * Handy function to return file extension
     *
     * @param   string  $str    Any file name, path or url
     * @returns mixed           Extension (string) or false (bool)
     * @author                  Martin Adamko <@martin_adamko>
     * @license                 The MIT License <http://opensource.org/licenses/MIT>
     *
     */
    public static function extension($str)
    {
        return substr(strrchr($str,'.'),1);
    }
}
