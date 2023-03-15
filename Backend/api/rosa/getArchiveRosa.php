<?php
require("../../DB/connect.php");
require("../../MODEL/rosa.php");

header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$conn = $db->connect();
$rosa = new Rosa($conn);

$result = $rosa->getArchiveRosa();
if ($result->num_rows > 0)
{
    $rosa = array();
    while($record = $result->fetch_assoc())
    {
        $rosa[] = $record;
    }

    http_response_code(200);
    echo json_encode($rosa, JSON_PRETTY_PRINT);
}
else
{
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "no record"]);
}

die();