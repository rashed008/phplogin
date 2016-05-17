<?php
error_reporting(E_ALL ^ E_NOTICE);
	require('db.php');
	if (isset($_POST['counter'])) { 
	$username = $_POST['username'];
    $counter = $_POST['counter'];
	} 
	else{
		$counter = $_GET['counter'];
		
	}
	
	

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
     // echo "Opened database successfully\n";
   }

   $sql ="SELECT counter_rate from toll_tollcounter  where counter_no  = '".$counter."' ;  ";

   $ret = pg_query($db, $sql);
   if(!$ret){
	  echo pg_last_error($db);
	  exit;
   } 
   $row = pg_fetch_row($ret);
   $rate = $row[0];
   
  // echo "<br> Rate --- ".$row[0];
   
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="jquery-1.12.2.min.js"></script>


<script>
window.onload = function() {
  document.getElementById("reg").focus();
};
</script>

</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>IT Link Corp.</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post" action ="success.php">
   
      <table align="center">
   <tr align="center" >
             <td><h3>Counter   <?php echo $counter;?> |     Rate <?php echo $rate;?></h3></td>
         </tr>
         <tr align="center">
             <td> <h3>Registration No</h3></td>
         </tr>
           <tr align="center">
         <td>
		
           <input type="text" id="reg" name="Registration" placeholder="Registration" required />
		    <input type="hidden" name="counter" value =  "<?php echo $counter;?>" />
			 <input type="hidden" name="rate" value = "<?php echo $rate;?>" />
         </td>
         </tr>
         <tr align="center">
            <td> <b>"Please Touch your card"</b></td>
         </tr>
      </table>
	  
      <button type="submit" name="btn-save"><strong>Confirm</strong>
	  
    </form>
    </div>
</div>
</center>
</body>
</html>