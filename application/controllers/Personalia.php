<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personalia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_pers();
    }

    public function index()
    {
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $this->db->order_by('date_created', 'desc');
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);

        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/index', $data);
        $this->load->view('layout/footer_pers', $data);
    }
    public function pangkat()
    {
        $data['title'] = 'Doel Si Petir | pangkat';
        $data['judul'] = 'Setting Pangkat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $data['approve'] = $this->db->get('user')->result_array();
        $data['ja'] = count($data['approve']);
        $this->load->model('Pangkat_models', 'pkt');

        $data['pangkat'] = $this->pkt->getAll();

        $this->form_validation->set_rules('pkt', 'Pangkat', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('layout/header_pers', $data);
            $this->load->view('layout/nav_pers', $data);
            $this->load->view('layout/sidebar_pers', $data);
            $this->load->view('personalia/pkt', $data);
            $this->load->view('layout/footer_pers', $data);
        } else {
            $pkt = $this->input->post('pkt');
            $ket = $this->input->post('ket');
            $this->db->where('nama', $pkt);
            $cek = $this->db->get_where('pangkat')->num_rows();
            if ($cek > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pangkat ini sudah ada.</div>');
                redirect('personalia/pangkat');
            }
            $data = [
                'id' => '',
                'nama' => $pkt,
                'ket' => $ket
            ];
            $this->db->insert('jb_pangkat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil menambahkan pangkat</div>');
            redirect('personalia/pangkat');
        }
    }
    public function hapuspangkat()
    {
        $id = $this->input->get('id');
        $this->db->delete('pangkat', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">berhasil menghapus pangkat</div>');
        redirect('personalia/pangkat');
    }
    public function approval()
    {
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'User Approval';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);

        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/approve', $data);
        $this->load->view('layout/footer_pers', $data);
    }
    public function lihat()
    {
        $id = $this->input->get('kdstaff');

        $this->db->where('KDSTAFF', $id);
        $una = $this->db->get('user')->row_array();
        $dbstaff = $this->load->database('staff', true);
        $dbstaff->where('KDSTAFF', $id);
        $banding = $dbstaff->get('M_STAFF')->row_array();
        $this->db->where('is_active', 1);
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);
        $data['una'] = $una;
        $data['banding'] = $banding;


        $data['title'] = 'Sipetir | Approve';
        $data['judul'] = 'Approval';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/detiluser', $data);
        $this->load->view('layout/footer_pers', $data);
    }
    public function action1()
    {
        $id = $this->input->get('id');
        $stat = $this->input->get('stat');
        $this->load->model('pers_model', 'pers', true);
        $cn = $this->pers->approve($id, $stat);
        if ($cn == 'tolak') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun berhasil di tolak dan dihapus dari sistem.</div>');
            redirect('personalia/approval');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aktivasi Akun berhasil. Data telah ditambahkan ke daftar personil.</div>');
            redirect('personalia/approval');
        }
    }
    public function masterStaff()
    {
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'Personil Dustira';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $this->db->order_by('date_created', 'desc');
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);

        $dbstaff = $this->load->database('staff', true);
        $dbstaff->where('ISACTIVE', 1);
        $data['staff'] = $dbstaff->get('M_STAFF')->result_array();

        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/master_staff', $data);
        $this->load->view('layout/footer_pers', $data);
    }
    public function detailStaff()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'Detail Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $this->db->order_by('date_created', 'desc');
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);

        $dbstaff = $this->load->database('staff', true);
        $dbstaff->where('KDSTAFF', $id);
        $data['staff'] = $dbstaff->get('M_STAFF')->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nip', 'No. Nip', 'required|trim');
        $this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header_pers', $data);
            $this->load->view('layout/nav_pers', $data);
            $this->load->view('layout/sidebar_pers', $data);
            $this->load->view('personalia/detail_staff', $data);
            $this->load->view('layout/footer_pers', $data);
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $tl = $this->input->post('tempatlahir');
            $tgl = $this->input->post('tanggallahir');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $ktp = $this->input->post('ktp');

            $this->db->set('NAME_DISPLAY', $nama);
            $this->db->set('NOMOR_NIP', $nip);
            $this->db->set('TEMPATLAHIR', $tl);
            $this->db->set('TANGGALLAHIR', $tgl);
            $this->db->set('EMAIL', $email);
            $this->db->set('NOMOR_HP1', $phone);
            $this->db->set('NOMOR_KTP', $ktp);
            $this->db->where('KDSTAFF', $id);
            $this->db->update('M_STAFF');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat perubahan data personil.</div>');
            redirect('personalia/masterStaff');
        }
    }
    public function user()
    {
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'Daftar User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $this->db->order_by('date_created', 'desc');
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);

        $personil = $this->db->get('jb_personil')->result_array();
        $data['personil'] = $personil;

        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/personil/index', $data);
        $this->load->view('layout/footer_pers', $data);
    }
    public function detailUser()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'Daftar User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $this->db->order_by('date_created', 'desc');
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);
        $this->db->where('id', $id);
        $personil = $this->db->get('jb_personil')->row_array();
        $data['personil'] = $personil;
        $data['keluarga'] = $this->db->get_where('jb_keluarga', ['personil_id' => $data['personil']['id']])->result_array();

        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/personil/detailUser', $data);
        $this->load->view('layout/footer_pers', $data);
    }
    public function detailkeluarga()
    {
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'Detail Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $this->db->order_by('date_created', 'desc');
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);
        $idan = $this->input->get('id');
        $this->db->where('id', $idan);
        $data['kel'] = $this->db->get_where('jb_keluarga')->row_array();
        $data['judul'] = $data['kel']['nama'] . "<br><span class='badge badge-info'>" . $data['kel']['stat_hidup'] . "</span>";

        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/personil/detailkeluarga', $data);
        $this->load->view('layout/footer_pers', $data);
    }
}
