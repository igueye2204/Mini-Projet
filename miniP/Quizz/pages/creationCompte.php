<?php
define('URL_PHOTO', $_SERVER['DOCUMENT_ROOT'].'Quizz/public/Images/');
define('URL_JSON_FILE', $_SERVER['DOCUMENT_ROOT'].'Quizz/data/utilisateur.json');


 $json=array();
$error1=$error2=$error3=$error4=$error5=$error6="";
$issucces=false;
if (isset($_POST['submit'])) 
{
    
    $json=[
        'prenom' => htmlspecialchars(trim($_POST['prenom'])),
        'nom' => htmlspecialchars(trim($_POST['nom'])),
        'login' => htmlspecialchars(trim($_POST['login'])),
        'password' => htmlspecialchars(trim($_POST['password'])),
        'passwordconfirm' => htmlspecialchars(trim($_POST['passwordconfirm'])),
        ];
    $file = $_FILES['avatar']['tmp_name'];
    $destination= 'Img/';
    $name = $_POST['prenom'].".jpeg";
    $json['avatar'] = 'Img/'.$name;
    $jsons = "Quizz/data/utilisateur.json";
    $extension=strrchr($_FILES['avatar']['name'], '.');
    $extensions = array('.png','.jpeg');
    $tmp_file =$_FILES['avatar']['tmp_name'];
    $uploadfile = $destination.basename($name);
    $issucces=true;

    if(empty($json['prenom']) || empty($json['nom']) || empty($json['login']) || empty($json['password']) || empty($json['passwordconfirm']))
    {
        $error1="Tous les champs sont obligatoire!";
        $issucces=false;
    }
    if (is_login($json['login'])) 
    {
        $issucces=false;
        $error2 = "ce login existe déja essai un autre !";
    }
    if ($json['password']!=$json['passwordconfirm']) 
    {
        $error3 = "les mots de passe saisies sont différents!";
        $issucces=false;
    }
    if (!in_array($extension, $extensions)) 
    {
        $error4 = "Vous devez uploader un fichier de type png ou jpeg";
        $issucces=false;
    }
    if (!(is_uploaded_file($tmp_file))) 
    {
        $error5 = "le fichier n'est pas une image !";
        $issucces=false;
    }
    if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination.$name)) 
    {
        $error6 = "Echec de l'upload !";  
        $issucces=false;
    }
    if($issucces)
    {
        $js=file_get_contents($jsons);
        $js=json_decode($js,true);
        $js[] = $json;
        $js = json_encode($js);
        file_put_contents('Quizz/data/utilisateur.json', $js);
        $results = inscription($json['login']);
        if ($results) 
        {
            header("location:index.php?lien=".$results);
        }
        else
        {
            $result0= "il y a une erreur dans les données saisies ! ";
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
                <input type="text" name="login" class="input1" >
                <br><div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error2 ?></div>
            </div>
            <div>
                <label for="" class="label" >Password</label><br>
                <input type="password" name="password" class="input1" >
                <div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error3 ?></div><br>
            </div>
            <div>
                <label for="" class="label" >confirmer Password</label><br>
                <input type="password" name="passwordconfirm" class="input1" >
                <div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error3 ?></div><br><div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error1 ?></div>
            </div>
            <div>
                <img src="<?=$json['avatar']?>" alt="" sizes="10px" srcset="" class="img-inscrire"><br>
                <label for="" class="nom-avatar">Avatar du joueur</label>
            </div>
            <div>
                <input type="file" name="avatar" style="background-color: darkturquoise;color: white;box-shadow: 0 0 0px 2px #00BCD4;width: 255px;height: 22px;padding-left: 0px;margin-left: 0px;">
                 <br><br><div style="color: red;text-shadow: 0 0 3px #c7c7c7;"><?=$error4?><br><?=$error5?><br><?=$error6?></div>
            </div> 
            <div>
            <br><br><input type="submit" class="input-submit" name="submit" value="Crée Compte">
            </div>
        </form>
    
    <p style="display:<?php if($issucces){echo 'block';}else{echo 'none';}?>; color: blue; margin-right 50px;">Votre incription a correctement été enregistrée</p>
</div>