<?php
include_once 'common.php';
?>
<!DOCTYPE HTML>
<html>
<?php
$db = new PDO('mysql:host=localhost;dbname=BaseLink', "root");
?>

<!--================== EN TETE ========================-->
<head>
    <meta charset="utf-8">
    <title><?php echo $lang['PAGE_TITLE']; ?></title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import styles-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<!--================== JAVASCRIPTS ========================-->


<script type="text/javascript">
    $(document).ready(function(){
        $(".dropdown-button").dropdown();
    });
</script>

<script type="text/javascript">
    function validateForm() {
        var x = document.forms["SurveyForm"]["group1"].value;
        if (x == null || x == "") {
            alert("Name must be filled out");
            return false;
        }
    }

</script>


<!--================== CORPS ==============================-->

<body>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


<!--================== HEADER =============================-->

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


<!--================== PRINCIPALE =============================-->

<main>
    <div class="question">
        <?php echo $lang['QUESTION1'];?>
        <form name="SurveyForm" id="formID">
            Question #1
            <p>
                <input class="with-gap" name="group1" type="radio" id="test1" />
                <label for="test1">Red</label>
            </p>
            <p>
                <input class="with-gap" name="group1" type="radio" id="test2" />
                <label for="test2">Blue</label>
            </p>
            <p>
                <input class="with-gap" name="group1" type="radio" id="test3" />
                <label for="test3">Green</label>
            </p>
            <p class="range-field">
                <input type="range" id="test5" value="0" min="0" max="10" />
            </p>
            Question #2
            <p>
                <input class="with-gap" name="group2" type="radio" id="test1" />
                <label for="test1">Red</label>
            </p>
            <p>
                <input class="with-gap" name="group2" type="radio" id="test2" />
                <label for="test2">Blue</label>
            </p>
            <p>
                <input class="with-gap" name="group2" type="radio" id="test3" />
                <label for="test3">Green</label>
            </p>
            <p class="range-field">
                <input type="range" id="test5" value="0" min="0" max="10" />
            </p>
            Question #3
            <p>
                <input class="with-gap" name="group3" type="radio" id="test1" />
                <label for="test1">Red</label>
            </p>
            <p>
                <input class="with-gap" name="group3" type="radio" id="test2" />
                <label for="test2">Blue</label>
            </p>
            <p>
                <input class="with-gap" name="group3" type="radio" id="test3" />
                <label for="test3">Green</label>
            </p>
            <p class="range-field">
                <input type="range" id="test5" value="0" min="0" max="10" />
            </p>
            Question #4
            <p>
                <input class="with-gap" name="group4" type="radio" id="test1" />
                <label for="test1">Red</label>
            </p>
            <p>
                <input class="with-gap" name="group4" type="radio" id="test2" />
                <label for="test2">Blue</label>
            </p>
            <p>
                <input class="with-gap" name="group4" type="radio" id="test3" />
                <label for="test3">Green</label>
            </p>
            <p class="range-field">
                <input type="range" id="test5" value="0" min="0" max="10" />
            </p>


            <a id="btnSubmit" class="waves-effect waves-light btn"><i class="material-icons right">send</i><?php echo $lang['SUBMIT'];?></a>

        </form>


    </div>
</main>
    <script type="text/javascript">
        document.getElementById("btnSubmit").onclick = function() {
//        document.getElementById("formID").submit();
            alert("teeeest");
        };
    </script>
<!--================== FOOTER =============================-->

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