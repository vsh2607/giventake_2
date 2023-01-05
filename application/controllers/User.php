<?php


class User extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('TestModel');
        $this->load->library('form_validation');
    }


    //Showing dashboard for all users (Donatur, Relawan, Penyintas)
    public function user_dashboard()
    {

        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');

        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');

        $data['user_role'] = $role_arr_b[$user['identity_role'] - 1];
        $data['user_name'] = $user['identity_name'];
        $data['page_position'] = 'Dashboard';

        if ($user !== null) {
            $role = $role_arr[$user['identity_role'] - 1];
            $this->load->view('user_' . $role . '/templates/header', $data);
            $this->load->view('user_' . $role . '/dashboard', $data);
            $this->load->view('user_' . $role . '/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }



    //Showing live time chat for user
    public function user_chat()
    {
        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');
        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');


        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);


        $data['user_role'] = $role_arr_b[$user['identity_role'] - 1];
        $data['user_name'] = $user['identity_name'];
        $data['page_position'] = 'Chat';

        if ($user !== null) {
            $role = $role_arr[$user['identity_role'] - 1];
            $data['chats'] = $this->UserModel->get_user_chat($user_id, $role);
            $this->load->view('user_' . $role . '/templates/header', $data);
            $this->load->view('user_' . $role . '/chat', $data);
            $this->load->view('user_' . $role . '/templates/footer');

            return ($data['chats']);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }



    //Getting post text message and sending it to database 
    public function user_chat_text_send()
    {

        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');
        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');

        $user_name =  $user['identity_name'];
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);


        if ($user !== null) {
            $message = $this->UserModel->user_chat_text_send($user_name, $user_role, $user_id);
            echo $message;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }



    //Getting post img message and sending it to database 
    public function user_chat_img_send()
    {
        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');
        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');

        $user_name =  $user['identity_name'];
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);


        if ($user !== null) {

            $config['upload_path']          = './upload/chat_img';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('msg_attachement')) {

                $img_url = $this->upload->data('file_name');
                $this->UserModel->user_chat_img_send($user_name, $user_role, $user_id, $img_url);
                redirect('user_chat');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }





    //Getting userdata from session
    private  function _getUserData()
    {
        $user_data = $this->session->userdata('user')['user'];
        return $user_data;
    }



    private function _getUserId($user_role, $user)
    {

        switch ($user_role) {
            case 1:
                $user_id = $user['donatur_id'];
                break;

            case 2:
                $user_id = $user['relawan_id'];
                break;

            case 3:
                $user_id = $user['penyintas_id'];
                break;
        }


        return $user_id;
    }




    //Get User Chat
    public function user_get_chat()
    {

        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);
        $role = $role_arr[$user['identity_role'] - 1];
        $chats = $this->UserModel->get_user_chat($user_id, $role);


        if ($user !== null) {

            if (sizeof($chats) <= 0) {
                echo ' ';
            } else {
                foreach ($chats as $chat) :

                    $img_attachement = base_url("upload/chat_img/") . $chat["msg_attachement"];
                    if ($chat['msg_sender'] != 'admin' && $chat['msg_is_attached'] == 0) {
                        echo  '<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' . $chat['msg_sender'] . '</span>' . str_repeat('&nbsp;', 5);
                        echo '<span class="direct-chat-timestamp float-right">' .  (date("d F H:i a", $chat['msg_created'])) . '&nbsp;&nbsp</span> </div>';
                        echo ' <img class="direct-chat-img float-right" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo '<div class="direct-chat-text float-right">' . $chat['msg_body'] . ' </div> </div>';
                    }
                    if ($chat['msg_sender'] == 'admin' && $chat['msg_is_attached'] == 0) {
                        echo ' <div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left">' . $chat['msg_sender'] . '</span>';
                        echo '<span class="direct-chat-timestamp float-left">' .  (date("d F H:i a", $chat['msg_created'])) . '</span></div>';
                        echo ' <img class="direct-chat-img float-left" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo '<div class="direct-chat-text float-left">' . $chat['msg_body'] . ' </div> </div>';
                    }
                    if ($chat['msg_sender'] != 'admin' && $chat['msg_is_attached'] != 0) {


                        echo ' <div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' . $chat['msg_sender'] . '</span>';
                        echo '<span class="direct-chat-timestamp float-right">' .  (date("d F H:i a", $chat['msg_created'])) . '-' . '</span> </div>';
                        echo ' <img class="direct-chat-img float-right" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo  '<div class="direct-chat-text float-right" style="height: 215px; width: 220px;">';
                        echo '<img src="' . $img_attachement . '" alt="" width="200px" height="200px"</div></div>';
                    }
                    if ($chat['msg_sender'] == 'admin' && $chat['msg_is_attached'] != 0) {


                        echo ' <div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left">' . $chat['msg_sender'] . '</span>';
                        echo '<span class="direct-chat-timestamp float-left">' .  (date("d F H:i a", $chat['msg_created'])) . '-' . '</span> </div>';
                        echo ' <img class="direct-chat-img float-left" src="' . base_url('assets') . '/dist/img/user3-128x128.jpg" alt="Message User Image">';
                        echo  '<div class="direct-chat-text float-left" style="height: 215px; width: 220px;">';
                        echo '<img src="' . $img_attachement . '" alt="" width="200px" height="200px"</div></div>';
                    }
                endforeach;
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }


    public function penyintas_minta_bantuan()
    {


        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');

        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');

        $data['user_role'] = $role_arr_b[$user['identity_role'] - 1];
        $data['user_name'] = $user['identity_name'];
        $data['page_position'] = 'Form Permohonan Bantuan';
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);

        if ($user !== null) {

            $this->form_validation->set_rules('pb_barang_kebutuhan', 'Barang Kebutuhan', 'required');
            $this->form_validation->set_rules('pb_jumlah_barang', 'Jumlah Barang', 'required');
            $this->form_validation->set_rules('pb_drop_loc', 'Alamat Drop Barang', 'required');


            if ($this->form_validation->run() == false) {
                $role = $role_arr[$user['identity_role'] - 1];
                $this->load->view('user_' . $role . '/templates/header', $data);
                $this->load->view('user_' . $role . '/help_application', $data);
                $this->load->view('user_' . $role . '/templates/footer');
            } else {
                $this->UserModel->penyintas_minta_bantuan($user_id);
                redirect('penyintas_minta_bantuan_list');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }




    public function penyintas_minta_bantuan_list()
    {
        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');

        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);

        $data['user_role'] = $role_arr_b[$user['identity_role'] - 1];
        $data['user_name'] = $user['identity_name'];
        $data['page_position'] = 'List Permohonan Bantuan';
        $data['list_permohonan_bantuan'] = $this->UserModel->penyintas_get_permohonan_bantuan_list($user_id);

        if ($user !== null) {
            $role = $role_arr[$user['identity_role'] - 1];
            $this->load->view('user_' . $role . '/templates/header', $data);
            $this->load->view('user_' . $role . '/help_application_list', $data);
            $this->load->view('user_' . $role . '/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }



    public function donatur_beri_bantuan_list()
    {
        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');

        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);

        $data['user_role'] = $role_arr_b[$user['identity_role'] - 1];
        $data['user_name'] = $user['identity_name'];
        $data['page_position'] = 'List Bantuan Donatur';

        if ($user !== null) {

            $user_role = $user['identity_role'];
            $user_id = $this->_getUserId($user_role, $user);
            $data['list_bantuan_donatur'] = $this->UserModel->get_list_bantuan_donatur($user_id);


            $role = $role_arr[$user['identity_role'] - 1];
            $this->load->view('user_' . $role . '/templates/header', $data);
            $this->load->view('user_' . $role . '/donatur_give_help_list', $data);
            $this->load->view('user_' . $role . '/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }



    public function donatur_beri_bantuan()
    {
        $user = $this->_getUserData();
        $role_arr = array('donatur', 'relawan', 'penyintas');

        $role_arr_b = array('Donatur C-19', 'Relawan C-19', 'Penyintas C-19');
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);

        $data['user_role'] = $role_arr_b[$user['identity_role'] - 1];
        $data['user_name'] = $user['identity_name'];
        $data['page_position'] = 'Form Beri Bantuan';
        $user_role = $user['identity_role'];
        $user_id = $this->_getUserId($user_role, $user);

        if ($user !== null) {

            $this->form_validation->set_rules('bb_nama', 'Nama Barang', 'required');
            $this->form_validation->set_rules('bb_pickup_loc', 'Alamat Pick Up', 'required');
            $this->form_validation->set_rules('bb_jumlah', 'Jumlah Barang', 'required');

            if ($this->form_validation->run() == false) {
                $role = $role_arr[$user['identity_role'] - 1];
                $this->load->view('user_' . $role . '/templates/header', $data);
                $this->load->view('user_' . $role . '/donatur_give_help_form', $data);
                $this->load->view('user_' . $role . '/templates/footer');
            } else {
                $this->UserModel->donatur_beri_bantuan($user_id);
                redirect('donatur_beri_bantuan_list');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Plese login first</small>
            </div>');
            redirect('user_login');
        }
    }
}
