<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cinema</title>
</head>

<body>
    <!--
        visualizzazione dei dati
    -->

    <p>Scegli cosa filtrare e inserisi il filtro:</p>

    <form action="api.php" method="post">
        <select name="chiave" id="chiave">
            <option value="movies">titolo</option>
            <option value="actors">actor</option>
            <option value="genres">genre</option>
            <option value="directors">director</option>
        </select>
        <br>
        <input type="text" name="user_input" id="user_input" placeholder="filtra per">
        <br>
        <input type="submit" value="invia">
    </form>
</body>

</html>