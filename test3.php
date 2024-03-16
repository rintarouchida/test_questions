<?php namespace Track;

ini_set("memory_limit", -1);

function main($input) {
  //入力値を数字一つずつで配列化し、小さい順にソート
  $num_array = str_split($input);
  sort($num_array);

  //ソート後の最初の数字が0だった場合、0以外で一番小さい数字を持つ配列要素と値を交換する
  if($num_array[0] == 0) {
    foreach($num_array as $index => $num) {
      if($num > 0) {
        $tmp = $num_array[0];
        $num_array[0] = $num_array[$index];
        $num_array[$index] = $tmp;
        break;
      }
    }
  }
  //配列を数値化して答えを出力
  print(implode('', $num_array)."\n");
}

$stdin = fgets(STDIN);
$input = rtrim($stdin);
main($input);
