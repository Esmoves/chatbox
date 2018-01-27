
//var SERVER_URL = "http://www.wijzijncodegorilla.nl/esmeraldatijhoff/chatapp/";
var SERVER_URL = "http://localhost/websites/restfullPHPChat/api.php";
var xhttp = new XMLHttpRequest();

   
function showMessages(){  
    xhttp.onreadystatechange = function() {
        var messages = JSON.parse(this.responseText);
        for (i = 0; i < messages.length; i += 1) {


        var div = document.createElement("div");
        var chatText = document.getElementById("chat-window").appendChild(div);
        chatText.innerHTML = "<pre>";
        chatText.innerHTML += JSON.stringify(messages[i].value, undefined, 2);
        chatText.innerHTML += "</pre>";
        }
    };
    xhttp.open("GET", SERVER_URL, false);
    xhttp.send();  
} 