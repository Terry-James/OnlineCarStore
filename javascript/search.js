$(document).ready(function () {
    var result = localStorage.getItem("searchInput");
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    }
    else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);

            if (data == false) {
                alert("Please Log in first");
                window.location = "index.html";
            }
            else {
                showElements();
                var html = "";

                for (let i = 0; i < data.length; i++) {
                    var make = data[i].make;
                    var model = data[i].model;
                    var price = data[i].price;
                    var year = data[i].year;
                    var id = data[i].carID;

                    html += "<tr class=tRows>";
                    html += "<td>" + make + "</td>";
                    html += "<td>" + model + "</td>";
                    html += "<td>" + price + "</td>";
                    html += "<td>" + year + "</td>";
                    html += "<td>" + id + "</td>";
                    html += "<td><form action='phpFiles/buyCar.php' method='POST'>" +
                        "<input type='hidden' name='hiddenID' value=" + id + ">" +
                        "<input type='submit' name='buy' value='buy' id=buyButton></form></td>";
                    html += "</tr>";
                }
                $(".searchTable").html(html);
            }
        }
    }
    xmlhttp.open("GET", "phpFiles/search.php?q=" + result, true);
    xmlhttp.send();
});

function showElements(){
    $('.mainNav').show();
    $('#searchRes').show();
}