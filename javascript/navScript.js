$(document).ready(function(){
    $(".logOut").click(returnHome);
    $(".viewCars").click(carList);
    $(".viewOrders").click(orders);
});

function returnHome(){
    location = "index.html";
}

function carList(){
    
}

function orders(){
    location = "phpFiles/orders.php"
}
