<?php
if($_POST["item"])
{
$item = $_POST["item"];
$tokens = $_POST["tokens"];
$location = $_POST["location"];

$response = array();

        $response['item'] = $item;
        $response['tokens'] = $tokens;
        $response['location'] = $location;
        $response['message'] = 'This was successful';

    echo json_encode($response);

}
?>
