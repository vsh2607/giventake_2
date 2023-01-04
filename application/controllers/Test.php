<?php

class Test extends CI_Controller
{

    public function index()
    {
        $this->load->view('test_view');
    }


    public function test_upload()
    {
       

        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');

        var_dump($nama);
        


        // if ($this->upload->do_upload('gambar')) {

        //     $img_url = $this->upload->data('file_name');
        //     var_dump($img_url);


        //     $data = [
        //         'nama' => $nama,
        //         'kelas' => $kelas
        //     ];

        //     $this->db->insert('migi', $data);



        //     // redirect('test');
        // }

        // var_dump("sukses");
    }
}
