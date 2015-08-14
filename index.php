<!--

Made by Nick Parks
Simple and basic PHP file without the laravel framework to display data from WarMod results

Time: 1:00PM 8/14/15

-->
<?php
include 'config.php';

$connection = new mysqli($server, $username, $password, $database);

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

$query = 'SELECT * FROM `results`';

$result = $connection->query($query);
?>
<html>
<head>
    <title>WarMod results</title>
    <!-- Bootstrap for quick styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body style="padding-top: 25px">
<div class="container">
    <table class="table table-bordered table-hover" style="text-align: center">
        <tr style="background-color: lightgrey; font-weight: bold">
            <td>ID</td>
            <td>Map</td>
            <td>Team 1</td>
            <td>Team 2</td>
            <td>Team 1 score</td>
            <td>Team 2 score</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['match_id'] . "</td>";
                echo "<td>" . $row['map'] . "</td>";
                echo "<td>" . $row['t_name'] . "</td>";
                echo "<td>" . $row['ct_name'] . "</td>";
                echo "<td>" . $row['t_overall_score'] . "</td>";
                echo "<td>" . $row['ct_overall_score'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='6'>No results to display!</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
