<?php

include_once "Model/admin/model_admin_horaire.php";


class controller_horaire
{



    function controller_select()
    {



        if (isset($_SESSION["emailOperateur"])) {
            $AdminBus = new AdminBus();
            $Bus =   $AdminBus->getBusByemail($_SESSION["emailOperateur"]);
            $Adminhoraire = new Adminhoraire();
            $horaire =   $Adminhoraire->gethoraireByemail($_SESSION["emailOperateur"]);
        }

        $Adminroute = new Adminroute();
        $route =   $Adminroute->getAllroute();

        include_once "View/admin/dash_horaire/affichehoraire.php";
    }


    function controller_insert()
    {
        extract($_POST);

        $Adminhoraire = new Adminhoraire();
        $Adminhoraire->Inserthoraire($date, $Heure_depart, $Heure_arrivee, $Sieges_disponibles, $ID_Bus, $ID_Route, $price);


        header("Location: index.php?action=Horaire");
    }

    function controller_update()
    {

        $id = $_GET['id'];
        if (isset($_SESSION["emailOperateur"])) {
            $AdminBus = new AdminBus();
            $Bus =   $AdminBus->getBusByemail($_SESSION["emailOperateur"]);
        }

        $Adminhoraire = new Adminhoraire();


        $Adminroute = new Adminroute();
        $route =   $Adminroute->getAllroute();


        $data =  $Adminhoraire->getByIdhoraire($id);

        require_once  'View\admin\dash_horaire\updatehoraire.php';
    }

    function controller_delete()
    {
        $id = $_GET['id'];
        $Adminhoraire = new Adminhoraire();

        $Adminhoraire->deleteByIdhoraire($id);

        header("Location: index.php?action=Horaire");
    }
    function controllergetByIdhoraire($id_card)
    {

        $Adminhoraire = new Adminhoraire();

        $data =   $Adminhoraire->getByIdhoraire2($id_card);


        return $data;
    }

    function controller_submet_update()
    {
        extract($_POST);


        if (isset($submit)) {

            // echo "$id";                    echo "<br>" ;
            // echo "$Heure_depart"; echo "<br>" ;
            // echo "$Heure_arrivee"; echo "<br>" ;
            // echo "$Sieges_disponibles"; echo "<br>" ;
            // echo "$ID_Bus"; echo "<br>" ;
            // echo "$ID_Route"; echo "<br>" ;
            // echo "$price"; echo "<br>" ;

            $Adminhoraire = new Adminhoraire();

            $Adminhoraire->Updatehoraire($id, $date, $Heure_depart, $Heure_arrivee, $Sieges_disponibles, $ID_Bus, $ID_Route, $price);





            header("Location: index.php?action=Horaire");
        }
    }
}
