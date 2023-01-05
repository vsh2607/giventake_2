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
}
