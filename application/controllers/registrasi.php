<?php

class Registrasi extends CI_Controller
{

    // public function index()
    // {
    //     $this->form_validation->set_rules('nama', 'nama', 'required');
    //     $this->form_validation->set_rules('email', 'email', 'required');
    //     $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
    //     $this->form_validation->set_rules('password_1', 'password', 'required|matches[password_2]');
    //     $this->form_validation->set_rules('password_2', 'password', 'required|matches[password_1]');
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/header');
    //         $this->load->view('registrasi');
    //         $this->load->view('templates/footer');
    //     } else {
    //         $data = array(
    //             'id'    => '',
    //             'nama'  => $this->input->post('nama'),
    //             'email'  => $this->input->post('email'),
    //             'no_hp'  => $this->input->post('no_hp'),
    //             'password'  => $this->input->post('password_1'),
    //             'role_id'  => 2,
    //         );

    //         $this->db->insert('tb_user', $data);
    //         redirect('auth/login');
    //     }
    // }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|regex_match[/^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4,6})$/]');
        $this->form_validation->set_rules('password_1', 'password', 'required|matches[password_2]');
        $this->form_validation->set_rules('password_2', 'password', 'required|matches[password_1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('registrasi');
            $this->load->view('templates/footer');
        } else {
            // Pemeriksaan tambahan sebelum registrasi
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');

            // Cek apakah email sudah digunakan
            $email_exists = $this->model_auth->check_email_exists($email);
            if ($email_exists) {
                // Tampilkan pesan error jika email sudah digunakan
                $this->session->set_flashdata('error', 'Email sudah digunakan.');
                redirect('auth/registrasi');
            }

            // Cek apakah nomor telepon sesuai format
            if (!preg_match("/^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4,6})$/", $no_hp)) {
                // Tampilkan pesan error jika nomor telepon tidak sesuai format
                $this->session->set_flashdata('error', 'Nomor telepon tidak sesuai format.');
                redirect('auth/registrasi');
            }

            // Jika pemeriksaan tambahan lolos, lakukan registrasi
            $data = array(
                'id'    => '',
                'nama'  => $this->input->post('nama'),
                'email'  => $email,
                'no_hp'  => $no_hp,
                'password'  => $this->input->post('password_1'),
                'role_id'  => 2,
            );

            $this->db->insert('tb_user', $data);
            redirect('auth/login');
        }
    }
}
