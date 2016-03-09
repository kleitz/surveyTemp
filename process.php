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

}


$q1 = ($_POST['group1']);
$q2 = ($_POST['group2']);
$q3 = ($_POST['group3']);
$q4 = ($_POST['group4']);

//====================REQUETE INSERTION=============================
$tab = array(
    $q1,
    $q2,
    $q3,
    $q4
);

$insert = "INSERT INTO `Form` (`q1`, `q2`, `q3`, `q4`,`isComplete`)
VALUES (?, ?, ?, ?, TRUE )";

$req = $db->prepare($insert);
$req->execute($tab);

//====================REQUETE AFFICHAGE=============================
//$display = $db->prepare("SELECT q1, q2 FROM Form");
//$display->execute();
//while ($row = $display->fetch(PDO::FETCH_ASSOC))
//{
//    $q1tab = $row['q1'];
//    $q2tab =  $row['q2'];
//    echo $q1tab;
//    echo $q2tab;
//    echo '<br>';
//}

//====================REQUETE COUNT=============================

for ( $i=1;$i<=4;$i++){

    $count = $db->prepare("SELECT COUNT(q".$i.") AS nb".$i." FROM Form WHERE q".$i."='Red'");
    $count->execute();
    $row = $count->fetch(PDO::FETCH_ASSOC);
    $red[$i] = $row['nb'.$i];
}

for ( $i=1;$i<=4;$i++){

    $count = $db->prepare("SELECT COUNT(q".$i.") AS nb".$i." FROM Form WHERE q".$i."='Blue'");
    $count->execute();
    $row = $count->fetch(PDO::FETCH_ASSOC);
    $blue[$i] = $row['nb'.$i];
}

for ( $i=1;$i<=4;$i++){

    $count = $db->prepare("SELECT COUNT(q".$i.") AS nb".$i." FROM Form WHERE q".$i."='Green'");
    $count->execute();
    $row = $count->fetch(PDO::FETCH_ASSOC);
    $green[$i] = $row['nb'.$i];
}

?>


<!--//==============================================================-->
<!--//=========================GRAPH================================-->
<!--//==============================================================-->

<!DOCTYPE HTML>
<html>
<head>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
</head>
<script>
    $(document).ready(function() {
        var chart1 = new Highcharts.Chart({

            chart: {
                spacingBottom: 15,
                spacingTop: 10,
                spacingLeft: 10,
                spacingRight: 10,
                width: 1000,
                height: null,
                renderTo: 'container',
                type: 'column'
            },

            title: {
                text: 'Resultat'
            },
            xAxis: {

                categories: ['Q1', 'Q2', 'Q3','Q4']
            },
            yAxis: {
                tickInterval: 1,
                minRange: 1,
                allowDecimals: false,
                startOnTick: true,
                title: {
                    text: 'Nombre Reponses'
                }

            },
            series: [{
                color: '#f44336' ,
                name: 'Red',
                data: [<?php echo $red[1]?>,<?php echo $red[2]?>,<?php echo $red[3]?>,<?php echo $red[4]?>]
            },
                {
                    color: '#42a5f5' ,
                    name: 'Blue',
                    data: [<?php echo $blue[1]?>,<?php echo $blue[2]?>,<?php echo $blue[3]?>,<?php echo $blue[4]?>]
                },
                {
                    color: '#43a047' ,
                    name: 'Green',
                    data: [<?php echo $green[1]?>,<?php echo $green[2]?>,<?php echo $green[3]?>,<?php echo $green[4]?>]
                }]
        });
    });



</script>

<body>

<div id="container" style="width:100%; height:400px;">


</div>
</body>
</html>
