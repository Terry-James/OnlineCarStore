$(document).ready(function(){
    $("#logOut").click(returnHome);
    $("#navLogin").click(openLogin);
});

function returnHome(){
    location = "index.html";
}

function openLogin() {
  $(".row")[0].className = "row";
}
