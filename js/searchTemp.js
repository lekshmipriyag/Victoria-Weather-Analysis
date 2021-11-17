
$(window).load(function () {
    $('#selectYear').hide();
    $('#tableData').hide();
});

$('#byDate').click(function () {
    $('#searchByDate').show();
    $('#searchByMonth').hide();
});


$('#showData').click(function () {
   
    var selectStation = $('#selectStation').val();
    if(selectStation == ""){
        alert("Please Select a Weather Station");
    }else{
        $('#tableData').show();
        var stationNum = $('#stationNum').val();
        jQuery.ajax({
            url: "temperature-last-five-years-Ajax-Max.php",
    
            data: {
                "stationNum": stationNum
            },
            async: false,
            method: "POST",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            processData: true,
            success: function (data) {
                console.log(data);
                $('#displayTableData').html(data);
                $('h2').text("Last 5 Years Maximum Temperature Data Of "+selectStation);
            },
    
        });
    }
});

//get years of selected stations
$('#dataType').change(function () {

    var dataType = $('#dataType').val();
    if ((dataType == 'yearbased') || (dataType == 'dailybased')) {
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


