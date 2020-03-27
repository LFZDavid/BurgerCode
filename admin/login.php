<?php
    
require ('database.php');
$logError = $pswError = $log = $psw = $log_valide = $psw_valide = "";

    if(!empty($_POST))
    {
        $log = checkInput($_POST['log']);
        $psw = checkInput($_POST['psw']);
    }


        
    if(isset($_POST['log']) && isset($_POST['psw']))
    {   
        $db = Database::connect();
        $statement = $db->query('SELECT * FROM users');
        $users = $statement->fetch();           
        Database::disconnect();      
        
        $logError = $pswError = $log = $psw =  "";
        if ($users['log'] == $_POST['log'] && $users['psw'] == $_POST['psw'])
        {
            
            session_start();
            
            $_SESSION['log'] = $_POST['log'];
            $_SESSION['psw'] = $_POST['psw'];
        
        // echo '<body onLoad="alert(\'Welcome admin...\')">';    
		header ('Location: index.php');
            
            
        }
        else 
        {
		
		echo '<body onLoad="alert(\'login non reconnu...\')">';
            $logError = 'insérer un identifiant valide';
            $pswError = 'insérer un mot de passe valide';
        }
    }
   




function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>





<!DOCTYPE html>
<html>
<head>
    <title>Burger Code</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
</head>
    
<body>
    <h1 class="text-logo">
        <span class="glyphicon glyphicon-cutlery"></span>
        Burger Code
        <span class="glyphicon glyphicon-cutlery"></span>
    </h1>
    
    <div class="container admin">
        <div class="row">
            
            <h1><strong>Login</strong></h1>
            <br>
            <form class="form" role ='form' action="login.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="log">Nom:</label>
                        <input type="text" class="form-control" id="log" name="log" placeholder="log" method="post">
                        <span class="help-inline"><?php echo $logError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="psw">Mot de passe:</label>
                        <input type="password" class="form-control" id="psw" name="psw" placeholder="Mot de passe" method="post">
                        <span class="help-inline"><?php echo $pswError; ?></span>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class="btn btn-default" href="../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                </div>
            </form>
        </div>
           
                      
            
            
    
    </div>

</body>
    
</html>