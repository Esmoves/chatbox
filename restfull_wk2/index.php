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
<body>

   <div id="container" class="container">
      <div class='titel'>

      <header id="top-header">
        <h1>Chat App</h1>
    </header>
      </div>

      <div id="chat-window" class="chatroom">
        <p>Loading please wait</p>
      </div>

      <div id="input-window">
          <form name="chatroomForm"  id="chatroom-form" action="api.php" method="GET">
          Chatroom: <input type="text" id="chatroom-input" name="key" required><br>
          <input class="btn" type="submit" id="chatroom-form-submit" value="Connect to room">
          </form>
          
          <form name="messageForm" id="message_form" action="api.php" method="POST""> 
          Your message: 
          <textarea  type="text" name="message" id="message" required></textarea><br>
          <input class="btn" id="message-input-submit" type="submit" name="submit" value="Submit" disabled="true">
          </form>
        </div>

      </div> <!-- end container -->

      <script src="./script.js"></script>
</body>
</html>
