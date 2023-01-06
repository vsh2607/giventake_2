<?php

class AdminModel extends CI_Model
{

    //Get spesific user that admin contacted
    public function getSpecificUserData($id, $role)
    {
        $this->db->where($role . '_id', $id);
        return  $this->db->get('identity')->row_array();
    }


    //Input admin text messages  to database
    public function admin_chat_text_send()
    {

        $message_body = $this->input->post('message');
        $user_role = $this->input->post('user_role');
        $user_id = $this->input->post('identity_id');


        if ($user_role == 1) {
            $data = [
                'msg_body' => $message_body,
                'msg_created' => time(),
                'msg_is_attached' => 0,
                'msg_sender' => 'admin',
                'donatur_id' => $user_id,
                'ss_id' => 1,
                'msg_is_opened' => 0
            ];
        } else if ($user_role == 2) {
            $data = [
                'msg_body' => $message_body,
                'msg_created' => time(),
                'msg_is_attached' => 0,
                'msg_sender' => 'admin',
                'relawan_id' => $user_id,
                'ss_id' => 1,
                'msg_is_opened' => 0
            ];
        } else {
            $data = [
                'msg_body' => $message_body,
                'msg_created' => time(),
                'msg_is_attached' => 0,
                'msg_sender' => 'admin',
                'penyintas_id' => $user_id,
                'ss_id' => 1,
                'msg_is_opened' => 0
            ];
        }


        $this->db->insert('message', $data);
    }


    //Input user img messages  to database
    public function admin_chat_img_send($user_name, $user_role, $user_id, $img_url)
    {
        $message_attachement = $img_url;


        if ($user_role == 1) {
            $data = [
                'msg_attachement' => $message_attachement,
                'msg_created' => time(),
                'msg_is_attached' => 1,
                'msg_sender' => $user_name,
                'donatur_id' => $user_id,
                'ss_id' => 1,
                'msg_is_opened' => 0
            ];
        } else if ($user_role == 2) {
            $data = [
                'msg_attachement' => $message_attachement,
                'msg_created' => time(),
                'msg_is_attached' => 1,
                'msg_sender' => $user_name,
                'relawan_id' => $user_id,
                'ss_id' => 1,
                'msg_is_opened' => 0
            ];
        } else {
            $data = [
                'msg_attachement' => $message_attachement,
                'msg_created' => time(),
                'msg_is_attached' => 1,
                'msg_sender' => $user_name,
                'penyintas_id' => $user_id,
                'ss_id' => 1,
                'msg_is_opened' => 0
            ];
        }


        $this->db->insert('message', $data);
    }



    public function get_data_donatur()
    {
        $this->db->where('identity_role', 1)->where('identity_is_active', 1);
        return $this->db->get('identity')->result_array();
    }

    public function get_data_relawan()
    {
        $this->db->where('identity_role', 2)->where('identity_is_active', 1);
        return $this->db->get('identity')->result_array();
    }

    public function get_data_penyintas()
    {
        $this->db->where('identity_role', 3)->where('identity_is_active', 1);
        return $this->db->get('identity')->result_array();
    }


    public function admin_get_chat()
    {

        // $user_role = $this->input->post('user_role');
        $user_id = $this->input->post('identity_id');
        $role = $this->input->post('role');



        $this->db->where($role . '_id', $user_id)->where('ss_id', 1);
        $result = $this->db->get('message')->result_array();
        return $result;
    }




    //Menampilkan list pengajuan dari penyintas
    public function show_list_pengajuan_penyintas()
    {
        $this->db->select('*')->from('penyintas');
        $this->db->join('permohonan_bantuan', 'permohonan_bantuan.penyintas_id = penyintas.id');
        $this->db->join('identity', 'identity.penyintas_id = penyintas.id');
        $result = $this->db->get()->result_array();
        return $result;
    }



    public function admin_get_detail_pengajuan($noIdPengajuan)
    {
        $this->db->select('*')->from('penyintas');
        $this->db->join('permohonan_bantuan', 'permohonan_bantuan.penyintas_id = penyintas.id');
        $this->db->join('identity', 'identity.penyintas_id = penyintas.id');
        $this->db->where('pb_id', $noIdPengajuan);
        $result = $this->db->get()->row();




        return $result;
    }



    public function cek_bantuan()
    {
        $bantuan =  $this->input->post('barang');

        $this->db->like('bb_nama', $bantuan);
        $total = $this->db->count_all_results('bantuan_barang');


        // $this->db->select('*')->from('bantuan_barang');
        // $this->db->join('bantuan','bantuan.bb_id = bantuan_barang.bb_id');
        // $this->db->like('bb_nama', $bantuan);
        // $hasil = $this->db->get('bantuan_barang')->result_array();



        return $total;
    }


    public function get_list_bantuan_donatur()
    {
        $this->db->select('*')->from('bantuan_barang');
        $this->db->join('bantuan', 'bantuan.bb_id = bantuan_barang.bb_id');
        $this->db->join('identity', 'identity.donatur_id = bantuan.donatur_id');
        $result = $this->db->get()->result_array();

        return $result;
    }



    public function admin_reject_permohonan()
    {
        $admin_respon = $this->input->post('admin_respon');
        $permohonan_id = $this->input->post('permohonan_id');

        $data = [
            'pb_jawaban' => $admin_respon,
            'pb_status' => 'Denied'
        ];
        $this->db->where('pb_id', $permohonan_id);
        $this->db->update('permohonan_bantuan', $data);
    }



    public function admin_get_list_bantuan_penyintas()
    {

        $bantuan =  $this->input->post('barang');

        $this->db->select('*')->from('bantuan_barang');
        $this->db->join('bantuan', 'bantuan.bb_id = bantuan_barang.bb_id');
        $this->db->like('bb_nama', $bantuan);
        $hasil = $this->db->get()->result_array();

        return $hasil;
    }


    public function admin_get_donatur_bantuan_bb()
    {
        $id_bantuan = $this->input->post('id_bantuan');
        $this->db->select('*')->from('bantuan');
        $this->db->join('bantuan_barang', 'bantuan_barang.bb_id = bantuan.bb_id');
        $this->db->join('donatur', 'donatur.id = bantuan.donatur_id');
        $this->db->join('identity', 'identity.donatur_id = donatur.id');
        $this->db->where('bantuan_id', $id_bantuan);
        $result = $this->db->get()->row();

        return $result;
    }

    public function get_active_relawan()
    {
        $this->db->select('*')->from('relawan');
        $this->db->join('identity', 'identity.relawan_id = relawan.id');
        $this->db->where('relawan.status', 'on');

        $result = $this->db->get()->result_array();

        return $result;
    }


    public function admin_create_task()
    {
        $nama_pemohon = $this->input->post('identity_name');
        $permohonan_drop_loc = $this->input->post('pb_drop_loc');
        $permohonan_bantuan_id = $this->input->post('pb_id');
        $bantuan_donatur_id = $this->input->post('bantuan_id');
        $nama_donatur = $this->input->post('donatur_name');
        $lokasi_pickup_donatur = $this->input->post('donatur_pickup_loc');
        $relawan_id = $this->input->post('relawan_id');


        $this->db->select("*")->from('bantuan');
        $this->db->join('bantuan_barang', 'bantuan_barang.bb_id = bantuan.bb_id');
        $this->db->where('bantuan.bantuan_id', $bantuan_donatur_id);
        $data_bantuan = $this->db->get()->row();

        $data = [
            'task_status' => 'Ditugaskan',
            'relawan_id' => $relawan_id,
            'ss_id' => 1,
            'bantuan_id' => $bantuan_donatur_id,
            'pb_id' => $permohonan_bantuan_id,
            'task_pickup_loc' => $lokasi_pickup_donatur,
            'task_drop_loc' => $permohonan_drop_loc,
            'task_description' => 'Mengantar ' . $data_bantuan->bb_jumlah . ' ' .  $data_bantuan->bb_satuan . ' ' . $data_bantuan->bb_nama
        ];



        $data_bantuan_donatur  = [
            'bantuan_status' => 'Mendapatkan Relawan'
        ];

        $this->db->where('bantuan_id', $bantuan_donatur_id);
        $this->db->update('bantuan', $data_bantuan_donatur);


        $data_permohonan_bantuan = [
            'pb_status' => 'Accepted'
        ];

        $this->db->where('pb_id', $permohonan_bantuan_id);
        $this->db->update('permohonan_bantuan', $data_permohonan_bantuan);

        $data_relawan = [
            'status' => 'off'
        ];

        $this->db->where('id', $relawan_id);
        $this->db->update('relawan', $data_relawan);

        $this->db->insert('task', $data);
    }


    public function admin_set_all_status_telahambil($task_id)
    {
        //status bantuan
        //status permohonan

        $this->db->where('task_id', $task_id);
        $task_data = $this->db->get('task')->row();


        $data_status_bantuan = [
            'bantuan_status' => 'Diantar'
        ];

        $this->db->where('bantuan_id', $task_data->bantuan_id);
        $this->db->update('bantuan', $data_status_bantuan);

        $data_status_permohonan = [
            'pb_status' => 'Sedang Diantar'
        ];


        $this->db->where('pb_id', $task_data->pb_id);
        $this->db->update('permohonan_bantuan', $data_status_permohonan);
    }

    public function admin_set_all_status_telahtiba($task_id)
    {
        //status bantuan
        //status permohonan

        $this->db->where('task_id', $task_id);
        $task_data = $this->db->get('task')->row();


        $data_status_bantuan = [
            'bantuan_status' => 'Telah Tiba'
        ];

        $this->db->where('bantuan_id', $task_data->bantuan_id);
        $this->db->update('bantuan', $data_status_bantuan);

        $data_status_permohonan = [
            'pb_status' => 'Telah Tiba'
        ];


        $this->db->where('pb_id', $task_data->pb_id);
        $this->db->update('permohonan_bantuan', $data_status_permohonan);

        $data_relawan = [
            'status' => 'on'
        ];


        
        $this->db->where('id', $task_data->relawan_id);
        $this->db->update('relawan', $data_relawan);


        $data_task = [
            'task_status' => 'Task Sudah Selesai'
        ];

        $this->db->where('task_id', $task_data->task_id);
        $this->db->update('task', $data_task);

    }
}
