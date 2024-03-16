<?php namespace Track;

ini_set("memory_limit", -1);

function main($input) {
  //ゴールまでの残りマス
  $rest_squares = $input - 1;
  //ゴールまでサイコロの目が全部6だった場合にサイコロをふる回数
  $daice_shake_num = ceil($rest_squares / 6);
  print($daice_shake_num."\n");
}

$stdin = fgets(STDIN);
$input = rtrim($stdin);
main($input);
