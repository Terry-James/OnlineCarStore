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
            }
        }
    }
});
