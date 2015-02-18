<?php

  $connect_error = ' sorry connection error.';
  mysql_connect('localhost','usernameOfDatabase','passwordOfTheDatabase') or die ($connect_error);
  mysql_select_db('dolovers_connect') or die($connect_error);
  

?>