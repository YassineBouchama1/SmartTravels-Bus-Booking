<?php

include "Model\auth_model\model_auth_Client.php";


class controller_auth_Client
{




    function   affiche_form_clinet_register()
    {
        if (!empty($_SESSION["emailClient"])) {
            header("Location: index.php?action=clinetPanel");
        } else {
            include_once "View\auth/register_Client.php";
        }
    }




    // this function for get inputs from client to create account for him
    function controller_Register_Clinet()
    {
        extract($_POST);
        $inactive = 1;

        //call model
        $model_auth_Client = new model_auth_Client();

        // send input client to create clinet inside model
        $client =  $model_auth_Client->insert_client($Email, $Password, $inactive);



        // if client register successfully
        if ($client) {

            header("Location: index.php?action=loginClient&successful=createdSuccessfully");

            exit();
        } else {
            // if there is a erro send it with query url
            header("Location: index.php?action=registerClient&error=authentication_failed");
            exit();
        }
    }



    function   affiche_form_clinet_Login()
    {

        if (!empty($_SESSION["emailClient"])) {
            header("Location: index.php?action=clinetPanel");
        } else {
            include_once "View\auth\login_Client.php";
        }
    }



    // this function for get inputs from client to login
    function controller_Login_Clinet()
    {
        extract($_POST);


        //call model
        $model_auth_Client = new model_auth_Client();

        // send input client to create clinet inside model
        $clientIsExist =  $model_auth_Client->register_client($Email, $Password);



        // if client login successfully
        if ($clientIsExist) {
            session_destroy();
            echo "<script>localStorage.setItem('emailClient', '$Email');</script>";
            $_SESSION["Client"] = "Client";
            $_SESSION["emailClient"] = $Email;
            header("Location: index.php?action=clinetPanel");

            exit();
        } else {
            // if there is a erro send it with query url
            header("Location: index.php?action=loginClient&error=authentication_failed");
            exit();
        }
    }

    //display page client panel
    function   affiche_Clinet_Panel()
    {



        if (!empty($_SESSION["emailClient"])) {
            $email =     $_SESSION["emailClient"];
            //call model
            $model_auth_Client = new model_auth_Client();

            // get clinet info useing his email
            $clinetData =  $model_auth_Client->get_user_info($email);


            // get clinet reservation useing his email
            $clientReservation =  $model_auth_Client->get_clinet_Reservation($email);



            include_once 'View\front\clientPanel.php';
        } else {
            header("Location: index.php?action=loginClient");
        }
    }





    function controller_change_password()
    {
        extract($_POST);

        session_start();

        if (!empty($_SESSION["emailClient"])) {
            $email =     $_SESSION["emailClient"];


            //call model
            $model_auth_Client = new model_auth_Client();

            // send input client to update passowrd
            $clientIsExist =  $model_auth_Client->changePassword_client($email, $Password, $newPassowrd);



            // if updated  successfully
            if ($clientIsExist) {


                header("Location: index.php?action=clinetPanel&good=Updated Successfully");

                exit();
            } else {
                // if there is a erro send it with query url
                header("Location: index.php?action=clinetPanel&error=authentication_failed");
                exit();
            }
        }
    }



    function SignOut()
    {


        session_destroy();
        header("Location: index.php?action=loginClient");
    }


    function delete_reservation()
    {
        extract($_POST);

        session_start();

        if (!empty($_SESSION["emailClient"])) {
            $email =     $_SESSION["emailClient"];


            //call model
            $model_auth_Client = new model_auth_Client();

            // sdelete reservatiojn by seat number and email clinet
            $deletedReservation =  $model_auth_Client->delete_reservation_model($email, $number_seat);




            // if updated  successfully
            if ($deletedReservation) {


                header("Location: index.php?action=clinetPanel&goodReservation=Deleted Successfully");

                exit();
            } else {
                // if there is a erro send it with query url
                header("Location: index.php?action=clinetPanel&errorReservation=delete reservation failed");
                exit();
            }
        } else {
            header("Location: index.php?action=clinetPanel&errorReservation=we cant reach to your email to delete reservation");
            exit();
        }
    }


    // dislay rest passowr from

    function controller_Rest_Password()
    {


        include_once "View\auth\client_foget_password.php";
    }

    // get password from email to send it to email

    function controller_Get_Password()
    {

        extract($_POST);
        $model_auth_Client = new model_auth_Client();
        $clinetData =   $model_auth_Client->get_user_info($email);
        echo json_encode($clinetData);
    }
}
