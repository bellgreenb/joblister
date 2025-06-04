<?php
//redirect takes in a page, which by default will be false, the message null, and message type null. 

//we take in a path and redirect using header. we will also take the message and message type and putting them into $_SESSION variables so that we can access them after we get redirected. 

//we want to redirect first, and then display the message. displaying first and redirecting second does not work. 

//redirect to page
function redirect($page = FALSE, $message = NULL, $message_type = NULL){
    if(is_string($page)){
        $location = $page;
    } else {
        $location = $_SERVER ['SCRIPT_NAME'];
    }

    //check for message
    if($message != NULL) {
        $_SESSION['message'] = $message;
    }

    //check for type
     if($message_type != NULL) {
        $_SESSION['message_type'] = $message_type;
    }

    //redirect
    header ('Location: '.$location);
    exit;
}

//we also want a function to both display the message and unset the session variables 

//we will check for a message and session, assign it, and then check to see if it's an error. if so, it will send out an alert-danger, which will make it a red message. If not, it will be a green alert-success message. 

//the message variable will then be unset, along with the message_type variable. 

//display message
function displayMessage(){
    if(!empty($_SESSION['message'])){

        //assign the message variable
        $message = $_SESSION['message'];

        if(!empty($_SESSION['message_type'])){

            //assign a type variable
            $message_type = $_SESSION['message_type'];

            //create the output
            if($message_type == 'error'){
                echo '<div class="alert alert-danger">'. $message . '</div>';
            } else {
                echo '<div class="alert alert-success">'. $message . '</div>';
            }

        }

        //unset message
        unset($_SESSION['message'] );
        unset($_SESSION['message_type'] );
    } else {
        echo '';
    }
}