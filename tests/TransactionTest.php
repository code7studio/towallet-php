<?php

require_once dirname(__FILE__).'/TestConfig.php';

echo "TransactionTest <br>";

$transaction = TowalletTransaction::get();

echo "<pre>";
print_r ($transaction);
echo "</pre>";


echo "End <br>";
