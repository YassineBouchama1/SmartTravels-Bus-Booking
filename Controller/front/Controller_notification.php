<?php
include_once 'Model\front\model_notification.php' ; 

class Controller_notification{




    function create_notification($content,$recipient_id,$recipient_type) {
        
        $notification = new notification();
        return $notification->Insertnotification($content,$recipient_id,$recipient_type) ; 

    }
   






 

    
}

