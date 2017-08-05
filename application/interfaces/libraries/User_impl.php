<?php   defined('BASEPATH') OR exit('No direct script access allowed');

interface User_impl
{
    public function token_generation();
    public function user();
    public function user_validation($data);
    public function get_user($post_data);
    public function add_user($post_data);
}