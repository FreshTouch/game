<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game_model extends CI_Model
{
    private $userId;
    private $gameId;
    private $periodId;
    private $score;
    private $gamesList;
    private $periodsList;
    private $userGamesList;
    private $questionList;

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId( $id )
    {
        $this->userId = $id;
    }
    public function getGameId()
    {
        return $this->gameId;
    }

    public function setGameId( $gameId )
    {
        $this->gameId = $gameId;
    }

    public function getPeriodId()
    {
        return $this->periodId;
    }

    public function setPeriodId( $periodId )
    {
        $this->periodId = $periodId;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore( $score )
    {
        $this->score = $score;
    }

    public function getGamesList()
    {
        return $this->gamesList;
    }

    public function setGamesList( $list )
    {
        $this->gamesList = $list;
    }

    public function getPeriodsList()
    {
        return $this->periodsList;
    }

    public function setPeriodsList( $list )
    {
        $this->periodsList = $list;
    }

    public function getUserGamesList()
    {
        return $this->userGamesList;
    }

    public function setUserGamesList( $list )
    {
        $this->userGamesList = $list;
    }

    public function getQuestionList()
    {
        return $this->questionList;
    }

    public function setQuestionList( $list )
    {
        $this->questionList = $list;
    }

    public function games()
    {
        $query = $this->db
            ->select('*')
            ->get('games')
            ->result_array();

        $this->gamesList = $query;
    }

    public function periods()
    {
        $query = $this->db
            ->select('*')
            ->order_by('position', 'asc')
            ->get('periods')
            ->result_array();

        $this->periodsList = $query;
    }

    public function user_games()
    {
        $query = $this->db
            ->select('*, user_periods.period_id as period_id')
            ->from('user_periods')
            ->join('user_games', 'user_games.period_id = user_periods.period_id', 'left')
            ->where('user_periods.user_id', $this->userId)
            ->get()
            ->result_array();
            
        $this->userGamesList = $query;
    }

    public function get_questions()
    {
        $query = $this->db
            ->select('*')
            ->from('questions')
            ->join('answers', 'answers.question_id = questions.id', 'left')
            ->where('questions.game_id', $this->gameId)
            ->get()
            ->result_array();
            
        $this->questionList = $query;
        $this->update_user_game();
    }

    private function update_user_game()
    {
        $static_game = $this->db
            ->select('score, period_id')
            ->from('games')
            ->where('id', $this->gameId)
            ->get()
            ->row_array();
        
        $game = $this->db
            ->select('advt_count as advt, score')
            ->from('user_games')
            ->where("user_id = $this->userId and game_id = $this->gameId")
            ->get();
        
        if ( $game->num_rows() )
        {
            $game = $game->row_array();
            
            if ( $game['advt'] == 2 )
            {
                $advt = 0;
            }
            else
            {
                $advt = $game['advt']+1;
            }
            
            if ( $game['score'] == 0 )
            {
                $score = $static_game['score'];
            }
            if ( ($static_game['score'] - $game['score']) == ($static_game['score']*0.1) ||  
                  $static_game['score'] == $game['score'])
            {
                $score = $game['score']*0.9;
            }
            else
            {
                $score = $game['score'];
            }
            
            $this->db
                ->set('advt_count', $advt)
                ->set('score', $score)
                ->set('period_id', $static_game['period_id'])
                ->where("user_id = $this->userId AND game_id = $this->gameId")
                ->update('user_games');
        }
        else
        {
            $this->db
                ->set('user_id', $this->userId)
                ->set('period_id', $static_game['period_id'])
                ->set('game_id', $this->gameId)
                ->set('score', $static_game['score'])
                ->set('advt_count', 1)
                ->set('game_status', 'close')
                ->insert('user_games');
        }
    }

    public function game_complete()
    {
       $sql = 
        "
            UPDATE 
              user_games AS game
              JOIN users AS user ON game.user_id = user.id
            SET 
              game.game_status = 'open',
              user.rate = user.rate+100,
              user.score = user.score + game.score
            WHERE user.id = $this->userId AND game.game_id = $this->gameId;
        ";
        
        $this->db->simple_query($sql);
    }

    public function buy_period()
    {
        $sql = 
        "
            UPDATE 
              users
            SET
              users.rate = users.rate+200,
              users.score = users.score - ( SELECT score 
                FROM periods 
                WHERE id = $this->periodId )
            WHERE users.id = $this->userId;
        ";
        
        $this->db->simple_query($sql);
        
        $this->db
            ->set('user_id', $this->userId)
            ->set('period_id', $this->periodId)
            ->set('period_status', 'open')
            ->insert('user_periods');
    }
}