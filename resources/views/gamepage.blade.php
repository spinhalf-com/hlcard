<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/game.css">
    {{--<link rel="stylesheet" href="/style/style.css">--}}
    <script src="https://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="root">

    <div id="container">

        <h2 class="pagepane">Game page</h2>

        <div class="pagepane" id="game">
            <div class="pagepane" id="status">No game loaded</div>

            <div class="pagepane" id="card"></div>
            <div class="pagepane" id="score"></div>

            <div class = "arrow pagepane" direction="lower">LOWER</div>
            <div class = "arrow pagepane" direction="higher">HIGHER</div>

            <br/>

            <button class="btn btn-success pagepane" id="newgame">New Game</button>
        </div>
    </div>

</div>
</body>
<script src="js/game.js"></script>


</html>