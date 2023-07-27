<?php
    declare(strict_types = 1);

    include '../Model/User.php';

    include '../Controller/UserController.php';
    
    include '../Repository/Connections/DbCon_MySQL.php';
    include '../Repository/Interfaces/UserRepositoryInt.php';
    include '../Repository/UserMySQLrepository.php';

    include '../Service/UserService.php';

    $dbCon = new DbCon_MySQL;    
    $userRepository= new UserMySQLRepository($dbCon);
    $userService = new UserService($userRepository);
    $userController = new UserController($userService);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>User List</title>
</head>
<body>
    <h1 class="title">User List</h1>

    <table class="list">
        <tr>
            <th class="columnTitle">Id</th>
            <th class="columnTitle">Name</th>
        </tr>       
            <?php 
                $users = $userController->getUsers();            
                foreach($users as $user): ?>
                <tr>
                    <td class="columnContent"><?php echo $user->getId(); ?></td>
                    <td class="columnContent"><?php echo $user->getName(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="menu">
            <a href="../index.php"><button class="button">Back To Main</button></a>      
        </div>  
</body>
</html>