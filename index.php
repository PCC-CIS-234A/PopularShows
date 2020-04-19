<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
    <script src="assets/includes/popular_search.js"></script>
    <link rel="stylesheet" href="assets/includes/popular_search.css">
</head>
<body>
    <h1>Popular Shows by Genre and Type</h1>
    <div>
        <select id="genreCombo" style="float:left"></select>
        <select id="typeCombo" style="float:left"></select>
        <input id="minVotesField" type="text" style="float:right" value="50000">
        <span style="float:right">Min. Votes:</span>
    </div>
    <table id="titleTable" style="width: 100%">
        <thead><tr><th class="left">Title</th><th>Year</th><th>Rating</th><th>Num. Votes</th></tr></thead>
        <tbody></tbody>
    </table>
</body>
</html>

