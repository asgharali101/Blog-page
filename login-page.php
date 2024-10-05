<?php

require_once './blog-page.php';

if (isset($_GET['email']) && isset($_GET['password'])) {
    if ($_GET['email'] == $email && $_GET['password']) {
        $_SESSION['is_logged_in'] = true;
        header('location:./home-page.php');
    } else {
        echo 'wrong email/passowrd';
        header('location:./login-page.php');
    }
}
?>
    <?php if (isset($_SESSION['is_logged_in']) === true) { ?>
        <h2 style="color:red;">You are already login</h2>
   <?php } else { ?>
        <form action="login-page.php" style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center;">Login</h2>

        <!-- Gmail input -->
        <label for="email" style="font-weight: bold; display: block; margin-bottom: 5px;">Gmail:</label>
        <input type="email" name="email" id="email" placeholder="Enter your Gmail" required 
               style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <!-- Password input -->
        <label for="password" style="font-weight: bold; display: block; margin-bottom: 5px;">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required 
               style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <!-- Submit button -->
        <input type="submit" value="Submit" 
               style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
        
        <p style="text-align: center; margin-top: 10px;">
            <a href="#" style="text-decoration: none; color: #007bff;">Forgot your password?</a>
        </p>
    </form>
    <?php } ?>