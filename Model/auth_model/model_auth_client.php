<?php


class model_auth_Client extends Database
{




  function insert_client($email, $password, $inactive)
  {


    $consulta = $this->getConnection()->prepare("INSERT INTO `client`(`email`, `password`, `inactive`, `date_created`, `points`, `is_client`) 
    VALUES ('$email','$password','$inactive','','0','1')");
    $result = $consulta->execute();

    return $result;
  }


  function register_client($email, $password)
  {
    $connection = $this->getConnection();


    $consulta = $connection->prepare("SELECT * FROM client WHERE email = :email AND password = :password");


    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':password', $password);


    $consulta->execute();


    $result = $consulta->fetch();


    return $result;
  }

  function get_user_info($email)
  {


    $connection = $this->getConnection();


    $consulta = $connection->prepare("SELECT * 
    FROM client
    WHERE client.email = :email;
    ");


    $consulta->bindParam(':email', $email);

    $consulta->execute();


    $result = $consulta->fetch();


    return $result;
  }


  function get_clinet_Reservation($email)
  {


    $connection = $this->getConnection();


    $consulta = $connection->prepare("SELECT reservation.number_seat, horaire.price, route.Ville_depart, route.Ville_destination
    FROM reservation
    JOIN horaire ON reservation.ID_Horaire = horaire.ID
    JOIN route ON route.ID = horaire.ID_Route
    WHERE reservation.email_client = :email;
    
    ");


    $consulta->bindParam(':email', $email);

    $consulta->execute();


    $result = $consulta->fetchAll();


    return $result;
  }


  // change passowrd
  function changePassword_client($email, $password, $newPassowrd)
  {

    //check if passowr currct is okey
    $result =  $this->register_client($email, $password);


    // if passowrd is correct update clinet  with new password
    if ($result) {


      $connection = $this->getConnection();


      $consulta = $connection->prepare("UPDATE client SET password = :password WHERE email = :email");


      $consulta->bindParam(':email', $email);
      $consulta->bindParam(':password', $newPassowrd);


      $consulta->execute();

      if ($consulta->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }


  function delete_reservation_model($email, $number_seat)
  {


    $connection = $this->getConnection();


    $consulta = $connection->prepare("DELETE FROM reservation WHERE email_client = :email_client AND number_seat = :number_seat; ");


    $consulta->bindParam(':email_client', $email);
    $consulta->bindParam(':number_seat', $number_seat);

    $consulta->execute();




    if ($consulta->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
