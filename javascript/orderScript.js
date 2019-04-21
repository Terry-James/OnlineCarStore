$(document).ready(function () {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "phpFiles/orders.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var data = JSON.parse(this.responseText);
            var html = "";

            for (let i = 0; i < data.length; i++) {
                var transID = data[i].transID;
                var make = data[i].make + " " + data[i].model;
                var year = data[i].year;
                var quantity = data[i].quantity;
                var date = data[i].TansDate;


                // build html table row
                html += "<tr class=tRows>";
                html += "<td>" + transID + "</td>";
                html += "<td>" + make + "</td>";
                html += "<td>" + year + "</td>";
                html += "<td>" + date + "</td>";
                html += "</tr>";
                $("#infoTable").html(html); // insert to tbody tag
            }
        }
    }
});
