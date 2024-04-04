<?php

//Pure method - tapec static
class Validator {
    static public function string($data, $min = 0, $max = INF) {
        $data = trim($data);

        return is_string($data)
               && strlen($data) >= $min
               && strlen($data) <= $max;

    // static public function id($id, $min = 1, $max = 3) {
    //     $id = $id;

    //     if($id < $min || $id > $max) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }
}
}