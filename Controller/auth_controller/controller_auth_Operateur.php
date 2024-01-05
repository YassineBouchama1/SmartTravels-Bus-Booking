<?php

include "Model\auth_model\model_auth_operator.php";

class controller_auth_Operateur
{

    function affiche_form_Operateur()
    {

        $model_auth_operator = new model_auth_operator();
        $model_auth_operator->affiche_form_Operateur();
    }

    function controller_check_operator()
    {
        extract($_POST);
        extract($_GET);


        $AdminOperateur = new AdminOperateur();
        $Operateur =   $AdminOperateur->getAllOperateur();

        function authenticateUser($Email, $Password, $Operateur)
        {
            foreach ($Operateur as $operator) {

                if ($Email === $operator->getEmail() && $Password === $operator->getPassword()) {
                    return true;
                }
            }
            return false;
        }



        // Checking user authentication
        $authenticated = authenticateUser($Email, $Password, $Operateur);


        if ($authenticated) {
            session_destroy();
            session_start();
            $_SESSION["Operateur"] = "Operateur";
            $_SESSION["emailOperateur"] = $Email;

            header("Location: index.php?action=affichBus");

            exit();
        } else {
            header("Location: index.php?action=login_Operateur&error=authentication_failed");
            exit();
        }
    }

    function SignOut()
    {


        session_destroy();
        header("Location: index.php?action=login_Operateur");
    }
}
