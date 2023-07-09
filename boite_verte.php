<!DOCTYPE html> <!-- la creation d un document html -->
<html lang="fr"><!-- pour rendre la langue de la page francaise -->
<head> 
    <title> boite verte </title> <!-- le titre du site -->
    <link rel="stylesheet" href="boite_verte.css"> <!-- le lien vers le CSS -->
</head>

<body>  
    <header>
        <nav>
          <ul>
            <li id="logo"><a href="#">IO-CAR</a></li>
            <li><a href="#contact">Nous contacter</a></li>
            <li><a href="#langue">Langue</a></li>  
            <li><a href="inscription.php">inscription</a></li> <!-- le lien vers la page d inscription -->
          </ul>
        </nav>
        <div id="titre">    
            <h1 > IO-CAR </h1> <!-- le titre de la page -->
        </div>    
    </header>
    <form method="POST" action="boite_verte2.php"><!-- la methode post qui permet l envoie des information saisie vers l action -->
        <h2> login </h2>
        <input type="email" name="email" placeholder="entrer votre email">
        <input type="password" name="mot_de_passe" placeholder="entrer votre mot de passe"></br>
        <input type="submit" name="valide">
    </form>

    <?php
    $conn = new PDO("mysql:host=localhost;dbname=io-car;port=3309;charset=utf8", 'root', '');//la variable de connexion

    session_start();
    
    if(isset($_POST['email']) && isset($_POST['mot_de_passe']))//verification si l email et le mot de passe existe
    {
        if(!empty($_POST['email']) && !empty($_POST['mot_de_passe']))//verification si le champ de l email et le mot de passe nest pas vide
        {
            $email=$_POST['email'];
            $mot_de_passe=$_POST['mot_de_passe'];
        
            $sql="SELECT email,password FROM users WHERE email = ?";//la requette qui permet d importer des information de la base de donnee
            $cherche=$conn->prepare($sql);
            $cherche->execute(array($email));
            $data = $cherche->fetch();
            $row = $cherche->rowCount();
                if($row > 0)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))//compare l email ecrit dans le champ avec les email existants dans la base de donnee
                        {
                            if($mot_de_passe == $data['password'])//compare le mot de passe ecrit dans le champ avec les mots de passes existants dans la base de donnee
                            {
                                $_SESSION['email'] = $data['email'];//les donnees dans la base de donnee seront stocker dans la session
                                header('Location: boite_verte2.php');//redirection vers la page web boite_verte2.php
                            }
                        }   
                }
        }
    }
    ?>

</body>
</html>