<?php
function redirect_to($location){
    header("Location: $location");
    exit;
}

function isFormValidated()
{
    global $errors;
    global $images_errors;
    if (isset($images_errors)) {
        return count($errors) == 0 && count($images_errors) == 0;
    }
    return count($errors) == 0;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkFormContact(){
    global $errors;
    if (empty($_POST['name'])) {
        $errors['name'] = 'Required.';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Required.';
    } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email.";
        }
    }
    if (empty($_POST['subject'])) {
        $errors['subject'] = 'Required.';
    }
    if (empty($_POST['msg'])) {
        $errors['msg'] = 'Required.';
    }
}
?>