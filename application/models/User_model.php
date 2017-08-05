<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $token;
    private $score;
    private $rate;

    public function getId()
    {
        return $this->id;
    }

    public function setId( $id )
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName( $name )
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword( $password )
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail( $email )
    {
        $this->email = $email;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken( $token )
    {
        $this->token = $token;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore( $score )
    {
        $this->score = $score;
    }
    
    public function getRate()
    {
        return $this->rate;
    }

    public function setRate( $rate )
    {
        $this->rate = $rate;
    }
    
    public function user ( $name = null, $password = null, $email = null )
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

    public function add_user ()
    {
        $insert_user = 
        "
            INSERT INTO users (name, password, email, token, score)
            VALUES ('$this->name', '$this->password', '$this->email', '$this->token', 0)
        ";
        
        $insert_period = 
        "
            INSERT INTO user_periods (period_id, user_id, period_status)
            SELECT id, LAST_INSERT_ID(), 'open'
            FROM   periods
            WHERE  position = 1000
        ";
        
        $this->db->trans_start();
        $this->db->query($insert_user);
        $this->db->query($insert_period);
        $this->db->trans_complete();
    }

    public function check_new_user ()
    {
        $query = $this->db
            ->where('email', $this->email)
            ->get('users');

        if ( $query->num_rows() )
        {
            $this->email = null;
        }
    }

    public function update_token()
    {
        $this->db
            ->where('id', $this->id)
            ->set('token', $this->token)
            ->update('users');
    }

    public function check_user ()
    {
        $query = $this->db
            ->where('email', $this->email)
            ->or_where('password', $this->password)
            ->get('users');

        if ( $query->num_rows() )
        {
            $row = $query->row_array();

            if ( $row['password'] !== $this->password )
            {
                $this->password = null;
            }
            else if ( $row['email'] !== $this->email )
            {
                $this->email = null;
            }
            else
            {
                $this->id = $row['id'];
                $this->name = $row['name'];
                $this->password = $row['password'];
                $this->email = $row['email'];
                $this->score = $row['score'];
                $this->rate = $row['rate'];
            }
        }
        else
        {
            $this->user();
        }
    }

    public function get_user_by_token()
    {
        $query = $this->db
            ->select('users.id')
            ->from('users')
            ->where('token', $this->token)
            ->get();

        if ( $query->num_rows() )
        {
            $row = $query->row_array();
            $this->id = $row['id'];
        }
        else
        {
            $this->id = null;
        }
    }
}