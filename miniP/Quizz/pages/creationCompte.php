<?php

 $json=array();
$error=$error1=$error2=$error3=$error4=$error5=$error6=$error7="";
$issucces=false;
if (isset($_POST['submit'])) 
{
    
    $json=[
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'login' => $_POST['login'],
        'password' => $_POST['password'],
        'passwordconfirm' => $_POST['passwordconfirm'],
        'avatar' => 'Quizz/public/Images/'.$_FILES['avatar']['name']
        ];
    $file = $_FILES['avatar']['tmp_name'];
    $destination= 'Quizz/public/Images/';
    $name = $_POST['prenom'].".jpg";
    $jsons = "Quizz/data/utilisateur.json";
    $issucces=true;
    
    if(empty($json['prenom']) || empty($json['nom']) || empty($json['login']) || empty($json['password']) || empty($json['passwordconfirm']))
    {
        $error2="Tous les champs sont obligatoire!";
        $issucces=false;
    }
    if ($json['password']!=$json['passwordconfirm']) 
    {
        $error1="les mots de passe saisies sont différents!";
        $issucces=false;
    }
    $extension=strrchr($_FILES['avatar']['name'], '.');
    $extensions = array('.png','.jpeg');
    if (!in_array($extension, $extensions)) 
    {
        $error = "Vous devez uploader un fichier de type png ou jpeg";
        $issucces=false;
    }
    $tmp_file =$_FILES['avatar']['tmp_name'];
    if (!(is_uploaded_file($tmp_file))) 
    {
        $error3 = "le fichier n'est pas une image !";
        $issucces=false;
    }
    if (!isset($issucces))
    {
        $resultat = move_uploaded_file($_FILES["avatar"]["tmp_name"],$destination.$name);
        $uploadfile = $destination.basename($name);
        if ($resultat) 
        {
            $error4 = "Upload effectué avec succès !";  
            $issucces=true;
        }
        else
        {
            $error7 = "Echec de l'upload !";
            $issucces=false;
        }   
    }
    else
    {
        
        $issucces=false;
    }
    $js= file_get_contents("Quizz/data/utilisateur.json");
    $js=json_decode($js,true);
    if ($json['login'] != $js['login'])
        {
            $issucces = true;
        }
        else
        {
            echo "Ce login existe déja essai un autre !";
            $issucces = false;
            
            
        }
    if(isset($issucces))
    {
        
        $js[] = $json;
        $js = json_encode($js);
        file_put_contents('Quizz/data/utilisateur.json', $js);
        
        $results = inscription($json['login']);
        if ($results==="error") 
        {
            $result0= "il y a une erreur dans les données saisies ! ";
        }
        else
        {
            header("location:index.php?lien=".$results);
        }
    }
    

}
?>
<div class="menu2" >
    <br><h3 class="h3i">S’INSCRIRE</h3>
    <p class="p2">Pour tester votre niveau de culture général</p><br>
    <div class="menu-inscrire"></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="" class="label" >Prenom</label><br>
                <input type="text" class="input1" name="prenom">
                <br>
            </div>
            <div>
                <label for="" class="label">Nom</label><br>
                <input type="text" class="input1" name="nom">
                <br>
            </div>
            <div>
                <label for="" class="label">Login</label><br>
                <input type="text" error="error-3"name="login" class="input1" >
                <br>
            </div>
            <div>
                <label for="" class="label" >Password</label><br>
                <input type="password" name="password" class="input1" >
                <div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error1 ?></div><br>
            </div>
            <div>
                <label for="" class="label" >confirmer Password</label><br>
                <input type="password" name="passwordconfirm" class="input1" >
                <div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error1 ?></div><br><div style="color: red;text-shadow: 0 0 3px #c7c7c7;" ><?=$error2 ?></div>
            </div>
            <div>
                <img src="Quizz/public/Images/logo-QuizzSA.png" alt="" sizes="10px" srcset="" class="img-inscrire"><br>
                <label for="" class="nom-avatar">Avatar du joueur</label>
            </div>
            <div>
                <input type="file" name="avatar" style="background-color: darkturquoise;color: white;box-shadow: 0 0 0px 2px #00BCD4;width: 255px;height: 22px;padding-left: 0px;margin-left: 0px;">
                 <br><br><div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error7?><br><?=$error?></div>
            </div> 
            <div>  
            <br><br><input type="submit" class="input-submit" name="submit" value="Crée Compte">
            </div>
        </form>
    
    <p style="display:<?php if($issucces){echo 'block';}else{echo 'none';}?>; color: blue; margin-right 50px;">Votre incription a correctement été enregistrée</p>
</div>

