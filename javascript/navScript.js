$(document).ready(function(){ // loads all navigation buttons
    $(".logOut").click(returnHome);
    $(".viewCars").click(carList);
    $(".viewOrders").click(orders);
    $(".updateCar").click(updateCars);
    $(".deleteCar").click(deleteCars);
    $(".addCar").click(addCars);
    $(".home").click(mainFloor);
    $(".subSearch").click(search);
});

function search(){
    result = $('.searchInput').val();
    localStorage.setItem("searchInput", result); // save the input into javascript local storage
    location = "searchResult.html";
}

function returnHome(){
    location = "phpFiles/logOut.php";
}

function carList(){
    location = "carShow.html";
}

function orders(){
    location = "orders.html";
}

function mainFloor(){
    location = "store.html";
}

function updateCars(){
    hideElements();
    $('#updating').show();
}

function deleteCars(){
    hideElements();
    $('#deleting').show();
}

function addCars(){
    hideElements();
    $('#adding').show();
}
