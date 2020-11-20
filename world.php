<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country= filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context=filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);
$querycountry = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $querycountry->fetchAll(PDO::FETCH_ASSOC);
$querycity=$conn->query("SELECT cities.name, cities.district,cities.population 
FROM countries LEFT JOIN cities ON countries.code = cities.country_code 
WHERE countries.name LIKE '%$country%'");
$city= $querycity->fetchAll(PDO::FETCH_ASSOC);




?>
<ul>
<?php foreach ($results as $row): ?>
  <!-- <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li> -->
<?php endforeach; ?>
</ul>

<?php if(isset($country)&&(!isset($context))) :?>
  <table class = "display">
    <caption><h2> TABLE SHOWING COUNTRIES</h2></caption>
    <thead>
      <tr>
        <th class = "th">Name</th>
        <th class = "th1">Continent</th>
        <th class = "th2">Independence</th>
        <th class = "th3">Name of State</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $country): ?>
        <tr>
          <td><?php echo $country["name"]; ?></td>
          <td><?php echo $country["continent"]; ?></td>
          <td><?php echo $country["independence_year"]; ?></td>
          <td><?php echo $country["head_of_state"]; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>

<?php if(isset($context)) :?>
<table class = "display">
    <caption><h2> TABLE SHOWING CITIES</h2></caption>
    <thead>
      <tr>
        <th class = "th1">Name</th>
        <th class = "th2">District</th>
        <th class = "th3">Population</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($city as $context): ?>
        <tr>
          <td><?php echo $context["name"]; ?></td>
          <td><?php echo $context["district"]; ?></td>
          <td><?php echo $context["population"]; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>