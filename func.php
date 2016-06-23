<?php

// 接続用関数
function func_pass_db(){
  try {
    return new PDO('mysql:dbname=music_dj;charset=utf8;host=localhost','root','');
    // return new PDO('mysql:dbname=test2;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
}

 ?>
