<?php
$json1=array();
$error1=$error2=$error3=$error4=$error5=$error6="";
$issucces=false;
if (isset($_POST['valider'])) 
{
    
    $json1=[
            'checkbox'=>htmlspecialchars(trim($_POST['checkbox'])),
            'radio'=>htmlspecialchars(trim($_POST['radio'])),
            'text'=>htmlspecialchars(trim($_POST['text'])),
            'select' => htmlspecialchars(trim($_POST['select'])),
            'point' => htmlspecialchars(trim($_POST['point'])),
            'typetext' => htmlspecialchars(trim($_POST['typetext']))
            ];

    $jsontab = "Quizz/data/Questions.json";
    $issucces=true;
    if(empty($json1['typetext']) || empty($json1['select']) || empty($json1['point']))
    {
        $error1="ERREUR! Ces champs sont obligatoires!";
        $issucces=false;
    }
    if($issucces)
    {
        $jsc=file_get_contents($jsontab);
        $jsc=json_decode($jsc,true);
        $jsc[] = $json1;
        $jsc = json_encode($jsc);
        file_put_contents('Quizz/data/Questions.json', $jsc);
    
    header("location:index.php?lien=accueil&page=creer-question");
    }
}
?>
<div class="question">
    <div><h3 class="entete">PARAMETRER VOTRE QUESTION</h3></div>
        <form action="" method="post">
        <div class="formu-question" >
            <div>
                <label for="">Questions</label>
                <input type="text" name="typetext" size="50" class="champ" >
            </div><br><br>
            <div id="inputs">
                <div>
                    <label for="">Nbre de Points</label>
                        <select name="point" value="">
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                        </select>
                </div><br>
                <div class="">
                    <label for=""><strong>Type de Réponse</strong></label>
                        <select name="select" value="" style="width: 300px;height: 40px;">
                            <option value="">Donnez type de réponse</option>
                            <option value="text" >Text</option>
                            <option value="choix_simple">Choix simple</option>
                            <option value="Choix_multiple">Choix multiple</option>
                        </select>
                        <button type="button" class="btn_ajout" onclick="onAddInput()"></button>
                </div>
                </div>
                
                    <div class="row" id="row_0">
                        
                    </div>
                    <br>
                        <div id="error-1" style="font-size: 15px"><?=$error1?></div>
                    <div>
                        <input type="submit" name="valider" value="Enregistrer" class="bouton" style="position: absolute;top: 490px;left: 430px;">
                    </div>
                <div>
            </div>
        </form>
        
    </div>
</div>
<script>
    
        var nbrRow = 0;
        function onAddInput() {
            nbrRow++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            newInput.setAttribute('class','row');
            newInput.setAttribute('id','row_'+nbrRow);
            newInput.innerHTML = `<label for=""><strong>Réponse${nbrRow}</strong></label>
                    <input type="text" name="text" class="champ font" style="height: 30px;width: 300px;">
                    <input type="checkbox" name="checkbox" style="height: 20px;width: 20px;">
                    <input type="radio" name="radio" style="height: 20px;width: 20px;">
                    <button type="button" class="btn_supprimer" onclick="onDeleteInput(${nbrRow})"></button>
                    `;
            divInputs.appendChild(newInput);
        }

        function onDeleteInput(n) {
            var target = document.getElementById('row_'+n);
            setTimeout(function () {
                target.remove();
            }, 700);
            fadeOut('row_'+n);   
        }

        function fadeOut(idTarget) {
            var target = document.getElementById(idTarget);
            var effect = setInterval(function () {
                if(!target.style.opacity){
                    target.style.opacity = 1;
                }
                if(target.style.opacity>0){
                    target.style.opacity-=0.1;
                }else{
                    clearInterval(effect);
                }
            }, 200)
        }

</script>