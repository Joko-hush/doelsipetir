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
            $kdstaff = $user['nik'];

            $this->db->where('nip', $kdstaff);
            $staff = $this->db->get('m_personil_pers')->row_array();
            if (!$staff['gender']) {
                $staff['gender'] = '-';
            }

            $data = [
                'nik' => $kdstaff,
                'name' => $user['name'],
                'tempat_lahir' => '',
                'tgl_lahir' => '',
                'sex' => $staff['gender'],
                'agama' => '',
                'gol_darah' => '',
                'email' => $user['email'],
                'tlp' => '',
                'suku_bangsa' => '',
                'tmt_kerja' => '',
                'image' => 'default.jpg',
                'pangkat' => '',
                'jabatan' => '',
                'tmt_jabatan' => '',
                'bpjs' => '',
                'npwp' => '',
                'ktp' => '',
                'alamat' => '',
                'kategori' => '',
                'sumber_pa' => '-',
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
            'smtp_host' => 'mail.rsdustira.co.id',
            'smtp_user' => 'admin@rsdustira.co.id',
            'smtp_pass' => 'Admin@rsdustira',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        ];

        $this->email->initialize($config);

        $this->email->from('admin@rsdustira.co.id', 'Doelsipetir App');
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
