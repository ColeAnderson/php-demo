<?php
include('model.php');
  
    try{

        $sql = "INSERT INTO MESSAGE ( p_fk, message) 
        VALUES
         ( 1, 'new msg'),
         ( 1, 'sexy')";
    
        $sql1 = "UPDATE PRODUCT SET notification = 1 WHERE PRODUCT.p_id = 1 ";
        
        $db = Database::getInstance();

        //echo "<h1>this line</h1>";
        $db->createNewConn();
        $db->createDatabase();
        //echo "<h1>this line1</h1>";
        $db->createTables();
        //echo "<h1>this line2</h1>";
        
        $conn = $db->getConn();


        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        echo "ok!";
    }catch(exception $x){
        echo "shit! ".$x;
    }

//    $result = $conn->query($sql);

?>