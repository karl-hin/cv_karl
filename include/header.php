<!DOCTYPE html>
<html lang="fr">

<head>
    <?php $metaTitle = 'CV Karl Hinterseber';
     $metaDescription  = 'Bienvenue sur mon CV Karl Hinterseber';?>
    <meta charset="utf-8">
    <meta name="description" content="<?= $metaDescription ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $metaTitle ?></title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
<header class="flexheader">
    <div id="entete">
        <p class="alone">Passionné par les nouvelles technologies et l'informatique</p>
        <img src="image/copie.jpg" id="avatar_karl" width="100" height="111" alt="photo Karl Hinterseber" id="photo-profile" />
    </div>
    <div class="boutonnav" id="navmain">
        <a class="active" href="index.php">Présentation</a>
        <a class="boutonsnav" href="index.php?page=hobby">Hobbies</a>
        <a class="boutonsnav" href="index.php?page=contacts">Contact</a>
    </div>
</header>