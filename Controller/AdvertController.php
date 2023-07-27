<?php

Class AdvertController{
    
    private AdvertService $advertService;



    public function __construct(AdvertService $advertService)
    {
        $this->advertService = $advertService;
    }


    public function getAdverts(){
        return $this->advertService->getAdverts();
    }

}