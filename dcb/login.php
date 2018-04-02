<?php
  $errorMessage = '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersnaam = $_POST["username"];
    $query = vindGebruiker($conn ,$gebruikersnaam);
    $user = mysqli_fetch_assoc($query);
    $hash = $user["password"];
    $valid = CheckWachtwoord($conn=false,$_POST["password"],$hash);
    $admin = $user["admin"] == 1;
    if ($valid && $admin) {
      $_SESSION['user'] = $user;
      header('Location: ./admin/index.php');
    } elseif ($valid) {
      $_SESSION['user'] = $user;
      header('Location: ./guest/index.php');
    } else {
      $errorMessage = "Incorrect username and/or password. Please try again.";
    }
  }
 ?>

<div class='form-container'>
  <p class='error'><?= $errorMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type='text' id='username' name='username' placeholder='Username...'>

    <input type='password' id='password' name='password' placeholder='Password...'>

    <input type='submit' value='submit'>
  </form>
</div>
