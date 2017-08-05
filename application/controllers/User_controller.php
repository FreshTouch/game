<?php   defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/interfaces/controllers/User_interface.php';

class User_controller extends CI_Controller implements User_interface
{
    private $post_data;
    
    public function __construct()
    {
        parent::__construct();
        $this->output->set_content_type('application/json');
        $this->load->library('user_library');
        $this->post_data = $this->input->post();
    }

    private function get_json()
    {
        $json = file_get_contents('php://input');
        $json = json_decode($json, true);
        return $json;
    }

    // POST
    public function add_user()
    {
        $json = $this->user_library->add_user($this->post_data);
        $this->output->set_output($json);
    }

    // POST
    public function get_user()
    {
        $json = $this->user_library->get_user($this->post_data);
        $this->output->set_output($json);
    }
}