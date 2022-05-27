<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen_models extends CI_Model
{
    public function getAbsenHarian($date1, $date2)
    {
        $this->db->where('TGL_MASUK >=', $date1);
        $this->db->where('TGL_MASUK <=', $date2);
        return $this->db->get('abs_kehadiran')->result_array();
    }
}
