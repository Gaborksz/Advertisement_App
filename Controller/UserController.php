<?php 

Class UserController {

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function getUsers(){
        return $this->userService->getUsers();
    }
}