<?php

declare(strict_types=1);

// Separarte file because it just has to do with the formatting of the displayed data. Has no relation with the business logic
function formatDollarAmount(float $amount): string
{
  $isNegative = $amount < 0;

  return ($isNegative ? "-" : "") . "$" . number_format(abs($amount), 2);
}

function formatDate(string $date): string
{
  return date("M j, Y", strtotime($date));
}
