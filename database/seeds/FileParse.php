<?php
namespace App\Database\Seeds;
/**
 * Created by PhpStorm.
 * User: jolita_pabludo
 * Date: 28/10/15
 * Time: 11:25
 */
class FileParse
{
    public static function parse_csv($file, $options = null) {

        $result = [];
        $res = [];
        $delimiter = empty($options['delimiter']) ? "," : $options['delimiter'];
        $str = file_get_contents($file);
        $lines = explode("\n", $str);

        $field_names = explode($delimiter, array_shift($lines));

        foreach ($lines as $line) {

            // Skip the empty line
            if (empty($line)) continue;
            $fields = explode($delimiter, $line);
            foreach ($field_names as $key => $f) {

                $result[$f] = $fields[$key];
            }
            $res[] = $result;

        }

        return $res;
    }

}