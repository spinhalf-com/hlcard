
$(document).ready(function()
{

    $('#newgame').click(function()
    {
        // console.log('game');

        var gameData = $.ajax({
            type: 'GET',
            url: "api/newgame",
            dataType: "json",
            success: function(resultData)
            {
                console.log(resultData);
                $('#status').html('Game Loaded');
            },
            error: function(xhr, message)
            {
                alert(message);
            }
        });
    });

    $('.arrow').click(function()
    {
        var direction = $(this).attr('direction');

        var url     = 'api/next_guess/' + direction;

        var actionResult = $.ajax({
            type: 'POST',
            url: url,
            dataType: "json",
            success: function(resultData)
            {
                console.log(resultData);
                alert("Save Complete");
            },
            error: function(xhr, message)
            {
                alert(message);
            }
        });
    });

});
