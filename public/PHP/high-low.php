<?php

session_start();
function pageController() {


    // if ($argc == 3) {
    //     if ($argv[1] < $argv[2]) {
    //         if (is_numeric($argv[1])) {
    //             if (is_numeric($argv[2])) {
                    if (isset($_SESSION['magicNumber'])) {
                        $magicNumber = $_SESSION['magicNumber'];
                    } else {
                        $magicNumber = mt_rand(0,100);
                        $_SESSION['magicNumber'] = $magicNumber;
                    }

                    if (isset($_SESSION['guessCount'])) {
                        $guessCount = $_SESSION['guessCount'];

                    } else {
                        $guessCount = 1;
                        $_SESSION['guessCount'] = $guessCount;
                    }
                    
                    if (isset($_REQUEST['guess'])) {
                        $userGuess = ($_REQUEST['guess']);
                        if ($userGuess != $magicNumber) {    
                            

                            if ($userGuess > $magicNumber) {
                                $message = "Too high! Lower!<br>Can you guess the magic number?";
                                $_SESSION['guessCount'] = $guessCount + 1;
                            } elseif ($userGuess < $magicNumber) {
                                $message = "Too low! Higher!<br>Can you guess the magic number?";
                                $_SESSION['guessCount'] = $guessCount + 1;;
                            } 
                        } elseif ($userGuess == $magicNumber) {
                            $message = "You got it! You must be magic!";
                            session_unset();
                        }
                    } else {
                        $userGuess = 0;
                        $message = "Can you guess the magic number?";
                    }

                   if (isset($_REQUEST['newGame'])) {
                        session_unset();
                        session_regenerate_id();
                        header('Location: high-low.php');
                        exit();
                   }
                    
                    
     // var_dump($userGuess);
     // var_dump($magicNumber);               

                    

                    


                        


                    if ($guessCount == 1) {
                        $countMessage = "It only took you " . $guessCount . " time!";
                    } else {
                        $countMessage = "It only took you " . $guessCount . " times!";
                    }
                    
    //             } else {
    //                 echo("Your arguments need to be numeric. Try again.\n");
    //             }
    //         } else {
    //             echo("Your arguments need to be numeric. Try again.\n");
    //         }
    //     } else {
    //         echo("The first argument(minimum) must be less than the the second argument(maximum).\n");
    //     }
    // } else {
    //     echo("You need a total of three arguments. Only enter two after the file name.\n");
    // }

    return ['message' => $message, 'countMessage' => $countMessage, 'userGuess' => $userGuess, 'magicNumber' => $magicNumber];

}

extract(pageController());


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
            integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
            crossorigin="anonymous"
        >
        <title>High-Low game</title>
        <!--[if lt IE 9]>
              <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
              </script>
              <script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
              </script>
        <![endif]-->
        <style>
            body {
                background-image: url('/IMG/white-brick.png');
                background-size: 100%;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="page-header">
                <h1>High-Low Game</h1>
            </header>
            <!-- Switch the class from info to success when the user win -->
            <div class="alert alert-info" role="alert"> <!-- Remove hidden class after first attempt -->
                <?php if (!is_null($userGuess)): ?>
                <h2><?= $message; ?></h2><!-- Place the user's feedback here (HIGHER, LOWER or GOOD GUESS!)  -->
            <?php endif; ?>
            <?php if ($userGuess == $magicNumber): ?>
                <h2><?= $countMessage; ?></h2>
            <?php endif; ?>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="guess">Guess</label>
                    <input
                        type="number"
                        class="form-control"
                        name="guess"
                        id="guess"
                        autofocus>

                </div>
                <button type="submit" class="btn btn-primary">
                    Take a Guess!
                </button>
                <button type="submit" name="newGame" class="btn btn-primary">
                    Start a New Game!
                </button>
            </form>
        </div>
        <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"
        ></script>
            
    </body>
</html>