<?php   defined('BASEPATH') OR exit('No direct script access allowed');

interface Game_interface
{
    public function get_periods();
    public function get_questions();
    public function game_complete();
    public function buy_period();
}