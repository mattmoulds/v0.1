<!DOCTYPE HTML>
<html>
 <head>
  <title>
	Matt Moulds
  </title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/init.js"></script>
   <noscript>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-wide.css" />
   </noscript>
 </head>

 <body class="index loading">	
  <section id="banner">		
   <div class="inner">
    <?php
     include('connect-db.php');
     $result = mysql_query("SELECT name,job_title FROM info order by id desc limit 1")
     or die(mysql_error());
     while($row = mysql_fetch_array( $result )) {
     echo "<br><header><h2>". $row["name"]. "</header></h2>". "<p>". $row["job_title"] . "</strong></p>";
     }
    ?>

    <ul class="icons">
     <li><a href="https://twitter.com/Matta44" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
     <li><a href="https://www.facebook.com/matthew.moulds.9" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
     <li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
    </ul>
   </div>
  </section>
		
  <article id="main">
   <header class="special container">				
    <h2>
     <strong>
       <?php
        $id = mysql_real_escape_string($_GET['id']);
        $query = 'SELECT blog_header FROM `blog` WHERE `id` = '.$id.' LIMIT 1';
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        echo '<strong>' . $row["blog_header"] . '</strong>';
       ?>
     </strong>
    </h2>

<?php

$id = mysql_real_escape_string($_GET['id']);
//Remove LIMIT 1 to show/do this to all results.
$query = 'SELECT blog_content FROM `blog` WHERE `id` = '.$id.' LIMIT 1';
$result = mysql_query($query);
$row = mysql_fetch_array($result);

// Echo page content
//echo $row['blog_header'];
echo '<br>' . "<div id='blog_p'>". $row["blog_content"] . "</div><br>";
?>

   </header>	

   <footer id="footer">
   </footer>

 </body>
</html>
