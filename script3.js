var SERVER_URL = "https://www.codegorilla.nl/read_write/api.php";
var UPDATE_DELAY = 3000;
var group = "";  
var message = "message";
var chatbox = document.getElementById("chatbox"); 
var xhttp = new XMLHttpRequest();
var sentMessagesIDs = [];
var highestId = 0; 
var idMessages = [];

function writeMessage(group, message) {
    var xhttp = new XMLHttpRequest(),
        dataString = "action=write" + "&" + "mykey=" + group + "&" + "value=" + message;
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            sentMessagesIDs.push(parseInt(this.responseText, 10));
            alert(this.responseText);
            }
    };
    xhttp.open("POST", SERVER_URL, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(dataString);
}

// deze doet het niet omdat de script al loopt voordat het antwoord terug is. use JQuery
function displayAMessage(message){
     chatbox.innerHTML += "<p class='message'>" + message + "</p>";
}

// Lees één bericht per keer
function readMessage(group, id){  // id komt binnen via de GetListMessage en dan de getLoopMessage
     var xhttp2 = new XMLHttpRequest();
     dataString = "action=read" + "&" + "mykey=" + group + "&" + "id=" + id;    
     xhttp2.onreadystatechange = function (){
         if(this.readyState === 4 && this.status === 200){
            displayAMessage(this.responseText);   // roep functie aan om het in chatbox te laten zien           
         ;console.log(responseText);
         }
     };
     xhttp2.open("GET", SERVER_URL, + "?" + dataString, true);
     xhttp2.send();
}   


// read message: haal alle ids van de berichten in een group op met action=list
function GetListMessage(group) {
    var xhttp = new XMLHttpRequest();
    dataString = "action=list" + "&" + "mykey=" + group;
    xhttp.onreadystatechange = function () {
         if (this.readyState === 4 && this.status === 200) {  // ga pas verder als alles binnen is
            // hier moet de functie die de string tot area maakt
            idMessages = this.responseText.split(',').map(Number);  // maak er een variabele array en een nummer van van  
          // console.log(idMessages); check succes
         } 
    };   
    xhttp.open("GET", SERVER_URL + "?" + dataString, true);
    xhttp.send();
}   
    

// deze functie trekt individuele id's van berichten uit de array gemaakt in GetListMessage
function getLoopMessages (){    
    var i;
    for ( i = 0; i < 4; i++){  // 4 wordt idmessages
        // via highestId een stop op de loop zetten
        if (idMessages[i] > highestId) {
            readMessage(group, idMessages[i]);  // roep de funcite aan om de verichten één voor één te lezen
            highestId = idMessages[i];
        }
    }
}                

 function updateChatbox(){
            getLoopMessages();
            var i;
            for (i = 0; i < idMessages.length; i += 1) {
                    if (idMessages[i] > highestId) {

                     readMessage(group, idMessages[i]);
                     highestIdD = idMessages[i];
                    }
            }
        }

function refresh(){
    group = document.getElementById("group").value;
    window.setInterval(function(){ // calls refreshchat every 3 seconds, so chat is updated.
    updateChatbox();
    }, 3000);   
}

