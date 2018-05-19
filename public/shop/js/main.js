$(document).ready(function () {
    // Set the date we're counting down to
    var countDownDate = new Date("May 30, 2018 00:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="countdown"
        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $("#submit-ajax-form").click(function () {
        var email = $("#email-register").val();
        var name = $("#name-register").val();
        var phone = $("#phone-register").val();
        var _token = $("#token").val();

        $.ajax({
            url: 'news/form',
            type: 'post',
            dataType: "json",
            data: {
                "_token": _token,
                "name": name,
                "email": email,
                "phone": phone
            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    $('.form-regis').hide();
                    $('.status').show();
                    setTimeout(function () {
                        $('#myModal').modal('hide');
                        Set_Cookie('cookie_popup', 'PopUnder', 0.1, '/', '', '');
                    }, 3000);
                }
            },
            error: function (data) {
                var response = JSON.parse(data.responseText);
                $('#result-error').html('');

                $.each( response, function( key, value ) {
                    $('#result-error').append('<p style="color: red;">&bull; '+value[0]+'</p>');
                    // console.log(value);
                });


            }
        });
        return false;
    });
});