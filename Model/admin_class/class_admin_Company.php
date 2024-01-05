<?php 

class admin_Company {
    private $id;
    private $name;
    private $bio;
    private $img;

    public function __construct($id, $name, $bio , $img) {
        $this->id = $id;
        $this->name = $name;
        $this->bio = $bio;
        $this->img = $img;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getName()  {
        return $this->name;
    }

    public function getBio() {
        return $this->bio;
    }
    public function getimg() {
        return $this->img;
    }
}
