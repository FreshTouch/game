<?php  defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/interfaces/libraries/Game_impl.php';
require_once APPPATH.'/libraries/Rest.php';

class Game_library extends Rest implements Game_impl {

    private $ci;

    public function __construct ()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('user_model', 'user');
        $this->ci->load->model('game_model', 'model');
    }

    private function get_user_id( $token )
    {
        if ( ! $token || strlen($token) !== 32 )
        {
            $this->message = Rest::TOKEN_LENGTH;
            $this->status  = Rest::HTTP_UNAUTHORIZED;
        }
        else
        {
            $this->ci->user->setToken($token);
            $this->ci->user->get_user_by_token();
            $user_id = $this->ci->user->getId();
            
            if ( $user_id == null )
            {
                $this->message = Rest::TOKEN_NOT_VALID;
                $this->status  = Rest::HTTP_UNAUTHORIZED;
            }
            else
            {
                $this->ci->model->setUserId($user_id);
                return $user_id;
            }
        }
        
        return false;
    }
    
    public function buy_period( $token, $period_id )
    {
        if ( ! $period_id || empty($period_id) || $period_id <= 0 )
        {
            $this->message = Rest::NV_PERIOD_ID;
            $this->status  = Rest::HTTP_FORBIDDEN;
        }
        else
        {
            $user_id = (int) $this->get_user_id($token);
            
            if ( $user_id )
            {
                $this->ci->model->setPeriodId($period_id);
                $this->ci->model->buy_period();
                
                $this->message = Rest::PERIOD_SUCCESS;
                $this->status  = Rest::HTTP_OK;  
            }
        }
        
        return $this->set_response();
    }
    
    public function game_complete( $token, $game_id )
    {
        if ( ! $game_id || empty($game_id) || $game_id <= 0 )
        {
            $this->message = Rest::NV_GAME_ID;
            $this->status  = Rest::HTTP_FORBIDDEN;
        }
        else
        {
            $user_id = (int) $this->get_user_id($token);
            
            if ( $user_id )
            {
                $this->ci->model->setGameId($game_id);
                $this->ci->model->game_complete();
                
                $this->message = Rest::PERIOD_SUCCESS;
                $this->status  = Rest::HTTP_OK;  
            }
        }
        
        return $this->set_response();
    }

    public function questions( $token, $game_id )
    {
        if ( ! $game_id || empty($game_id) || $game_id <= 0 )
        {
            $this->message = Rest::NV_GAME_ID;
            $this->status  = Rest::HTTP_FORBIDDEN;
        }
        else
        {
            $user_id = (int) $this->get_user_id($token);
            
            if ( $user_id )
            {
                $array = array();
                $this->ci->model->setGameId($game_id);
                $this->ci->model->get_questions();
                $data = $this->ci->model->getQuestionList();
                
                foreach ( $data as $key => $value)
                {
                    if ( $value['question_id'] )
                    {
                        $array[$value['question_id']]['question'] = $value['question'];
                        $array[$value['question_id']]['image'] = $value['image'];
                        $array[$value['question_id']]['game_id'] = $value['game_id'];
                        $array[$value['question_id']]['answers'][$key]['answer'] = $value['answer'];
                        
                        if ( $value['verity'] == 0 )
                        {
                            $array[$value['question_id']]['answers'][$key]['verity'] = 'false';
                        }
                        else if ( $value['verity'] == 1 )
                        {
                            $array[$value['question_id']]['answers'][$key]['verity'] = 'true';
                        }
                        
                        $array[$value['question_id']]['answers'] = array_merge($array[$value['question_id']]['answers']);
                    }
                }
                
                $this->message = Rest::PERIOD_SUCCESS;
                $this->status  = Rest::HTTP_OK;
                $this->response = array_merge($array);
            }
        }
        
        return $this->set_response();
    }

    public function periods( $token )
    {
        $user_id = (int) $this->get_user_id($token);
        
        if ( $user_id )
        {
            $this->ci->model->games();
            $this->ci->model->periods();
            $this->ci->model->user_games();
            
            $games = $this->ci->model->getGamesList();
            $periods = $this->ci->model->getPeriodsList();
            $user_games = $this->ci->model->getUserGamesList();
            
            $this->message = Rest::PERIOD_SUCCESS;
            $this->status  = Rest::HTTP_OK;
            $this->response = array();
            $i = 0;
            
            while ( count($periods)-1 >= $i )
            {
                $j = 0;
                
                foreach ( $games as $key => $value )
                {
                    if ( $value['period_id'] == $periods[$i]['id'] )
                    {
                        if ( ! empty($user_games) )
                        {
                            foreach ( $user_games as $keyx => $valuex )
                            {
                                if ( $value['period_id'] == $valuex['period_id'] )
                                {
                                    $this->response[$i]['status'] = $valuex['period_status'];
                                    
                                    if ( $valuex['game_id'] == null )
                                    {
                                        $this->response[$i]['games'][$j]['status'] = 'close';
                                        $this->response[$i]['games'][$j]['advt'] = 0;
                                    }
                                    else
                                    {
                                        $this->response[$i]['games'][$j]['status'] = $valuex['game_status'];
                                        $this->response[$i]['games'][$j]['advt'] = $valuex['advt_count'];
                                    }
                                    
                                    if ( $valuex['score'] !== null )
                                    {
                                        $this->response[$i]['games'][$j]['score'] = $valuex['score'];
                                    }
                                    else
                                    {
                                        $this->response[$i]['games'][$j]['score'] = $value['score'];
                                    }
                                    
                                    unset($user_games[$keyx]);
                                    $j++;
                                }
                            }
                            
                            $j = 0;
                        }
                        
                        if ( empty($this->response[$i]['games'][$j]) )
                        {
                            if ( empty($this->response[$i]['status']) )
                            {
                               $this->response[$i]['status'] = 'close'; 
                            }
                            
                            $this->response[$i]['games'][$j]['status'] = 'close';
                            $this->response[$i]['games'][$j]['advt'] = 0;
                            $this->response[$i]['games'][$j]['score'] = $value['score'];
                        }
                        
                        $this->response[$i]['name'] = $periods[$i]['name'];
                        $this->response[$i]['score'] = $periods[$i]['score'];
                        $this->response[$i]['period_id'] = $periods[$i]['id'];
                        $this->response[$i]['games'][$j]['game_id'] = $value['id'];
                        $this->response[$i]['games'][$j]['title'] = $value['title'];
                        $this->response[$i]['games'][$j]['description'] = $value['description'];
                        $this->response[$i]['games'][$j]['image'] = $value['image'];
                        
                        $j++;
                    }
                }
                
                $i++;
            }
        }
        
        return $this->set_response();
    }
}