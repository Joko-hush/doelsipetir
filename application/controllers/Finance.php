<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_staff();
    }

    public function index()
    {
        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Dashboard Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        // $id = $data['staff']['KDSTAFF'];
        // $db2 = $this->load->database('staff', true);
        // $db2->where('KDSTAFF', $id);
        // $data['gaji'] = $db2->get('F_GAJI_D')->result_array();
        // $gaji = json_encode($data['gaji']);

        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/finance/index', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
}
