<?php

class Auth extends CI_Controller
{



    public function __construct()
    {

        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model('AuthModel');
    }



    //User Register
    public function user_register()
    {

        $data['page_title'] = "User Register";

        $this->form_validation->set_rules("identity_name", "Name", "required|trim");
        $this->form_validation->set_rules("identity_email", "Email", 'valid_email|required|trim|is_unique[identity.identity_email]', ['is_unique' => 'This Email has been registered to another account']);
        $this->form_validation->set_rules("identity_address", 'Address', 'required|trim');
        $this->form_validation->set_rules("identity_phone_number", 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('identity_password1', 'Password', 'required|min_length[6]|trim|matches[identity_password2]', ['matches' => "Password does not match", 'min_length' => 'Password is too short']);
        $this->form_validation->set_rules('identity_password2', 'Password', 'required|matches[identity_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/register/user_register');
            $this->load->view('auth/templates/footer');
        } else {


            $this->AuthModel->user_register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                  <small> Your account has been registered. Please Activate it</small>
                  </div>');

            redirect('user_login');
        }
    }


    //Verifying user by email verification
    public function user_verify()
    {


        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('identity', ['identity_email' => $email])->row_array();




        if ($user) {
            $tokenData = $this->db->get_where('token', ['tkn_email' => $user['identity_email']])->row_array();

            if ($tokenData['tkn_token'] == $token) {

                $this->AuthModel->user_verify($user['identity_email']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <small>Your Account has been activated. Please Login</small>
                     </div>');
                redirect('user_login');
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <small>Wrong Token!</small>
                     </div>');
                redirect('user_login');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <small>This Account is not registered. Please Register</small>
                </div>');
            redirect('user_login');
        }
    }

    //User Login
    public function user_login()
    {
        $data['page_title'] = "User Login";

        $this->form_validation->set_rules('email', 'Email or Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/login/user_login');
            $this->load->view('auth/templates/footer');
        } else {
            $user = $this->AuthModel->getUserLogin();

            $this->_userlogin($user);
        }
    }

    //User Login function
    private function _userlogin($user)
    {


        if ($user['user']) {
            if (password_verify($user['password'], $user['user']['identity_password'])) {


                if ($user['user']['identity_is_active'] == 1) {

                    $this->session->set_userdata('user', $user);
                    redirect('user_dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <small>This Account has not been activated. Please check your email</small>
                    </div>');
                    redirect('user_login');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               <small>You entered a wrong password!</small>
               </div>');
                redirect('user_login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>This Account has not been registered</small>
            </div>');

            redirect('user_login');
        }
    }

    //User Logout
    public function user_logout()
    {
        $this->session->unset_userdata('user', 'user');
        $this->session->unset_userdata('user', 'password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <small>You\'ve Logged out</small>
        </div>');
        redirect('user_login');
    }





    //Admin Login
    public function admin_login()
    {

        $data['page_title'] = "Admin Login";


        $this->form_validation->set_rules('email', 'Email or Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/login/admin_login');
            $this->load->view('auth/templates/footer');
        } else {
            $admin = $this->AuthModel->getAdminLogin();

            $this->_adminlogin($admin);
        }
    }



    //Admin Login function
    private function _adminlogin($admin)
    {

        if ($admin['admin']) {
            if ($admin['password'] == $admin['admin']['ss_password']) {


                $this->session->set_userdata('admin', $admin);
                redirect('admin_dashboard');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <small>Admin Account is Not Registered</small>
            </div>');

            redirect('admin_login');
        }
    }

    //Admin Logout
    public function admin_logout()
    {
        $this->session->unset_userdata('admin', 'admin');
        $this->session->unset_userdata('admin', 'password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <small>You\'ve Logged out</small>
        </div>');
        redirect('admin_login');
    }
    
}
