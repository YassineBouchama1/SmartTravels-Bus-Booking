<?php
session_start();
include "Model\admin_class\class_admin_Bus.php";
include "Model\admin_class\class_admin_Company.php";
include "Model\admin_class\class_admin_Horaire.php";
include_once "Model\admin_class\class_admin_route.php";
include_once "Model\admin_class\class_admin_Operateur.php";




include_once "Controller\ControllerBus.php";
include_once "Controller\ControllerCompant.php";
include_once "Controller/front/Controller_homepage.php";
include_once "Controller\ControllerHoraire.php";
include_once "Controller\Controlleroute.php";
include_once "Controller\Controlleroute.php";
include_once "Controller\ControlleOperateur.php";
include_once "Controller\auth_controller\controller_auth_Operateur.php";
include_once "Controller\auth_controller\controller_auth_Admin.php";
include_once "Controller\Controller_Reservation.php";
include_once "Controller\ControllerClient.php";
include_once "Controller/front/Controller_notification.php";
include_once "Controller\auth_controller\controller_auth_Client.php";


$controller_Compant = new controller_Compant();
$controller_Bus = new controller_Bus();
$controller_Homepage = new Controller_homepage();
$controller_horaire = new controller_horaire();
$controller_route = new controller_route();
$controller_Operateur = new controller_Operateur();
$controller_auth_Operateur = new controller_auth_Operateur();
$controller_auth_Admin = new controller_auth_Admin();
$Controller_reservation = new Controller_reservation();
$controller_client = new controller_client();
// $Controller_notification = new Controller_notification();


//auth for client 
$controller_auth_Client  = new controller_auth_Client();


if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {
        case "login_Operateur":
            $controller_auth_Operateur->affiche_form_Operateur();
            break;
        case "buycard":
            $controller_Homepage->affichebuycard();
            break;
        case "addReservation":
            $Controller_reservation->addReservation();
            break;
        case "checkout":
            $Controller_reservation->checkout();
            break;
        case "SignOut":
            $controller_auth_Operateur->SignOut();
            break;
        case "loginOperator":
            $controller_auth_Operateur->controller_check_operator();
            break;
        case "login_Admin":
            $controller_auth_Admin->affiche_form_Admin();
            break;
        case "loginadmin":
            $controller_auth_Admin->controller_check_Admin();
            break;
        case "SignOut_admin":
            $controller_auth_Admin->SignOut();
            break;
        case "Saveform":
            $controller_Homepage->controller_form_insert();
            break;
        case "Resultat":
            $controller_Homepage->afficheResultat();
            break;
        case "Operateur":
            $controller_Operateur->controller_select();
            break;
        case "CreateOperateur":
            $controller_Operateur->controller_insert();
            break;
        case "formUpdateOperateur":
            $controller_Operateur->controller_update();
            break;
        case "submitUpdateOperateur":
            $controller_Operateur->controller_submet_update();
            break;
        case "destroOperator":
            $controller_Operateur->controller_delete();
            break;
        case "destroCompany":
            $controller_Compant->controller_delete();
            break;
        case "destroBus":
            $controller_Bus->controller_delete();
            break;
        case "Horaire":
            $controller_horaire->controller_select();
            break;
        case "CreateHoraire":
            $controller_horaire->controller_insert();
            break;
        case "updateHoraire":
            $controller_horaire->controller_update();
            break;
        case "UpdateHoraire_submet":
            $controller_horaire->controller_submet_update();
            break;
        case "destroHoraire":
            $controller_horaire->controller_delete();
            break;
        case "affichBus":
            $controller_Bus->controller_select();
            // $Controller_notification->affichenotification();
            break;
        case "CreateBus":
            $controller_Bus->controller_Bus_insert();
            break;
        case "updateBus":
            $controller_Bus->controller_Bus_update();
            break;
        case "updateSubmitBus":
            $controller_Bus->controller_submet_update_Bus();
            break;
        case "route":
            $controller_route->controller_select();
            break;
        case "destroRoot":
            $controller_route->controller_delete();
            break;
        case "formUpdateRoute":
            $controller_route->controller_update();
            break;
        case "UpdateRoute":
            $controller_route->controller_submet_update();
            break;
        case "CreateRoot":
            $controller_route->controller_insert();
            break;
        case "SubmitupdateCompany":
            $controller_Compant->controller_submet_update();
            break;
        case "updateCompany":
            $controller_Compant->controller_update();
            break;
        case "CreateCompany":
            $controller_Compant->controller_insert();

            break;
        case "admin":
            $controller_Compant->controller_select();

            break;

        case "registerClient":
            $controller_auth_Client->affiche_form_clinet_register();
            break;
        case "registerClientAction":
            $controller_auth_Client->controller_Register_Clinet();
            break;
        case "loginClient":
            $controller_auth_Client->affiche_form_clinet_Login();
            break;
        case "loginClientAction":
            $controller_auth_Client->controller_Login_Clinet();
            break;
        case "clientRestPassword":
            $controller_auth_Client->controller_Rest_Password();
            break;
        case "clinetPanel":
            $controller_auth_Client->affiche_Clinet_Panel();
            break;
        case "changePassword":
            $controller_auth_Client->controller_change_password();
            break;
        case "SignOutClient":
            $controller_auth_Client->SignOut();
            break;
        case "delete_reservation_clinet":
            $controller_auth_Client->delete_reservation();
            break;
        case "getPasswordClient":
            $controller_auth_Client->controller_Get_Password();
            break;
        default:

            break;
    }
} else {
    $controller_Homepage->afficheHome();
}
