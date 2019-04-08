$(document).ready(function(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "phpFiles/getCarInfo.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText); // return data from php as a json

            var html = "";

            for (let i = 0; i < data.length; i++) {
                var make = data[i].make;
                var model = data[i].model;
                var price = data[i].price;
                var year = data[i].year;
                var id = data[i].carID;

                // build html table row
                html += "<tr class=tRows>";
                html += "<td>" + make + "</td>";
                html += "<td>" + model + "</td>";
                html += "<td>" + price + "</td>";
                html += "<td>" + year + "</td>";
                html += "<td>" + id + "</td>";
                html += "<td><form action='phpFiles/buyCar.php' method='POST'><input type='hidden' name='hiddenName' value='5'><input type='hidden' name='hiddenID' value=" + id + "><input type='submit' name='buy' value='buy'></form>";
                html += "</tr>";
            }
            $(".tableData").html(html); // insert to tbody tag
        }
    }

});
