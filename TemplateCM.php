<?php
require_once ("Connector/Credentials.php");
require_once "controllerCM.php";



//GET the project name
?>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Contract Maker</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>

    <body>
        <section>
            <nav id="nav1">
                <div id="div2">
                    <a href="contractMaker.php" target="_blank">
                        <img src="images/McGill_EN_Black.png" alt="McGill Logo"><br>
                    </a>
                </div>
            </nav>
        </section>
        <section id="mainSection">
            <div id="content">

                <div id="mainContent">
                    <div class="title2">
                        <h1>
                            <?php echo $title; ?>
                        </h1>
                    </div>
                    <div>
                        <table class="tableSearch">
                            <tr>
                                <td colspan="2" style="text-align: center; padding-top:15px;">
                                    <h1 class='smallH1'>Please select a Unit Number:</h1>
                                </td>
                            </tr>
                            <tr>
                                <td width='20%' max-height="50px" style="border:red solid 2px">
                                    <?php echo $search; ?>
                                </td>
                                <td width='80%' max-height="50px">
                                    <?php echo $choosedUnitInfo; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!--            tabs with the forms-->
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'Unit')" id="defaultOpen">Unit info</button>
                        <button class="tablinks" onclick="openTab(event, 'Purchaser1')">Purchaser #1</button>
                        <button class="tablinks" onclick="openTab(event, 'Purchaser2')">Purchaser #2</button>

                    </div>
                    <!--                    this is the Unit tab-->
                    <div id="Unit" class="tabcontent">


                        <div id="wrapper">
                            <table class='tableOthers'>
                                <tr>
                                    <td>
                                        <h1 class='smallH1'>Please enter the following information:</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $unitTab; ?>
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </div>


                    </div>
                    <div id="Purchaser1" class="tabcontent">
                        <div id="wrapper">
                            <table class='tableOthers'>
                                <tr>
                                    <td>
                                        <?php echo $purchaser1Tab; ?>
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </div>


                    </div>
                    <div id="Purchaser2" class="tabcontent">
                        <div id="wrapper">
                            <table class='tableOthers'>
                                <tr>
                                    <td>
                                        <?php echo $purchaser2Tab; ?>
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </div>


                    </div>
                    <h2 style="font-size: 9px; text-align: center"> Copyright © 2017 McGill Immobilier. All rights reserved. </h2>
                </div>


            </div>


        </section>






        <!--      this is the Side pop up Menu  -->

        <script type="text/javascript">
            //tabs JavaScript

            function openTab(evt, tabName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            document.getElementById("defaultOpen").click();

        </script>

    </body>

</html>
