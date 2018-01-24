<?php
/*
needed: id, mykey, value, minimumid Get all messages with an id higher than or equal to minimumid)
Get api.php
Put api.php
need a url zonder /

Opdracht: bouw een API die communiceert tussen een HTML pagina met formulieren en je MySql database

*/
// GET stuur mykey mee en de id die je wilt laten




$id = "1";
$minimumid = "0";
$value = "My first message";
$mykey = "12345";
$URL = "http://localhost/websites/restfullPHPChat/index.php";

// functie stuur bericht naar server via PUT en bewaar de id


// functie haal bericht op met de id 

// functie haal alle berichten op met id => minimumid

// loop door alle berichten

// haal bericht één voor één op in de loop 

// geef verschillende class aan zelf verzonden en aan ontvangen messages




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["room"])) {
    $roomErr = "Chatroom is required";
  } else {
    $room = test_input($_POST["room"]);
  }
  
  if (empty($_POST["value"])) {
    $valueErr = "A message is required";
  } else {
    $value = test_input($_POST["value"]);
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


	?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'>

<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='nl' lang='nl'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name="description" content="Chatt app by Esmeralda Tijhoff" />  
    <meta name="keywords" content="" />
    <meta name="author" content="A.E.Tijhoff" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />

 

   <title>Chatt App</title>
</head>
<body>

   <div id="container">
      <div class='titel'>

        <h1 class='titel'>
            Chatt App
        </h1>
    </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Chatroom: <input type="text" name="room" value=""><br>
        Message: <input type="text" name="bericht"><br>
        <input type="submit" name="submit" value="Submit">
        </form>

      </div>

<?php




?>


</body>
</html>