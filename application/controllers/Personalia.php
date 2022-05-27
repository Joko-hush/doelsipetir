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
        $id = $this->input->get('nip');

        $this->db->where('nip', $id);
        $una = $this->db->get('user')->row_array();
        $dbstaff = $this->load->database('staff', true);
        $dbstaff->where('nip', $id);
        $banding = $dbstaff->get('m_personil_pers')->row_array();
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


        $this->db->where('ISACTIVE', 1);
        $data['staff'] = $this->db->get('m_personil_pers')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nip', 'No. Nip', 'required|trim');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('layout/header_pers', $data);
            $this->load->view('layout/nav_pers', $data);
            $this->load->view('layout/sidebar_pers', $data);
            $this->load->view('personalia/master_staff', $data);
            $this->load->view('layout/footer_pers', $data);
        } else {

            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $pangkat = $this->input->post('pangkat');
            $jabatan = $this->input->post('jabatan');
            $ket = $this->input->post('ket');
            $gender = $this->input->post('gender');
            $pendidikan = $this->input->post('pendidikan');
            $kualifikasi = $this->input->post('kualifikasi');
            $tmt = $this->input->post('tmt');
            $tgl = $this->input->post('tanggallahir');
            $aktif = $this->input->post('aktif');
            $gol = $this->input->post('gol');
            if (!$aktif) {
                $aktif = 0;
            }
            $data1 = [
                'nip' => $nip,
                'nama' => $nama,
                'pangkat' => $pangkat,
                'jabatan' => $jabatan,
                'ket' => $ket,
                'gender' => $gender,
                'pendidikan' => $pendidikan,
                'kualifikasi' => $kualifikasi,
                'tmt' => $tmt,
                'tgl' => $tgl,
                'created_at' => time(),
                'updated_at' => time(),
                'isactive' => $aktif,
                'gol' => $gol
            ];
            $this->db->insert('m_personil_pers', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data personil.</div>');
            redirect('personalia/masterStaff');
        }
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

        $this->db->where('id', $id);
        $data['staff'] = $this->db->get('m_personil_pers')->row_array();
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nip', 'No. Nip', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header_pers', $data);
            $this->load->view('layout/nav_pers', $data);
            $this->load->view('layout/sidebar_pers', $data);
            $this->load->view('personalia/detail_staff', $data);
            $this->load->view('layout/footer_pers', $data);
        } else {
            $id = $this->input->post('id');
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $pangkat = $this->input->post('pangkat');
            $jabatan = $this->input->post('jabatan');
            $ket = $this->input->post('ket');
            $gender = $this->input->post('gender');
            $pendidikan = $this->input->post('pendidikan');
            $kualifikasi = $this->input->post('kualifikasi');
            $tmt = $this->input->post('tmt');
            $tgl = $this->input->post('tanggallahir');
            $aktif = $this->input->post('aktif');
            $gol = $this->input->post('gol');
            if (!$aktif) {
                $aktif = 0;
            }
            $this->db->set('nama', $nama);
            $this->db->set('nip', $nip);
            $this->db->set('tgl_lahir', $tgl);
            $this->db->set('pangkat', $pangkat);
            $this->db->set('jabatan', $jabatan);
            $this->db->set('ket', $ket);
            $this->db->set('gender', $gender);
            $this->db->set('pendidikan', $pendidikan);
            $this->db->set('kualifikasi', $kualifikasi);
            $this->db->set('tmt', $tmt);
            $this->db->set('updated_at', time());
            $this->db->set('gol', $gol);
            $this->db->where('id', $id);
            $this->db->update('m_personil_pers');
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
    public function Absensi()
    {
        $data['title'] = 'Doel Si Petir | Dashboard';
        $data['judul'] = 'Absensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('is_active', 1);
        $this->db->order_by('date_created', 'desc');
        $data['approve'] = $this->db->get_where('user')->result_array();
        $data['ja'] = count($data['approve']);
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        if (!$date1) {
            $date1 = date('Y-m-d');
            $date2 = date('Y-m-d');
        }
        $this->load->model('Absen_models', 'absen');
        $data['absen'] = $this->absen->getAbsenHarian($date1, $date2);
        $data['date1'] = $date1;
        $data['date2'] = $date2;

        $this->load->view('layout/header_pers', $data);
        $this->load->view('layout/nav_pers', $data);
        $this->load->view('layout/sidebar_pers', $data);
        $this->load->view('personalia/absensi/index', $data);
        $this->load->view('layout/footer_pers', $data);
    }
}
