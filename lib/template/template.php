<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?php echo $t->getName();?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">    
        <?php
        foreach ($t->getCss() as $file => $name){
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/". $name .".css\">\n";
        }
        
        ?>
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <!-- Don't forget the meta tags, and Google Font API links! -->
        <!-- Link jquery/ external scripts here -->
        <!-- Favicon info, make sure to name the .ico file favicon.ico for IE6 peeps -->
    </head>
    
    <body>
        <div class="page">
            <div id="header">
                <ul id="nav">
                    <a href="index.php"><li>Index/ upload gallery</li></a>
                    <a href="login.php"><li>Log in</li></a>
                    <a href="register.php"><li>Register</li></a>
                </ul>
                <div id="persistent">
                    <?php include_once(Config::get('root/app')."content/user_persistent.php");?>
                </div>
            </div>
        
            <div id="content">
                <?php $path = $t->getContent(); include_once(Config::get('root/app')."content/$path");?>
            </div>
        
        </div>
    </body>
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <?php
        $js = $t->getJs();
        if (!empty($js)){
            foreach ($t->getJs() as $file => $name){
                echo "<script type=\"text/javascript\" src=\"js/". $name .".js\"></script>";
            }
        }
        ?>
</html>