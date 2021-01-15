<?php
if (filter_has_var(INPUT_POST, "envoyer")) {

/*
     $args = array(
    'contacts1' => FILTER_SANITIZE_STRING,
    'user_name' => FILTER_SANITIZE_STRING,
    'user_forename' => FILTER_SANITIZE_STRING,
    'user_mail' => FILTER_VALIDATE_EMAIL,
         'choix_site' => FILTER_SANITIZE_STRING,
    'user_message' => FILTER_SANITIZE_STRING,
);
 filter_input_array(INPUT_POST, $args);

*/
    $choice1 = filter_input(INPUT_POST, 'contacts1');
    $nom = filter_input(INPUT_POST,'user_name',FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST,'user_forename', FILTER_SANITIZE_STRING);
    $mail = filter_input(INPUT_POST, 'user_mail', FILTER_VALIDATE_EMAIL);
    $valeur = filter_input(INPUT_POST, 'choix_site');
    $user_message = filter_input(INPUT_POST,'user_message',FILTER_SANITIZE_STRING);

    $date = date('Y-m-d-H-i-s');
    $file = 'contact/contact_' . $date . '.txt';

    $formErrors = array(
        'contact1' => 'Veuillez selectionner le bouton de votre choix',
        'user_name' => 'Veuillez écrire votre nom',
        'user_forename' => 'Veuillez écrire votre prénom',
        'user_mail' => 'Veuillez écrire votre mail',
        'user_message' => array('message_vide' => 'Veuillez écrire votre mail',
                                'message_court' => 'vous devez taper au moins 5 lettres'
                                )
    );
    file_put_contents($file, $choice1, FILE_APPEND | LOCK_EX);
    file_put_contents($file, $nom, FILE_APPEND | LOCK_EX);
    file_put_contents($file, $prenom, FILE_APPEND | LOCK_EX);
    file_put_contents($file, $mail, FILE_APPEND | LOCK_EX);
    file_put_contents($file, $valeur, FILE_APPEND | LOCK_EX);
    file_put_contents($file, $user_message, FILE_APPEND | LOCK_EX);
}
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
            <?php
            if (filter_has_var(INPUT_POST, "envoyer")) {
                if (empty($choice1)) {
                    echo $formErrors['contact1'];
                }
            }
            ?>
        </div>
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="user_name" placeholder="Entrez votre nom">
            <?php
            if (filter_has_var(INPUT_POST, "envoyer")) {
                if (empty($nom)) {
                    echo $formErrors['user_name'];
                }
            }
            ?>
        </div>
        <div>
            <label for="forename">Prénom</label>
            <input type="text" id="forename" name="user_forename" placeholder="Entrez votre prénom">
            <?php
            if (filter_has_var(INPUT_POST, "envoyer")) {
                if (empty($prenom)) {
                    echo $formErrors['user_forename'];
                }
            }
            ?>
        </div>
        <div>
            <label for="mail">e-mail:</label>
            <input type="email" id="mail" name="user_mail" placeholder="Entrez votre e-mail">
            <?php
            if (filter_has_var(INPUT_POST, "envoyer")) {
                if (empty($mail)) {
                    echo $formErrors['user_mail'];
                }
            }
            ?>
        </div>
        <div>
            <p>Raison du contact</p>
        </div>
        <div>
            <select name="choix_site" id="monselect">
                <option value="valeur1">Proposition d'emploi</option>
                <option value="valeur2">Demande d'information</option>
                <option value="valeur3">Prestations</option>
            </select>
        </div>
        <div>
            <label for="msg">Message:</label>
            <textarea id="msg" name="user_message" placeholder="Entrez votre message"></textarea>
            <?php
            if (filter_has_var(INPUT_POST, "envoyer")) {
                if (empty($user_message)) {
                    echo $formErrors['user_message']['message_vide'];
                } else if (strlen($user_message) < 5) {
                    echo $formErrors['user_message']['message_court'];
                }
            }
            ?>
        </div>
        <div>
            <button name="envoyer" type="submit">Envoyer</button>
        </div>
    </form>
    <a href="mailto:karlhinterseber1@gmail.com">Email</a>
</main>
