<?php

class Waktu_model extends CI_model
{
    public function selisihJam($awal, $akhir)
    {
        list($ji, $mi) = explode(':', $awal);
        list($jo, $mo) = explode(':', $akhir);
        $jin = ($ji * 60) + $mi;
        $jout = ($jo * 60) + $mo;
        if ($jin >= $jout) {
            $last = (($jo * 60) + $mo) + (24 * 60);
        } else {
            $last = ($jo * 60) + $mo;
        }
        $menit = $last - $jin;
        return $menit;
    }
}
