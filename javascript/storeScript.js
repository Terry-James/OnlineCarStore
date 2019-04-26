$(document).ready(function () {
    hideElements();
    $('#carSamples').show();
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "phpFiles/getCarInfo.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
            if (data == false) {
                window.location = "index.html";

            } else {
                var images = $(".sampleImage");
                var randSample = [];
                for (let i = 0; i < 5; i++) {
                    var randnum = Math.floor(Math.random() * data.length);
                    while (randSample.indexOf(randnum) > -1) {
                        randnum = Math.floor(Math.random() * data.length);
                    }
                    randSample.push(randnum);
                    var sampleImage = images[i];
                    var sampleMake = "#sampleMake" + (i + 1);
                    var sampleModel = "#sampleModel" + (i + 1);
                    var samplePrice = "#samplePrice" + (i + 1);
                    var sampleYear = "#sampleYear" + (i + 1);
                    $(sampleImage).attr("src", data[randnum].carImageID);
                    $(sampleMake).text(data[randnum].make);
                    $(sampleModel).text(data[randnum].model);
                    $(samplePrice).text(data[randnum].price);
                    $(sampleYear).text(data[randnum].year);
                }
            }
        }
    }
});

function hideElements() {
    $('#updating').hide();
    $('#deleting').hide();
    $('#adding').hide();
    $('#carSamples').hide();
}
