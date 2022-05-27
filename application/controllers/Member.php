<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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

        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/index', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function personal_info()
    {
        $data['title'] = 'DOEL SI PETIR | DATA POKOK';
        $data['judul'] = 'Data Pokok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();

        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/info', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function rh()
    {
        $data['title'] = 'DOEL SI PETIR | RH';
        $data['judul'] = 'Riwayat Hidup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $this->db->order_by('tmt', 'desc');
        $data['pangkat'] = $this->db->get_where('jb_kepangkatan', ['personil_id' => $data['staff']['id']])->result_array();
        $this->db->order_by('thn', 'desc');
        $data['dikum'] = $this->db->get_where('jb_dik_um', ['personil_id' => $data['staff']['id']])->result_array();
        $id = $data['staff']['id'];
        $this->db->where('hub', 'anak');
        $this->db->where('personil_id', $id);
        $data['anak'] = $this->db->get_where('jb_keluarga')->result_array();


        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/rh', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function inputdata()
    {
        $data['title'] = 'DOEL SI PETIR | Isi Data';
        $data['judul'] = 'Pengisian Data Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $db150 = $this->load->database('staff', true);
        $data['pangkat'] = $db150->get('M_STAFF_PANGKAT')->result_array();
        $data['jabatan'] = $db150->get('M_STAFF_JABATAN')->result_array();
        $data['bagian'] = $db150->get('M_STAFF_BAGIAN')->result_array();

        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();

        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('tmt', 'desc');
        $data['kepangkatan'] = $this->db->get_where('jb_kepangkatan')->result_array();

        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('thn', 'desc');
        $data['dikum'] = $this->db->get('jb_dik_um')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('thn', 'desc');
        $data['dik_a'] = $this->db->get('jb_dikmil_a')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('thn', 'desc');
        $data['dik_b'] = $this->db->get('jb_dikmil_b')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $data['bahasa'] = $this->db->get('jb_b_daerah')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $data['bhsasing'] = $this->db->get('jb_b_asing')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('thn', 'desc');
        $data['tugasoperasi'] = $this->db->get('jb_r_tugas_operasi')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('thn', 'desc');
        $data['luarnegeri'] = $this->db->get('jb_r_tugas_luarnegri')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('thn', 'desc');
        $data['tandakehormatan'] = $this->db->get('jb_tanda_kehormatan')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $this->db->order_by('thn', 'desc');
        $data['prestasi'] = $this->db->get('jb_prestasi')->result_array();
        $data['jabatan'] = $this->db->get('m_jabatan')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $data['kk'] = $this->db->get('jb_kartu_keluarga')->row_array();
        if (!$data['kk']) {
            $data['kk'] = ['no_kk' => '', 'doc' => ''];
        }
        $this->db->where('personil_id', $data['staff']['id']);
        $data['npwp'] = $this->db->get('jb_npwp')->row_array();
        if (!$data['npwp']) {
            $data['npwp'] = ['npwp' => '', 'doc' => ''];
        }
        $data['jamKerja'] = $this->db->get('jam_kerja')->result_array();
        $this->db->where('personil_id', $data['staff']['id']);
        $data['kartuBpjs'] = $this->db->get_where('jb_bpjs')->row_array();
        if (!$data['kartuBpjs']) {
            $data['kartuBpjs'] = ['bpjs' => '', 'fktp' => '', 'doc' => ''];
        }
        $this->db->where('personil_id', $data['staff']['id']);
        $data['kartuKtp'] = $this->db->get_where('jb_ktp')->row_array();
        if (!$data['kartuKtp']) {
            $data['kartuKtp'] = ['noktp' => '', 'doc' => ''];
        }
        $this->db->where('personil_id', $data['staff']['id']);
        $data['kartuKaris'] = $this->db->get_where('jb_karis')->row_array();
        if (!$data['kartuKaris']) {
            $data['kartuKaris'] = ['no' => '', 'doc' => ''];
        }
        // var_dump($data['kartuBpjs']);
        // die;

        $this->form_validation->set_rules('nik', 'No Kepegawaian', 'trim|required');
        $this->form_validation->set_rules('tl', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('darah', 'Gol Darah', 'trim|required');
        $this->form_validation->set_rules('tlp', 'No Tlp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {

            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/jb_input', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/dosier/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');

                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $jabatan = $this->input->post('jabatan');
            $this->db->set('jabatan', $jabatan);
            $id = $this->input->post('id');
            $nik = $this->input->post('nik');
            $this->db->set('nik', $nik);
            $name = strtoupper(htmlspecialchars($this->input->post('name', true)));
            $this->db->set('name', $name);
            $tl = strtoupper(htmlspecialchars($this->input->post('tl', true)));
            $this->db->set('tempat_lahir', $tl);
            $ttl = strtoupper(htmlspecialchars($this->input->post('ttl', true)));
            $this->db->set('tgl_lahir', $ttl);
            $ttl = strtoupper(htmlspecialchars($this->input->post('ttl', true)));
            $this->db->set('tgl_lahir', $ttl);
            $gender = strtoupper(htmlspecialchars($this->input->post('gender', true)));
            $this->db->set('sex', $gender);
            $darah = strtoupper(htmlspecialchars($this->input->post('darah', true)));
            $this->db->set('gol_darah', $darah);
            $tlp = strtoupper(htmlspecialchars($this->input->post('tlp', true)));
            $this->db->set('tlp', $tlp);
            $email = htmlspecialchars($this->input->post('email', true));
            $this->db->set('email', $email);
            $agama = strtoupper(htmlspecialchars($this->input->post('agama', true)));
            $this->db->set('agama', $agama);
            $alamat = strtoupper(htmlspecialchars($this->input->post('alamat', true)));
            $this->db->set('alamat', $alamat);
            $jamKerja = $this->input->post('jamKerja');
            $this->db->set('jam_kerja_id', $jamKerja);
            $this->db->where('id', $id);
            $this->db->update('jb_personil');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data</div>');
            redirect('member/inputdata');
        }
    }
    public function ktp()
    {
        $this->form_validation->set_rules('no', 'No Ktp', 'trim|required|min_length[16]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {
            //cek ktp
            $this->db->where('personil_id', $this->input->post('id'));
            $ktp = $this->db->get('jb_ktp')->num_rows();

            if ($ktp > 0) {
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                    $config['max_size']         = '5000';
                    $config['upload_path']      = './assets/img/dosier/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('doc', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $id = $this->input->post('id');
                $this->db->where('personil_id', $id);
                $no = htmlspecialchars($this->input->post('no', true));
                $this->db->set('noktp', $no);
                $this->db->update('jb_ktp');
            } else {

                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                    $config['max_size']         = '5000';
                    $config['upload_path']      = './assets/img/dosier/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('doc', $new_image);

                        $id = $this->input->post('id');
                        $no = htmlspecialchars($this->input->post('no', true));
                        $data = [
                            'personil_id' => $id,
                            'noktp' => $no,
                            'ket' => 'M',
                            'created_at' => time(),
                            'update_at' => time(),
                            'deleted_at' => time(),
                            'deleted' => 'no'
                        ];
                        $this->db->insert('jb_ktp', $data);

                        $this->db->set('ktp', $no);
                        $this->db->where('id', $id);
                        $this->db->update('jb_personil');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data KTP</div>');
                        redirect('member/inputdata');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
            }
        }
    }
    public function kk()
    {
        $this->form_validation->set_rules('no', 'No KK', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {
            //cek kk 
            $id = $this->input->post('id');
            $this->db->where('personil_id', $id);
            $kk = $this->db->get('jb_kartu_keluarga')->row_array();
            if ($kk) {
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                    $config['max_size']         = '5000';
                    $config['upload_path']      = './assets/img/dosier/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('doc', $new_image);

                        $id = $this->input->post('id');
                        $this->db->where('personil_id', $id);
                        $no = htmlspecialchars($this->input->post('no', true));
                        $this->db->set('no_kk', $no);

                        $this->db->update('jb_kartu_keluarga');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Kartu Keluarga</div>');
                        redirect('member/inputdata');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
            } else {

                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                    $config['max_size']         = '5000';
                    $config['upload_path']      = './assets/img/dosier/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');

                        $id = $this->input->post('id');
                        $no = htmlspecialchars($this->input->post('no', true));
                        $data = [

                            'personil_id' => $id,
                            'no_kk' => $no,
                            'doc' => $new_image,
                            'created_at' => time(),
                            'updated_at' => time(),
                            'deleted_at' => 0,
                            'deleted' => 'no'
                        ];
                        $this->db->insert('jb_kartu_keluarga', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Kartu Keluarga</div>');
                        redirect('member/inputdata');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
            }
        }
    }
    public function karis()
    {
        $this->form_validation->set_rules('no', 'No karis/karsu', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {

            $id = $this->input->post('id');
            $no = htmlspecialchars($this->input->post('no', true));
            $this->db->where('personil_id', $id);
            $karis = $this->db->get('jb_karis')->row_array();
            if ($karis) {
                $id = $karis['id'];
                $this->db->set('no', $no);
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                    $config['max_size']         = '5000';
                    $config['upload_path']      = './assets/img/dosier/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('doc', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $this->db->where('id', $id);
                $this->db->update('jb_karis');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Kartu Istri/suami</div>');
                redirect('member/inputdata');
            } else {



                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                    $config['max_size']         = '5000';
                    $config['upload_path']      = './assets/img/dosier/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('doc', $new_image);

                        $data = [
                            'personil_id' => $id,
                            'no' => $no
                        ];
                        $this->db->insert('jb_karis', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Kartu Istri/suami</div>');
                        redirect('member/inputdata');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
            }
        }
    }
    public function bpjs()
    {
        $this->form_validation->set_rules('no', 'No bpjs', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);

                    $id = $this->input->post('id');
                    $no = htmlspecialchars($this->input->post('no', true));
                    $fktp = strtoupper(htmlspecialchars($this->input->post('fktp', true)));
                    $data = [
                        'personil_id' => $id,
                        'bpjs' => $no,
                        'fktp' => $fktp,
                        'created_at' => time(),
                        'updated_at' => time(),
                        'deleted_at' => 0,
                        'deleted' => 'no'
                    ];
                    $this->db->insert('jb_bpjs', $data);

                    $this->db->set('bpjs', $no);
                    $this->db->where('id', $id);
                    $this->db->update('jb_personil');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data BPJS</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function npwp()
    {
        $this->form_validation->set_rules('no', 'No NPWP', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {


            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);

                    $id = $this->input->post('id');
                    $no = htmlspecialchars($this->input->post('no', true));
                    $data = [

                        'personil_id' => $id,
                        'npwp' => $no,
                        'created_at' => time(),
                        'updated_at' => time(),
                        'deleted_at' => 0,
                        'deleted' => 'no'
                    ];
                    $this->db->where('personil_id', $id);
                    $cek = $this->db->get('jb_npwp')->num_rows();
                    if (
                        $cek > 0
                    ) {
                        $this->db->set('npwp', $no);
                        $this->db->where('personil_id', $id);
                        $this->db->update('jb_npwp');
                        $this->db->where('id', $id);
                        $this->db->set('npwp', $no);
                        $this->db->update('jb_personil');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data NPWP</div>');
                        redirect('member/inputdata');
                    } else {
                        $this->db->insert('jb_npwp', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data NPWP</div>');
                        $this->db->where('id', $id);
                        $this->db->set('npwp', $no);
                        $this->db->update('jb_personil');
                        redirect('member/inputdata');
                    }
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function pangkat()
    {
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
        $this->form_validation->set_rules('tmt', 'TMT Pangkat', 'trim|required');
        $this->form_validation->set_rules('skep', 'Skep Pangkat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data tidak lengkap, gagal disimpan</div>');
            redirect('member/inputdata');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);

                    $id = $this->input->post('id');
                    $pangkat = strtoupper(htmlspecialchars($this->input->post('pangkat'), true));
                    list($KD, $pkt) = explode(',', $pangkat);
                    $skep = strtoupper(htmlspecialchars($this->input->post('skep'), true));
                    $tmt = $this->input->post('tmt');
                    $data = [
                        'personil_id' => $id,
                        'pangkat' => $pkt,
                        'tmt' => $tmt,
                        'no_skep' => $skep,
                        'created_at' => time(),
                        'update_at' => time(),
                        'KDSTAFFPANGKAT' => $KD
                    ];
                    $this->db->insert('jb_kepangkatan', $data);
                    $p = substr($pkt, 0, 3);

                    if ($p == 'KHL') {
                        $this->db->where('id', $id);
                        $personal = $this->db->get('jb_kepangkatan')->row_array();
                        $idp = $personal['personil_id'];
                        $this->db->set('pangkat', $p);
                        $this->db->set('pangkat', $pkt);
                        $this->db->where('id', $idp);
                        $this->db->update('jb_personil');
                    } else {
                        $this->db->where('id', $id);
                        $personal = $this->db->get('jb_kepangkatan')->row_array();
                        $idp = $personal['personil_id'];

                        $this->db->select('pangkat');
                        $this->db->order_by('tmt', 'desc');
                        $this->db->where('personil_id', $idp);
                        $p = $this->db->get('jb_kepangkatan', 1)->row_array();
                        $pangkat = $p['pangkat'];
                        $this->db->set('pangkat', $pangkat);
                        $this->db->where('id', $idp);
                        $this->db->update('jb_personil');
                    }
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pangkat</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hapuskepangkatan()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_kepangkatan');

        $this->db->select('pangkat');
        $this->db->order_by('tmt', 'desc');
        $p = $this->db->get('jb_kepangkatan', 1)->row_array();
        $pangkat = $p['pangkat'];
        $this->db->set('pangkat', $pangkat);
        $this->db->where('id', $id);
        $this->db->update('jb_personil');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda berhasil melakukan hapus data Pangkat</div>');
        redirect('member/inputdata');
    }
    public function editkepangkatan()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $this->db->where('id', $id);
        $pkt = $this->db->get('jb_kepangkatan')->row_array();
        $data['pkt'] = $pkt;
        $db150 = $this->load->database('staff', true);
        $data['pangkat'] = $db150->get('M_STAFF_PANGKAT')->result_array();

        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Edit Riwayat Pangkat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required|trim');
        $this->form_validation->set_rules('tmt', 'TMT', 'required|trim');
        $this->form_validation->set_rules('skep', 'No Skep', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/editpangkat', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $tmt = $this->input->post('tmt');
            $skep = $this->input->post('skep');
            $pangkat = strtoupper(htmlspecialchars($this->input->post('pangkat')));
            list($KD, $pkt) = explode(',', $pangkat);
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('pangkat', $pkt);
            $this->db->set('KDSTAFFPANGKAT', $KD);
            $this->db->set('tmt', $tmt);
            $this->db->set('no_skep', $skep);
            $this->db->set('update_at', time());
            $this->db->where('id', $id);
            $this->db->update('jb_kepangkatan');
            $p = substr($pkt, 0, 3);

            if ($p == 'KHL') {
                $this->db->where('id', $id);
                $personal = $this->db->get('jb_kepangkatan')->row_array();
                $idp = $personal['personil_id'];
                $this->db->set('pangkat', $p);
                $this->db->set('pangkat', $pkt);
                $this->db->where('id', $idp);
                $this->db->update('jb_personil');
            } else {
                $this->db->where('id', $id);
                $personal = $this->db->get('jb_kepangkatan')->row_array();
                $idp = $personal['personil_id'];

                $this->db->select('pangkat');
                $this->db->order_by('tmt', 'desc');
                $this->db->where('personil_id', $idp);
                $p = $this->db->get('jb_kepangkatan', 1)->row_array();
                $pangkat = $p['pangkat'];
                $this->db->set('pangkat', $pangkat);
                $this->db->where('id', $idp);
                $this->db->update('jb_personil');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pangkat</div>');
            redirect('member/inputdata');
        }
    }
    public function pendidikan()
    {
        $this->form_validation->set_rules('jenis', 'Jenis Pendidikan', 'trim|required');
        $this->form_validation->set_rules('thn', 'Tahun Lulus', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg|webp';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);

                    $personil_id = $this->input->post('id');
                    $jenis_didik = strtoupper(htmlspecialchars($this->input->post('jenis')));
                    $thn = strtoupper(htmlspecialchars($this->input->post('thn')));
                    $nama = strtoupper(htmlspecialchars($this->input->post('nama')));
                    $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));

                    $data = [
                        'personil_id' => $personil_id,
                        'jenis_didik' => $jenis_didik,
                        'thn' => $thn,
                        'nama' => $nama,
                        'prestasi' => $prestasi,
                        'created_at' => time(),
                        'updated_at' => time()
                    ];
                    $this->db->insert('jb_dik_um', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pendidikan Umum</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hpsdikum()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_dik_um');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda berhasil melakukan hapus data Pendidikan Umum</div>');
        redirect('member/inputdata');
    }
    public function editdikum()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $dikum = $this->db->get('jb_dik_um')->row_array();
        $data['dikum'] = $dikum;

        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Edit Pendidikan Umum';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jenis', 'Jenis Pendidikan', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun lulus', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/edit_dikum', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $jenis = $this->input->post('jenis');
            $thn = $this->input->post('thn');
            $nama = $this->input->post('nama');
            $prestasi = $this->input->post('prestasi');
            $update = time();
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('jenis_didik', $jenis);
            $this->db->set('thn', $thn);
            $this->db->set('nama', $nama);
            $this->db->set('prestasi', $prestasi);
            $this->db->set('updated_at', $update);
            $this->db->where('id', $id);
            $this->db->update('jb_dik_um');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pendidikan umum</div>');
            redirect('member/inputdata');
        }
    }
    public function dik_a()
    {
        $this->form_validation->set_rules('jenis', 'Jenis Pendidikan', 'trim|required');
        $this->form_validation->set_rules('thn', 'Tahun Lulus', 'trim|required');
        $this->form_validation->set_rules('kep', 'No Kep', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);

                    $personil_id = $this->input->post('id');
                    $jenis_didik = strtoupper(htmlspecialchars($this->input->post('jenis')));
                    $thn = strtoupper(htmlspecialchars($this->input->post('thn')));
                    $kep = strtoupper(htmlspecialchars($this->input->post('kep')));
                    $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));

                    $data = [
                        'personil_id' => $personil_id,
                        'nama' => $jenis_didik,
                        'thn' => $thn,
                        'prestasi' => $prestasi,
                        'kep' => $kep,
                        'created_at' => time(),
                        'update_at' => time()
                    ];
                    $this->db->insert('jb_dikmil_a', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pendidikan Militer</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hpsdikmila()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_dikmil_a');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan hapus data Pendidikan Militer</div>');
        redirect('member/inputdata');
    }
    public function editdikmila()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $this->db->where('id', $id);
        $dikmil = $this->db->get('jb_dikmil_a')->row_array();
        $data['dikmil'] = $dikmil;

        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Edit Pendidikan Militer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jenis', 'Nama / Jenis Pendidikan', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun pendidikan', 'required|trim');
        $this->form_validation->set_rules('kep', 'No Kep', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/editdikmil', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $nama = strtoupper(htmlspecialchars($this->input->post('jenis')));
            $this->db->set('nama', $nama);
            $thn = $this->input->post('thn');
            $this->db->set('thn', $thn);
            $kep = strtoupper(htmlspecialchars($this->input->post('kep')));
            $this->db->set('kep', $kep);
            $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));
            $this->db->set('prestasi', $prestasi);

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('update_at', time());
            $this->db->where('id', $id);
            $this->db->update('jb_dikmil_a');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pendidikan Militer</div>');
            redirect('member/inputdata');
        }
    }
    public function editdikmilB()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $this->db->where('id', $id);
        $dikmil = $this->db->get('jb_dikmil_b')->row_array();
        $data['dikmil'] = $dikmil;

        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Edit Pendidikan Militer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jenis', 'Nama / Jenis Pendidikan', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun pendidikan', 'required|trim');
        $this->form_validation->set_rules('kep', 'No Kep', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/editdikmilb', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $nama = strtoupper(htmlspecialchars($this->input->post('jenis')));
            $this->db->set('nama', $nama);
            $thn = $this->input->post('thn');
            $this->db->set('thn', $thn);
            $kep = strtoupper(htmlspecialchars($this->input->post('kep')));
            $this->db->set('kep', $kep);
            $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));
            $this->db->set('prestasi', $prestasi);

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('update_at', time());
            $this->db->where('id', $id);
            $this->db->update('jb_dikmil_b');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pendidikan Militer</div>');
            redirect('member/inputdata');
        }
    }
    public function hpsdikmilb()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_dikmil_b');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan hapus data Pendidikan Militer</div>');
        redirect('member/inputdata');
    }


    public function dik_b()
    {
        $this->form_validation->set_rules('jenis', 'Jenis Pendidikan', 'trim|required');
        $this->form_validation->set_rules('thn', 'Tahun Lulus', 'trim|required');
        $this->form_validation->set_rules('nama', 'No Kep', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">tidak ada data yang dikirim</div>');
            redirect('member/inputdata');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);

                    $personil_id = $this->input->post('id');
                    $jenis_didik = strtoupper(htmlspecialchars($this->input->post('jenis')));
                    $thn = strtoupper(htmlspecialchars($this->input->post('thn')));
                    $nama = strtoupper(htmlspecialchars($this->input->post('nama')));
                    $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));

                    $data = [
                        'personil_id' => $personil_id,
                        'nama' => $jenis_didik,
                        'thn' => $thn,
                        'prestasi' => $prestasi,
                        'kep' => $nama,
                        'created_at' => time(),
                        'update_at' => time()
                    ];
                    $this->db->insert('jb_dikmil_b', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Pendidikan Militer</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function bhs_d()
    {
        $personil_id = $this->input->post('id');
        $bahasa = strtoupper(htmlspecialchars($this->input->post('bahasa')));
        $isactive = strtoupper(htmlspecialchars($this->input->post('isactive')));

        $data = [
            'personil_id' => $personil_id,
            'nama' => $bahasa,
            'isactive' => $isactive,
            'created_at' => time(),
            'update_at' => time()
        ];
        $this->db->insert('jb_b_daerah', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Bahasa Daerah</div>');
        redirect('member/inputdata');
    }
    public function bhs_asing()
    {
        $personil_id = $this->input->post('id');
        $bahasa = strtoupper(htmlspecialchars($this->input->post('bahasa')));
        $isactive = strtoupper(htmlspecialchars($this->input->post('isactive')));

        $data = [
            'personil_id' => $personil_id,
            'nama' => $bahasa,
            'isactive' => $isactive,
            'created_at' => time(),
            'update_at' => time()
        ];
        $this->db->insert('jb_b_asing', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Bahasa asing</div>');
        redirect('member/inputdata');
    }
    public function hapus_bahasa_asing()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_b_asing');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Bahasa asing</div>');
        redirect('member/inputdata');
    }
    public function hapus_bahasa_daerah()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_b_daerah');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Bahasa daerah</div>');
        redirect('member/inputdata');
    }
    public function tln()
    {
        $personil_id = $this->input->post('id');
        $nama = strtoupper(htmlspecialchars($this->input->post('nama')));
        $thn = strtoupper(htmlspecialchars($this->input->post('thn')));
        $negara = strtoupper(htmlspecialchars($this->input->post('negara')));
        $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
            $config['max_size']         = '5000';
            $config['upload_path']      = './assets/img/dosier/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('doc', $new_image);

                $data = [
                    'personil_id' => $personil_id,
                    'nama' => $nama,
                    'thn' => $thn,
                    'negara' => $negara,
                    'prestasi' => $prestasi,
                    'created_at' => time(),
                    'updated_at' => time()
                ];
                $this->db->insert('jb_r_tugas_luarnegri', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil melakukan update data Tugas luar negeri</div>');
                redirect('member/inputdata');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
    public function tkh()
    {
        $this->form_validation->set_rules('nama', 'Nama Tanda Kehormatan', 'required|trim');
        $this->form_validation->set_rules('prestasi', 'Prestasi', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun Tanda Kehormatan', 'required|trim|max_length[4]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sepertinya Anda salah menginput sehingga tidak ada data yang di kirim.</div>');
            redirect('member/inputdata');
        } else {
            $personil_id = $this->input->post('id');
            $nama = strtoupper(htmlspecialchars($this->input->post('nama')));
            $thn = strtoupper(htmlspecialchars($this->input->post('thn')));
            $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);

                    $data = [
                        'personil_id' => $personil_id,
                        'nama' => $nama,
                        'thn' => $thn,
                        'prestasi' => $prestasi,
                        'created_at' => time(),
                        'update_at' => time()
                    ];
                    $this->db->insert('jb_tanda_kehormatan', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil menambahkan data Tanda kehormatan</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hpstkh()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_tanda_kehormatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil melakukan Hapus data Tanda Kehormatan.</div>');
        redirect('member/inputdata');
    }
    public function edittkh()
    {
        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Dashboard Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $this->db->where('id', $id);
        $data['tkh'] = $this->db->get('jb_tanda_kehormatan')->row_array();
        $this->form_validation->set_rules('nama', 'Nama Tanda Kehormatan', 'required|trim');
        $this->form_validation->set_rules('prestasi', 'Prestasi', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun Tanda Kehormatan', 'required|trim|max_length[4]');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/edittkh', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $nama = strtoupper(htmlspecialchars($this->input->post('nama')));
            $thn = strtoupper(htmlspecialchars($this->input->post('thn')));
            $prestasi = strtoupper(htmlspecialchars($this->input->post('prestasi')));
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('update_at', time());
            $this->db->set('nama', $nama);
            $this->db->set('thn', $thn);
            $this->db->set('prestasi', $prestasi);
            $this->db->where('id', $id);
            $this->db->update('jb_tanda_kehormatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil mengubah data Tanda kehormatan</div>');
            redirect('member/inputdata');
        }
    }
    public function prestasi()
    {
        $this->form_validation->set_rules('nama', 'Kegiatan', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun', 'required|trim|max_length[4]');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tidak ada data yang dikirim.</div>');
            redirect('member/inputdata');
        } else {
            $id = $this->input->post('id');
            $nama = strtoupper(htmlspecialchars($this->input->post('nama')));
            $thn = $this->input->post('thn');
            $tempat = strtoupper(htmlspecialchars($this->input->post('tempat')));
            $deskripsi = strtoupper(htmlspecialchars($this->input->post('deskripsi')));
            $kep = $this->input->post('kep');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                    $data = [
                        'personil_id' => $id,
                        'kegiatan' => $nama,
                        'thn' => $thn,
                        'tempat' => $tempat,
                        'deskripsi' => $deskripsi,
                        'kep' => $kep,
                        'created_at' => time(),
                        'update_at' => time()
                    ];
                    $this->db->insert('jb_prestasi', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data prestasi.</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function kinerja()
    {
        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Kinerja Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $kdstaff = $data['staff']['KDSTAFF'];

        $db2 = $this->load->database('staff', true);
        $db2->where('M_ITEM_PENCAPAIAN_STAFF.KDSTAFF', $kdstaff);
        $db2->from('M_ITEM_PENCAPAIAN_STAFF');
        $db2->join('M_ITEMPENCAPAIAN', 'M_ITEMPENCAPAIAN.KDITEMPENCAPAIN = M_ITEM_PENCAPAIAN_STAFF.KDITEMPENCAPAIN');
        $item = $db2->get()->result_array();
        $data['item'] = $item;
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        if (!$date1) {
            $date1 = date('Y-m-d', strtotime('first day of this month'));
        }
        if (!$date2) {
            $date2 = date('Y-m-d', strtotime('last day of this month'));
        }
        // $date1 = date('Y-m-d', strtotime('first day of this month'));
        // $date2 = date('Y-m-d', strtotime('last day of this month'));

        $db2->where('KDSTAFF', $kdstaff);
        $db2->where('DATE >=', $date1);
        $db2->where('DATE <=', $date2);
        $data['kinerja'] = $db2->get('F_KINERJAPENCAPAIN_H')->result_array();
        $db2->where('KDSTAFF', $kdstaff);
        $db2->where('DATE >=', $date1);
        $db2->where('DATE <=', $date2);
        $db2->select('sum(VOLUME)');
        $sum = $db2->get('F_KINERJAPENCAPAIN_H')->result_array();
        $data['sum'] = $sum[0][""];



        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/kinerja', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function tambahKinerja()
    {
        $db2 = $this->load->database('staff', true);

        $data['title'] = 'DOEL SI PETIR';
        $data['judul'] = 'Kinerja Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $kdstaff = $data['staff']['KDSTAFF'];
        $db2 = $this->load->database('staff', true);
        $db2->where('M_ITEM_PENCAPAIAN_STAFF.KDSTAFF', $kdstaff);
        $db2->from('M_ITEM_PENCAPAIAN_STAFF');
        $db2->join('M_ITEMPENCAPAIAN', 'M_ITEMPENCAPAIAN.KDITEMPENCAPAIN = M_ITEM_PENCAPAIAN_STAFF.KDITEMPENCAPAIN');
        $db2->where('M_ITEMPENCAPAIAN.ISACTIVE', 1);
        $item = $db2->get()->result_array();
        $data['item'] = $item;
        $date1 = date('Y-m-d', strtotime('first day of this month'));
        $date2 = date('Y-m-d', strtotime('last day of this month'));
        // var_dump($kdstaff);
        // die;

        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim');
        $this->form_validation->set_rules('output', 'Output', 'required|trim');
        $this->form_validation->set_rules('volume', 'Volume', 'required|trim');
        if ($this->form_validation->run() == false) {
            $db2->where('KDSTAFF', $kdstaff);
            $db2->where('DATE >=', $date1);
            $db2->where('DATE <=', $date2);
            $data['kinerja'] = $db2->get('F_KINERJAPENCAPAIN_H')->result_array();


            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/kinerja', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = '*';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $db2->set('UPLOADDOKUMEN', $new_image);
                    $data = [
                        'KDSTAFF' => $this->input->post('id'),
                        'DATECREATED' => date('Y-m-d h:i:s'),
                        'DATEUPDATED' => date('Y-m-d h:i:s'),
                        'DATE' => $this->input->post('date'),
                        'KDITEMPENCAPAIN' => $this->input->post('kegiatan'),
                        'OUTPUT' => $this->input->post('output'),
                        'VOLUME' => $this->input->post('volume'),
                        'SATUAN' => $this->input->post('satuan'),
                        'KETERANGAN' => $this->input->post('ket'),
                        'KDUSER' => $data['user']['id']
                    ];
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $data = [
                    'KDSTAFF' => $this->input->post('id'),
                    'DATECREATED' => date('Y-m-d h:i:s'),
                    'DATEUPDATED' => date('Y-m-d h:i:s'),
                    'DATE' => $this->input->post('date'),
                    'KDITEMPENCAPAIN' => $this->input->post('kegiatan'),
                    'OUTPUT' => $this->input->post('output'),
                    'VOLUME' => $this->input->post('volume'),
                    'SATUAN' => $this->input->post('satuan'),
                    'KETERANGAN' => $this->input->post('ket'),
                    'KDUSER' => $data['user']['id']
                ];
            }

            $db2->insert('F_KINERJAPENCAPAIN_H', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data Kinerja.</div>');
            redirect('member/kinerja');
        }
    }
    public function hapuskinerja()
    {
        $id = $this->input->get('id');
        $db2 = $this->load->database('staff', true);
        $db2->where('KDKINERJAPENCAPAIN', $id);
        $db2->delete('F_KINERJAPENCAPAIN_H');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data Kinerja.</div>');
        redirect('member/kinerja');
    }
    public function editkinerja()
    {

        $id = $this->input->get('id');
        $db2 = $this->load->database('staff', true);
        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Edit Kinerja Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $kdstaff = $data['staff']['KDSTAFF'];
        $db2->where('KDKINERJAPENCAPAIN', $id);
        $data['kinerja'] = $db2->get('F_KINERJAPENCAPAIN_H')->row_array();

        $db2->where('M_ITEM_PENCAPAIAN_STAFF.KDSTAFF', $kdstaff);
        $db2->from('M_ITEM_PENCAPAIAN_STAFF');
        $db2->join('M_ITEMPENCAPAIAN', 'M_ITEMPENCAPAIAN.KDITEMPENCAPAIN = M_ITEM_PENCAPAIAN_STAFF.KDITEMPENCAPAIN');
        $db2->where('M_ITEMPENCAPAIAN.ISACTIVE', 1);
        $item = $db2->get()->result_array();
        $data['item'] = $item;

        $db2->where('KDITEMPENCAPAIN', $data['kinerja']['KDITEMPENCAPAIN']);
        $i = $db2->get('M_ITEMPENCAPAIAN')->row_array();
        $data['k'] = $i['KEGIATAN'];


        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim');
        $this->form_validation->set_rules('output', 'Output', 'required|trim');
        $this->form_validation->set_rules('volume', 'Volume', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/editkinerja', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = '*';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $db2->set('UPLOADDOKUMEN', $new_image);
                    $data = [


                        'KDUSER' => $data['user']['id']
                    ];
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $kds = $this->input->post('id');
            $idi = $this->input->post('idi');
            $db2->set('KDSTAFF', $kds);
            $db2->set('DATEUPDATED', date('Y-m-d h:i:s'));
            $date = $this->input->post('date');
            $db2->set('DATE', $date);
            $itemp = $this->input->post('kegiatan');
            $db2->set('KDITEMPENCAPAIN', $itemp);
            $out = $this->input->post('output');
            $db2->set('OUTPUT', $out);
            $volume = $this->input->post('volume');
            $db2->set('VOLUME', $volume);
            $sat = $this->input->post('satuan');
            $db2->set('SATUAN', $sat);
            $ket = $this->input->post('ket');
            $db2->set('KETERANGAN', $ket);
            $db2->set('KDUSER', $data['user']['id']);
            $db2->where('KDKINERJAPENCAPAIN', $idi);

            $db2->update('F_KINERJAPENCAPAIN_H');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Edit data Kinerja.</div>');
            redirect('member/kinerja');
        }
    }
    public function editprestasi()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Edit Kinerja Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $kdstaff = $data['staff']['KDSTAFF'];

        $this->db->where('id', $id);
        $data['prestasi'] = $this->db->get('jb_prestasi')->row_array();

        $this->form_validation->set_rules('nama', 'Kegiatan', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun Kegiatan', 'required|trim|max_length[4]');
        $this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Kegiatan', 'required|trim');
        $this->form_validation->set_rules('kep', 'Kep/Piagam Kegiatan', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/editprestasi', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $nama = strtoupper(htmlspecialchars($this->input->post('nama')));
            $this->db->set('kegiatan', $nama);
            $thn = $this->input->post('thn');
            $this->db->set('thn', $thn);
            $tempat = strtoupper(htmlspecialchars($this->input->post('tempat')));
            $this->db->set('tempat', $tempat);
            $deskripsi = strtoupper(htmlspecialchars($this->input->post('deskripsi')));
            $this->db->set('deskripsi', $deskripsi);
            $kep = $this->input->post('kep');
            $this->db->set('kep', $kep);

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('update_at', time());
            $this->db->where('id', $id);
            $this->db->update('jb_prestasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil melakukan edit data prestasi.</div>');
            redirect('member/inputdata');
        }
    }
    public function hpsstar()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_prestasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil melakukan Hapus data prestasi.</div>');
        redirect('member/inputdata');
    }
    public function tugasOperasi()
    {
        $this->form_validation->set_rules('nama', 'Nama Tugas Operasi', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun Tugas Operasi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data yang dikirim tidak lengkap</div>');
            redirect('member/inputdata');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $thn = $this->input->post('thn');
            $prestasi = $this->input->post('prestasi');
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                    $data1 = [
                        'personil_id' => $id,
                        'nama' => $nama,
                        'thn' => $thn,
                        'prestasi' => $prestasi,
                        'created_at' => time(),
                        'update_at' => time()
                    ];
                    $this->db->insert('jb_r_tugas_operasi', $data1);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat tugas operasi berhasil ditambahkan</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function editto()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $this->db->where('id', $id);
        $to = $this->db->get('jb_r_tugas_operasi')->row_array();
        $data['to'] = $to;

        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Edit Kinerja Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Tugas Operasi', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun Tugas Operasi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/editto', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $thn = $this->input->post('thn');
            $prestasi = $this->input->post('prestasi');
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('thn', $thn);
            $this->db->set('prestasi', $prestasi);
            $this->db->set('update_at', time());
            $this->db->where('id', $id);
            $this->db->update('jb_r_tugas_operasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat tugas operasi berhasil ditambahkan</div>');
            redirect('member/inputdata');
        }
    }
    public function hpsto()
    {
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        $this->db->delete('jb_r_tugas_operasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat tugas operasi berhasil hapus</div>');
        redirect('member/inputdata');
    }
    public function tugasLuarNegeri()
    {
        $this->form_validation->set_rules('nama', 'Nama Tugas', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data yang dikirim tidak lengkap</div>');
            redirect('member/inputdata');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $thn = $this->input->post('thn');
            $negara = $this->input->post('negara');
            $prestasi = $this->input->post('prestasi');
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                    $data1 = [
                        'personil_id' => $id,
                        'nama' => $nama,
                        'thn' => $thn,
                        'negara' => $negara,
                        'prestasi' => $prestasi,
                        'created_at' => time(),
                        'update_at' => time()
                    ];
                    $this->db->insert('jb_r_tugas_luarnegri', $data1);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat tugas luar negeri berhasil di tambahkan.</div>');
                    redirect('member/inputdata');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hpstln()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('jb_r_tugas_luarnegri');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat tugas luar negeri berhasil di hapus.</div>');
        redirect('member/inputdata');
    }
    public function edittln()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $id = $this->input->post('id');
        }
        $this->db->where('id', $id);
        $to = $this->db->get('jb_r_tugas_luarnegri')->row_array();
        $data['to'] = $to;

        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Edit Kinerja Personil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Tugas Operasi', 'required|trim');
        $this->form_validation->set_rules('thn', 'Tahun Tugas Operasi', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/edittln', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $thn = $this->input->post('thn');
            $negara = $this->input->post('negara');
            $prestasi = $this->input->post('prestasi');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->set('thn', $thn);
            $this->db->set('negara', $negara);
            $this->db->set('prestasi', $prestasi);
            $this->db->set('update_at', time());
            $this->db->where('id', $id);
            $this->db->update('jb_r_tugas_luarnegri');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat tugas operasi berhasil ditambahkan</div>');
            redirect('member/inputdata');
        }
    }
    public function jabatan()
    {

        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Edit Jabatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        // if ($data['staff']['pangkat'] == ' KHL') {
        //     redirect('member/fungsional');
        // }

        $this->load->view('member/layout/jb_header', $data);
        $this->load->view('member/layout/jb_nav', $data);
        $this->load->view('member/input/jabatan', $data);
        $this->load->view('member/layout/jb_footer', $data);
    }
    public function fungsional()
    {
        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Riwayat Jabatan Fungsional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $this->db->where('isactive', 1);
        $data['jabatan'] = $this->db->get('m_jabatan')->result_array();
        $this->db->where('nip', $data['staff']['nip']);
        $data['jabatan_f'] = $this->db->get('jabatan_fungsional')->result_array();


        $this->form_validation->set_rules('nama', 'Nama Jabatan', 'trim|required');
        $this->form_validation->set_rules('skep', 'skep/sprint Jabatan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/fungsional', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $jabatan = $this->input->post('nama');
            $skep = $this->input->post('skep');
            $tmt = $this->input->post('tmt');
            list($j_id, $name) = explode(',', $jabatan);

            $upload_image = $_FILES['image']['name'];


            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                    $data = [
                        'jabatan_id' => $j_id,
                        'nama' => $name,
                        'skep' => $skep,
                        'tmt' => $tmt,
                        'isactive' => 1,
                        'nip' => $id,
                        'created_at' => time(),
                        'updated_at' => time()
                    ];
                    $this->db->insert('jabatan_fungsional', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat jabatan fungsional berhasil ditambahkan</div>');
                    redirect('member/fungsional');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hapusFungsional()
    {
        $id = $this->input->get('id');
        $this->db->delete('jabatan_fungsional', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat jabatan fungsional berhasil dihapus</div>');
        redirect('member/fungsional');
    }
    public function editFungsional()
    {
        $id = $this->input->get('id');
        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Edit Riwayat Jabatan Fungsional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $this->db->where('id', $id);
        $data['jabatan_f'] = $this->db->get('jabatan_fungsional')->row_array();
        $this->db->where('isactive', 1);
        $data['jabatan'] = $this->db->get('m_jabatan')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Jabatan', 'trim|required');
        $this->form_validation->set_rules('skep', 'Skep Jabatan', 'trim|required');
        $this->form_validation->set_rules('tmt', 'TMT Jabatan', 'trim|required');
        if ($this->form_validation->run() == false) {

            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/editFungsional', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $id = $this->input->post('id');
            $jabatan = $this->input->post('nama');
            list($j_id, $name) = explode(',', $jabatan);
            $skep = $this->input->post('skep');
            $tmt = $this->input->post('tmt');
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');

                    $this->db->set('doc', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('updated_at', time());
            $this->db->set('skep', $skep);
            $this->db->set('tmt', $tmt);
            $this->db->set('jabatan_id', $j_id);
            $this->db->set('nama', $name);
            $this->db->where('id', $id);
            $this->db->update('jabatan_fungsional');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat jabatan fungsional berhasil diubah</div>');
            redirect('member/fungsional');
        }
    }
    public function struktural()
    {
        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Riwayat Jabatan Struktural';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $this->db->where('nip', $data['staff']['nip']);
        $data['jabatan'] = $this->db->get('jabatan_struktural')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Jabatan', 'trim|required');
        $this->form_validation->set_rules('skep', 'skep/sprint Jabatan', 'trim|required');
        $this->form_validation->set_rules('tmt', 'TMT Jabatan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('member/layout/jb_header', $data);
            $this->load->view('member/layout/jb_nav', $data);
            $this->load->view('member/input/jabstruk', $data);
            $this->load->view('member/layout/jb_footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];
            $nama = $this->input->post('nama');
            $skep = $this->input->post('skep');
            $tmt = $this->input->post('tmt');
            $tmt = $this->input->post('tmt');
            $id = $this->input->post('id');

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']         = '5000';
                $config['upload_path']      = './assets/img/dosier/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('doc', $new_image);
                    $data = [
                        'nama' => $nama,
                        'tmt' => $tmt,
                        'skep' => $skep,
                        'isactive' => 1,
                        'nip' => $id,
                        'created_at' => time(),
                        'updated_at' => time()
                    ];
                    $this->db->insert('jabatan_struktural', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat jabatan struktural berhasil disimpan</div>');
                    redirect('member/struktural');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hapusStruktural()
    {
        $id = $this->input->get('id');
        $this->db->delete('jabatan_struktural', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data riwayat jabatan struktural berhasil dihapus</div>');
        redirect('member/struktural');
    }
    public function editStruktural()
    {
        $id = $this->input->get('id');
        $data['title'] = 'DOELSIPETIR';
        $data['judul'] = 'Edit Riwayat Jabatan Fungsional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['staff'] = $this->db->get_where('jb_personil', ['email' => $data['user']['email']])->row_array();
        $this->db->where('id', $id);
        $data['jabatan_f'] = $this->db->get('jabatan_fungsional')->row_array();
        $this->db->where('isactive', 1);
        $data['jabatan'] = $this->db->get('m_jabatan')->result_array();
    }
}
