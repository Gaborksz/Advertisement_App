<?php 

Class Advert {

    private $id;
    private $title;
    private User $user;


    
    public function __construct(string $title)
    { 
        $this->title = $title;
    }


    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser(User $user){
        $this->user = $user;
    }
}