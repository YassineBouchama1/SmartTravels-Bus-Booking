<?php
include_once 'Model\front\model_client.php';

class Controller_client
{

    function affiche_form_Client()
    {

        include_once 'View\front\loginClient.php';
    }



    function afficheProfile()
    {
        session_start();

        // !empty($_SESSION["client"])
        // check if  clienyt already login
        if (true) {

            //get email form seasion to display data by it
            // $email = $_SESSION["emailClient"];
            $email = 'yassine@gmail.com';

            // if login get email from seation and bring data client
            $client = new client();
            $profileClient =  $client->profileClient($email);

            if ($profileClient) {
                var_dump($profileClient);
                include_once 'View\front\client.php';
            } else {
                var_dump($profileClient);

                header("Location: index.php?action=login_client");
            }
        } else {
            header("Location: index.php?action=login_client");

            exit();
        }
    }




    function loginClientAction()
    {


        session_start();


        // check if  clienyt already login
        if (empty($_SESSION["client"])) {


            extract($_POST);

            $client = new client();
            // Checking user authentication
            $authenticated = $client->checkClientExist($Email, $Password);


            if ($authenticated) {
                session_start();

                $_SESSION["client"] = "client";
                $_SESSION["emailClient"] = $authenticated['email'];

                header("Location: index.php?action=client");

                exit();
            } else {
                header("Location: index.php?action=login_client&error=authentication_failed");
                exit();
            }
        } else {

            header("Location: index.php?action=client");
        }
    }


    function SignOut()
    {
        session_start();

        session_destroy();
        header("Location: index.php?action=login_client");
    }
}
