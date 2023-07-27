<?php


Class AdvertService{

    private AdvertRepositoryInt $advertRepository;

    
    
    public function __construct(AdvertRepositoryInt $advertRepository)
    {
        $this-> advertRepository = $advertRepository;
    }


    public function getAdverts()
    {
        $advertsAsRawList = $this-> advertRepository->getAdverts();
        
        $advertsAsObjectList = array();
        
        foreach($advertsAsRawList as $advertData){
            $user = new User($advertData['name']);
            $user->setId($advertData['userId']);         
                        
            $advert = new Advert($advertData['title']);
            $advert->setId($advertData['id']);
            $advert->setUser($user);
            
            array_push($advertsAsObjectList, $advert);
        }       
  
        return $advertsAsObjectList;
    }
}