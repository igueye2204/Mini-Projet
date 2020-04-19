<?php
       

    function getData($file="utilisateur")
    {
        $data=file_get_contents("Quizz/data/".$file.".json");
        $data=json_decode($data,true);

        return $data;
    }

    function getEncode($file="utilisateur")
    {
        $data = json_encode($data);
        file_put_contents("Quizz/data/".$file.".json", $data);

        return $data;
    }

    function connexion($login, $pwd)
    {
        $users=getData();
        foreach($users as $key => $user)
        {
            if ($user["login"]===$login && $user["password"]===$pwd) 
            {   
                $_SESSION['user']=$user;
                $_SESSION['statut']="login";
                if($user["profil"] === "admin")
                {
                    return "accueil";
                }
                else
                {
                    return "jeux";
                }
            }
        }
        return "error";
    }

    function inscription($login)
    {
        $users=getData();
        foreach($users as $key => $user)
        {
            if ($user["login"]===$login) 
            {   
                $_SESSION['user']=$user;
                $_SESSION['statut']="login";
                if($user["profil"] === "admin")
                {
                    return "accueil";
                }
                else
                {
                    return "connexion";
                }
            }
        }
        return "error";
    }

    function is_connect()
    {
        if (!isset($_SESSION['statut'])) 
        {
            header("location:index.php");
        }
    }

    function deconnexion()
    {
        unset($_SESSION['user']);
        unset($_SESSION['statut']);
        session_destroy();
    }




?>