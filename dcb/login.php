<?php
    require_once('credentials.php');
    require_once 'functions/functions.php';
  session_start();
  $errorMessage = '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersNaam = $_POST["gebruikersnaam"];
    $query = zoekGebruiker($gebruikersNaam);
    $gebruiker = mysqli_fetch_assoc($query);
    $hash = $gebruiker["wachtwoord"];
    $valid = password_verify($_POST["wachtwoord"],$hash);
    $admin = $gebruiker["rechten"] == 1;
    if ($valid && $admin) {
        session_reset();
        $_SESSION['gebruiker'] = $gebruiker;
        header('Location: ./admin/index.php?gebruikersnaam='.$gebruikersNaam);
    } elseif ($valid) {
        session_reset();
        $_SESSION['gebruiker'] = $gebruiker;
        header('Location: ./gebruiker/index.php');
    } else {
      $errorMessage = "Incorrect username and/or password. Please try again.";
    }
  }
 ?>

<div class='form-container'>
  <p class='error'><?= $errorMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type='text' id='username' name='gebruikersnaam' placeholder='Username...'>

    <input type='password' id='password' name='wachtwoord' placeholder='Password...'>

    <input type='submit' value='submit'>
  </form>
</div>