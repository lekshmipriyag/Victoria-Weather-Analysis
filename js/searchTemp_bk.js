
$(window).load(function () {
    $('#selectYear').hide();

});

$('#byDate').click(function () {
    $('#searchByDate').show();
    $('#searchByMonth').hide();
});

//get years of selected stations
$('#dataType').change(function () {

    var dataType = $('#dataType').val();
    if ((dataType == 'yearbased') || (dataType == 'dailybased')) {
        alert(dataType);
        $('#selectYear').addClass('active');
        $('#selectYear').show();
        var stationNum = $("#stationNum").val();
        var temperatureType = $("#temperatureType").val();
        jQuery.ajax({
            url: "yearDetailsTempAjax.php",

            data: {
                "stationNumber": stationNum,
                "dataAbout": dataType,
                "temperatureType":temperatureType
            },
            async: false,
            method: "POST",
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (data) {
                alert(data);
                console.log(data);
                var options = '';

                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i] + '">' + data[i] + '</option>';
                }
                $('#selectYears').append(options);
            },

        });

    } else {
        $('#selectYear').removeClass('active');
        $('#selectYear').hide();
    }
});

//get station number and nearest station based on selected place
$('#selectStation').change(function () {
    "use strict";
    var selectStation = $("#selectStation").val();
    jQuery.ajax({
        url: "stationDetailsAjax.php",

        data: {
            "stationName": selectStation
        },
        async: false,
        method: "POST",
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        processData: true,
        success: function (data) {
            var res = data.split(" ");
            var nearestStation = res[0];
            var stationNum = res[1];
            console.log(data);

            $("#nearestBurStation").val(nearestStation + " VIC");
            $("#stationNum").val(stationNum);
        },

    });
});


