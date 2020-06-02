<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis ! ');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'reportedComment') {
            
            reportedComment($_GET['id'], $_GET['postId']);
        }
        elseif($_GET['action'] == 'listReportedComment') {

            listReportedComment();   
        }
        elseif($_GET['action'] == 'okComment') {
            
            approveComment($_GET['id']);   
        }
        elseif($_GET['action'] == 'delComment') {
            //var_dump($_GET['id']);
            //die();
            deleteComment($_GET['id']); 
        }
        elseif($_GET['action'] == 'newPost') {
            
            newPost();   
        }
        elseif($_GET['action'] == 'createNewPost') {
            
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                createNewPost($_POST['title'], $_POST['content']);
            }           
        }
        elseif ($_GET['action'] == 'updatePost') {
            
            if($_SESSION['admin']== 1) {  
                updatePost();
            }
        }
        elseif ($_GET['action'] == 'view_update') {

            if($_SESSION['admin']== 1) {
                if(isset($_GET['id']) && $_GET['id'] > 0) {   
                    viewUpdatePost();
                }
            }  
        }
        elseif ($_GET['action'] == 'confirmUpdatePost') {

            if($_SESSION['admin']== 1) {
                
                if (!empty($_POST['title']) && !empty($_POST['content']) && isset($_GET['id'])) {
                    confirmUpdatePost($_POST['title'], $_POST['content'], $_GET['id']);
                }
            }  
        }
        elseif ($_GET['action'] == 'deletePost') {

            if($_SESSION['admin']== 1) {  
                deletePost($_GET['id']);
            }
        } 
        elseif ($_GET['action'] == "admin") {
            
            if(!empty($_POST['mail']) && !empty($_POST['password'])) {
                $mail = htmlspecialchars(strtolower($_POST['mail']));
                espaceAdmin($mail, $password);
            }else{
                throw new Exception('Vous n\'êtes pas autorisé à accéder à l\'administration');
            }
        }
        elseif($_GET['action'] == 'connexion') {
             
            if ($_SESSION['admin']== 1){
                require ('view/frontend/admin.php');
            }else{
                loginAdmin();
            }
        }
        elseif($_GET['action'] == 'deconnexion') {  
            
            $_SESSION['admin']= 0;
            listPosts();      
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require ('view/frontend/errorView.php');
}