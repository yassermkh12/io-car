<!DOCTYPE html><!-- la creation d un document html -->
<html lang="fr"><!-- pour rendre la langue de la page francaise -->
<head>
    <title> fromulaire d inscription </title> <!-- le titre du site -->
    <link rel="stylesheet" href="inscription.css"><!-- le lien vers le CSS -->
</head>

<body>  
    <header>
        <nav>
        <ul>
            <li id="logo"><a href="#">IO-CAR</a></li>
            <li><a href="#contact">Nous contacter</a></li>
            <li><a href="#langue">Langue</a></li>   
        </ul>
        </nav>
        <div id="titre">    
            <h1 > fromulaire d inscription </h1> 
        </div>    
    </header>

    <form method="POST"><!-- la methode post qui permet l envoie des information saisie vers l action -->
        <h2> inscription </h2>
        <input type="email" name="email" placeholder="entrer votre email"></br>
        <input type="password" name="mot_de_passe" placeholder="entrer votre mot de passe"></br>
        <input type="password" name="cmot_de_passe" placeholder="confirmer votre mot de passe"></br>
        <input type="text" name="marque" placeholder="entrer la marque de votre voiture"></br>
        <input type="text" name="modele" placeholder="entrer le modele de votre voiture"></br>
        <input type="text" name="annee" placeholder="entrer l annee de votre voiture"></br>
        <input type="submit" name="formsend" >
    </form>

    <?php
    $conn = new PDO("mysql:host=localhost;dbname=io-car;port=3309;charset=utf8", 'root', '');//la variable de connexion

    if(isset($_POST['formsend']))//verification si le boutton envoyer existe
    {
        if(!empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['cmot_de_passe']) && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['annee']))//verification si la les chamop sont bien remplit
        {
                    
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $cmot_de_passe = $_POST['cmot_de_passe'];
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $annee = $_POST['annee'];
            
            if($mot_de_passe == $cmot_de_passe){

            $sql = "INSERT INTO users(email,password,ma_car,mo_car,a_car) VALUES ('$email','$mot_de_passe','$marque','$modele','$annee')";
            $insertion = $conn->prepare($sql);
            $insertion->execute();
            header("location:boite_verte.php");
            }
        }
    }
    ?>

</body>
</html>