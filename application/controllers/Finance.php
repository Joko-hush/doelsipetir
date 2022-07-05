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
<<<<<<< HEAD
        $log = [
            'user_id' => $data['staff']['id'],
            'action' => 'Buka hal financial',
            'created_at' => time()
        ];
        $this->db->insert('log', $log);
=======
        // $id = $data['staff']['KDSTAFF'];
        // $db2 = $this->load->database('staff', true);
        // $db2->where('KDSTAFF', $id);
        // $data['gaji'] = $db2->get('F_GAJI_D')->result_array();
        // $gaji = json_encode($data['gaji']);
>>>>>>> a4e5510c7b8958b784455e9ed666a2623fd96475

        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/finance/index', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
}
