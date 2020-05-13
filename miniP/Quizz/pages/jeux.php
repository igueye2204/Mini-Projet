
<div class="admin2">
    <div class="header2">
        <div class="">
            <img src="<?= $_SESSION['user']['avatar']?>" alt="" sizes="10px" srcset="" style="top: 10px; width: 60px; height:60px; border-radius:50%; left: 10px;">
            <div class="menu2" style="width: 200px;height: 0px;left: 10px;top: 60px; color: white;margin-left: 0px;padding-left: 0px; margin: 0px;">  
                <p style="margin-top: 0px;"><?= ucwords($_SESSION['user']["prenom"]).' '.strtoupper($_SESSION['user']["nom"]) ?></p>
                
            </div>
        </div>
        <h3 class="text1" style="text-align: center;">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h3>
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
                
                <div class="liste-score" style="margin-top: 50px;margin-left: 0px;font-size: 5mm;box-shadow: 0 0 0 1px #03b7ec;text-align: center;color:#818181;" >
                        <td>
                        <div><?php
                        is_connect();

                        echo $_SESSION['user']["prenom"]."&emsp;";
                        echo $_SESSION['user']['nom']."&emsp;";
                        echo $_SESSION['user']['score']." pts";
                        ?></div>
                        </td>
                      </table>
                        </div>
                        <div>
                            <a href="#" id="topscr1"><p style="width: 150pxmargin-left: 0px;top: 0px;left: 10px; color:#818181; position:absolute;">Top scores</p></a>
                            <a href="#" class="scor" id="topscr2"><p style="width: 150pxmargin-left: 0px;top: 0px;left: 100px; color:#818181; position:absolute;">Mon Meilleur scores</p></a>
                                <div id="top_score" style="margin-top: 50px;margin-left: 0px;font-size: 5mm;box-shadow: 0 0 0 1px #03b7ec;text-align: center;color:white;">
                                    <?php
                                        $tab_json = getData();
                                        foreach ($tab_json as $value){
                                        $tab[]= array(
                                            "prenom"=> $value["prenom"],
                                            "nom"=> $value["nom"],
                                            "score"=> $value["score"]
                                            );
                                        }
                                        $columns = array_column($tab,"score");
                                        array_multisort($columns, SORT_DESC,$tab);
                                    echo"<table>";
                                    echo"<tr>";
                                    echo"</tr>";
                                    for($i=0; $i<5; $i++){
                                    if(array_key_exists($i,$tab)){
                                        echo "<tr><td>".$tab[$i]['prenom']."</td><td>"."&emsp;".$tab[$i]['nom']."</td><td>"."&emsp;".$tab[$i]['score']." pts"."</td></tr>";
                                    }
                                    
                                    }
                                    echo"</table>";

                                    ?>
                                </div>
        </div>
</div>
<script>
  let topscr1=document.getElementById("topscr1");
  let top_score=document.getElementById("top_score");
  let topscr= document.getElementById('topscr2');
  topscr1.addEventListener("click", function(){
    top_score.style.display="block";
    top_score.style.backgroundColor="darkturquoise";
    topscr1.style.backgroundColor="darkturquoise";
    if(meilleure.style.display=="block"){
      meilleure.style.display="none";
      topscr.style.backgroundColor="";
    }
    
  });

  let topscr2=document.getElementById("topscr2");
  let top_scor=document.getElementById("top_score");
  let topsc=document.getElementById('topscr1');
  topscr2.addEventListener("click", function(){
    meilleur.style.display="block";
    meilleur.style.backgroundColor="beige";
    topscr2.style.backgroundColor="beige";
    if(top_scor.style.display=="block"){
      top_scor.style.display="none";
      topsc.style.backgroundColor="";
    }
    
  });
 
  
</script>