<?php   defined('BASEPATH') OR exit('No direct script access allowed');

interface Game_impl
{
    public function periods($token);
    public function questions($token, $game_id);
    public function game_complete($token, $game_id);
    public function buy_period($token, $period_id);
}