<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */
require APP_PATH . "App.php";

// Getting all the files in the transactions folder
$files = getTransactionFiles(FILES_PATH);

// Accumulating all the transactions
$transactions = [];
foreach ($files as $file) {
  $transactions = array_merge($transactions, getTransactions($file)); // merge the current transactions with the transactions from the new csv file
}

// the $transactions variable is passed onto here
require VIEWS_PATH . "transactions.php";

// echo "<pre>";
// print_r($transactions);
// echo "<pre>";
