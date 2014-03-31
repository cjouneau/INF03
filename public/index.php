<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <title>La newsletter de MonSite.fr</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
     <link rel="stylesheet" href="style.css" />
</head>

<body>
 <?php
    if(isset($_GET['email'])) // On vérifie que la variable $_GET['email'] existe.
    {
 
        if( !empty($_POST['email']) AND $_GET['email']==1 AND isset($_POST['new'])) /* On vérifie que la variable $_POST['email'] contient bien quelque chose, que la variable $_GET['email'] est égale à 1 et que la variable $_POST['new'] existe. */
        {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) // On vérifie qu'on a bien rentré une adresse e-mail valide.
        {
 
            if($_POST['new']==0) // Si la variable $_POST['new'] est égale à 0, cela signifie que l'on veut s'inscrire.
            {
 
            // On définit les paramètres de l'e-mail.
            $email = $_POST['email'];
            $message = 'Pour valider votre inscription à la newsletter de MonSite.fr, <a href="http://www.monsite.fr/inscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';
 
            $destinataire = $email;
            $objet = "Inscription à la newsletter de MonSite.fr" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: monsite@monsite.fr' . "\r\n";
                if ( mail($destinataire, $objet, $message, $headers) ) // On envoie l'e-mail.
                {
 
                echo "Pour valider votre inscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer.";
                }
                else
                {
                echo "Il y a eu une erreur lors de l'envoi du mail pour votre inscription.";
                }
            }
            elseif($_POST['new']==1) // Si la variable $_POST['new'] est égale à 1, cela signifie que l'on veut se désinscrire.
            {
 
            // On définit les paramètres de l'e-mail.
            $email = $_POST['email'];
            $message = 'Pour valider votre désinscription de la newsletter de MonSite.fr, <a href="http://www.monsite.fr/desinscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';
 
            $destinataire = $email;
            $objet = "Désinscription de la newsletter de MonSite.fr" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: monsite@monsite.fr' . "\r\n";
                if ( mail($destinataire, $objet, $message, $headers) ) 
                {
 
                echo "Pour valider votre désinscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer.";
                }
                else
                {
                echo "Il y a eu une erreur lors de l'envoi du mail pour votre désinscription.";
                }
            }
            else
            {
            echo "Il y a eu une erreur !";
            }
        }
        else
        {
        echo "Vous n\'avez pas entré une adresse e-mail valide ! Veuillez recommencer !";
        }
        }
        else
        {
        echo "Il y a eu une erreur.";
        }
    }
    else // Si les champs n'ont pas été remplis.
    {
?>
Paramétrez votre newsletter "Approche Utilisateur et Design Web":
<!-- boutons radios pour inscription / désinscription et checkbox pour paramétrage-->
<form method="post" action="index.php?email=1">
Adresse e-mail : <input type="text" name="email" size="25" /><br />

<input type="radio" name="new" value="0" onClick="afficher();"/>S'inscrire <br />

<p id="champ_cache">
<input type="checkbox" name="new" value="UX" />Actualit&eacute;s de l'UX design<br />
<input type="checkbox" name="new" value="Actus" />Derniers billets des étudiants<br />
<input type="checkbox" name="new" value="Projets" />Les projets des étudiants<br />
<input type="checkbox" name="new" value="Admin" />Les actualités administratives<br />
</p>

<input type="radio" name="new" value="1" onClick="cacher();" />Se d&eacute;sinscrire<br />


<input type="submit" value="Envoyer" name="submit" /> <br /> <input type="reset" name="reset" value="Effacer" />
</form>

<!-- Pour cacher la possibilité de paramétrer la newletter sauf si on coche "s'inscrire"-->

<script type="text/javascript">
document.getElementById("champ_cache").style.display = "none";
 
function afficher()
{
    document.getElementById("champ_cache").style.display = "block";
}

function cacher()
{
    document.getElementById("champ_cache").style.display = "none";
}

</script>
<?php
    }
?>
</body>
</html>