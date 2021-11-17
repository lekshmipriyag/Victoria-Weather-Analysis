
$(window).load(function () {
    $('#mapData').hide();
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
   
    jQuery.ajax({
        url: corsPolicy + darkskyRequestUrl,
        success: function (data) {
           $('#displayWeatherData').html("Details : ");
           $('#displayWeatherData').append(data.currently.summary + ", ");
           $('#displayWeatherData').append(data.currently.apparentTemperature.toFixed(0) + "&deg;C, ");
           $('#displayWeatherData').append((data.currently.precipProbability*100).toFixed(0) + "% chances of rain, ");
        },

    });
}


