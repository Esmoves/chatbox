<?php
/*
Uit REST document: id, mykey, value, minimumid Get all messages with an id higher than or equal to minimumid)
_Get api.php
_Put api.php

Opdracht: bouw een API die communiceert tussen een HTML pagina met formulieren --> javascript verwerkings file --> api.php --> MySql database

*/

// GET stuur mykey mee en de id die je wilt laten
// functie stuur bericht naar server via PUT en bewaar de id
// functie haal bericht op met de id 
// functie haal alle berichten op met id => minimumid
// loop door alle berichten
// haal bericht één voor één op in de loop 
// geef verschillende class aan zelf verzonden en aan ontvangen messages

// id moet erbij en werken met PUT en GET
// filegetdocument? // _PATCH ? JSON parse


// class maken met message bevat id, mykey en value
// dan kun je steeds nieuwe messages aanmaken als een Json dus $message(id, mykey, value)

class message {
    private $id;
    private $mykey;
    private $value;

        public function __construct($p_id, $p_mykey, $p_value) {
              $this->id = $p_id;
              $this->mykey = $p_mykey;
              $this->value = $p_value;
            }
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET["mykey"])) {
      $roomErr = "Chatroom is required <br />";
      echo $roomErr;
    } 
    else {
      $myfile = fopen("database.json", "r") or die("Cannot open file: ".$my_file);
      $data = json_decode(fread($myfile,filesize("database.json")));
      fclose($myfile);

      $minimumID = 1;
      $requestedMessages = array();
          
      if(isset($_GET["minimumid"])){
          $minimumID = $_GET["minimumid"];
      }
      
      $i;
      for($i = 0; $i < count($data); $i++){
          if($data[$i]->id>=$minimumID && $data[$i]->mykey==$_GET["mykey"]){
          array_push($requestedMessages, $data[$i]);
          }   
             
      }      echo json_encode($requestedMessages);
 }    
}
  

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (empty($_GET["mykey"])) {
      $roomErr = "Chatroom is required";
    } 
    else if (empty($_GET["value"])) {
      $valueErr = "ERROR. Message is required";
    } 
    else {
      $myfile = fopen("database.json", "w") or die("Cannot open file: ".$my_file);
      $data = json_decode(fread($myfile,filesize("database.json")));
      fwrite($myfile, $data);
      }
 }

  


	?>
