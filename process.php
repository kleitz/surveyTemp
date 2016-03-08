<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=BaseLink', "root");
}
catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

///*****************************************
// *  Vérification du formulaire
// *****************************************/

$message = '';


if(!empty($_POST)) {


    if(empty($_POST['group1']))
    {
        $message = 'Error : unfilled answer!';
    }
    if(empty($_POST['group2']))
    {
        $message = 'Error : unfilled answer!';
    }
    if(empty($_POST['group3']))
    {
        $message = 'Error : unfilled answer!';
    }
    if(empty($_POST['group4']))
    {
        $message = 'Error : unfilled answer!';
    }

    $q1 = ($_POST['group1']);
    $q2 = ($_POST['group2']);
    $q3 = ($_POST['group3']);
    $q4 = ($_POST['group4']);
}

$tab = array(
    'q1' => '$q1',
    'q2' => '$q2',
    'q3' => '$q3',
    'q4' => '$q4');


//====================REQUETE INSERTION=============================
$sql = "INSERT INTO `Form` (`q1`, `q2`, `q3`, `q4`,`isComplete`)
VALUES ('$q1', '$q2', '$q3', '$q4', TRUE )";

$req = $db->prepare($sql);
$req->execute($tab);


$result = $db->prepare("SELECT q1, q2 FROM Form");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
    $q1tab = $row['q1'];
    $q2tab =  $row['q2'];
    echo $q1tab;
    echo $q2tab;
    echo '<br>';
}

?>