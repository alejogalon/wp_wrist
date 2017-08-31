<?php include_once 'check_mask.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pablo SVG</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <style>
        .container {
            border: 2px solid #b6bdc3;
            /*width: 60%;*/
            width: 800px;
            background: #fff;
            margin: 0 auto;
            /*display: inline-block;*/
        }
        .container2 {
            display: table;
            margin: 0 auto;

        }
        input { width: 100%; padding: .5em 1em; }

    </style>
    <script src="js/jquery-2.0.0.js"></script>
    <script>

        $(document).ready(function () {
            //fetch the svg file
            //Pablo(mycontainer).load('mycanvas_1.svg');                      
            //Pablo(mycontainer).load('testcanvas.svg');

            //change color of the wristband
            $('.solid_color').click(function () {
                var insidesolid = document.getElementById("insidesolid");
                var outsidesolid = document.getElementById("outsidesolid");
                var bandcolor = document.getElementById("bandcolor");

                insidesolid.style.fill = $(this).val();
                outsidesolid.style.fill = $(this).val();
                bandcolor.style.fill = $(this).val();
            });
            $('.inside_color').click(function () {
                var insidesolid = document.getElementById("insidesolid");
                var bandcolor = document.getElementById("bandcolor");
                insidesolid.style.fill = $(this).val();
                bandcolor.style.fill = $(this).val();
            });
            $('.outside_color').click(function () {
                var outsidesolid = document.getElementById("outsidesolid");
                outsidesolid.style.fill = $(this).val();
            });
            $('.mask1_color').click(function () {
                var mask1 = document.getElementById("mask1");
                var mask1inside = document.getElementById("mask1inside");
                if ('clear' === $(this).val()) {
                    mask1.style.opacity = 0;
                    mask1inside.style.opacity = 0;
                } else {
                    mask1.style.opacity = 1;
                    mask1inside.style.opacity = 1;
                    mask1.style.fill = $(this).val();
                    mask1inside.style.fill = $(this).val();
                }
            });
            $('.mask2_color').click(function () {
                var mask2 = document.getElementById("mask2");
                var mask2inside = document.getElementById("mask2inside");
                if ('clear' === $(this).val()) {
                    mask2.style.opacity = 0;
                    mask2inside.style.opacity = 0;
                } else {
                    mask2.style.opacity = 1;
                    mask2inside.style.opacity = 1;
                    mask2.style.fill = $(this).val();
                    mask2inside.style.fill = $(this).val();
                }
            });
            //add text
            //prevent any key long pressing
            var flag1 = 0;
            $("#txtInput").on('keydown', function (e) {
                flag1++;
                if (flag1 > 2) {
                    e.preventDefault();
                }
            });
            $("#txtInput").on('keyup', function (e) {
                flag1 = 0;
            });
            var flag2 = 0;
            $("#txtInputCont").on('keydown', function (e) {
                flag2++;
                if (flag2 > 2) {
                    e.preventDefault();
                }
            });
            $("#txtInputCont").on('keyup', function (e) {
                flag2 = 0;
            });
            //prevent any key long pressing
            $("#txtInput").attr("maxlength", 40);
            $("#txtInput").on('cut', function () {
                document.getElementById("bandtext").style.fontSize = "30px";
                $("#bandtext").text();
            });
            $("#txtInput").on('paste', function (e) {
                return false;
            });
            $("#txtInput").on('change keyup copy', function (e) {
                if ($("#txtInput").val().length < 6)
                {
                    document.getElementById("bandtext").style.fontSize = "30px";
                }
                $("#front-text").text($('#txtInput').val());

                if (e.keyCode === 46 || e.keyCode === 8) {

                    var pathLength = '635';
                    if (parseInt($("#bandtext").css('font-size')) < 31) {
                        for (d = 1; d <= 3; d++) {
                            if ($("#bandtext")[0].getBoundingClientRect().width < pathLength) {
                                document.getElementById("bandtext").style.fontSize = (parseInt($("#bandtext").css('font-size')) + 1) + 'px';
                                $("#front-text").text($('#txtInput').val());
                            }
                        }
//                        if ($("#bandtext")[0].getBoundingClientRect().width < '650') {
//                            document.getElementById("bandtext").style.fontSize = (parseInt($("#bandtext").css('font-size')) - 2) + 'px';
//                            $("#front-text").text($('#txtInput').val());
//                        }                        

                    }

                }
                else {
                    var pathLength = '670';
                    for (x = 1; x <= 3; x++) {
                        if ($("#bandtext")[0].getBoundingClientRect().width > pathLength) {
                            if ($("#bandtext").val().length > '23' && $("#bandtext").val().length < '29') {
                                document.getElementById("bandtext").style.fontSize = (parseInt($("#bandtext").css('font-size')) - 0.5) + 'px';
                            } else if ($("#bandtext").val().length > '28') {
                                document.getElementById("bandtext").style.fontSize = (parseInt($("#bandtext").css('font-size')) - 0.2) + 'px';
                            } else {
                                document.getElementById("bandtext").style.fontSize = (parseInt($("#bandtext").css('font-size')) - 1) + 'px';
                            }
                            $("#front-text").text($('#txtInput').val());
                        }
                    }

                    if ($("#bandtext").val().length > '35') {
                        document.getElementById("bandtext").style.fontSize = (parseInt($("#bandtext").css('font-size')) + 2) + 'px';
                        $("#front-text").text($('#txtInput').val());
                    }
                }
            });
            $("#txtInputInside").on('change keyup copy', function (e) {
                $("#inside-text").text($('#txtInputInside').val());
            });
            $("#front-start-icon").keyup(function () {
                $('#front-start').empty().append($('#front-start-icon').val());
                //document.getElementById("front-start").style.color = "red";
            });
            $("#front-end-icon").keyup(function () {
                $('#front-end').empty().append($('#front-end-icon').val());
            });
            $("#front-color").keyup(function () {
                //$('#front-end').empty().append($('#front-color').val());
                document.getElementById("bandtext").style.fill = $('#front-color').val();
                document.getElementById("bandtext").style.opacity = "1";
            });
            $(".textClass").click(function () {
                switch ($(this).val()) {
                    case 'Imprinted':
                        $("#bandtext").css({textShadow: "0 0 0"});
                        break;
                    case 'Debossed':
                        $("#bandtext").css({textShadow: "0px -1px 1px black"});
                        break;
                    case 'Embossed':
                        $("#bandtext").css({textShadow: "rgba(255, 255, 255, 0.1) -2px -2px 2px, rgba(0, 0, 0, 0.5) 2px 2px 2px"});
                        break;
                    default:
                        $("#bandtext").css({textShadow: "0 0 0"});
                }
            });


            $('#btnSave').click(function () {

                //console.log($("#mycontainer").html());
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "ajax_save.php",
                    data: {front: $("#mycontainer").html()},
                    success: function (data) {
                        if (data) {
                            alert("Saved!");
                        }
                    }
                });
            });
        });
//================================================================================================================================        
//================================================================================================================================        
        $(document).ready(function () {
            //dev
            $("#bandtextcont1").removeAttr("display");
            $("#bandtext").attr("display", "none");
            $("#bandtextcont2").attr("display", "none");

            $(':radio[name="textdesign"]').change(function () {
                var design = $(this).filter(':checked').val();
                if (design === 'frontback') {
                    $("#bandtext").removeAttr("display");
                    $("#bandtextcont1").attr("display", "none");
                    $("#bandtextcont2").attr("display", "none");                    
                    $('input[name=wraparound]').attr("disabled",true);
                } else {
                    $('input[name=wraparound]').attr("disabled",false);
                    $("input[name=wraparound][value='front']").prop("checked",true);
                    $("#bandtextcont1").removeAttr("display");
                    $("#bandtextcont2").attr("display", "none");
                    $("#bandtext").attr("display", "none");
                    
                }
            });
            $(':radio[name="wraparound"]').change(function () {
                var frontback = $(this).filter(':checked').val();
                if (frontback === 'front') {
                    $("#bandtextcont1").removeAttr("display");
                    $("#bandtextcont2").attr("display", "none");
                } else {
                    $("#bandtextcont2").removeAttr("display");
                    $("#bandtextcont1").attr("display", "none");
                }
            });

            $("#txtInputCont").on('change keyup copy', function (e) {
                if ($("#txtInputCont").val().length < $('input[name=textcount]').val().length + 1) {
                    $("#front-textcont2").text('');
                }
                $("#front-textcontainer").text($('#txtInputCont').val());
//                console.log($("#bandtextcontainer")[0].getBoundingClientRect().width);
                if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '1150') {

                    $("#front-textcont1").text($('#txtInputCont').val().substring(0, Math.ceil($("#txtInputCont").val().length / 2)));
                    //while ($("#bandtextcont1")[0].getBoundingClientRect().width > '690') {
                    console.log($("#bandtextcont1")[0].getBoundingClientRect().width);
                    while ($("#bandtextcont1")[0].getBoundingClientRect().width > '680') {
                        document.getElementById("bandtextcont1").style.fontSize = (parseInt($("#bandtextcont1").css('font-size')) - 1) + 'px';
                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, Math.ceil($("#txtInputCont").val().length / 2)));
                    }
                    document.getElementById("bandtextcont2").style.fontSize = parseInt($("#bandtextcont1").css('font-size')) + 'px';
                    $("#front-textcont2").text($('#txtInputCont').val().substring(Math.ceil($("#txtInputCont").val().length / 2), $("#txtInputCont").val().length));
                    while ($("#bandtextcont2")[0].getBoundingClientRect().width > '680') {
                        document.getElementById("bandtextcont1").style.fontSize = (parseInt($("#bandtextcont1").css('font-size')) - 0.5) + 'px';
                        document.getElementById("bandtextcont2").style.fontSize = parseInt($("#bandtextcont1").css('font-size')) + 'px';
                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, Math.ceil($("#txtInputCont").val().length / 2)));
                        $("#front-textcont2").text($('#txtInputCont').val().substring(Math.ceil($("#txtInputCont").val().length / 2), $("#txtInputCont").val().length));
                    }
                }
                else {
                    if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '710') {
                        var span_textcont1 = $('input[name=textcount]').val().length;
                        $("#front-textcont2").text($('#txtInputCont').val().substring(span_textcont1 - 1, $("#txtInputCont").val().length));
                    } else {
                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                        $('input[name=textcount]').val($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                    }
                }
            });
        });

    </script>
    <body>
        <input type="hidden" name="textcount" value="0">
        <input type="hidden" name="tosecondpath" value="false">
        <input type="hidden" name="meetlimit" value="0">
        <div id="mycontainer" class="container">
            <svg id="svgelement" viewBox="0 0 300 180" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
            <path id="OrigPath" fill-opacity="0" d="M0 50 q 80 -18 444 -2"/>
            <path id="MyPath" fill-opacity="0" d="M28 98 q 125 23 250 -2"/>
            <path id="MyPath1" fill-opacity="0" d="M28 98 q 125 23 255 -2"/>
            <path id="MyPath2" fill-opacity="0" d="M15 96 q 125 25 255 2"/>
            <!--<path id="MyPath2" fill-opacity="0" d="M23 130 q 125 23 250 -2"/>-->
            <path id="MyPathInside" fill-opacity="0" d="M28 90 q 80 -18 250 -2"/>

            <filter id="blurFilter8" x="-20" y="-20" width="200" height="200">
                <feGaussianBlur in="SourceAlpha" stdDeviation="20" />
            </filter>
            </defs>
            <rect id="bandcolor" height="100%" width="100%" style="fill: gray" />

            <?php echo $mask_inside_band; ?>
            <?php echo $mask1_inside . $mask2_inside; ?>            
            <text id="bandtextinside" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathinside" xlink:href="#MyPathInside" startOffset="50%">
                <tspan id="inside-text" dominant-baseline="middle">inside message</tspan>
            </textPath>
            </text>
            <?php echo $mask_outside_band; ?>
            <?php echo $mask1 . $mask2; ?>
            <text id="bandtext" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpath" xlink:href="#MyPath" startOffset="50%">
                <tspan id="front-start" class="fa" dominant-baseline="middle">&#xf17c;</tspan>
                <tspan id="front-text" dominant-baseline="middle">TEXT</tspan>
                <tspan id="front-end" class="fa" dominant-baseline="middle">&#xf11c;</tspan>
            </textPath>
            </text>
            <text id="bandtextcont1" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathcont1" xlink:href="#MyPath1" startOffset="0%">
                <tspan id="front-startcont1" class="fa" dominant-baseline="middle"></tspan>
                <tspan id="front-textcont1" dominant-baseline="middle"></tspan>
                <tspan id="front-endcont1" class="fa" dominant-baseline="middle"></tspan>
            </textPath>
            </text>            
            <text id="bandtextcont2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathcont2" xlink:href="#MyPath2" startOffset="0%">
                <tspan id="front-startcont2" class="fa" dominant-baseline="middle"></tspan>
                <tspan id="front-textcont2" dominant-baseline="middle"></tspan>
                <tspan id="front-endcont2" class="fa" dominant-baseline="middle"></tspan>
            </textPath>
            </text>            
            <text id="bandtextcontainer" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathcontainer" xlink:href="#OrigPath" startOffset="0%">
                <tspan id="front-startcontainer" class="fa" dominant-baseline="middle"></tspan>
                <tspan id="front-textcontainer" dominant-baseline="middle"></tspan>
                <tspan id="front-endcontainer" class="fa" dominant-baseline="middle"></tspan>
            </textPath>
            </text>            
            <rect x="15" y="75" width="30" height="50" filter="url(#blurFilter8)" />
            <rect x="260" y="75" width="30" height="50" filter="url(#blurFilter8)" />
            <image height="100%" width="100%" xlink:href="WRISTBAND2.png" />

            <!--<use xlink:href="#OrigPath" fill="none" stroke="green"  />-->
            <!--<use xlink:href="#MyPath2" fill="none" stroke="blue"  />-->
            <!--<use xlink:href="#MyPath1" fill="none" stroke="red"  />-->
            </svg>            
        </div>
        <div class="container2" style="margin: 0 auto; text-align: center;">
            <table border="1" style="width:100%">
                <tr>
                    <th colspan="2" style="width:50%"><input type="radio" name="textdesign" value="frontback" >Front/Back</th>
                    <th colspan="2" style="width:50%"><input type="radio" name="textdesign" value="cont" checked> Wrap Around </th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>

                    <td><input type="radio" name="wraparound" value="front" checked>Front View</td>
                    <td><input type="radio" name="wraparound" value="back">Back View</td>
                </tr> 
            </table>            


            <p>Continuous Message</p>
            <input id="txtInputCont" size="80" type="text" name="text" placeholder="Continuous Message">
            <p>Front Message</p>
            <input id="txtInput" size="40" type="text" name="text" placeholder="Front Message">
            <input id="front-start-icon" size="10" type="text" name="text" placeholder="Front Start (fontawesome cheatsheet)">
            <input id="front-end-icon" size="10" type="text" name="text" placeholder="Front End (fontawesome cheatsheet)">
            <input id="front-color" type="text" name="text" placeholder="Hex Color">
            <p>Inside Message</p>
            <input id="txtInputInside" size="80" type="text" name="text" placeholder="Inside Message">          
            <button class="textClass" type="button" value="Imprinted">Imprinted</button>
            <button class="textClass" type="button" value="Debossed">Debossed</button>
            <button class="textClass" type="button" value="Embossed">Embossed</button>                                  
            <br>
            <style>
                th {
                    background-color: gray;
                    color: white;
                }                
            </style>
            <table style="width:100%;">
                <tr>
                    <th>solid color</th>
                    <th>inside color</th>
                    <th>outside color</th>
                    <th>swirl-mask 1</th>
                    <th>swirl-mask 2</th>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" value="red" style=" background-color: red;">Red</button></td>
                    <td><button class="inside_color" type="button" value="red" style=" background-color: red;">Red</button></td>
                    <td><button class="outside_color" type="button" value="red" style=" background-color: red;">Red</button></td>
                    <td><button class="mask1_color" type="button" value="red" style=" background-color: red;">Red</button></td>
                    <td><button class="mask2_color" type="button" value="red" style=" background-color: red;">Red</button></td>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" value="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="inside_color" type="button" value="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="outside_color" type="button" value="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="mask1_color" type="button" value="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="mask2_color" type="button" value="blue" style=" background-color: blue;">Blue</button></td>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" value="green" style=" background-color: green;">Green</button></td>
                    <td><button class="inside_color" type="button" value="green" style=" background-color: green;">Green</button></td>
                    <td><button class="outside_color" type="button" value="green" style=" background-color: green;">Green</button></td>
                    <td><button class="mask1_color" type="button" value="green" style=" background-color: green;">Green</button></td>
                    <td><button class="mask2_color" type="button" value="green" style=" background-color: green;">Green</button></td>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" value="gray">Clear</button></td>
                    <td><button class="inside_color" type="button" value="gray">Clear</button></td>
                    <td><button class="outside_color" type="button" value="gray">Clear</button></td>
                    <td><button class="mask1_color" type="button" value="clear">Clear</button></td>
                    <td><button class="mask2_color" type="button" value="clear">Clear</button></td>
                </tr>
            </table>            

            <br>
            <button id="btnSave" type="button">SAVE</button>
        </div>        
        <br>



    </body>
</html> 