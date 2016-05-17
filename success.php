<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=tolldata";
   $credentials = "user=postgres password=123456";
   
   
   $Regn = $_POST['Registration'];
   $contno = $_POST['counter'];
   $rate = $_POST['rate'];

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }


	$sql ="INSERT INTO public.toll_tolltransaction
    VALUES ( 5, 1, '".$Regn."', current_timestamp ,".$rate.");";
 
	  
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   
   
   
   	$sql ='UPDATE public.toll_accounts
   SET  "Payments"=10, "Receive"=10,  "Balance"=60
   WHERE "Registration_no" = '.$Regn.';';
   //var_dump($sql);
   
   // VALUES ( 5, 1, '".$Regn."', current_timestamp ,".$rate.");";
 
	  
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   
   pg_close($db);
   
  header('Location: front.php?counter='.$contno.'&reate='.$rate );
?>