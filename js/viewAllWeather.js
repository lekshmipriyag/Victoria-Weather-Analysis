
$(window).load(function () {
    $('#mapData').hide();
});

//get station number ,latitude and longitude of selected place from db table tbl_All_VIC_StationsList
$('#selectStation').change(function () {
    "use strict";
    $('#mapData').hide();
    $('#map').hide();
    $('#displayWeatherData').hide();
    
    var selectStation = $("#selectStation").val();
    jQuery.ajax({
        url: "startJourneyAjax.php",

        data: {
            "stationName": selectStation
        },
        async: false,
        method: "POST",
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        processData: true,
        success: function (data) {
             var res = data.split(" ");
             var stationNumber = res[0];
             var latitude = res[1];
             var longitude = res[2];
             console.log(data);

            $("#stationNum").val(stationNumber);
            $("#station_latitude").val(latitude);
            $("#station_longitude").val(longitude);
        },

    });
});


$('#mapData').click(function () {
    var stationName = $("#selectStation").val();
    if(stationName != ""){
        $('#map').show();
    }
}); 

$('#currentWeather').click(function () {
    var stationName = $("#selectStation").val();
    if(stationName == ""){
        alert('Please Select a Weather Station');
    }else{
        var latitude = $("#station_latitude").val();
        var longitude = $("#station_longitude").val();
        getWeatherDetails(latitude,longitude);
        $('#displayWeatherData').show();
        $('#mapData').show();
    }
    
});


function getWeatherDetails(latitude,longitude){

    var secretKey = "d1c530c2010ce975521fbe04df047152";
    // enable CORS policy for getting the access to dark sky. This API enables cross-origin requests to anywhere.

    var corsPolicy = "https://cors-anywhere.herokuapp.com/";
    var darkskyRequestUrl = "https://api.darksky.net/forecast/" + secretKey +"/" + latitude + "," + longitude + "?units=si";
    console.log(darkskyRequestUrl);
    //var darkskyRequest = "https://api.darksky.net/forecast/d1c530c2010ce975521fbe04df047152/" + latitude + "," + longitude;

    jQuery.ajax({
        url: corsPolicy + darkskyRequestUrl,
        success: function (data) {
           $('#displayWeatherData').html("Details : ");
           $('#displayWeatherData').append(data.currently.summary + ", ");
           $('#displayWeatherData').append(data.currently.apparentTemperature.toFixed(0) + "&deg;C, ");
           $('#displayWeatherData').append((data.currently.precipProbability*100).toFixed(0) + "% chances of rain, ");
           $('#displayWeatherData').append(" Wind Speed "+data.currently.windSpeed.toFixed(0) + " km/h.");
        },

    });
}


