<?php 
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=io-car;port=3309;charset=utf8", 'root', '');//la variable de connexion avec la base de donnee

    if(isset($_POST['valide']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']))//verification si les champs de la page boite_verte.php sont remplit
    {
        $email=$_POST['email'];
        
        $cherche = $conn->prepare("SELECT * FROM users WHERE email ='$email'");//selection sur tout les emails de la base de donnee tel que qu il soit le meme
        $cherche->execute();
        while($data = $cherche->fetch()){
            $marque = $data['ma_car'];
            $modele = $data['mo_car'];
            $annee = $data['a_car'];
        }
    }else header('location:boite_verte.php');//sinon, redirection a boite_verte.php
?>


<!DOCTYPE html><!-- la creation d un document html -->
<html lang="fr"><!-- pour rendre la langue de la page francaise -->
<head>
    <title> boite verte </title> <!-- le titre du site -->
    <link rel="stylesheet" href="boite_verte2.css"><!-- le lien vers le CSS -->
</head>

<body>  
    <header>
        <nav>
          <ul>
            <li id="logo"><a href="#">IO-CAR</a></li>
            <li><a href="deconexion.php">deconexion</a><li>
            <li><a href="concept.php">concept</a></li>
            <li><a href="maps.php">maps</a></li> <!-- le lien vers la carte -->
          </ul>
        </nav>
        <div id="titre">    
            <h1>bienvenue dans votre table de bord</h1><!-- le titre de la page -->
        </div>    
    </header>
    <p> 
            <h3>votre table</h3><br><!-- la creation du tableau -->
                <table class="table-style">

                    <thead>
                        <tr>
                            <th>INPUT</th>
                            <th>OUTPUT</th>
                        </tr>
                    </thead>
                    
            
                    <tbody>
                        <tr>
                            <td>marque</td>
                            <td><?php echo $marque ?></td> <!-- c est les information de la marque recut depuis la base de donnee  -->
                        </tr>
                        <tr>
                            <td>modele</td>
                            <td><?php echo $modele ?></td><!-- c est les information de l modele recut depuis la base de donnee  -->
                        </tr>
                        <tr>
                            <td>annee</td>
                            <td><?php echo $annee ?></td><!-- c est les information de la annee recut depuis la base de donnee  -->
                        </tr>
                        <tr>
                            <td>vitesse de la voiture</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>temperature moteur</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>pression de pneu</td>
                            <td></td>
                        </tr>
    </p>
</body>
</html>