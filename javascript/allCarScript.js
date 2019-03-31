$(document).ready(function () {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "phpFiles/getCarInfo.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            
            var html = "";

            for (let i = 0; i < data.length; i++) {
                var make = data[i].make;
                var model = data[i].model;
                var price = data[i].price;
                var year = data[i].year;

                html += "<tr class=tRows>";
                html += "<td>" + make + "</td>";
                html += "<td>" + model + "</td>";
                html += "<td>" + price + "</td>";
                html += "<td>" + year + "</td>";
                html += "</tr>";
            }
            $("#tableData").html(html);
        }
    }
});