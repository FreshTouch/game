<?php  defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/interfaces/libraries/User_impl.php';
require_once APPPATH.'/libraries/Rest.php';

class User_library extends Rest implements User_impl {

    private $ci;
    private $hash = 'project_game_2017';

    public function __construct ()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('user_model', 'model');
    }

    public function token_generation ()
    {
        $this->ci->load->helper('string');
        $this->ci->load->helper('date');
        
        $date  = date('Ymd', strtotime("+30 days"));;
        $token = random_string('numeric', 10).$date;
        $token = $token.$this->hash;
        $token = md5($token);
        
        return $token;
    }

    public function user ()
    {
        $user = array
        (
            'email' => $this->ci->model->getEmail(),
            'name'  => $this->ci->model->getName(),
            'token' => $this->ci->model->getToken(),
            'rate'  => $this->ci->model->getRate().' XP'
        );
        
        $score = $this->ci->model->getScore();
        
        if ( empty($score) )
        {
            $user['score'] = 0;
        }
        else
        {
            $user['score'] = $score;
        }
        
        return $user;
    }

    public function user_validation ( $data )
    {
        $email = null;
        $password = null;
        $name = null;
        
        if ( empty($data['email']) )
        {
            $this->message = Rest::EMAIL_INVALID;
        }
        else if ( empty($data['password']) )
        {
            $this->message = Rest::PASS_INVALID;
        }
        else
        {
            $password = (string) strip_tags(trim($data['password']));
            $email = (string) strip_tags(trim($data['email']));
            
            if ( ! $password || strlen($password) < 1 )
            {
                $this->message = Rest::PASS_INVALID;
            }
            else if ( ! $email ||
                      ! preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email) ||
                      strlen($email) < 7 ||
                      strlen($email) > 50 
                    )
            {
                $this->message = Rest::EMAIL_INVALID;
            }
            else if ( ! empty($data['name']) )
            {
                $name = (string) strip_tags(trim($data['name']));
                
                if ( ! $name ||
                     ! preg_match("/^[a-zA-Z ]*$/", $name) ||
                     strlen($name) < 3 ||
                     strlen($name) > 15 
                    )
                {
                    $this->message = Rest::NAME_INVALID;
                }
            }
        }
        
        if ( empty($this->message) )
        {
            $password = md5($password.$this->hash);
            $this->ci->model->user($name, $password, $email);
        }
        else
        {
            $this->status = Rest::HTTP_UNAUTHORIZED;
        }
    }

    public function add_user ( $post_data )
    {
        $this->user_validation($post_data);
        
        if ( empty($this->message) )
        {
            $this->ci->model->check_new_user();
            $email = $this->ci->model->getEmail();
            
            if ( $email == null )
            {
                $this->message = Rest::EXISTING_USER;
                $this->status = Rest::HTTP_UNAUTHORIZED;
            }
            else
            {
                $this->ci->model->setToken($this->token_generation());
                $this->ci->model->add_user();
                
                $this->message = Rest::REG_NONE_ERROR;
                $this->status  = Rest::HTTP_CREATED;
                $this->response = $this->user();
            }
        }
        
        return $this->set_response();
    }

    public function get_user ( $post_data )
    {
        $this->user_validation($post_data);
        
        if ( empty($this->message) )
        {
            $this->ci->model->check_user();
            $email = $this->ci->model->getEmail();
            $password = $this->ci->model->getPassword();
            
            if ( $email == null && $password == null )
            {
                $this->message = Rest::NOT_FOUND;
                $this->status = Rest::HTTP_NO_CONTENT;
            }
            else if ( $email == null )
            {
                $this->message = Rest::ERR_EMAIL;
                $this->status = Rest::HTTP_UNAUTHORIZED;
            }
            else if ( $password == null )
            {
                $this->message = Rest::ERR_PASS;
                $this->status = Rest::HTTP_UNAUTHORIZED;
            }
            else
            {
                $this->ci->model->setToken($this->token_generation());
                $this->ci->model->update_token();
                
                $this->message = Rest::LOGIN_NONE_ERROR;
                $this->status = Rest::HTTP_OK;
                $this->response = $this->user();
            }
        }
        
        return $this->set_response();
    }
}