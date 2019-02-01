</<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <p>this is test.php;</p>

<?php
    include('model.php');
    class Test{
        function testdb(){
            $db = Database::getInstance();
            echo "<h1>this line</h1>";
            $db->createNewConn();
            $db->createDatabase();
            echo "<h1>this line1</h1>";
            $db->createTables();
            echo "<h1>this line2</h1>";
        }
    }

    function main(){
        $t = new Test();
        $t->testdb();
    }

    main();

?>
  </body>
</html>
<?php

?>
