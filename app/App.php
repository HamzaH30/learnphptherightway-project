<?php

declare(strict_types=1);

// Get all the files in the transaction_files folder
function getTransactionFiles(string $dirPath): array
{
  $files = [];

  foreach (scandir(FILES_PATH) as $file) { // FILES_PATH from index.php
    if (is_dir($file)) {
      // directory files will add 2 extra elements into the array like this: array(3) { [0]=> string(1) "." [1]=> string(2) ".." [2]=> string(12) "sample_1.csv" }
      continue;
    }

    $files[] = $dirPath . $file;
  }

  return $files;
}

// Less better way:
// function getTransactionData(string $fileName)
// {
//   $file = fopen(FILES_PATH . $fileName, "r");
//   if ($file !== false) {
//     $lineCount = 0;
//     while (!feof($file)) {
//       $lineCount++;

//       if ($lineCount > 1) {
//         print_r(explode(",", fgets($file)));
//       } else {
//         fgets($file); // this is just to get past the header row
//       }
//     }
//   }

//   fclose($file);
// }

function getTransactions(string $fileName): array
{
  if (!file_exists($fileName)) {
    trigger_error("File '" . $fileName . "' does not exist", E_USER_ERROR);
  }

  $file = fopen($fileName, "r");

  // Make the file pointer move past the first line (the header row)
  fgetcsv($file);

  $transactions = [];

  // method 1 : this is a bit bad because it might include 'false' values in the $transactions arry if fgetcsv fails or reads past the end of the file. feof() is one step behind fgetcsv. fgetcsv reads past the line it's on.
  // while (!feof($file)) { 
  //   $transactions[] = fgetcsv($file);
  // }

  // method 2
  while (($row = fgetcsv($file)) !== false) {
    $transactions[] = extractTransactionInfo($row);
  }

  fclose($file);
  return $transactions;
}

function extractTransactionInfo(array $transactionRow): array
{
  // using array destructuring/decoupling
  [$date, $checkNumber, $description, $amount] = $transactionRow;

  // trying to just extract the number in the amount (could also use regex)
  $amount = (float) str_replace(["$", ","], '', $amount);

  return [
    'date' => $date,
    'check_number' => $checkNumber,
    'description' => $description,
    'amount' => $amount
  ];
}

function calculateTotals(array $transactions): array
{
  $totals = ["total_income" => 0, "total_expense" => 0, "net_total" => 0];

  foreach ($transactions as $transaction) {
    $totals["net_total"] += $transaction["amount"];

    $transaction["amount"] > 0
      ? $totals["total_income"] += $transaction["amount"]
      : $totals["total_expense"] += $transaction["amount"];
  }

  return $totals;
}
