
<div class="admin2">
    <div class="header2">
    <div class="">
            <img src="<?=$_SESSION['user']['avatar']?>" alt="" sizes="10px" srcset="" style="top: 10px; width: 60px; height:60px; border-radius:50%; left: 10px;">
            <div class="menu2" style="width: 100px;height: 0px;left: 10px;top: 60px; color: white;margin-left: 0px;padding-left: 0px;">  
                <?php
                    is_connect();
                        echo $_SESSION['user']['prenom']." ";
                        echo $_SESSION['user']['nom'];
                        
                ?> 
            </div>
        </div>
        <h3 class="text1" style="text-align: center;">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ 
        JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h3>
        <button class="deconnecter" style="padding-left: 10px;"><a href="index.php?statut=logout" style="text-decoration: none; color: white;" class="deconnexion">Deconnexion</a></button>
    </div>
        <div class="form2">
            <div class="form-question">
                <div class="question1">
                    <h2 class="Qh2">QUESTION 1/5</h2>
                    <h3 class="Qh3">LES LANGAGES WEB</h3>
                </div>
                <div    class="Q1">
                    <div>
                    <br><input type="checkbox" name="html" id="html" ><label for="">HTML</label>
                    </div>
                    <div>
                    <br><input type="checkbox" name="R" id="html"><label for="">R</label>
                    </div>
                    <div>
                    <br><input type="checkbox" name="java" id="html"><label for="">Java</label>
                    </div>
                    
                </div>
                <button class="precedent">Précedent</button>
                <button class="suivant">Suivant</button>
            </div>
            <div class="score">
                <p style="width: 150pxmargin-left: 0px;top: 0px;left: 50px; color:#818181; position:absolute;">Mon Meilleur scores</p>
                <div class="liste-score" style="margin-top: 50px;margin-left: 30px;">
                    <?= $_SESSION['user']['prenom']."&emsp;".$_SESSION['user']['nom']."<br>"?>
                </div>
            </div>
        </div>
    </div>
</div>
