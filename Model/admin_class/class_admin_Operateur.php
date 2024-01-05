<?php 


class admin_Operateur {
    private $email;
    private $password;
    private $inactive;
    private $company_id;

    public function __construct($email, $password, $inactive, $company_id) {
        $this->email = $email;
        $this->password = $password;
        $this->inactive = $inactive;
        $this->company_id = $company_id;
    }

    // Getter methods for admin-related attributes
    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getInactive() {
        return $this->inactive;
    }

    public function getCompanyId() {
        return $this->company_id;
    }

    // Setter methods for admin-related attributes
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setInactive($inactive) {
        $this->inactive = $inactive;
    }

    public function setCompanyId($company_id) {
        $this->company_id = $company_id;
    }
}



