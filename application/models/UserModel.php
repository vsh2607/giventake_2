<?php

class UserModel extends CI_Model
{


    public function proses_tambah_pengajuan($penyintas_id)
    {

        $barang_kebutuhan = $this->input->post('pb_barang_kebutuhan');
        $jumlah_barang = $this->input->post('pb_jumlah_barang');
        $satuan_barang = $this->input->post('pb_satuan_barang');
        $lokasi_drop = $this->input->post('pb_drop_loc');
        $deskripsi_tambahan = $this->input->post('pb_deskripsi_tambahan');

        $data = [
            'pb_deskripsi_tambahan' => $deskripsi_tambahan,
            'pb_satuan_barang' => $satuan_barang,
            'pb_jumlah_barang' => $jumlah_barang,
            'pb_barang_kebutuhan' => $barang_kebutuhan,
            'pb_status' => "Menunggu Konfirmasi",
            'pb_drop_loc' => $lokasi_drop,
            'ss_id' => 1,
            'penyintas_id' => $penyintas_id

        ];

        $this->db->insert('permohonan_bantuan', $data);
    }

    //Get all permohonan bantuan
    public function penyintas_get_permohonan_bantuan()
    {
        return  $this->db->get('permohonan_bantuan')->result_array();
    }



    //Input user text messages  to database
    public function user_chat_text_send($user_name, $user_role, $user_id)
    {

        $message_body = $this->input->post('message');

        if ($message_body == "") {
            return "No Msg";
        } else {

            if ($user_role == 1) {
                $data = [
                    'msg_body' => $message_body,
                    'msg_created' => time(),
                    'msg_is_attached' => 0,
                    'msg_sender' => $user_name,
                    'donatur_id' => $user_id,
                    'ss_id' => 1,
                    'msg_is_opened' => 0
                ];
            } else if ($user_role == 2) {
                $data = [
                    'msg_body' => $message_body,
                    'msg_created' => time(),
                    'msg_is_attached' => 0,
                    'msg_sender' => $user_name,
                    'relawan_id' => $user_id,
                    'ss_id' => 1,
                    'msg_is_opened' => 0
                ];
            } else {
                $data = [
                    'msg_body' => $message_body,
                    'msg_created' => time(),
                    'msg_is_attached' => 0,
                    'msg_sender' => $user_name,
                    'penyintas_id' => $user_id,
                    'ss_id' => 1,
                    'msg_is_opened' => 0
                ];
            }


            $this->db->insert('message', $data);

            return "Message Sent!";
        }
    }

    public function penyintas_get_permohonan_bantuan_list($user_id){
        $this->db->where('penyintas_id', $user_id);
        $result = $this->db->get('permohonan_bantuan')->result_array();
        return $result;
    }

    //Penyintas apply bantuan
    public function penyintas_minta_bantuan($user_id){

        $jenis_bantuan = $this->input->post('pb_jenis_bantuan');
        $barang_kebutuhan = $this->input->post('pb_barang_kebutuhan');
        $jumlah_barang = $this->input->post('pb_jumlah_barang');
        $satuan_barang = $this->input->post('pb_satuan_barang');
        $drop_loc = $this->input->post('pb_drop_loc');
        $deskripsi_tambahan = $this->input->post('pb_deskripsi_tambahan');


        $data = [
            'pb_deskripsi_tambahan' => $deskripsi_tambahan,
            'pb_satuan_barang' => $satuan_barang,
            'pb_jumlah_barang' => $jumlah_barang,
            'pb_barang_kebutuhan' => $barang_kebutuhan,
            'pb_status' => 'Pending',
            'pb_drop_loc' => $drop_loc,
            'pb_jenis_bantuan' => $jenis_bantuan,
            'penyintas_id' => $user_id,
            'ss_id' => 1,
            'pb_created' => time()
            
        ];

        $this->db->insert('permohonan_bantuan', $data);
    }

    //Input user img messages  to database
    public function user_chat_img_send($user_name, $user_role, $user_id, $img_url)
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


    //Getting all messages between user and admin
    public function get_user_chat($user_id, $role)
    {

        $this->db->where($role . '_id', $user_id)->where('ss_id', 1);
        $result = $this->db->get('message')->result_array();
        return $result;
    }



    //Getting number of relawan in database
    public function getTotalRelawan()
    {
        $this->db->where('identity_role', 2)->where('identity_is_active', 1);
        $total = $this->db->count_all_results('identity');
        return $total;
    }

    //Getting number of donatur in database
    public function getTotalDonatur()
    {
        $this->db->where('identity_role', 1)->where('identity_is_active',1);
        $total = $this->db->count_all_results('identity');
        return $total;
    }

    //Getting number of penyintas in database
    public function getTotalPenyintas()
    {
        $this->db->where('identity_role', 3)->where('identity_is_active', 1);
        $total = $this->db->count_all_results('identity');
        return $total;
    }
}
