<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function createLGTM($foreground, $background) {

  $temp = <<<TEXT
:BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::FOREGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND:
TEXT;
  
  $output = str_replace("BACKGROUND", $background, $temp);
  $output = str_replace("FOREGROUND", $foreground, $output);
  return $output;

}


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );


$array = explode(" ", $_POST['text']);

if (!isset($array[0]) || !isset($array[1])) {

  $response = [
    "response_type" => "ephemeral",
    "text" => "Looks like you forgot an emoji there..."
  ];
  
  echo json_encode($response, JSON_PRETTY_PRINT);
  exit();

} else {
  $foreground = str_replace(":", "", $array[0]);
  $background = str_replace(":", "", $array[1]);
}


if (isset($array[2])) {
  $preview = $array[2];
} else {
  $preview = null;
}

if ($preview == "preview") {
  $responseType = "ephemeral";
} else {
  $responseType = "in_channel";
}

$response = [
  "response_type" => $responseType,
  "text" => createLGTM($foreground, $background)
];

echo json_encode($response, JSON_PRETTY_PRINT);

?>