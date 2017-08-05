<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/interfaces/controllers/Game_interface.php';

class Game_controller extends CI_Controller implements Game_interface
{
    private $token; 
    
    public function __construct()
    {
        parent::__construct();
        $this->output->set_content_type('application/json');
        $this->load->library('game_library');
        $this->token = (string) strip_tags(trim($this->input->get('token', true)));
    }

    // GET
    public function get_periods()
    {
        $data = $this->game_library->periods($this->token);
        $this->output->set_output($data);
    }

    // GET
    public function get_questions()
    {
        $game_id = (int) strip_tags(trim($this->input->get('game_id', true)));
        $data = $this->game_library->questions($this->token, $game_id);
        $this->output->set_output($data);
    }

    // GET
    public function game_complete()
    {
        $game_id = (int) strip_tags(trim($this->input->get('game_id', true)));
        $data = $this->game_library->game_complete($this->token, $game_id);
        $this->output->set_output($data);
    }

    // GET
    public function buy_period()
    {
        $period_id = (int) strip_tags(trim($this->input->get('period_id', true)));
        $data = $this->game_library->buy_period($this->token, $period_id);
        $this->output->set_output($data);
    }
}