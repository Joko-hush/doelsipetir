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
        $id = $data['staff']['nik'];
        $data['hadir'] = $this->db->get_where('abs_kehadiran', ['nip' => $id, 'TGL_MASUK' => date('Y-m-d')])->num_rows();
        $data['pulang'] = $this->db->get_where('abs_kehadiran', ['nip' => $id, 'TGL_MASUK' => date('Y-m-d'), 'STAT_ABSEN' => 2])->num_rows();
        $date1 = strtotime('first day of this week');
        $date2 = strtotime('last day of this week');
        // $this->db->where('TGL_MASUK >=', $date1);
        // $this->db->where('TGL_MASUK <=', $date2);
        $this->db->limit(5);
        $data['absen'] = $this->db->get_where('abs_kehadiran', ['NIP' => $id])->result_array();
        if (!$data['staff']['jam_kerja_id']) {
            $this->session->set_flashdata('message', '<div class="alert alert-info mt-2" role="alert">Saat ini Anda belum bisa melakukan Absensi karena belum memilih jam kerja.
             Silahkan lengkapi terlebih dahulu.</div>');
            redirect('member/inputdata');
        }


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
        $id = $data['staff']['nik'];
        $data['user'] = $this->db->get_where('jb_personil', ['email' => $this->session->userdata('email')])->row_array();
        $data['hadir'] = $this->db->get_where('abs_kehadiran', ['nip' => $id, 'TGL_MASUK' => date('Y-m-d')])->num_rows();
        $data['pulang'] = $this->db->get_where('abs_kehadiran', ['nip' => $id, 'TGL_MASUK' => date('Y-m-d'), 'STAT_ABSEN' => 2])->num_rows();

        $date1 = strtotime('first day of this week');
        $date2 = strtotime('last day of this week');
        // $this->db->where('TGL_MASUK >=', $date1);
        // $this->db->where('TGL_MASUK <=', $date2);
        $this->db->limit(5);
        $data['absen'] = $this->db->get_where('abs_kehadiran', ['nip' => $id])->result_array();


        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/absensi/masuk', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function lokasi()
    {

        $latitude = $_GET['latitude'];
        list($lat, $long) = explode(',', $latitude);
        //    cek lokasi 
        $latitude     = $lat;
        $longitude    = $long;

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
        $this->db->limit(20);
        $this->db->order_by('tgl_masuk', 'desc');
        $data['ijin'] = $this->db->get_where('abs_ijin', ['nip' => $data['staff']['nik']])->result_array();

        $this->form_validation->set_rules('category', 'Kategori keterangan', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/absensi/ijin', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $data['staff']['nik'];
            $cat = $this->input->post('category');
            $tgl = $this->input->post('tgl');
            $alasan = $this->input->post('alasan');
            $status = 'diajukan';
            $this->db->where('id', $data['staff']['jabatan']);
            $this->db->where('leader', 1);
            $idpejabat = $this->db->get('m_jabatan')->row_array();
            $this->db->where('jabatan', $idpejabat['id']);
            $jab = $this->db->get('jb_personil')->row_array();
            $ke = $jab['name'];

            $data = [
                'nip' => $id,
                'tgl_masuk' => $tgl,
                'kategori' => $cat,
                'alasan' => $alasan,
                'ditujukan' => $ke,
                'status' => $status,
                'created_at' => time(),
                'approved_at' => ''
            ];
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/absen/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('abs_ijin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ijin yang Anda buat sudah di kirim. Harap menunggu Acc dari Pimpinan.</div>');
            redirect('absensi/ijin');
        }
    }
}
