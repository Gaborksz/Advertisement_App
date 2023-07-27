<?php

Class UserService {

    private UserRepositoryInt $userRepository;

    
    
    public function __construct(UserRepositoryInt $userRepository)
    {
        $this-> userRepository = $userRepository;
    }


    public function getUsers()
    {
        $usersAsRawList = $this-> userRepository->getUsers();
        
        $usersAsObjectList = array();
        
        foreach($usersAsRawList as $userData){
            $user = new User($userData['name']);
            $user->setId($userData['id']);
            
            array_push($usersAsObjectList, $user);
        }       
  
        return $usersAsObjectList;
    }    
}