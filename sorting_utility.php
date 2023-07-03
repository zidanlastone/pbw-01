<?php


echo "                 Menu Pilihan" . PHP_EOL;

echo "1. Input Angka" . PHP_EOL;
echo "2. Tampil Hasil Pengurutan" . PHP_EOL;
echo "3. Selesai" . PHP_EOL;

$input = readline("Masukan Pilihan [1/2/3]: ");

$numbers = [];

switch ($input) {
  case '1':
    for ($x = 1; $x <= 3; $x++) {
      $inputAngka = readline("Angka " . $x . " : ");
      array_push($numbers, $inputAngka);
    }

    sort($numbers);
    $print = implode(",", $numbers);
    file_put_contents('./numbers.txt', $print);

    echo "Nilai Tugas : " . $print . PHP_EOL;
    break;

  case '2':
    $sorted = file_get_contents('./numbers.txt');
    echo "Nilai Tugas : " . $sorted . PHP_EOL;
    break;
  case '3':
    exit();
    break;
}