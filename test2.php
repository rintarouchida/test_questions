<?php namespace Track;

ini_set("memory_limit", -1);

function main(string $input) {

  $stone_position = ['b', 'w'];

  $game_count = 0;
  foreach (str_split($input) as $value) {
    $game_count++;
    //(1)$value == 'L'かつゲームカウントが奇数('b'のターン)だった場合
    if ($value == 'L' && $game_count%2 == 1) {
      $stone_position = setLeft('b', $stone_position);
    }

    //(2)$value == 'L'かつゲームカウントが偶数('w'のターン)だった場合
    else if ($value == 'L' && $game_count%2 == 0) {
      $stone_position = setLeft('w', $stone_position);
    }

    //(3)$value == 'R'かつゲームカウントが奇数('b'のターン)だった場合
    else if ($value == 'R' && $game_count%2 == 1) {
      $stone_position = setRight('b', $stone_position);
    }

    //(4)$value == 'R'かつゲームカウントが偶数('w'のターン)だった場合
    else if ($value == 'R' && $game_count%2 == 0) {
      $stone_position = setRight('w', $stone_position);
    }
  }

  //1次元リバーシの最終的な配置から、黒石と白石の個数を抽出
  $countValues = array_count_values($stone_position);
  $black_stone_num = isset($countValues['b'])? $countValues['b'] : 0;
  $white_stone_num = isset($countValues['w'])? $countValues['w'] : 0;

  print($black_stone_num." ".$white_stone_num."\n");
}

//右端に石を置いた場合の配置を返す
function setRight(string $stone_value, array $stone_position): array
{
  if (in_array($stone_value, $stone_position)) {
    $key = count($stone_position) - 1;
    while($stone_position[$key] != $stone_value) {
      $stone_position[$key] = $stone_value;
      $key--;
    }
  }
  array_push($stone_position, $stone_value);
  return $stone_position;
}

//左端に石を置いた場合の配置を返す
function setLeft(string $stone_value, array $stone_position): array
{
  if (in_array($stone_value, $stone_position)) {
    $key = 0;
    while($stone_position[$key] != $stone_value) {
      $stone_position[$key] = $stone_value;
      $key++;
    }
  }
  array_unshift($stone_position, $stone_value);
  return $stone_position;
}

$stdin = fgets(STDIN);
$input = rtrim($stdin);
main($input);
