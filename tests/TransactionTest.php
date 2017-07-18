<?php
error_reporting(-1);
ini_set('display_errors', 1);

require_once dirname(__FILE__).'/TestConfig.php';

echo "TransactionTest <br>";

$transaction = TowalletTransaction::get(array('invoice_id'=>'M12345678'));

echo "<pre>";
print_r ($transaction);
echo "</pre>";

echo "End";
