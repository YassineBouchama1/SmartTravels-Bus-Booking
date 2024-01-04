<?php

include "Model\auth_model\model_auth_Admin.php";

class controller_auth_Admin
{

    function affiche_form_Admin()
    {

        $model_auth_Admin = new model_auth_Admin();
        $model_auth_Admin->affiche_form_Admin();
    }

    function controller_check_Admin()
    {
        extract($_POST);

        $model_auth_Admin = new model_auth_Admin();
        $Admin =  $model_auth_Admin->select_Admin();


        function authenticateUser($Email, $Password, $Admin)
        {
            foreach ($Admin as $admin) {

                if ($Email === $admin["email"] && $Password === $admin["password"]) {
                    return true;
                }
            }
            return false;
        }



        // Checking user authentication
        $authenticated = authenticateUser($Email, $Password, $Admin);


        if ($authenticated) {

            $_SESSION["Admin"] = $Email;



            header("Location: index.php?action=admin");

            exit();
        } else {
            header("Location: index.php?action=login_Admin&error=authentication_failed");
            exit();
        }
    }

    function SignOut()
    {


        session_destroy();
        header("Location: index.php?action=login_Admin");
    }
}
