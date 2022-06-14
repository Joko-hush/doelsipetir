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

        $to = $this->input->post('email');
        $from = 'info@rsdustira.co.id';
        if ($type == 'tolak') {
            $subject = 'Aktivasi Akun';
            $body = base64_encode('Mohon Maaf akun Anda tidak di setujui silahkan hubungi bagian personalia untuk informasi lebih lanjut.');
        } else if ($type == 'setuju') {
            $subject = 'Aktivasi Akun';
            $body = base64_encode('Akun Anda telah di setujui. Silahkan klik link dibawah ini untuk login.<br> <a href="' . base_url() . 'auth' . '">Login</a>');
        }
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://172.165.115.224/sendmail.php");


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            "to=$to&from=$from&subject=$subject&text=$body"
        );
        $output = curl_exec($ch);

        curl_close($ch);
        return true;
    }
}
