<!-- geen HTML doen in de output ( de echo) want return is JSON   -->

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'>

<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='nl' lang='nl'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name="description" content="Chatt app by Esmeralda Tijhoff" />  
    <meta name="keywords" content="" />
    <meta name="author" content="A.E.Tijhoff" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="style.css">
   <title>Chatt App</title>
</head>
<body onload="showMessages()">


   <div id="container" class="container">
      <div class='titel' id="top-header">
        <h1>Chat App</h1>
      </div>

      <div id="chat-window" class="chatroom">

      </div>
<!--
      <div id="input-window">
          <form name="chatroomForm"  id="chatroom-form" onsubmit="return submitChatroomForm()">
          <label for="chatroom-input">Chatroom: </label><input type="text" id="chatroom-input" name="key" required><br>
          <input class="btn" type="submit" id="chatroom-form-submit" value="Connect to room">
          </form>
          -->
        
         <form name="messageForm" id="message_form" method="POST" action="api.php">
        
   <!--     <form name="messageForm" id="message_form" method="POST" action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      -->
          <label for="message">Your message: </label>
          <textarea  type="text" name="messageText" id="messageText"></textarea><br>
          <input class="btn" id="send" type="submit" name="submit" value="Submit" onclick="writeMessage">
          </form>
        </div>

      </div> <!-- end container -->

      <script src="./scriptSimple.js"></script>
      
</body>
</html>