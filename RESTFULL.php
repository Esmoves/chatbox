<?php
/*
needed: id, mykey, value, minimumid Get all messages with an id higher than or equal to minimumid)
_Get api.php
_Put api.php

Opdracht: bouw een API die communiceert tussen een HTML pagina met formulieren en je MySql database

*/
// GET stuur mykey mee en de id die je wilt laten

/*
$id = "1";
$minimumid = "0";
$value = "My first message";
$mykey = "12345";
*/

// functie stuur bericht naar server via PUT en bewaar de id


// functie haal bericht op met de id 

// functie haal alle berichten op met id => minimumid

// loop door alle berichten

// haal bericht één voor één op in de loop 

// geef verschillende class aan zelf verzonden en aan ontvangen messages



// id moet erbij en werken met PUT en GET
// filegetdocument? // _PATCH ? JSON parse



if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_GET["mykey"])) {
    $roomErr = "Chatroom is required";
  } else {
    $room = test_input($_GET["mykey"]);
  }
  
  if (empty($_GET["value"])) {
    $valueErr = "ERROR. Message is required";
  } else {
    $value = test_input($_GET["value"]);
  }
   // output
	echo "Welcome in the chatroom" . $room . "<br> Message was:" . $value;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


/* ALTERNATIEVE METHODE VAN TUTORIAL 
    WERKT NOG NIET OPTIMAAL  

$verb = $_SERVER['REQUEST_METHOD']; 

if ($verb == 'GET'){
  if (isset($_GET['mykey'])){
    $file_content = file_get_contents($_GET['mykey']);

    // url heeft een GET en mykey, dus kun je alle berichten uit de mykey room halen

    echo $file_content;
    } else {
      die("ERROR");
      }
   } 
   elseif ($verb == 'PUT'){
    if (isset($_PUT['id']) and isset($_PUT['mykey']) and isset($_PUT['value'])){
      file_put_contents($_PUT['id'], $_PUT['mykey'], $_PUT['value']);
    } 
  }
*/




	?>
