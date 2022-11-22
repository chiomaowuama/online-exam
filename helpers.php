<?php

if (!function_exists('mysqli_fetch_all_alt')) {
    function mysqli_fetch_all_alt(mysqli_result $result) {
        $data = [];
        
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }
}
