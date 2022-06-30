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
    public function getAbsenKet($date1, $date2, $ket)
    {
        $this->db->where('TGL_MASUK >=', $date1);
        $this->db->where('TGL_MASUK <=', $date2);
        $this->db->where('STAT_KERJA', $ket);
        return $this->db->get('abs_kehadiran')->result_array();
    }
    public function getUnknown($date1, $date2)
    {
        $sql = "SELECT * FROM jb_personil A WHERE NOT EXISTS (SELECT * FROM abs_kehadiran B WHERE A.nik COLLATE DATABASE_DEFAULT = B.NIP COLLATE DATABASE_DEFAULT AND B.TGL_MASUK between '$date1' and '$date2')";
        return $this->db->query($sql)->result_array();
    }
    public function getIjin()
    {
        $this->db->where('status', 'diajukan');
        return $this->db->get('abs_ijin')->result_array();
    }
    public function absenSetuju($id, $user)
    {
        $this->db->set('status', 'disetujui');
        $this->db->set('approved_at', time());
        $this->db->where('id', $id);
        $this->db->update('abs_ijin');

        $this->db->where('id', $id);
        $ijin = $this->db->get('abs_ijin')->row_array();
        $this->db->where('nik', $ijin['nip']);
        $s = $this->db->get('jb_personil')->row_array();
        if ($ijin['kategori'] = 3) {
            $info = 'Ijin';
        } else {
            $info = 'Sakit';
        }
        $ijin_id = $ijin['id'];
        $date = $ijin['tgl_masuk'];
        $data = [
            'NIP' => $ijin['nip'],
            'TGL_MASUK' => $date,
            'TIME_IN' => '',
            'TIME_OUT' => '',
            'PICTURE_IN' => $ijin['doc'],
            'PICTURE_OUT' => '',
            'STAT_KERJA' => $ijin['kategori'],
            'STAT_ABSEN' => 3,
            'LOK_IN' => '-',
            'LOK_OUT' => '-',
            'INFO' => $info,
            'DISETUJUI_OLEH' => $user,
            'IJIN_ID' => $ijin_id,
            'JAM_KERJA_ID' => $s['jam_kerja_id']
        ];
        $this->db->insert('abs_kehadiran', $data);
        return 'success';
    }
    public function absenTolak($id, $user)
    {
        $this->db->set('status', 'ditolak');
        $this->db->set('approved_at', time());
        $this->db->where('id', $id);
        $this->db->update('abs_ijin');
        return 'success';
    }
}
