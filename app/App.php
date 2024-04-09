<?php

declare(strict_types=1);

// Your Code
$transactionFile = fopen("../transaction_files/sample_1.csv", "r") or die("Unable to open file!");
echo fread($transactionFile, filesize("../transaction_files/sample_1.csv"));
fclose($transactionFile);
