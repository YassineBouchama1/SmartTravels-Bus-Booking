<?php




class client  extends Database
{

  function profileClient($email)
  {


    try {
      $consulta = $this->getConnection()->prepare("SELECT * FROM  client where email ='$email' ");
      $consulta->execute();
      return $consulta->fetch();
    } catch (Exception $e) {
      return false;
    }
  }


  function checkClientExist($email, $password)
  {
    try {
      $consulta = $this->getConnection()->prepare("SELECT * FROM  client where email = $email ");
      $consulta->execute();
      $client =   $consulta->fetchAll();

      if ($client["password"] === $password && $client["email"] === $email) {
        return $client;
      } else {
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
  }
}
