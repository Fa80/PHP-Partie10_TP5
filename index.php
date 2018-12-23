<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Partie10_CorrectionTP2</title>
</head>
<body>
  <?php
  /*TP 2

  Faire une page permettant de saisir les informations suivantes :

  Civilité (liste déroulante)
  Nom
  Prénom
  Age
  Société

  A la validation, les données saisies devront aparaitre sous le formulaire. Attention les données devront rester dans les différents éléments du formulaire même après la validation.
  */?>
  <div class="container">

    <?php
    //On vérifie si les variables superglobales sont définies, si elles le sont, stockage des valuers dans de nouvelles variables plus courtes.
    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['age']) && isset($_POST['society'])) {
      $gender = htmlspecialchars($_POST['gender']);
      $lastName = htmlspecialchars($_POST['lastName']);
      $firstName = htmlspecialchars($_POST['firstName']);
      $age = htmlspecialchars($_POST['age']);
      $society = htmlspecialchars($_POST['society']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
      <title></title>
    </head>
    <body>
      <div class="presentation">
        <form action="index.php" method="post">
          <label for="gender">Civilité : </label>
          <select name="gender">
            <option value="null" selected>CHOISIR</option>
            <option value="Mr">Monsieur</option>
            <option value="Mme">Madame</option>
            <option value="undefined">Non-défini</option>
          </select>
          <label for="lastName">Nom : </label>
          <!-- Pour laisser une valeur dans un input après envoi des données, on renseigne dans la value de celui-ci une condition php prenant en compte la variable qui nous intéresse -->
          <input type="text" name="lastName" value="<?php if(isset($lastName)){echo $lastName;}else{echo '';} ?>">
          <label for="firstName">Prénom : </label>
          <!-- Ici utilisation d'une ternaire au lieu d'un if/else, convient plus si on a une condition assez courte à tester -->
          <input type="text" name="firstName" value="<?= (isset($firstName)) ? $firstName : ''; ?>">
          <label for="age">Âge : </label>
          <input type="number" name="age" value="<?php if(isset($age)){echo $age;}else{echo '';} ?>">
          <label for="society">Société : </label>
          <input type="text" name="society" value="<?php if(isset($society)){echo $society;}else{echo '';} ?>">
          <button class="button" type="submit" name="button">Envoi</button>
        </form>
      </div>
      <div class="result">
        <?php
        //Test de la présence des variables courtes renseignées plus haut, et test avec des regex des valeurs renseignées par l'utilisateur. Si les données correspondent, affichage du résultat en dessous du formulaire, sinon un message d'erreur est affiché.
        if (isset($lastName) && isset($firstName) && isset($age) && isset($society) && preg_match('#^[a-z-.]+$#i', $lastName) && preg_match('#^[a-z-.]+$#i', $firstName) && preg_match('#^[0-9]{2}$#', $age) && preg_match('#^[a-z0-9.-_/ ]+$#i', $society)) {
          ?>
          <p>Nom : <?= $lastName; ?></p>
          <p>Prénom : <?= $firstName; ?></p>
          <p>Civilité : <?= $gender; ?></p>
          <p>Âge : <?= $age; ?></p>
          <p>Société : <?= $society; ?></p>
          <?php
        } else {
          ?>
          <p>Veuillez remplir le formulaire intégralement</p>
          <?php
        }
        ?>

      </div>
    </div>
  </body>
  </html>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
