<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Array of hotels -->
    <?php
    $hotels = [
    
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],  
    ];

    $parking = $_GET['parking'];
    echo "parking";
    var_dump($parking);

    echo "<br />";

    $vote = $_GET['vote'] ?? -1;
    echo "vote";
    var_dump($vote);
    ?>
    
    <title>PHP hotels</title>
</head>

<body>

<div class="container my-5">

    <form>
        <!-- FILTRO PARCHEGGIO -->
        <section class="mb-1">
            <label for="parcheggio">Parcheggio: </label>
            <input type="radio" id="parking_yes" name="parking" value="yes">
            <label for="parking_yes">Yes</label>
            <input type="radio" id="parking_no" name="parking" value="no">
            <label for="parking_no">No</label>
        </section>
        <br>
        <!-- FILTRO RATING -->
        <section class="mb-1">
            <label for="vote">Rating: </label>
            <select name="vote" id="vote">
                <option value="-1">SELEZIONA VOTO MINIMO</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </section>
        <br>
        <!-- SUBMIT VALUE -->
        <input type="submit" value="SEARCH">
    </form>

    <h1 class="text-center mb-4">LIST OF HOTELS</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col" class='text-center'>PARKING</th>
                <th scope="col" class='text-center'>VOTE</th>
                <th scope="col" class='text-center'>DISTANCE TO CENTER</th>


                <!-- ALTERNATIVA CON "FOREACH" -->
                <!-- <?php
                    //print each key in single hotel
                    foreach ($hotels[0] as $key => $value) {               
                        echo "<th scope='col'>" . $key . "</th>";
                    };
                    ?>   -->
            </tr>
        </thead>
        
        <tbody>

            <?php
                //for each hotel in $hotels print all informations
                foreach ($hotels as $k => $hotel) {
                    
                    if (($parking === null
                        || ($parking === "yes" && $hotel['parking'])
                        || ($parking === "no" && !$hotel['parking']))
                     && $vote <= $hotel['vote']) {
            ?>    
                        <tr>
                            <td> <?php echo $hotel['name'] ?> </td>
                            <td> <?php echo $hotel['description'] ?> </td>
                            <td class='text-center'> <?php echo $hotel['parking'] ? "yes" : "no" ?> </td>
                            <td class='text-center'> <?php echo $hotel['vote'] ?> /5</td>
                            <td class='text-center'> <?php echo $hotel['distance_to_center'] ?> km</td>
                            
                            <!-- ALTERNATIVA CON FOREACH -->
                            
                            <!-- 
                                foreach ($hotel as $key => $value) {

                                if ($key == 'parking' && $value) {
                                    $value = '&#x2713;';
                                }
                                echo "<td>"; . $value . "</td>";
                            } -->
                            
                        
                        </tr>
            <?php
                    }
                }
            ?>
<!-- MEGLIO NON USARE FOREACH CON COSI POCHI ELEMENTI => RISCRIVERE PER ESTESO COME CORREZIONE -->
        </tbody>
    </table>
</div>
    
</body>
</html>