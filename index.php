<?php session_start(); 

    function chargerClasse($classe){
        require $classe . '.php';                   // On inclut la classe correspondante au paramètre passé.
    }

    spl_autoload_register('chargerClasse');         // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


    $_SESSION['perso1'] = ($perso1 = new Personnage(45,0,500));             // ON PASSE LES PARAMETRES /FORCE /DEGATS /VIE
    $_SESSION['perso2'] = ($perso2 = new Personnage(35,0,500));
  
    // SCRIPT COMBAT
        $perso1 -> frapper($perso2);    // JOUEUR 1
        $perso1 -> gagnerExperience();

        $perso2 -> frapper($perso1);    // JOUEUR 2
        $perso2 -> gagnerExperience();
    // END SCRIPT COMBAT

    // GESTION POURCENTAGE
        $pourcent_pv1 = ($perso1->vie()/500)*100;
        $pourcent_pv2 = ($perso2->vie()/500)*100;
    // FIN GESTION POURCENTAGE
?>


<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>RPG</title>
        <meta name="=viewport" content="width=device-width, initial-scame=1">
        <!-- CSS -->
        <link href="styles.css" rel="stylesheet" type="text/css">
        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet"> 
    </head>

    <body>
        <h1 class="title_one">World Of Warcraft</h1>
        <div class="container players">
            <div class="row">

                <div class="col-sm">
                    <p class="player_one">Niveau 1</p>
                    <img src="image/orc/orc_shaman.png" class="img_players">

                    <div class="action_bar">
                        <a href="index.php?perso=1&spell=auto-shot"><img src="image/spell/auto-shot.png" class="spell" id="spell_auto-shot"></a>
                        <a href="#"><img src="image/spell/spell_bleed.png" class="spell" id="spell_bleed"></a>
                        <a href="#"><img src="image/spell/spell_cut.png" class="spell" id="spell_cut"></a>
                        <a href="#"><img src="image/spell/spell_shield.png" class="spell" id="spell_shield"></a>
                    </div>

                    <div class="caracteristique">
                        <div class="stat PV">
                            <div class="number_pv" style="width:<?php echo $pourcent_pv1?>%;">
                                <i class="fas fa-heart fa-1x logo-caracteristique"></i>
                                <label class="info_right"><?php echo $pourcent_pv1 ;?> %</label>
                            </div>
                        </div>
                        <div class="stat FORCE">
                            <i class="fas fa-fist-raised fa-1x logo-caracteristique"></i>
                            <label class="info_right"><?php echo $perso1->force() ;?></label>
                        </div>
                        <div class="stat MANA">
                            <i class="fas fa-flask fa-1x logo-caracteristique"></i>
                            <label class="info_right"><?php echo $perso1->mana() ;?></label>
                        </div>
                        <div class="stat EXP">
                            <i class="fas fa-angle-double-right fa-1x logo-caracteristique"></i>
                            <label class="info_right"><?php echo $perso1->experience() ;?></label>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm vs">VS</div>

                <div class="col-sm">
                    <p class="player_two">Niveau 1</p>
                    <img src="image/human/human_war.png" class="img_players"><br>

                    <div class="action_bar">
                        <a href="#"><img src="image/spell/auto-shot.png" class="spell" id="spell_auto-shot"></a>
                        <a href="#"><img src="image/spell/spell_bleed.png" class="spell" id="spell_bleed"></a>
                        <a href="#"><img src="image/spell/spell_cut.png" class="spell" id="spell_cut"></a>
                        <a href="#"><img src="image/spell/spell_shield.png" class="spell" id="spell_shield"></a>
                    </div>

                    <div class="caracteristique">
                    <div class="stat PV">
                            <div class="number_pv" style="width:<?php echo $pourcent_pv2?>%;">
                                <i class="fas fa-heart fa-1x logo-caracteristique"></i>
                                <label class="info_right"><?php echo $pourcent_pv2;?> %</label>
                            </div>
                        </div>
                        <div class="stat FORCE">
                            <i class="fas fa-fist-raised fa-1x logo-caracteristique"></i>
                            <label class="info_right"><?php echo $perso2->force() ;?></label>
                        </div>
                        <div class="stat MANA">
                            <i class="fas fa-flask fa-1x logo-caracteristique"></i>
                            <label class="info_right"><?php echo $perso2->mana() ;?></label>
                        </div>
                        <div class="stat EXP">
                            <i class="fas fa-angle-double-right fa-1x logo-caracteristique"></i>
                            <label class="info_right"><?php echo $perso2->experience() ;?></label>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php     // SCRIPT COMBAT

    if(isset($_GET['perso'],$_GET['spell'])){
        if($_GET['perso'] = 1){
            if($_GET['spell'] = "auto-shot"){
                $perso1 -> frapper($perso2);
            }
            if($_GET['spell'] = 2){
                $bleed = $_GET['spell'];
            }
            if($_GET['spell'] = 3){
                $cut = $_GET['spell'];
            }
            if($_GET['spell'] = 4){
                $shield = $_GET['spell'];
            }
        }
    }else {
        // MESSAGE ERREUR
    }
?>