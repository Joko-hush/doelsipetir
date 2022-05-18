<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
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
        $id = $data['staff']['KDSTAFF'];
        $db2 = $this->load->database('staff', true);
        $data['user'] = $this->db->get_where('jb_personil', ['email' => $this->session->userdata('email')])->row_array();
        $data['hadir'] = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $data['user']['KDSTAFF'], 'TGL_MASUK' => date('Y-m-d')])->num_rows();
        $data['pulang'] = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $data['user']['KDSTAFF'], 'TGL_MASUK' => date('Y-m-d'), 'STAT_ABSEN' => 2])->num_rows();
        $date1 = strtotime('first day of this week');
        $date2 = strtotime('last day of this week');
        // $this->db->where('TGL_MASUK >=', $date1);
        // $this->db->where('TGL_MASUK <=', $date2);
        $this->db->limit(5);
        $data['absen'] = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $data['user']['KDSTAFF']])->result_array();

        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/absensi/index', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function masuk()
    {
        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Absen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        // $id = $data['staff']['KDSTAFF'];
        // $db2 = $this->load->database('staff', true);
        $data['user'] = $this->db->get_where('jb_personil', ['email' => $this->session->userdata('email')])->row_array();
        $data['hadir'] = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $data['user']['KDSTAFF'], 'TGL_MASUK' => date('Y-m-d')])->num_rows();
        $data['pulang'] = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $data['user']['KDSTAFF'], 'TGL_MASUK' => date('Y-m-d'), 'STAT_ABSEN' => 2])->num_rows();

        $date1 = strtotime('first day of this week');
        $date2 = strtotime('last day of this week');
        // $this->db->where('TGL_MASUK >=', $date1);
        // $this->db->where('TGL_MASUK <=', $date2);
        $this->db->limit(5);
        $data['absen'] = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $data['user']['KDSTAFF']])->result_array();


        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/absensi/masuk', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function lokasi()
    {

        $latitude     = $_POST['latitude'];
        $longitude    = $_POST['longitude'];

        if (!empty($latitude) && !empty($longitude)) {

            $gmap = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($latitude) . ',' . $longitude . '&sensor=false';
            // curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $gmap);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            // end curl
            $data = json_decode($response);

            if ($response) {
                echo json_encode($data->results[0]->formatted_address);
            } else {
                echo json_encode(false);
            }
        }
    }
    public function action()
    {
        $data['user'] = $this->db->get_where('jb_personil', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('member/action', $data);
    }
    public function ijin()
    {
        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Ijin Absen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();

        $this->form_validation->set_rules('category', 'Kategori keterangan', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/absensi/ijin', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $data['staff']['KDSTAFF'];
            $cat = $this->input->post('category');
            $tgl = $this->input->post('tgl');
            $alasan = $this->input->post('alasan');
            $status = 'diajukan';


            var_dump($id . $cat . $alasan . $tgl);
            die;
        }
    }
}
