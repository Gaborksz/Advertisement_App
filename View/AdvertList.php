<?php
    declare(strict_types = 1);

    include '../Model/User.php';
    include '../Model/Advert.php';

    include '../Controller/UserController.php';
    include '../Controller/AdvertController.php';
    
    include '../Repository/Connections/DbCon_MySQL.php';
    
    include '../Repository/Interfaces/UserRepositoryInt.php';
    include '../Repository/UserMySQLrepository.php';
    
    include '../Repository/Interfaces/AdvertRepositoryInt.php';
    include '../Repository/AdvertMySQLrepository.php';

    include '../Service/UserService.php';
    include '../Service/AdvertService.php';
    
    $dbCon = new DbCon_MySQL;    
    $userRepository= new UserMySQLRepository($dbCon);
    $userService = new UserService($userRepository);
    $userController = new UserController($userService);

    $advertRepository= new AdvertMySQLRepository($dbCon);
    $advertService = new AdvertService($advertRepository);
    $advertController = new AdvertController($advertService);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Advert List</title>
</head>
<body>
    <h1 class="title">Advert List</h1>

    <table class="list">
        <tr>
            <th class="columnTitle">Id</th>
            <th class="columnTitle">Title</th>
            <th class="columnTitle">User Name</th>
        </tr>       
            <?php 
                $adverts = $advertController->getAdverts();            
                foreach($adverts as $advert): ?>
                <tr>
                    <td class="columnContent"><?php echo $advert->getId(); ?></td>
                    <td class="columnContent"><?php echo $advert->getTitle(); ?></td>
                    <td class="columnContent"><?php echo $advert->getUser()->getName(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>    

        <div class="menu">
            <a href="../index.php"><button class="button">Back To Main</button></a>      
        </div> 
</body>
</html>