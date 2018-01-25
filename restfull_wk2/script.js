/*jslint browser: true*/
/*jslint node: true */
/*jslint devel: true */

/*eslint-env browser */
/*eslint-disable no-unused-vars */
/*eslint-disable no-console */
"use strict";

var SERVER_URL = "http://10.11.12.74/websites/restfullPHPChat/api.php";
var UPDATE_DELAY = 1000;

var chatWindow = document.getElementById("chatroom"),
    chatroom,
    chatroomInput = document.getElementById("chatroom-input"),
    chatroomFormSubmit = document.getElementById("chatroom-form-submit");

var messageClasses = {
    sent: "message-sent",
    received: "message-received"
};
var messageInputElement = document.getElementById("message");

var sentMessagesIDs = [];
var highestIDLoaded = 0;

function scrollToBottom(elementID) {
    var element = document.getElementById(elementID);
    element.scrollTop = element.scrollHeight - element.clientHeight;
}

function insertMessageInChatWindow(message, messageClass) {
    chatWindow.innerHTML += "<p class='message " + messageClass + "'>" + message + "</p>";
    scrollToBottom("chatroom");
}

function writeMessage(group, message) {
    var xhttp = new XMLHttpRequest(),
        dataString = "mykey=" + group + "&" + "value=" + message;
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            sentMessagesIDs.push(JSON.parse(this.responseText));
        }
        if (this.readyState === 4 && this.status === 400) {
            alert("Error while submitting message");
        }
    };
    
    xhttp.open("PUT", SERVER_URL, false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(dataString);
}

function readMessage(chatroom, p_highestIDLoaded) {
    var xhttp = new XMLHttpRequest(),
        dataString = "mykey=" + chatroom + "&" + "minimumid=" + (p_highestIDLoaded + 1);
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var messages = JSON.parse(this.responseText),
                i,
                messageClass;

            for (i = 0; i < messages.length; i += 1) {

                if (sentMessagesIDs.includes(messages[i].id)) {
                    messageClass = messageClasses.sent;
                } else {
                    messageClass = messageClasses.received;
                }
                insertMessageInChatWindow(messages[i].value, messageClass);
                highestIDLoaded = messages[i].id;
            }
        }
        if (this.readyState === 4 && this.status === 400) {
            alert("Error while reading messages");
        }
    };

    xhttp.open("GET", SERVER_URL + "?" + dataString, false);
    xhttp.send();
}

function updateMessages() {
    console.log("Update" + highestIDLoaded);
    readMessage(chatroom, highestIDLoaded);
    setTimeout(updateMessages, UPDATE_DELAY);
}

function submitMessageForm() {
    var message = messageInputElement.value;
    messageInputElement.value = "";
    writeMessage(chatroom, message);
    return false;
}

function submitChatroomForm() {
    chatroom = chatroomInput.value;
    chatroomInput.disabled = true;
    chatroomFormSubmit.disabled = true;
    document.getElementById("message-input-submit").disabled = false;
    updateMessages();
    return false;
}
