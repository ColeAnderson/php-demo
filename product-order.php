<?php
include('model.php');

    $id = $_GET['id'];
    echo "<h1>".$id."</h1>";
    // get products
    $sql = "SELECT p_id, u_fk, notification FROM PRODUCT WHERE u_fk = ".$id."";
    $db = Database::getInstance();
    //echo "<h1>this line</h1>";
    $db->createNewConn();
    $db->createDatabase();
    //echo "<h1>this line1</h1>";
    $db->createTables();
    //echo "<h1>this line2</h1>";
    $conn = $db->getConn();
    $result = $conn->query($sql);

//    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["p_id"]. " - notification: ".$row["notification"]."<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>