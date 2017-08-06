[![standard-readme compliant](https://img.shields.io/badge/Project-game-green.svg?style=flat-square)](https://github.com/Hipparch/game)

#### TEST SERVER: `http://game.my-object.ru`

## USERS
  <blockquote>
    <B>POST</B><BR>
  ⦁	<i>/sign_in</i>  - output params {email; password}<br>
  ⦁	<i>/sign_up</i> - output params {email; password; name}<br>
</blockquote>

  ## GAME
<blockquote>
    <b>GET</b><br>
  ⦁	<i>/periods</i> - output params {token}  <br>
  ⦁	<i>/game</i> - output params {token, game_id}  <br>
  ⦁	<i>/game_complete</i> - output params {token, game_id} <br> 
  ⦁	<i>/buy_period</i> - output params {token, period_id}  <br>
</blockquote>
