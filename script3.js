var SERVER_URL = "https://www.codegorilla.nl/read_write/api.php";
var UPDATE_DELAY = 3000;
var group = "";  
var message = "message";
var chatbox = document.getElementById("chatbox"); 
var xhttp = new XMLHttpRequest();
var sentMessagesIDs = [];
var highestId = 0; 
var correctids = []; //array with message IDs for the chatroom.

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

function displayAMessage(message){
     document.getElementById("chatbox").innerHTML += "<p class='message'>" + message + "</p>";
}


function readMessage(group) {
    var xhttp = new XMLHttpRequest();
        dataString = "action=list" + "&" + "mykey=" + group;
        xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            // hier moet de functie die de string tot area maakt
            
            // hier moet de functie die de array langsloopt
            // hier moet de div komen
            
            var idmessages = xhttp.responseText;
            correctids = idmessages.split(",");
            
            var i;
            for ( i = 0; i < 4; i++){
                var xhttp2 = new XMLHttpRequest();
                alert(correctids[i]);
                xhttp2.open("GET", "https://www.codegorilla.nl/read_write/api.php?read&mykey=" + group + "&id=" + correctids[i], false);
                xhttp2.send();

                console.log(xhttp2.responseText);
                document.getElementById("chatbox").innerHTML = xhttp2.response;
            }

            
        }
    };

    xhttp.open("GET", SERVER_URL + "?" + dataString, true);
    xhttp.send();
 
}


 function update(){
            var i;
            for (i = 0; i < correctids.length; i += 1) {
                 console.log("for");
                    if (correctids[i] > highestID) {
                     console.log(i);
                     readMessage(group, correctids[i]);
                     highestID = correctids[i];
                    }
            }
        }

update();