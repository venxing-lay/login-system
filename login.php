<?php
    session_start();
    include("template/header.html");
?>

<?php
    if (isset($_SESSION['username'])) {
        ?>
        <h1>Now you are login</h1>
        <a href="index.php">Home page</a>
        <?php
        
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $loggedin = FALSE;
    
        ini_set('auto_detect_line_endings', 1);
        
        $fp = fopen('users.txt', 'rb');
        
        while ( $line = fgetcsv($fp, 200, "\t") ) {
            if ( ($line[0] == $_POST['username']) AND (password_verify($_POST['password'], $line[1]))) {
                $loggedin = TRUE;
                break;
            } // End of IF.	
        } // End of WHILE.
        fclose($fp); // Close the file.
        // Print a message:
        if ($loggedin) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['loggedin'] = time();
            
            header('Location: index.php');
        } else {
            print '<p style="color: red;">Account does not exist</p>';	
        }	
    } else { 
    ?>
    <div class="container mt-3" id="container">
    <div class="form-container sign-in-container">
      <form action="login.php" method="post">
        <h1 class="font-weight-bold">Sign in</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your account</span>
        <input type="text" placeholder="Username" name="username" size="20">
        <input type="password" placeholder="Password" name="password" size="20">
        <button class="btn btn-info btn-rounded ">Sign In</button>
      </form>
    </div>

    
  </div>
    <?php } ?>
<?php

    include("template/footer.html");
?>
  