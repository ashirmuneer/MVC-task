<?php

require_once  './Model/UserModel.php'; // Include the UserModel
session_start();




class LoginController {

    
  
    public function login() {

        // Generate CSRF token if not already set
          if (!isset($_SESSION['csrf_token'])) {
                 $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
           } 
       

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                // Invalid CSRF token,
                header('Location: index.php');
                $_SESSION['error'] = "CSRF token validation failed!";
                exit();
            }


            $username = $this->sanitize($_POST['username']);
            $password = $this->sanitize($_POST['password']);

            // Create UserModel object
            $userModel = new UserModel();

            // Call login method
            $loginResult = $userModel->login($username, $password);

            if ($loginResult) {
              
                header('Location: index.php');
                $_SESSION['success'] = "Login successful!";
                exit();
            } else {

                header('Location: index.php');
                $_SESSION['error'] = "Invalid username or password!";
                exit();
            }
        } else {
            // Display login form
            include 'View/login_view.php';
        }
    }

    private function sanitize($input) {
        // sanitization 
        return htmlspecialchars($input);
    }
}

// Instantiate controller and call login method
$loginController = new LoginController();
$loginController->login();
?>

