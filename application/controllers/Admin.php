<?php

use GuzzleHttp\Psr7\Response;

class Admin extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('UserModel');
    }



    //Showing dashboard for all users (Donatur, Relawan, Penyintas)
    public function admin_dashboard()
    {

        $admin = $this->_getAdminData();



        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'Dashboard';
        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();

        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }



    //showing donatur contacts from admin
    public function admin_contacts_donatur()
    {
        $admin = $this->_getAdminData();


        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['data_donatur'] = $this->AdminModel->get_data_donatur();

        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();



        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'Contacts - Donatur';

        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/contacts_donatur', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }


    //showing donatur contacts from admin
    public function admin_contacts_relawan()
    {
        $admin = $this->_getAdminData();

        $data['total_relawan'] = $this->UserModel->getTotalRelawan();
        $data['data_relawan'] = $this->AdminModel->get_data_relawan();

        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();


        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'Contacts - Relawan';

        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/contacts_relawan', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }

    //showing donatur contacts from admin
    public function admin_contacts_penyintas()
    {
        $admin = $this->_getAdminData();

        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();

        $data['data_penyintas'] = $this->AdminModel->get_data_penyintas();


        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'Contacts - Penyintas';

        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/contacts_penyintas', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }


    //Showing live time chat for user
    public function admin_chat($role, $id, $name)
    {
        $admin = $this->_getAdminData();

        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();

        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'Chat';
        $data['chats'] = $this->UserModel->get_user_chat($id, $this->getUserRole($role));
        $data['user_name'] = $name;
        $data['user_data'] = $this->AdminModel->getSpecificUserData($id, $this->getUserRole($role));
        $data['user_role'] = $this->getUserRole($role);



        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/chat', $data);
            $this->load->view('admin/templates/footer');
            return $data['chats'];
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('admin_login');
        }
    }



    //Getting post text message and sending it to database 
    public function admin_chat_text_send()
    {


        $admin = $this->_getAdminData();


        if ($admin !== null) {
            $data = $this->AdminModel->admin_chat_text_send();
            echo $data;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('admin_login');
        }
    }


    //Getting post img message and sending it to database 
    public function admin_chat_img_send($role, $id, $user_name)
    {
        $admin = $this->_getAdminData();


        if ($admin !== null) {

            $config['upload_path']          = './upload/chat_img';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            var_dump($this->upload->do_upload('msg_attachement'));
            die;

            if ($this->upload->do_upload('msg_attachement')) {

                $img_url = $this->upload->data('file_name');
                $this->AdminModel->admin_chat_img_send("admin", $role, $id, $img_url);
                redirect('admin_chat/' . $role . '/' . $id . '/' . $user_name);
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('admin_login');
        }
    }


    //Getting admin data from session
    private  function _getAdminData()
    {
        return $user_data = $this->session->userdata('admin')['admin'];
    }


    //Function to get user role by number 1: donatur, 2: relawan, 3 : penyintas
    public function getUserRole($role)
    {

        switch ($role) {
            case 1:
                $user_role = 'donatur';
                break;
            case 2:
                $user_role = 'relawan';
                break;
            case 3:
                $user_role = 'penyintas';
                break;
        }

        return $user_role;
    }


    public function admin_get_user_data()
    {

        $role = $this->input->get('role');
        $id = $this->input->get('id');
        $name = $this->input->get('name');

        $this->admin_chat($role, $id, $name);
        $chats = $this->UserModel->get_user_chat($id, $this->getUserRole($role));
    }



    public function admin_get_chat()
    {

        $admin = $this->_getAdminData();

        if ($admin !== null) {
            $chats = $this->AdminModel->admin_get_chat();

            if (sizeof($chats) <= 0) {
                echo ' ';
            } else {

                foreach ($chats as $chat) :

                    $img_attachement = base_url("upload/chat_img/") . $chat["msg_attachement"];
                    if ($chat['msg_sender'] != 'admin' && $chat['msg_is_attached'] == 0) {
                        echo  '<div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' . $chat['msg_sender'] . '</span>' . str_repeat('&nbsp;', 5);
                        echo '<span class="direct-chat-timestamp float-left">&nbsp;&nbsp' .  (date("d F H:i a", $chat['msg_created'])) . '</span> </div>';
                        echo ' <img class="direct-chat-img float-left" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo '<div class="direct-chat-text float-left">' . $chat['msg_body'] . ' </div> </div>';
                    }
                    if ($chat['msg_sender'] == 'admin' && $chat['msg_is_attached'] == 0) {
                        echo ' <div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left">' . $chat['msg_sender'] . '</span>';
                        echo '<span class="direct-chat-timestamp float-right">' .  (date("d F H:i a", $chat['msg_created'])) . '</span></div>';
                        echo ' <img class="direct-chat-img float-right" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo '<div class="direct-chat-text float-right">' . $chat['msg_body'] . ' </div> </div>';
                    }
                    if ($chat['msg_sender'] != 'admin' && $chat['msg_is_attached'] != 0) {


                        echo ' <div class="direct-chat-msg "><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' . $chat['msg_sender'] . '</span>';
                        echo '<span class="direct-chat-timestamp float-left">' .  (date("d F H:i a", $chat['msg_created'])) . '-' . '</span> </div>';
                        echo ' <img class="direct-chat-img float-left" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo  '<div class="direct-chat-text float-left" style="height: 215px; width: 220px;">';
                        echo '<img src="' . $img_attachement . '" alt="" width="200px" height="200px"</div></div>';
                    }
                    if ($chat['msg_sender'] == 'admin' && $chat['msg_is_attached'] != 0) {


                        echo ' <div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left">' . $chat['msg_sender'] . '</span>';
                        echo '<span class="direct-chat-timestamp float-right">' .  (date("d F H:i a", $chat['msg_created'])) . '-' . '</span> </div>';
                        echo ' <img class="direct-chat-img float-right" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo  '<div class="direct-chat-text float-right" style="height: 215px; width: 220px;">';
                        echo '<img src="' . $img_attachement . '" alt="" width="200px" height="200px"</div></div>';
                    }


                endforeach;
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             <small>Plese login first</small>
             </div>');
            redirect('admin_login');
        }
    }



    public function admin_list_pengajuan_bantuan()
    {


        $admin = $this->_getAdminData();

        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'List Pengajuan Bantuan';
        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();
        $data['list_pengajuan_bantuan_penyintas'] = $this->AdminModel->show_list_pengajuan_penyintas();



        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/penyintas_list_pengajuan_bantuan', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }


    public function admin_penyintas_detail_pengajuan($noIdPengajuan)
    {

        $admin = $this->_getAdminData();


        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'Detail Permohonan';
        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();
        $data['list_pengajuan_bantuan_penyintas'] = $this->AdminModel->admin_get_detail_pengajuan($noIdPengajuan);
        $data['active_relawan'] = $this->AdminModel->get_active_relawan();



        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/penyintas_detail_pengajuan_bantuan', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }


    public function admin_get_cek_bantuan()
    {


        $admin = $this->_getAdminData();


        if ($admin !== null) {

            $hasil = $this->AdminModel->cek_bantuan();
            if ($hasil == 0) {
                echo "Tidak ada bantuan";
            } else {
                echo "Terdapat " . $hasil . " bantuan";
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }




    public function admin_list_bantuan_donatur()
    {



        $admin = $this->_getAdminData();
        $data['admin_name'] = $admin['ss_name'];
        $data['page_position'] = 'List Bantuan Donatur';
        $data['total_donatur'] = $this->UserModel->getTotalDonatur();
        $data['total_relawan'] = $this->UserModel->getTotalDonatur();
        $data['total_penyintas'] = $this->UserModel->getTotalPenyintas();

        $data['list_bantuan_donatur'] = $this->AdminModel->get_list_bantuan_donatur();

        if ($admin !== null) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/donatur_list_beri_bantuan', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }

    public function admin_reject_permohonan()
    {

        $admin = $this->_getAdminData();


        if ($admin !== null) {

            $this->AdminModel->admin_reject_permohonan();
            redirect('admin_list_pengajuan_bantuan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }



    public function admin_get_list_bantuan_penyintas()
    {
        $admin = $this->_getAdminData();


        if ($admin !== null) {

            $lists = $this->AdminModel->admin_get_list_bantuan_penyintas();

            echo '<select name="bantuan_id" id="bantuan_id" onchange="getSelected()" class="form-control">';
            echo '<option selected disabled>Pilih Bantuan...</option>';
            foreach ($lists as $list) :
                echo '<option value="' . $list['bantuan_id'] . '">' . $list['bb_nama'] . ' - ' . $list['bb_jumlah'] . ' ' . $list['bb_satuan'] . '</option>';
            endforeach;
            echo '</select>';
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              <small>Plese login first</small>
              </div>');
            redirect('admin_login');
        }
    }



    public function admin_get_donatur_bantuan_bb()
    {
        $admin = $this->_getAdminData();


        if ($admin !== null) {

            $data = $this->AdminModel->admin_get_donatur_bantuan_bb();
            $data_json = array('data' => $data);

            header('Content-Type: application/json');
            echo json_encode($data_json);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('admin_login');
        }
    }



    public function admin_create_task()
    {
        $admin = $this->_getAdminData();


        if ($admin !== null) {
            $this->AdminModel->admin_create_task();
            redirect('admin_list_pengajuan_bantuan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('admin_login');
        }
    }



    public function admin_set_all_status_telahambil($task_id)
    {
        $admin = $this->_getAdminData();


        if ($admin !== null) {
            $this->AdminModel->admin_set_all_status_telahambil($task_id);
            redirect('user_relawan_task_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('admin_login');
        }
    }
}
