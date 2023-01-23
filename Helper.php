<?php

namespace CleantalkSP\Common\Helpers;

class Helper
{
    /**
     * Returns true if $signature is regexp, else return false. Supports modifications set [imSsxADUuXJ].
     *
     * @param string $signature - signature expression from DB
     * @param string $delimiters - delimiters for regexp. Default set is '#/'. Do not use @ symbol as delimiter.
     *
     * @return bool
     */
    public static function isRegexp($signature, $delimiters = '#/')
    {
        $pattern_modifiers = '[imSsxADUuXJ]{0,11}';
        $limit             = strlen($delimiters) - 1;
        for ( $i = 0; $i <= $limit; $i++ ) {
            $pattern = '@^' . $delimiters[$i] . '.*' . $delimiters[$i] . $pattern_modifiers . '$@';
            if ( preg_match($pattern, $signature) ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns number of string with a given char position
     *
     * @param string $file_path String to search in
     * @param string $signature_body Character position
     * @param bool $is_regexp Flag. Is signature is regular expression?
     *
     * @return int String number
     */
    public static function getNeedleStringNumberFromFile($file_path, $signature_body, $is_regexp = false)
    {
        $file = file($file_path);
        $out  = 1;

        foreach ( $file as $number => $line ) {
            if (
                ($is_regexp && preg_match($signature_body, $line)) ||
                ( ! $is_regexp && strripos($line, stripslashes($signature_body)) !== false)
            ) {
                $out = $number + 1;
            }
        }

        return $out;
    }
}
