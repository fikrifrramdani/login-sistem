<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
   public function index()
   {
      $data['title'] = 'Menu Management';
      $data['user'] = $this->Model_user->view_user()->row_array();
      $data['Mmenu'] = $this->Model_menu->view_menu()->result_array();
      $data['menu'] = $this->Model_menu->getMenu();

      $this->form_validation->set_rules('menu', 'Menu', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/user_header.php', $data);
         $this->load->view('templates/user_sidebar.php', $data);
         $this->load->view('templates/user_topbar.php', $data);
         $this->load->view('menu/index', $data);
         $this->load->view('templates/user_footer.php');
      } else {
         $data = [
            'menu' => $this->input->post('menu')
         ];

         $this->Model_menu->insert_menu($data, 'user_menu');

         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added</div>');
         redirect('menu');
      }
   }

   public function changeMenu($id)
   {
      $where = [
         'id' => $id
      ];

      $data['title'] = 'Change Menu';
      $data['user'] = $this->Model_user->view_user()->row_array();
      $data['Mmenu'] = $this->Model_menu->view_menu()->result_array();
      $data['Mmenu'] = $this->Model_menu->editMenu($where, 'user_menu')->result_array();
      $data['menu'] = $this->Model_menu->getMenu();

      $this->form_validation->set_rules('menu', 'Menu', 'required');

      $this->load->view('templates/user_header.php', $data);
      $this->load->view('templates/user_sidebar.php', $data);
      $this->load->view('templates/user_topbar.php', $data);
      $this->load->view('menu/editMenu', $data);
      $this->load->view('templates/user_footer.php');
   }

   public function updateMenu()
   {
      $id = $this->input->post('id');

      $data = [
         'menu' => $this->input->post('menu')
      ];

      $where = [
         'id' => $id
      ];

      $this->Model_menu->changeMenu($where, $data, 'user_menu');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Changed</div>');
      redirect('menu');
   }

   public function subMenu()
   {
      $data['title'] = 'Submenu Management';
      $data['user'] = $this->Model_user->view_user()->row_array();
      $data['subMenu'] = $this->Model_menu->getSubMenu()->result_array();

      $data['menu'] = $this->Model_menu->view_subMenu();
      $data['menu'] = $this->Model_menu->getMenu();

      $this->form_validation->set_rules('menu_id', 'Menu', 'required');
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('url', 'Url', 'required');
      $this->form_validation->set_rules('icon', 'Icon', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/user_header.php', $data);
         $this->load->view('templates/user_sidebar.php', $data);
         $this->load->view('templates/user_topbar.php', $data);
         $this->load->view('menu/subMenu', $data);
         $this->load->view('templates/user_footer.php');
      } else {
         $data = [
            'menu_id'   => $this->input->post('menu_id'),
            'title'     => $this->input->post('title'),
            'url'       => $this->input->post('url'),
            'icon'      => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
         ];

         $this->Model_menu->insert_subMenu($data, 'user_sub_menu');

         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu Added</div>');
         redirect('menu/subMenu');
      }
   }

   public function editSubMenu($id)
   {
      $where = [
         'id' => $id
      ];

      $data['title'] = 'Change Sub Menu';
      $data['user'] = $this->Model_user->view_user()->row_array();
      $data['menu'] = $this->Model_menu->getMenu();
      $data['getMenu'] = $this->Model_menu->getSubMenu()->result_array();
      $data['subMenu'] = $this->Model_menu->editSubMenu($where, 'user_sub_menu')->result_array();

      $this->form_validation->set_rules('menu_id', 'Menu', 'required');
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('url', 'Url', 'required');
      $this->form_validation->set_rules('icon', 'Icon', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/user_header.php', $data);
         $this->load->view('templates/user_sidebar.php', $data);
         $this->load->view('templates/user_topbar.php', $data);
         $this->load->view('menu/editSubMenu', $data);
         $this->load->view('templates/user_footer.php');
      }
   }

   public function updateSubMenu()
   {
      $id = $this->input->post('id');

      $data = [
         'menu_id'    => $this->input->post('menu_id'),
         'title'    => $this->input->post('title'),
         'url'        => $this->input->post('url'),
         'icon'        => $this->input->post('icon'),
         'is_active' => $this->input->post('is_active')
      ];

      $where = [
         'id' => $id,
      ];

      $this->Model_menu->changeSubMenu($where, $data, 'user_sub_menu');
      redirect('menu/submenu');
   }

   public function hapus($id)
   {
      $where = [
         'id' => $id
      ];

      $this->Model_menu->hapus_menu($where, 'user_menu');
      redirect('menu');
   }

   public function hapus_subMenu($id)
   {
      $where = [
         'id' => $id
      ];

      $this->Model_menu->hapus_subMenu($where, 'user_sub_menu');
      redirect('menu/subMenu');
   }
}
