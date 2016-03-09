<?php
include_once 'common.php';

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
    <meta charset="utf-8">
    <title>Resultat</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import styles-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
</head>

<script>
    $(document).ready(function() {
        var chart1 = new Highcharts.Chart({

            chart: {
                spacingBottom: 15,
                spacingTop: 100,
                spacingLeft: 200,
                spacingRight: 200,
                width: null ,
                height: 500,
                renderTo: 'container',
                type: 'bar'
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".dropdown-button").dropdown();
        document.getElementById("label1").style.visibility='hidden';

    });
</script>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <img src="images/sfr_business_logo_white_nobsl-1.png" class="brand-logo" alt="SFR Business"/>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="index.php?lang=fr"><img src="images/FlagFR.png" height="20px" width="20px"> Francais</a></li>
                    <li><a href="index.php?lang=en"><img src="images/FlagEN.png" height="20px" width="20px"> English</a></li>

                </ul>
                <ul class="right hide-on-med-and-down"><li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $lang['LANGUAGE'];?><i class="material-icons right">arrow_drop_down</i></a>
                    </li></ul>
            </div>
        </nav>
    </div>
</header>
<main>

<div id="container" style="width:100%; height:400px;">


</div>
<!--================== FOOTER =============================-->
</main>
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <img src="images/sfr_business_logo_white_nobsl-1.png" alt="SFR BUSINESS">
            </div>
        </div>
    </div>
</footer>
</body>
</html>
