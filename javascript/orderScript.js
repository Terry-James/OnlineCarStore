$(document).ready(function(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "phpFiles/orders.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            var data = JSON.parse(this.responseText);
<<<<<<< HEAD
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
                html += "<td><form action='phpFiles/buyCar.php' method='POST'>" +
                            "<input type='hidden' name='hiddenID' value=" + id + ">" +
                            "<input type='submit' name='buy' value='buy' id=buyButton></form></td>";
                html += "</tr>";
=======
            for(let i = 0; i < data.length; i+=5){
                var tableRow = $("<tr></tr>");
                var tableOne = $('<td></td>').text(data[i]);
                var tableTwo = $('<td></td>').text((data[i+1]+" " + data[i+2]));
                var tableThree = $('<td></td>').text(data[i+3]);
                var tableFour = $('<td></td>').text(data[i+4]);
                tableRow.append(tableOne);
                tableRow.append(tableTwo);
                tableRow.append(tableThree);
                tableRow.append(tableFour);
                $("table").append(tableRow);
>>>>>>> cf14177c6110c345ec721d619d834a92cd8d56ef
            }
            $(".tableData").html(html); // insert to tbody tag
        }
    }
});
