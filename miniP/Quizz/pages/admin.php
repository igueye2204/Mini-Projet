
<div class="admin1" style="left: 150px; top: 120px;">
    <div class="header1">
        <h2 class="text">CRÉER ET PARAMÉTRER VOS QUIZZ</h2>
        <button class="deconnecter" style="font-color: white;padding-left: 10px;"><a href="index.php?statut=logout" style="text-decoration: none;" class="deconnexion">Deconnexion</a></button>
    </div>
    <div class="form-admin">
        <div class="head-menu">
            <img src="<?= $_SESSION['user']['avatar']?>" alt="" sizes="10px" srcset="" style="top: 120px; width: 100px; height:100px; border-radius:50%; left: 30px;box-shadow: 0 0 0 2px white;">
            <div class="menu1">  
                <?php
                    is_connect();

                    echo "<ul>";
                        echo "<ol class='ol2'>";
                        echo "<ol>".ucwords($_SESSION['user']['login'])."</ol>";
                        echo "<ol>".ucwords($_SESSION['user']['prenom'])."  ".ucwords($_SESSION['user']['nom'])."</ol>";
                        echo "<ol>".ucwords($_SESSION['user']['profil'])."</ol>";
                    echo "</ul>";
                ?> 
            </div>
        </div>
        <div class="form-menu">
                <ol   style= "margin-top: 0px;margin-bottom: 0px;text-decoration: none;list-style: none;";>
                    <li role="presentation"  ><button class="liste-question" style="background-image: url(Quizz/public/Images/Icônes/ic-liste.png); background-repeat: no-repeat;background-position: right;background-size: 25px;"><a href="index.php?lien=accueil&page=liste-question" style="text-decoration: none;">Liste Questions</a></button></li>
                    <li role="presentation" ><button class="creer-admin" style="background-image: url(Quizz/public/Images/Icônes/ic-ajout.png); background-repeat: no-repeat;background-position: right;background-size: 25px;"><a href="index.php?lien=accueil&page=creer-admin" style="text-decoration: none;">Créer Admin</a></button></li>
                    <li role="presentation" ><button class="liste-joueurs" style="background-image: url(Quizz/public/Images/Icônes/ic-liste.png); background-repeat: no-repeat;background-position: right;background-size: 25px;"><a href="index.php?lien=accueil&page=liste-joueurs" style="text-decoration: none;">Liste Joueurs</a></button></li>
                    <li role="presentation" ><button class="creer-question" style="background-image: url(Quizz/public/Images/Icônes/ic-ajout-active.png); background-repeat: no-repeat;background-position: right;background-size: 25px;"><a href="index.php?lien=accueil&page=creer-question"  style="text-decoration: none;">Créer Questions</a></button></li>
                </ol>
        </div>
        <?php

if (isset($_GET['page'])) 
{
    switch ($_GET['page']) 
  {
      case "liste-question":
          require("Quizz/pages/admin/listeQuestions.php");
          break;
      case "creer-admin":
          require("Quizz/pages/admin/creationAdmin.php");
          break;
      case "liste-joueurs";
          require("Quizz/pages/admin/listeJoueurs.php");
          break;
      case "creer-question";
          require("Quizz/pages/admin/creationQuestions.php");
          break;

  }
}
  
       
     
?>
    </div>
    
    
    
    