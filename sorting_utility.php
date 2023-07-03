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
    // mengurutkan data yang sudah dimasukan oleh pengguna
    sort($numbers);
    // array di pecah kembali menjadi berupa kumpulan string  yang kemudian akan disimpan dalam file
    $print = implode(",", $numbers);
    // menyimpan data kedalam file 
    file_put_contents('./numbers.txt', $print);
    // menampilkan output yang dihasilkan oleh program
    echo "Nilai Tugas : " . $print . PHP_EOL;
    break;
  case '2':
    // membaca file yang dihasilkan dari proses sebelumnya untuk di tampilkan kembali
    $sorted = file_get_contents('./numbers.txt');
    echo "Nilai Tugas : " . $sorted . PHP_EOL;
    break;
  case '3':
    exit();
    break;
}