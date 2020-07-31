<?php
require "includes/db_1.php";
if(isset($_POST['display'])) {
    $date = $_POST['date'];
    $sql = mysqli_query($connection, "SELECT * FROM currency where date='$date'");

}
?>
<html>
<head>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вывод курса валют</title>
</head>
<body>
<table class="content-table">
    <thead>
    <tr>
        <th>ValuteID</th>
        <th>numCode</th>
        <th>charCode</th>
        <th>name</th>
        <th>value</th>
        <th>date</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while ($myrow2 = mysqli_fetch_array($sql)) {
            echo "<tr><td>" . $myrow2["valuteID"] ."</td>". " <td>" . $myrow2["numCode"] . "</td> " ."<td>". $myrow2["charCode"] ."<td>". $myrow2["name"] . "<td>". $myrow2["value"] ."<td>". $myrow2["date"] ."</td></tr>";

    }
    ?>
    </tbody>
</table>
</body>
</html>
