<?php
require_once 'debug-functions.php';
require_once '../../source/password-auth-class.php';

function pageController() {
    session_start();

    if (!Auth::check()) {
        redirect("debug-login.php");
    }
    return ['username' => Auth::user(), 'title' => 'Welcome!!'];
}
extract(pageController());

?>
<!DOCTYPE html>
<html>
    <?php include 'debug-header.php' ?>
    <body>
        <div class="container">
            <h1>Welcome <?= $username ?>!</h1>
            <p>
                <a href="debug-logout.php">Logout</a>
            </p>
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