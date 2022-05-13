<?php

class Pers_model extends CI_model
{
    public function approve($id, $stat)
    {
        if ($stat == 'tolak') {
            $this->db->where('id', $id);
            $user = $this->db->get('user')->row_array();
            $email = $user['email'];
            $this->db->where('id', $id);
            $this->db->delete('user');
            $this->_sendEmail($stat, $email);

            return $stat;
        } else {
            $this->db->where('id', $id);
            $user = $this->db->get('user')->row_array();
            $email = $user['email'];
            $kdstaff = $user['KDSTAFF'];
            $dbstaff = $this->load->database('staff', true);
            $dbstaff->where('KDSTAFF', $kdstaff);
            $staff = $dbstaff->get('M_STAFF')->row_array();
            if ($staff['JENISKELAMIN'] == 0) {
                $gender = 'L';
            } else {
                $gender = 'P';
            }
            $data = [
                'KDSTAFF' => $staff['KDSTAFF'],
                'name' => $user['name'],
                'tempat_lahir' => $staff['TEMPATLAHIR'],
                'tgl_lahir' => $staff['TANGGALLAHIR'],
                'sex' => $gender,
                'agama' => '',
                'gol_darah' => '',
                'email' => $user['email'],
                'tlp' => $staff['NOMOR_HP1'],
                'suku_bangsa' => '',
                'tmt_kerja' => $staff['TMTKERJA'],
                'image' => 'default.jpg',
                'pangkat' => '',
                'jabatan' => '',
                'tmt_jabatan' => '',
                'bpjs' => '',
                'npwp' => '',
                'ktp' => $staff['NOMOR_KTP'],
                'alamat' => '',
                'kategori' => $staff['KELOMPOKIPK'],
                'sumber_pa' => '',
                'satuan' => 'RS. DUSTIRA',
                'psi' => '',
                'created_at' => time(),
                'update_at' => time(),
                'deleted' => 'no',
                'deleted_at' => 0
            ];
            $this->db->insert('jb_personil', $data);
            $this->db->set('is_active', 2);
            $this->db->update('user');
            $this->_sendEMail($stat, $email);
            return $stat;
        }
    }
    private function _sendEmail($type, $email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'doelsipetir@gmail.com',
            'smtp_pass' => 'Simrs123*',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('doelsipetir@gmail.com', 'Doelsipetir App');
        $this->email->to($email);

        if ($type == 'tolak') {
            $this->email->subject('Aktivasi Akun');
            $this->email->message('Mohon Maaf akun Anda tidak di setujui silahkan hubungi bagian personalia untuk informasi lebih lanjut.');
        } else if ($type == 'setuju') {
            $this->email->subject('Aktivasi Akun');
            $this->email->message('Akun Anda telah di setujui. Silahkan klik link dibawah ini untuk login.<br> <a href="' . base_url() . 'auth' . '">Login</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
