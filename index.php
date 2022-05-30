<?php
require 'vendor/autoload.php';

use Google\Cloud\Translate\V2\TranslateClient;

$translate = new TranslateClient([
    'key' => 'your_api_key'
]);
require __DIR__.'/classes/Database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();
$currency_rec = "SELECT * FROM `pages` where pages_id =18 order by pages_id desc";
$currency_rec_stmt = $conn->prepare($currency_rec);
$currency_rec_stmt->execute();
$rows = $currency_rec_stmt->fetchall(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
  echo $pages_title=$row['pages_title'];
  $result = $translate->translate($pages_title, [
    'target' => 'es'
]);

echo $result['text'] . "\n";
}
die;
 
