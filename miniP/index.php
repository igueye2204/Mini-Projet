<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link rel="stylesheet" href="Quizz/public/css/quizz.css">
</head>
<body>
    <div class="header">
        <h1>Le plaisir de jouer</h1>
        <img src="Quizz/public/Images/logo-QuizzSA.png" alt=""> 
    </div>
    <div id="bar">
         
    </div> 
    <div class="content">
        <?php
            session_start();
            require_once("Quizz/traitement/fonctions.php");
           

                if (isset($_GET['lien'])) 
                {
                    switch ($_GET['lien']) 
                    {
                        case "accueil":
                            require_once("Quizz/pages/admin.php");
                            break;
                        
                        case "jeux":
                            require_once("Quizz/pages/jeux.php");
                            break;
                        case "inscription";
                            require_once("Quizz/pages/creationCompte.php");
                        break;
                    }
                }
                else
                {
                    if (isset($_GET['statut']) && $_GET['statut']==="logout") 
                    {
                        deconnexion();
                    }
                    require_once("Quizz/pages/connexion.php");  
                    
                }
                   
        ?>
    </div>   
</body>
</html>