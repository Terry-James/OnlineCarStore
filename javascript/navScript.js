$(document).ready(function(){
    $(".logOut").click(returnHome);
    $(".viewCars").click(carList);
    $(".viewOrders").click(orders);
});

function returnHome(){
    location = "index.html";
}

function carList(){
    location = "carShow.html";      
}

function orders(){
    location = "phpFiles/orders.php"
}
