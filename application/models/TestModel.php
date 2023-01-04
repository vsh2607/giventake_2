<?php

class TestModel extends CI_Model{



    public function insert(){
        
        $message = $this->input->post('message');

        if($message == ""){
            return "no text";
        }else{
            $data = [
                'nama' => $message,
                'kelas' => 2
            ];
    
                $this->db->insert('migi', $data);

                return "berhasi";
    
        }
      

    }
}