
$(document).ready(function()
{
    $('#newgame').click(function()
    {
        // console.log('game');
        $('.arrow').prop('disabled', false);

        var gameData = $.ajax({
            type: 'GET',
            url: "api/newgame",
            dataType: "json",
            success: function(resultData)
            {
                var cardString  = setName(resultData.info.first_card.value) + " of " + resultData.info.first_card.suit;

                console.log(resultData);
                $('#status').html('Game Loaded');
                $('#card').html(cardString);

                setColor(resultData.info.first_card.suit);
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

        console.log(url);

        var actionResult = $.ajax({
            type: 'PUT',
            url: url,
            dataType: "json",
            success: function(resultData)
            {
                setNext(resultData);
            },
            error: function(xhr, message)
            {
                alert(message);
            }
        });
    });
});

function setNext(result)
{
    console.log(result);
    if(result.result == false)
    {
        $('#status').html('Game Over');
        $('#score').html('Score: ' + result.score);
        $('.arrow').prop('disabled', true);
    }
    else
    {
        var cardString  = setName(result.next_card.value) + " of " + result.next_card.suit;
        $('#card').html(cardString);
    }
}

function setName(value)
{
    if(isNaN(value))
    {
        switch(value)
        {
            case "A":
                return 'Ace';
                break;

            case "J":
                return 'Jack';
                break;

            case "Q":
                return 'Queen';
                break;

            case "K":
                return 'King';
                break;
        }
    }
    return value;
}


function setColor(suit)
{
    console.log(suit);
    if(suit == 'spades' || suit == 'clubs')
    {
        $('#card').css('color', 'black');
    }
    else
    {
        $('#card').css('color', 'red');
    }
}