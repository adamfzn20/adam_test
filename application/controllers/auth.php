<?php

class Auth extends CI_Controller
{

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email atau Password Anda Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
                );
                redirect('auth/login');
            } else {
                $this->session->set_userdata('id', $auth->id);
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('no_hp', $auth->no_hp);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;

                    case 2:
                        redirect('welcome');
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
