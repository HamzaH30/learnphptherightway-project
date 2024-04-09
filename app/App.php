<?php

declare(strict_types=1);

// Your Code
$transactionFile = fopen("../transaction_files/sample_1.csv", "r") or die("Unable to open file!");
// echo fread($transactionFile, filesize("../transaction_files/sample_1.csv"));

while (!feof($transactionFile)) { // while the file pointer is not at the end of the file
  echo fgets($transactionFile) . "<br />";
}

fclose($transactionFile);
