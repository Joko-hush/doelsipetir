<?php
date_default_timezone_set('Asia/Jakarta');

$hari_ini = date('Y-m-d');
$time = date('H:i:s');
$no = $this->db->get('abs_kehadiran')->num_rows();
$noid = $no + 1;

switch (@$_GET['action']) {


    case 'absendd':
        $latitude = $_GET['latitude'];
        // list($lat, $long) = explode(',', $latitude);
        // if($lat != -6.88 and $long != 107.53){
        //     echo'anda tidak berada di RS. Dustira';
        //     redirect('staff');
        // }

        $files = $_FILES["webcam"]["name"];
        $ukuranFile = $_FILES['webcam']['size'];
        $error = $_FILES['webcam']['error'];
        $tmpName = $_FILES['webcam']['tmp_name'];


        $ukuran_file = $_FILES['webcam']['size'];


        // Cek User yang sudah login -----------------------------------------------
        $hadir = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $user['KDSTAFF'], 'TGL_MASUK' => $hari_ini])->num_rows();

        if ($hadir == 0) {
            $filename = '' . $user['name'] . '-in-' . $hari_ini . '-' . $user['KDSTAFF'] . '.jpg';
            $dataabsen = [
                'ID' => $noid,
                'KDSTAFF' => $user['KDSTAFF'],
                'TGL_MASUK' => $hari_ini,
                'TIME_IN' => $time,
                'TIME_OUT' => '00:00:00',
                'PICTURE_IN' => $filename,
                'PICTURE_OUT' => '-',
                'STAT_KERJA' => 1,
                'STAT_ABSEN' => 1,
                'LOK_IN' => $latitude,
                'LOK_OUT' => '-',
                'INFO' => '-',
                'DISETUJUI_OLEH' => '-'
            ];
            $this->db->insert('abs_kehadiran', $dataabsen);
            move_uploaded_file($tmpName, './assets/img/absen/' . $filename);
            echo 'success/Selamat Anda berhasil Absen Masuk pada Tanggal ' . $hari_ini . ' dan Jam : ' . $time . ', Selamat bekerja "' . $user['name'] . '" !';
        } else {

            $this->db->where('TGL_MASUK', $hari_ini);
            $this->db->where('KDSTAFF', $user['KDSTAFF']);
            $this->db->where('TIME_OUT', '00:00:00');
            $pulang = $this->db->get_where('abs_kehadiran')->num_rows();

            if ($pulang > 0) {
                $filename = '' . $user['name'] . '-out-' . $hari_ini . '-' . $user['KDSTAFF'] . '.jpg';
                $directory = "../assets/img/absen/" . $filename;

                $this->db->where('TGL_MASUK', $hari_ini);
                $this->db->where('KDSTAFF', $user['KDSTAFF']);
                $this->db->where('TIME_OUT', '00:00:00');
                $userpulang = $this->db->get_where('abs_kehadiran')->row_array();
                $id = $userpulang['ID'];

                $this->db->set('TIME_OUT', $time);
                $this->db->set('LOK_OUT', $latitude);
                $this->db->set('PICTURE_OUT', $filename);
                $this->db->set('STAT_ABSEN', '2');
                $this->db->where('ID', $id);
                $this->db->update('abs_kehadiran');


                $this->db->where('ID', $userpulang['ID']);
                $this->db->where('TIME_OUT', $time);
                $statpulang = $this->db->get_where('abs_kehadiran')->num_rows();

                if ($statpulang > 0) {

                    move_uploaded_file($tmpName, './assets/img/absen/' . $filename);
                    echo 'success/Selamat "' . $user['name'] . '" berhasil Absen Pulang pada Tanggal ' . $hari_ini . ' dan Jam : ' . $time . ', Hati-hati dijalan saat pulang "' . $user['name'] . '"!';
                }
            } else {
                echo 'Anda belum absen masuk hari ini';
            }



            break;
        }
    case 'absendl':
        $no = $this->db->get('abs_kehadiran')->num_rows();
        $noid = $no + 1;
        $latitude = $_GET['latitude'];
        $files = $_FILES["webcam"]["name"];
        $ukuranFile = $_FILES['webcam']['size'];
        $error = $_FILES['webcam']['error'];
        $tmpName = $_FILES['webcam']['tmp_name'];


        $ukuran_file = $_FILES['webcam']['size'];








        // Cek User yang sudah login -----------------------------------------------
        $hadir = $this->db->get_where('abs_kehadiran', ['KDSTAFF' => $user['KDSTAFF'], 'TGL_MASUK' => $hari_ini])->num_rows();

        if ($hadir == 0) {
            $filename = '' . $user['name'] . '-in-' . $hari_ini . '-' . $user['KDSTAFF'] . '.jpg';
            $dataabsen = [
                'ID' => $noid,
                'KDSTAFF' => $user['KDSTAFF'],
                'TGL_MASUK' => $hari_ini,
                'TIME_IN' => $time,
                'TIME_OUT' => '00:00:00',
                'PICTURE_IN' => $filename,
                'PICTURE_OUT' => '-',
                'STAT_KERJA' => 2,
                'STAT_ABSEN' => 1,
                'LOK_IN' => $latitude,
                'LOK_OUT' => '-',
                'INFO' => '-'
            ];
            $this->db->insert('abs_kehadiran', $dataabsen);
            move_uploaded_file($tmpName, './assets/img/absen/' . $filename);
            echo 'success/Selamat Anda berhasil Absen Masuk pada Tanggal ' . $hari_ini . ' dan Jam : ' . $time . ', Selamat bekerja "' . $user['name'] . '" !';
        }



        break;
}
