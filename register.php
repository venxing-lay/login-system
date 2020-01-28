<?php
    include("template/header.html");
?>



<?php

    $problems = [];
    $check = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];

        $fp = fopen("users.txt", 'rb');
        while($line = fgetcsv($fp, 200, "\t")){
        if($line[0] == $username){
            $check = true;
            break;
        }
        }
        fclose($fp);

        if(!$check){
            $fp = fopen("users.txt", "a+");
            $hashed = password_hash($_POST["pwd"], PASSWORD_BCRYPT);
            $toWrite = $_POST["username"]."\t".$hashed."\n";
            fwrite($fp, $toWrite);
            fclose($fp);
        }
    
    }
?>


<div class="container mt-5">
    <div class="form-container sign-up-container mt-2">
      <form action="register.php" method="POST">
        <h1 class="font-weight-bold">Create Account</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <input type="text" name="username" placeholder="Name" />
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="pwd" placeholder="Password" />
        <input type="password" name="repeat-pwd" placeholder="Repeat Password" />
        <button class="btn btn-info btn-rounded">Sign up</button>
      </form>
    </div>
</div>
<script>
    
</script>

<?php
    include("template/footer.html");
?>