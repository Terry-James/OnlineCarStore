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

            for(let i = 0; i <= 5; i++){
                var sampleImage = "#sampleImage"+ (i+1);
                var sampleMake = "#sampleMake"+ (i+1);
                var sampleModel = "#sampleModel"+ (i+1);
                var samplePrice = "#samplePrice"+ (i+1);
                var sampleYear = "#sampleYear"+ (i+1);
                $(sampleImage).attr("src",data[i].carImageID);
                $(sampleMake).text(data[i].make);
                $(sampleModel).text(data[i].model);
                $(samplePrice).text(data[i].price);
                $(sampleYear).text(data[i].year);
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

