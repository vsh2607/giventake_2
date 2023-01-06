<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

class AuthModel extends CI_Model
{


    //User Registration
    public function user_register()
    {


        $role = $this->input->post('identity_role');
        $role_id = $this->switchRole($role);


        $name = $this->input->post('identity_name');
        $email = $this->input->post('identity_email');
        $address = $this->input->post('identity_address');
        $phone_number = $this->input->post('identity_phone_number');
        $username =  explode(' ', $name)[0] . rand(1, 99999) . $role_id;
        $password = password_hash($this->input->post('identity_password1'), PASSWORD_DEFAULT);


        if ($role_id == 1) {
            $data = [
                'identity_name' => $name,
                'identity_created' => time(),
                'identity_username' => $username,
                'identity_password' => $password,
                'identity_email' => $email,
                'identity_address' => $address,
                'identity_phone_number' => $phone_number,
                'identity_role' => $role_id,
                'identity_is_active' => 0,
                'donatur_id' => $this->getLatestUser($role)->id

            ];

            $this->db->insert('identity', $data);
        } else if ($role_id == 2) {
            $data = [
                'identity_name' => $name,
                'identity_created' => time(),
                'identity_username' => $username,
                'identity_password' => $password,
                'identity_email' => $email,
                'identity_address' => $address,
                'identity_phone_number' => $phone_number,
                'identity_role' => $role_id,
                'identity_is_active' => 0,
                'relawan_id' => $this->getLatestUser($role)->id

            ];

            $this->db->insert('identity', $data);
        } else {
            $data = [
                'identity_name' => $name,
                'identity_created' => time(),
                'identity_username' => $username,
                'identity_password' => $password,
                'identity_email' => $email,
                'identity_address' => $address,
                'identity_phone_number' => $phone_number,
                'identity_role' => $role_id,
                'identity_is_active' => 0,
                'penyintas_id' => $this->getLatestUser($role)->id

            ];

            $this->db->insert('identity', $data);
        }

        $token = base64_encode(random_bytes(32));
        $data_token = [
            'tkn_created' => time(),
            'tkn_email' => $email,
            'tkn_token' => $token
        ];

        $this->db->insert('token', $data_token);
        $this->_sendEmail($name, $email, $username, $token, $role);
    }


    //User Verification
    public function user_verify($email)
    {
        $data = ['identity_is_active' => 1];
        $this->db->where('identity_email', $email);
        $this->db->update('identity', $data);
    }








    //Sending email verification to registered user
    private function _sendEmail($name, $email, $username, $token, $role)
    {

        $credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(), $credentials);

        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
            'subject' => 'Account Verification',
            'sender' => ['name' => 'Support System', 'email' => 'susystem8@gmail.com'],
            // 'replyTo' => ['name' => 'Sendinblue', 'email' => 'susystem7@gmail.com'],
            'to' => [['name' => $name, 'email' => $email]],
            'htmlContent' => '<p>Hello ' . ' ' . '<strong>' . $name . '</strong>,</p>
            <p>Welcome to Our Support System. Your Username is set to' . ' ' . '<strong>' . $username . '</strong></p>
            <p>And you registered as a' . ' ' . '<strong>' . $role . '</strong></p>
            <p>Click this link to activate your account : <a href="' . base_url() . 'user_verify?email=' . $email . '&token=' . urlencode($token) . '">Activation</a></p>'

        ]);

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            print_r($result);
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }

    //Switching role to get id
    public function switchRole($role)
    {

        $data = [
            'status' => 'on'
        ];

        
        switch ($role) {

            case 'donatur':
                $role_id = 1;
                $this->db->insert('donatur', $data);
                break;

            case 'relawan':
                $role_id = 2;

                $this->db->insert('relawan', $data);
                break;

            case 'penyintas':
                $role_id = 3;
                $this->db->insert('penyintas', $data);
                break;
        }


        return $role_id;
    }

    //Getting latest input user
    public function getLatestUser($role)
    {

        $this->db->select('id')->from($role);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get()->row();
        return $result;
    }


    public function getUserLogin()
    {
        $username_email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where('identity_email', $username_email)->or_where('identity_username', $username_email);
        $user = $this->db->get('identity')->row_array();

        $data = [
            'user' => $user,
            'password' => $password
        ];

        return $data;
    }

    



    public function getAdminLogin(){
        $username = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where('ss_username', $username);
        $admin = $this->db->get('ss')->row_array();

        $data = [
            'admin' => $admin,
            'password' => $password
        ];

        return $data;
    }
}
