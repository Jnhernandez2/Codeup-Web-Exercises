<?php
require_once 'debug-functions.php';
require_once '../../source/password-auth-class.php';


function pageController() {
    session_start();

    $data = ['message' => '', 'title' => 'Login'];

    if (Auth::check()) {
        redirect('debug-authorized.php');
    }

    if (!isPost()) {
        return $data;
    }

    if (Auth::attempt(input('username'), input('password'))) {
        redirect('debug-authorized.php');
    }

    $data['message'] = 'Your username or password are incorrect...';

    return $data;
}

extract(pageController());
?>
<!DOCTYPE html>
<html>
    <?php include 'debug-header.php' ?>
    <body>
        <div class="container">
            <h1>Login</h1>
            <h2><?= $message ?></h2>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        name="username"
                        id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
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