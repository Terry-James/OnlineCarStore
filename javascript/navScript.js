$(document).ready(function(){
    $(".logOut").click(returnHome);
    $(".viewCars").click(carList);
    $(".viewOrders").click(orders);
    $(".updateCar").click(updateCars);
    $(".deleteCar").click(deleteCars);
    $(".home").click(mainFloor);
});

function returnHome(){
    location = "index.html";
}

function carList(){
    location = "carShow.html";      
}

function orders(){
    location = "phpFiles/orders.php";
}

function mainFloor(){
    location = "store.html";
}

function updateCars(){
    $('#carSamples').hide();
    $('#updating').show();
}

function deleteCars(){
    $('#carSamples').hide();
    $('#deleting').show()
}
