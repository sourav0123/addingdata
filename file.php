<?php

    if (array_key_exists('n', $_POST) AND array_key_exists('p', $_POST) AND array_key_exists('g', $_POST) AND array_key_exists('a', $_POST) AND array_key_exists('m', $_POST)) {
        
 $link = mysqli_connect("localhost", "root", "12345678", "larveldb");
            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        
        if ($_POST['n'] == '') {
            
            echo "<h1>name is required.</h1>";
            
        } else if ($_POST['p'] == '') {
            
            echo "<h1>Password is required.</h1>";
		}
			else if ($_POST['g'] == '') {
            
            echo "<h1> gender is required.</h1>";
            
        }
            else if ($_POST['a'] == '') {
            
            echo "<h1>area is required.</h1>";
		}
            else if ($_POST['m'] == '') {
            
            echo "<h1>mail is required.</h1>";
		}

		else {
            
            $query = "SELECT `id` FROM `larvel` WHERE email = '".mysqli_real_escape_string($link, $_POST['m'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<h1>That email address has already been taken.</h1>";
                
            } else {
                
                $query = "INSERT INTO `larvel` (`name`, `password`,`gender`,`place`,`email`) VALUES ('".mysqli_real_escape_string($link, $_POST['n'])."','".mysqli_real_escape_string($link, $_POST['p'])."' ,'".mysqli_real_escape_string($link, $_POST['g'])."','".mysqli_real_escape_string($link, $_POST['a'])."','".mysqli_real_escape_string($link, $_POST['m'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<h1>Your data has been saved !</h1>";
					header('Location: index.php');
				}	

                 else {
                    
                    echo "<h1>There was a problem signing you up - please try again later.</h1>";
                    
                }
                
            }
            
        }
        
        
    }

    


?>