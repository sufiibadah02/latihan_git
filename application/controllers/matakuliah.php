<?php
class Matakuliah extends CI_Controller
{
    public function index ()
    {
        $this->load->view('view-form-matakuliah');
    }

    public function cetak()
    {
        $this->form_validation->set_rules('kode', 'Kode Matakuliah', 'required|min_length[3]', 
        [
            'required' => 'Kode Matakuliah Kudu diisi',
            'min_length' => 'Kode terlalu pendek'
        ]);

        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]', 
        [
            'required'=>'Nama Matakuliah Kudu diisi',
            'min_length'=>'Nama terlalu pendek'
        ]);

        $this->form_validation->set_rules('sks', 'SKS', 'required', 
        [
            'required'=>'Pilih sesuai SKS'
        ]);
        if ($this->form_validation->run() !=false) 
        {
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'sks' => $this->input->post('sks')
            ];
            $this->load->view('view-data-matakuliah', $data);
        } else { 
            $this->load->view('view-form-matakuliah');
        }
    }
} 