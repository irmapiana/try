<?php

namespace app\components;

class PTotal {

    public static function pageTotal($provider, $fieldName, $formatNumber) {
        $total = 0;
        foreach ($provider as $item) {
            $total+=((int)$item[$fieldName]);
        }

        if ($formatNumber == 0) {
            return $total;
        } else {
            //return number_format($total);
            return number_format($total, 0, ',', '.');
        }
    }
    
    public static function formatRupiah($total)
    {
        return number_format((float)$total, 0, ',', '.');
    }

}

?>