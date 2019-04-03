$(document).ready(function(){
    hideElements();
    $('#carSamples').show();
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "phpFiles/getCarInfo.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText);

            for(let i = 0; i < 3; i++){
                $('#sampleImage1').attr("src",data[i].carImageID);
                $('#sampleMake1').text(data[i].make);
                $('#sampleModel1').text(data[i].model);
                $('#samplePrice1').text(data[i].price);
                $('#sampleYear1').text(data[i].year);
                i++;
                $('#sampleMake2').text(data[i].make);
                $('#sampleModel2').text(data[i].model);
                $('#samplePrice2').text(data[i].price);
                $('#sampleYear2').text(data[i].year);
                i++;
                $('#sampleMake3').text(data[i].make);
                $('#sampleModel3').text(data[i].model);
                $('#samplePrice3').text(data[i].price);
                $('#sampleYear3').text(data[i].year); 
            }
        } 
    }
});

function hideElements(){
    $('#updating').hide();
    $('#deleting').hide();
    $('#adding').hide();
    $('#carSamples').hide();
}

