<?php
  include("template/header.html");
  date_default_timezone_set('Asia/Phnom_Penh');
  session_start();

    if (isset($_SESSION['username'])) {
      // Set the page title and include the header file:
      echo "<title>Welcome</title>";
      //include('templates/header.html'); 

      // Print a greeting:
      
      echo '<br><p>Hello, ' . $_SESSION['username'] . '!</p>';
      
      print '<p>You have been logged in since: ' . date('g:i a', $_SESSION['loggedin']) . '.</p>';
      ?>
      
      <button onclick="addInput()" style="margin-left:50px">Add</button>
      <form action="index.php" id="submissionForm" enctype="multipart/form-data" method="post">
        <input type="file" class="file" name="files" accept="application/pdf">
        <button type="submit">Submit</button>
      </form>
      
      <a href="logout.php" style="float:right"><h1 style="margin:50px">Logout</h1></a>
      <?php
    } else {
      echo 'You need to <a href="login.php">log in</a> first';
    }

    //include('templates/footer.html'); // Need the footer.
?>
    <script>
    function addInput() {
      const form = document.querySelector('#submissionForm');
      form.insertAdjacentHTML('afterbegin', "<input type=\"file\" class=\"file\" name=\"files\" accept=\"application/pdf\"><br>");
    }
    </script>
<?php
    include("template/footer.html");
?>