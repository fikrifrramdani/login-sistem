<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->Model_user->view_user()->row_array();

        $data['menu'] = $this->Model_menu->getMenu();
        $this->load->view('templates/user_header.php', $data);
        $this->load->view('templates/user_sidebar.php', $data);
        $this->load->view('templates/user_topbar.php', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer.php');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->Model_user->view_user()->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required');

        $data['menu'] = $this->Model_menu->getMenu();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header.php', $data);
            $this->load->view('templates/user_sidebar.php', $data);
            $this->load->view('templates/user_topbar.php', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/user_footer.php');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|png|tiff';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Yout profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $new_password = $this->input->post('newPassword');

        $data['menu'] = $this->Model_menu->getMenu();
        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('repeatPassword', 'Repeat Password', 'required|trim|matches[newPassword]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header.php', $data);
            $this->load->view('templates/user_sidebar.php', $data);
            $this->load->view('templates/user_topbar.php', $data);
            $this->load->view('user/changePassword', $data);
            $this->load->view('templates/user_footer.php');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changePassword');
            } else {
                if ($currentPassword == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changePassword');
                } else {
                    // password berhasil terverifikasi
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changePassword');
                }
            }
        }
    }
}
