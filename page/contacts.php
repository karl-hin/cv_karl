<?php


$choice1 = filter_input(INPUT_POST, 'contacts1');
$nom = filter_input(INPUT_POST, 'user_name');
$prenom = filter_input(INPUT_POST, 'user_forename');
$mail = filter_input(INPUT_POST, 'user_mail');
$valeur = filter_input(INPUT_POST, 'choix_site');
$user_message = filter_input(INPUT_POST, 'user_message');

$date = date('Y-m-d-H-i-s');
$file = 'contact/contact_'.$date.'.txt';

file_put_contents($file, $choice1, FILE_APPEND | LOCK_EX);
file_put_contents($file, $nom, FILE_APPEND | LOCK_EX);
file_put_contents($file, $prenom, FILE_APPEND | LOCK_EX);
file_put_contents($file, $mail, FILE_APPEND | LOCK_EX);
file_put_contents($file, $valeur, FILE_APPEND | LOCK_EX);
file_put_contents($file, $user_message, FILE_APPEND | LOCK_EX);

?>
<main>
    <div class="flexmain">
        <h1>Karl Hinterseber</h1>
    </div>
    <form action="/index.php?page=contacts" method="post">

        <div>
            <input type="radio" id="contactChoice1" name="contacts1" value="madame">
            <label for="contactChoice1">Madame</label>

            <input type="radio" id="contactChoice2" name="contacts1" value="monsieur">
            <label for="contactChoice2">Monsieur</label>
        </div>
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="user_name" placeholder="Entrez votre nom">
        </div>
        <div>
            <label for="forename">Prénom</label>
            <input type="text" id="forename" name="user_forename" placeholder="Entrez votre prénom">
        </div>
        <div>
            <label for="mail">e-mail:</label>
            <input type="email" id="mail" name="user_mail" placeholder="Entrez votre e-mail">
        </div>
        <div>
            <p>Raison du contact</p>
        </div>
        <div>
            <select name="choix_site" id="monselect">
                <option value="valeur1">Proposition d'emploi</option>
                <option value="valeur2" selected>Demande d'information</option>
                <option value="valeur3">Prestations</option>
            </select>
        </div>
        <div>
            <label for="msg">Message:</label>
            <textarea id="msg" name="user_message" placeholder="Entrez votre message"></textarea>
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>
    <a href="mailto:karlhinterseber1@gmail.com">Email</a>
</main>
