<?php
require_once "objects/database.php";

$query = "SELECT * FROM pidgeons";
$result = mysqli_query($db, $query);

$res_pidgeons = [];

while($row = mysqli_fetch_assoc($result))
{
    $res_pidgeons[] = $row;
}

$rowNumber = 1;

//add new pigeon
if(isset($_POST["submit"]))
{
    $eigenaar = mysqli_real_escape_string($db, $_POST["eigenaar"]);
    $duif = mysqli_real_escape_string($db, $_POST["duif"]);
    $gewicht = mysqli_real_escape_string($db, $_POST["gewicht"]);
    $leeftijd = mysqli_real_escape_string($db, $_POST["leeftijd"]);

    $query2 = "INSERT INTO pidgeons(eigenaar, duif, gewicht, leeftijd)
              VALUES('$eigenaar','$duif', '$gewicht', '$leeftijd')";

    header("location: index.php");

    //uitvoeren op de database
    $resulty = mysqli_query($db, $query2);
    // Controleren of het goed gegaan is
    if(!$resulty)
    {
        // error
        echo 'Fout in query: '.mysqli_error($db);
    }
    // Database sluiten
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>


    <title>Home</title>
</head>
<body>
<header>
    <div class="header-banner">
<!--        <h1 id="banner-title">Welkom op de BBJuniorTest Site van Sander Pool</h1>-->
        <br/><br/><br/><br/>
        <h1>De pitloze duif!</h1>
    </div>
</header>
<div class="pigeons">
    <h2 id="pigeons-title">Onze huidige duiven</h2>
    <table>
        <tr id="categories">
            <td>Nummer</td>
            <td>Eigenaar</td>
            <td>Duif</td>
            <td>Gewicht</td>
            <td>Leeftijd</td>
        </tr>
        <?php
        foreach ($res_pidgeons as $pidgeons)
        {
            ?>
            <tr>
                <td><?= $pidgeons['id'] ?></td>
                <td><?= $pidgeons['eigenaar'] ?></td>
                <td><?= $pidgeons['duif'] ?></td>
                <td><?= $pidgeons['gewicht'] ?></td>
                <td><?= $pidgeons['leeftijd'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<div class="new-pigeons">
    <h2>Voeg een nieuwe duif toe!</h2>

    <form class="row" action="" method="post">
        <label for="eigenaar">Uw eigen naam</label>
        <br>
        <input type="text" id="eigenaar" name="eigenaar" placeholder="Naam eigenaar">
        <br>
        <label for="duif">Naam van uw duif</label>
        <br>
        <input type="text" id="duif" name="duif" placeholder="Naam duif">
        <br>
        <label for="gewicht">Gewicht van uw duif in grammen</label>
        <br>
        <input type="number" id="gewicht" name="gewicht" placeholder="Gewicht duif">
        <br>
        <label for="leeftijd">Leeftijd van uw duif in maanden</label>
        <br>
        <input type="number" id="leeftijd" name="leeftijd" placeholder="Leeftijd duif">
        <br>
        <input type="submit" id="submit" name="submit" class="btn" value="Voeg toe!">
    </form>
</div>

</body>