﻿<!DOCTYPE html>
<html lang="fr">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Billet simple pour l'Alaska</title>
      <link rel="stylesheet" href="public/css/p4_blog.css">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
      <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css' crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
   </head>
   <div class="container-fluid">    
        <header>
            <!--Navigation
             ==================================================--> 
            <nav class="navbar navbar-inverse navbar-fixed-top">          
                <div class="navbar-header">
                    <a class="ancre" href="#carousel">Billet simple pour l'Alaska</a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#accueil" class="ancre">Accueil</a></li>
                        <li><a href="#publications" class="ancre">Chapitres</a></li>
                        <?php if($_SESSION['admin'] != 1) {  ?>
                            <li id="adminConnex" class="afficherConnex"><a href="index.php?action=connexion">Administration - Connexion -</a></li> <?php }
                        if($_SESSION['admin'] == 1) { ?>
                            <li id="adminDeconnex" class="afficherDeconnex"><a href="index.php?action=deconnexion">Déconnexion</a></li>
                        <?php }
                        ?>
                        <li class="dropdown">
                            <ul class="dropdown-menu">
                                <li><a href="#accueil" class="ancre">Accueil</a></li>
                                <li><a href="#publications" class="ancre">Chapitres</a></li>
                                <?php if($_SESSION['admin'] != 1) {  ?>
                                    <li id="adminConnex_bis" class="afficherConnex"><a href="index.php?action=connexion">Administration - Connexion -</a></li> <?php }
                                if($_SESSION['admin'] == 1) { ?>
                                    <li id="adminDeconnex" class="afficherDeconnex"><a href="index.php?action=deconnexion">Déconnexion</a></li>
                                <?php }
                                ?>
                            </ul>
                        </li>         
                    </ul>                        
                </div>    
            </nav>
        </header>
        <!-- Caroussel
        ==================================================--> 
        <div class="row">   
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active"> <img alt="couverture_livre" src="public/img/couverture.jpg">
                        <h1 class="carousel-caption"><span>Billet simple pour l'Alaska</span></h1>
                    </div>
                    <div class="item"> <img alt="train" src="public/img/train.jpg">
                        <h1 class="carousel-caption"><span>Le nouveau roman de Jean Forteroche</span></h1>
                    </div>
                    <div class="item"> <img alt="aurore" src="public/img/aurora.jpg">
                        <h1 class="carousel-caption"><span>Découvrez une nouvelle façon de lire !</span></h1>
                    </div>
                    <div class="item"> <img alt="loup" src="public/img/wolf.jpg">
                        <h1 class="carousel-caption"><span>Vivez le roman de l'intérieur !</span></h1>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Corps de page 
    ==================================================--> 
    <div class="container">
        <div class="jumbotron row" id="accueil">
            <h2 class="text-center">Bienvenue dans mon blog</h2>
                <img class="col-sm-12 col-md-5" src="public/img/jeanF.jpg" alt="Accueil">     
                    <p class="col-sm-12 col-md-7" id="mot_auteur">Avec ce blog, j'espère créer une vraie proximité inédite avec vous. L'écriture est souvent un travail solitaire, c'est pourquoi l'envie de faire partager l'écriture de mon nouveau roman me ravi. Je publierai au fil du temps mes chapitres et vous pourrez me donner votre sentiment. Nous pourrons échanger nos points de vue de la première à la dernière page. L'ouverture de mon blog, c'est avant tout la rencontre entre ma passion et le besoin de la partager avec vous, mes fidèles lecteurs. <br />Bonne lecture à tous ! </p>
        </div>
        <div class="jumbotron row" id="publications">
            <h2 class="text-center">Découvrez toutes les publications du roman "Billet simple pour l'Alaska":</h2>
            <?php
            while ($data = $posts->fetch()) { ?>
                <div class="last_news">
                    <h3>
                        <?php echo htmlspecialchars($data['title']) ?>
                        <em> posté le <?php echo $data['creation_date_fr'] ?></em>&ensp;<i class="far fa-comment-alt"></i>&nbsp;<?php echo $data['nbcomment']; ?>&nbsp;commentaire(s)
                    </h3>
                    <?php  echo substr($data['content'],0,400) ?>... <a href="index.php?action=post&amp;id=<?php echo $data['id'] ?>">Lire la suite</a>
                    <br />    
                </div>
            <?php
            }
            $posts->closeCursor();
            ?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" crossorigin="anonymous"></script>
    <!-- Javascript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
    <script>
        // Scroll fluide menu top
        $(function () {
            $('.ancre').on('click', function(e) {
                e.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(this.hash).offset().top
                    }, 1000, function(){
                            window.location.hash = hash;
                });
            });
        });
    </script>       
<?php require('view/frontend/footer.php') ?>
</html>