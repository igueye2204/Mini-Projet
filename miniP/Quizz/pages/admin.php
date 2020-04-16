
<br>

<div class="admin1">
    <div class="header1">
        <h2 class="text">CRÉER ET PARAMÉTRER VOS QUIZZ</h2>
        <button class="deconnecter" style="font-color: white;padding-left: 10px;"><a href="index.php?statut=logout" style="text-decoration: none;" class="deconnexion">Deconnexion</a></button>
    </div>
    <div class="form-admin">
        <div class="head-menu">
            <img src="Quizz/public/Images/logo-QuizzSA.png" alt="" sizes="10px" srcset="" style="top: 120px; width: 100px; height:100px; border-radius:50%; left: 30px;">
            <div class="menu1">  
                <?php
                    is_connect();

                    echo "<ul>";
                        echo "<ol class='ol2'>";
                        echo "<ol>".$_SESSION['user']['login']."</ol>";
                        echo "<ol>".$_SESSION['user']['prenom']."  ".$_SESSION['user']['nom']."</ol>";
                        echo "<ol>".$_SESSION['user']['profil']."</ol>";
                    echo "</ul>";
                ?> 
            </div>
        </div>
        <div class="form-menu">
            <nav>
                <ul>
                    <ol role="presentation" class="liste-question"><button><a href="#1" data-toggle="tab" style="text-decoration: none;">Liste Questions</a></button></ol>
                    <ol role="presentation" class="creer-admin"><button><a href="#2" data-toggle="tab" style="text-decoration: none;">Créer Admin</a></button></ol>
                    <ol role="presentation" class="liste-joueurs"><button><a href="#3" data-toggle="tab" style="text-decoration: none;">Liste Joueurs</a></button></ol>
                    <ol role="presentation" class="creer-question"><button><a href="#4" data-toggle="tab" style="text-decoration: none;">Créer Questions</a></button></ol>
                </ul>
            </nav>
        </div>
    </div>
    <div class="listej">
            <div><h3 class="entete">LISTE DES JOUEURS PAR SCORE</h3></div>
            <div class="listej2">
                 <p style="color: #818181; margin-left: 70px;padding-top: 10px;">Name &emsp; &emsp; Prenom &emsp; &emsp; Score</p> 
            </div>
        </div>
</div>

