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
	Welcome
     </strong>
    </h2>

	 <form action="" method="post">
 <div>
 <strong>Blog Title</strong> <input type="text" name="blog_header" value="<?php echo $blogTitle; ?>" /><br/>
 <strong>Blog description</strong> <input type="text" name="blog_short" value="<?php echo $blogDescription; ?>" /><br/>
 <strong>Blog Content</strong> <input type="text" name="blog_content" value="<?php echo $blogContent; ?>" /><br/>
 <input type="submit" name="submit" value="Submit">
	
   </header>	

   <footer id="footer">
   </footer>

 </body>
</html>

<?php 
 include('connect-db.php');
 
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $blogTitle = mysql_real_escape_string(htmlspecialchars($_POST['blog_header']));
 $blogDescription = mysql_real_escape_string(htmlspecialchars($_POST['blog_short']));
 $blogContent = mysql_real_escape_string(htmlspecialchars($_POST['blog_content']));
 
 // check to make sure both fields are entered
 if ($blogTitle == '' || $blogDescription == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($blogTitle, $blogDesctiption);
 }
 else
 {
 // save the data to the database
 mysql_query("INSERT blog SET blog_header='$blogTitle', blog_short='$blogDescription', blog_content='$blogContent', created=CURDATE() ")
 or die(mysql_error()); 
 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }
?>
