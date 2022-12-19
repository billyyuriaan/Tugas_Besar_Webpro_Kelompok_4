<?php

class C_Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
               //lakukan load helper [form & url]
               $this->load->helper("form");
               $this->load->helper("url");
        }

        public function index()
        {
                $this->load->view('V_Upload_form', array('error' => ' ' ));
        }

       
        public function do_upload()
        {
                $config['upload_path'] = "./uploads";//isi dengan nama folder tempat menyimpan gambar pada folder uploads
                $config['allowed_types'] = "gif|jpg|png"; //isi dengan format/tipe gambar yang diterima
                $config['max_size'] =  100;//isi dengan ukuran maksimum yang bisa di upload
                $config['max_width'] =  1024;//isi dengan lebar maksimum gambar yang bisa di upload
                $config['max_height'] =  768;//isi dengan panjang maksimum gambar yang bisa di upload

                $this->load->library('upload', $config);

                //lengkapi kondisi berikut
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $data = [
                                "error" => $this->upload->display_errors()
                        ];
                        $this->load->view('V_Upload_form', $data);
                }
                else
                {
                        $data = [
                                "data" => $this->upload->data()
                        ];
                        $this->load->view("V_Upload_success", $data);
                }
        }
}
