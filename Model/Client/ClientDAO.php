<?php
class ClientDAO extends Database {

public function displayAllClients() {
    $query = "SELECT * FROM client";
    $statement = $this->getConnection()->prepare($query);
    $statement->execute();
    $clients = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $clients;
}

public function deleteClient($email) {
    $query = "UPDATE client SET inactive = 0 WHERE email = :email";
    $statement = $this->getConnection()->prepare($query);
    $statement->execute([':email' => $email]);
  
    return true;
}

public function changePassword($email, $newPassword) {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $query = "UPDATE client SET password = :password WHERE email = :email";
    $statement = $this->getConnection()->prepare($query);
    $statement->execute([':password' => $hashedPassword, ':email' => $email]);

    return true;
}
public function login($email, $password) {
    $query = "SELECT * FROM client WHERE email = :email";
    $statement = $this->getConnection()->prepare($query);
    $statement->execute([':email' => $email]);
    $client = $statement->fetch(PDO::FETCH_ASSOC);
    if ($client && password_verify($password, $client['password'])) {
      
        session_start();
        $_SESSION['user'] = $client;

        return $client; 
    } else {
        return null; 
}

}

}

?>