<?php

namespace app\components;

class Status {

    public static function pageStatus($settlflag, $rc, $status) {
        $status = null;
        foreach ($sett as $item) {
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