
<?php 

    $msg="";
    if (isset($_POST['btn_submit'])) 
    {
        $login= htmlspecialchars(trim($_POST['login']));
        $pwd= htmlspecialchars(trim($_POST['pwd']));
        if (empty($login) || empty($pwd)) 
        {
            $message = 'Remplir tous les champs !';
        }
        else
        {
            $result= connexion( $login,$pwd);
            if ( $result==="error") 
            {
                $msg="login ou Mot de passe Incorrect";  
            }
            else
            {
                header("location:index.php?lien=".$result);
            }
        }    
    }

?> 
    <div id="container">
        <div class="bar2">
            <p style="width: 100px;">Login Form</p> 
            <a href="/" class="x">x</a>
        </div>
        
        <div id="formu">
            <form action="" method="post" id="form-connexion">
                <div>
                    <div class="msg-erreur" style="color: red;position: absolute;top: 80px;left: 100px;margin:0px;font-size: unset;font-style: italic;font-family: sans-serif;position: absolute;"><?=$msg?></div>
                    <div class="icon-form icon-form-login"></div>
                            <input type="text" name="login" error="error-1" placeholder="Login" value="" class="form-control">
                    <div class="error-form" id="error-1"></div>
                    <div class="icon-form icon-form-pwd"></div>
                        <input type="password" name="pwd" error="error-2" placeholder="Password" value="" class="form-control">
                        <div class="error-form" id="error-2"></div>
                    </div>

                    <div class="valide">
                        <input type="submit" name="btn_submit" value="Connexion" class="bouton">
                        <a href="index.php?lien=inscription" style="text-decoration:none;">S'inscrire pour jouer?</a>
                    </div>
                </div> 
            </form>
        </div>
    </div>


<script>
    const inputs= document.getElementsByTagName("input");
    for(input of inputs)
    {  
        input.addEventListener("keyup",function(e)
        {
           if (e.target.hasAttribute("error"))
           {
               var idDivError=e.target.getAttribute("error");
               document.getElementById(idDivError).innerText=""
           }
        })
    }

document.getElementById("form-connexion").addEventListener("submit",function(e){
    const inputs= document.getElementsByTagName("input");
    var error=false;
    for(input of inputs)
    {
        if(input.hasAttribute("error"))
        {
            var idDivError = input.getAttribute("error");
                if(!input.value)
                {
                    document.getElementById(idDivError).innerText="Ce champ est obligatoire"
                    error=true
                }
                 
        }
        else
        {
            document.getElementById(idDivError).innerText=""
        }
    }
    if(error)
    {
        e.preventDefault();
        return false;
    }
})

</script>