<?php
$error1=$error2="";
if (isset($_POST['submit'])) 
{
    
    $json=array();
    $json['prenom']=$_POST['prenom'];
    $json['nom']=$_POST['nom'];
    $json['login']=$_POST['login'];
    $json['password']=$_POST['password'];
    $json['passwordconfirm']=$_POST['passwordconfirm'];
    
    if (!($json['password']==$json['passwordconfirm'])) 
    {
        $error1="les mots de passe saisies sont différents!";
    }
    elseif(empty($json['prenom']) || empty($json['nom']) || empty($json['login']) || empty($json['password']) || empty($json['passwordconfirm']) )
    {
        $error2="ce champs est obligatoire!";
    }
    else
    {
        $js = file_get_contents('utilisateur.json');
        $js = json_decode($js, true);
        $js[] = $json;
        $js = json_encode($js);
        file_put_contents('utilisateur.json', $js);
        header("Location: ./");
    }
}
?>
<div class="menu2" style="background-color: white;width: 800px;margin-left: 145px;border-radius: 5px;padding-left: 50px;height: 700px;box-shadow: 0 0 20px #6d6d6d;left: 0px;top: 100px;">
    <br><h3 style="color: #818181">S’INSCRIRE</h3>
    <p style="color: #818181;">Pour tester votre niveau de culture général</p><br>
    <div style="height: 5px;width: 500px;margin-right: 100px;color: #818181;background-color: #818181;position:absolute;left: 0px;top: 120px;"></div>
    <div>
        <label for="" style="color: #818181;font-size: larger;">Prenom</label><br>
        <input type="text" name="prenom"style="width: 350px;height: 35px;border-radius: 3px;border: 1px solid white;box-shadow: 0 0 1px black;">
        <div><?=$error2 ?></div>
    </div>
    <div>
        <label for="" style="color: #818181;font-size: larger;">Nom</label><br>
        <input type="text" name="nom"style="width: 350px;height: 35px;border-radius: 3px;border: 1px solid white;box-shadow: 0 0 1px black;">
        <div><?=$error2 ?></div>
    </div>
    <div>
        <label for="" style="color: #818181;font-size: larger;">Login</label><br>
        <input type="text" name="login" style="width: 350px;height: 35px;border-radius: 3px;border: 1px solid white;box-shadow: 0 0 1px black;">
        <div><?=$error2 ?></div>
    </div>
    <div>
        <label for="" style="color: #818181;font-size: larger;">Password</label><br>
        <input type="text" name="password" style="width: 350px;height: 35px;border-radius: 3px;border: 1px solid white;box-shadow: 0 0 1px black;">
        <div><?=$error2 ?></div><div><?=$error1 ?></div>
    </div>
    <div>
        <label for="" style="color: #818181;font-size: larger;">confirmer Password</label><br>
        <input type="text" name="passwpordconfirm" style="width: 350px;height: 35px;border: 1px solid darkturquoise;border-radius: 5px;font: #ffffffbox-shadow: 0 0 1px black;">
        <div><?=$error2 ?></div><div><?=$error1 ?></div>
    </div>
    <div>  
        <br><br><button style="width: 125px;height: 32px;padding-left: 5px;margin-left: 240px;font-weight: bold;font-weight: unset;"><a href="#" style="color: white;border-right-width: 0px;border: #ffffff;font-weight: bold;font-weight: bold;text-decoration: none; background-color: darkturquoise;border-radius: 5px;border: 1px solid;">Choisir un fichier</a></button>
    </div>
    <div>  
        <br><br><input type="submit" style="width: 100px;height: 30px;margin-left: 100px;background-color: darkturquoise;font-weight: bold;border: 1px solid darkturquoise;border-radius: 5px;font: #ffffff;color: white ;" name="submit" value="Crée Compte">
    </div>
    <div  >
        <img src="Quizz/public/Images/logo-QuizzSA.png" alt="" sizes="10px" srcset="" style="position:absolute;top: 50px; width: 200px; height:200px; border-radius:50%; left: 600px;">
        <label for="" style="position:absolute;left: 650px;top: 250px;">Avatar du joueur</label>
    </div>
</div>
