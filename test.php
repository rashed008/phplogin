<?php
   //$host        = "host=127.0.0.1";
   //$port        = "port=5432";
   //$dbname      = "dbname=testdb";
   //$credentials = "user=postgres password=pass123";

   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=tolldata";
   $credentials = "user=postgres password=123456";

   
   
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      CREATE TABLE COMPANY
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      AGE            INT     NOT NULL,
      ADDRESS        CHAR(50),
      SALARY         REAL);
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
?>