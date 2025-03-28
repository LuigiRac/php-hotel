<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>php-hotel</title>
</head>
<body>
    
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

?>

<h2>Form</h2>
<div class="container mt-5">
  <h2>Filtra Risultati</h2>
  <form class="row g-3">
    <div  class="col-md-4">
      <label for="categoria" class="form-label">Disponibilità parcheggio</label>
      <select class="form-select" id="categoria" name="categoria">
        <option value="Seleziona">Seleziona...</option>
        <option value="Disponibile">Disponibile
        </option>
        <option value="Non_Disponibile">Non disponibile</option>
      </select>

      <button type="submit" class="btn btn-primary mt-4">Filtra</button>
    </div>

    <?php


"<h2> Risultati Filtrati</h2>";
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;

if ($categoria == 'Disponibile') {
    echo "<p>Mostra parcheggi disponibili</p>";
    
} elseif ($categoria == 'Non_Disponibile') {
    echo "<p>Mostra parcheggi non disponibili</p>";
} elseif ($categoria == 'Seleziona') {
    echo "<p>Seleziona una categoria per filtrare i risultati.</p>";
}
?>
  </form>
</div>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza dal centro</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($hotels as $hotel){
        if($categoria=='Disponibile' && $hotel["parking"] === true){
        echo "<br>";
        echo "<tr>";
        echo "<td>{$hotel['name']}</td>";
        echo "<td>{$hotel['description']}</td>";
        echo "<td>Disponibile</td>";
        echo "<td>{$hotel['vote']}</td>";
        echo "<td>{$hotel['distance_to_center']}</td>";
        echo "</tr>";
    }elseif($categoria=='Non_Disponibile' && $hotel["parking"] === false){
        echo "<br>";
        echo "<tr>";
        echo "<td>{$hotel['name']}</td>";
        echo "<td>{$hotel['description']}</td>";
        echo "<td>Non Disponibile</td>";
        echo "<td>{$hotel['vote']}</td>";
        echo "<td>{$hotel['distance_to_center']}</td>";
        echo "</tr>";
    }elseif($categoria=='Seleziona'){
        echo "<br>";
        echo "<tr>";
        echo "<td>{$hotel['name']}</td>";
        echo "<td>{$hotel['description']}</td>";
        echo "<td>" . ($hotel['parking'] ? 'Disponibile' : 'Non disponibile') . "</td>";
        echo "<td>{$hotel['vote']}</td>";
        echo "<td>{$hotel['distance_to_center']}</td>";
        echo "</tr>";
    };
};
    ?>
    
  </tbody>
</table>
</div>

</body>
</html>