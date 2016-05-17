<?php
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


	$sql ="INSERT INTO public.toll_tolltransaction
    VALUES ( 5, 10, '111', current_timestamp ,0);";

   //var_dump($sql);

 //INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)      VALUES (1, 'Paul', 32, 'California', 20000.00 );
	  
	  
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
?>