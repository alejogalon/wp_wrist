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
            width: 800px;
            /*            margin: 0 auto;          */
            margin-left: -55px;          
            margin-top: -120px;          
            background: #FFFFFF;
        }
        .container2 {
            display: table;
            margin: 0 auto;

        }
        .maincontainer{
            border: 3px solid #b6bdc3;
            background-color: #00FF00;
            width: 700px;
            height: 240px;
            overflow: hidden;
            margin: 0 auto;
        }
        input { width: 100%; }

    </style>
    <script src="js/jquery-2.0.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Droid Sans', 'Droid Serif', 'Oswald', 'Lora', 'Tangerine']
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            //change color of the wristband
            $('.solid_color').click(function () {
                var insidesolid = document.getElementById("insidesolid");
                var outsidesolid = document.getElementById("outsidesolid");
                var bandcolor = document.getElementById("bandcolor");

                insidesolid.style.fill = $(this).val();
                outsidesolid.style.fill = $(this).val();
                bandcolor.style.fill = $(this).val();
                $("#gcolor").css({stopColor: $(this).val()});
            });
            $('.inside_color').click(function () {
                var insidesolid = document.getElementById("insidesolid");
//                var bandcolor = document.getElementById("bandcolor");
                insidesolid.style.fill = $(this).val();
//                bandcolor.style.fill = $(this).val();
            });
            $('.outside_color').click(function () {
                var outsidesolid = document.getElementById("outsidesolid");
                outsidesolid.style.fill = $(this).val();
                $("#gcolor").css({stopColor: $(this).val()});
                var bandcolor = document.getElementById("bandcolor");

                bandcolor.style.fill = $(this).val();                
            });
            $('.mask1_color').click(function () {
                var mask1 = document.getElementById("mask1");
                var mask1inside = document.getElementById("mask1inside");
                if ('clear' === $(this).val()) {
                    mask1.style.opacity = 0;
                    mask1inside.style.opacity = 0;
                    $("#maskeffect1").attr("display", "none");
                } else {
                    mask1.style.opacity = 1;
                    mask1inside.style.opacity = 1;
                    mask1.style.fill = $(this).val();
                    mask1inside.style.fill = $(this).val();
                    $("#g1color").css({stopColor: $(this).val()});
                    $("#maskeffect1").removeAttr("display");
                }
            });
            $('.mask2_color').click(function () {
                var mask2 = document.getElementById("mask2");
                var mask2inside = document.getElementById("mask2inside");
                if ('clear' === $(this).val()) {
                    mask2.style.opacity = 0;
                    mask2inside.style.opacity = 0;
                    $("#maskeffect1").attr("display", "none");
                } else {
                    mask2.style.opacity = 1;
                    mask2inside.style.opacity = 1;
                    mask2.style.fill = $(this).val();
                    mask2inside.style.fill = $(this).val();
                    $("#g2color").css({stopColor: $(this).val()});
                    $("#maskeffect1").removeAttr("display")
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
            $('#front-start-icon').change(function () {
                $('#front-start').empty().append($('#front-start-icon').val());
            });
            $("#front-end-icon").change(function () {
                $('#front-end').empty().append($('#front-end-icon').val());
            });
            $("#front-color").change(function () {
                if ('0' === $('#front-color').val()) {
                    document.getElementById("bandtext").style.fill = '#999999';
                    document.getElementById("bandtext").style.opacity = "0.6";
                } else {
                    document.getElementById("bandtext").style.fill = $('#front-color').val();
                    document.getElementById("bandtext").style.opacity = "1";
                }
            });
            $("#front-color-cont").change(function () {
                if ('0' === $('#front-color-cont').val()) {
                    document.getElementById("bandtextcont1").style.fill = '#999999';
                    document.getElementById("bandtextcont1").style.opacity = "0.6";
                    document.getElementById("bandtextcont2").style.fill = '#999999';
                    document.getElementById("bandtextcont2").style.opacity = "0.6";
                } else {
                    document.getElementById("bandtextcont1").style.fill = $('#front-color-cont').val();
                    document.getElementById("bandtextcont1").style.opacity = "1";
                    document.getElementById("bandtextcont2").style.fill = $('#front-color-cont').val();
                    document.getElementById("bandtextcont2").style.opacity = "1";
                }
            });
            $("#front-color-inside").change(function () {
                if ('0' === $('#front-color-inside').val()) {
                    document.getElementById("bandtextinside1").style.fill = '#999999';
                    document.getElementById("bandtextinside1").style.opacity = "0.6";
                    document.getElementById("bandtextinside2").style.fill = '#999999';
                    document.getElementById("bandtextinside2").style.opacity = "0.6";
                } else {
                    document.getElementById("bandtextinside1").style.fill = $('#front-color-inside').val();
                    document.getElementById("bandtextinside1").style.opacity = "1";
                    document.getElementById("bandtextinside2").style.fill = $('#front-color-inside').val();
                    document.getElementById("bandtextinside2").style.opacity = "1";
                }
            });
            $("#front-font-family").change(function () {
                    document.getElementById("bandtext").style.fontFamily = $('#front-font-family').val();
            }); 
            $("#inside-font-family").change(function () {
                    document.getElementById("bandtextinside1").style.fontFamily = $('#inside-font-family').val();
                    document.getElementById("bandtextinside2").style.fontFamily = $('#inside-font-family').val();
            }); 
            $("#cont-font-family").change(function () {
                    document.getElementById("bandtextcont1").style.fontFamily = $('#cont-font-family').val();
                    document.getElementById("bandtextcont2").style.fontFamily = $('#cont-font-family').val();
            }); 
            $(".textClass").click(function () {
                switch ($(this).val()) {
                    case 'Imprinted':
                        $("#bandtext").css({textShadow: "0 0 0"});
                        $("#bandtextcont1").css({textShadow: "0 0 0"});
                        $("#bandtextcont2").css({textShadow: "0 0 0"});
                        $("#bandtextinside1").css({textShadow: "0 0 0"});
                        $("#bandtextinside2").css({textShadow: "0 0 0"});
                        break;
                    case 'Debossed':
                        $("#bandtext").css({textShadow: "0px -1px 1px black"});
                        $("#bandtextcont1").css({textShadow: "0px -1px 1px black"});
                        $("#bandtextcont2").css({textShadow: "0px -1px 1px black"});
                        $("#bandtextinside1").css({textShadow: "0px -1px 1px black"});
                        $("#bandtextinside2").css({textShadow: "0px -1px 1px black"});
                        break;
                    case 'Embossed':
                        $("#bandtext").css({textShadow: "rgba(255, 255, 255, 0.1) -2px -2px 2px, rgba(0, 0, 0, 0.5) 2px 2px 2px"});
                        $("#bandtextcont1").css({textShadow: "rgba(255, 255, 255, 0.1) -2px -2px 2px, rgba(0, 0, 0, 0.5) 2px 2px 2px"});
                        $("#bandtextcont2").css({textShadow: "rgba(255, 255, 255, 0.1) -2px -2px 2px, rgba(0, 0, 0, 0.5) 2px 2px 2px"});
                        $("#bandtextinside1").css({textShadow: "rgba(255, 255, 255, 0.1) -2px -2px 2px, rgba(0, 0, 0, 0.5) 2px 2px 2px"});
                        $("#bandtextinside2").css({textShadow: "rgba(255, 255, 255, 0.1) -2px -2px 2px, rgba(0, 0, 0, 0.5) 2px 2px 2px"});
                        break;
                    default:
                        $("#bandtext").css({textShadow: "0 0 0"});
                        $("#bandtextcont1").css({textShadow: "0 0 0"});
                        $("#bandtextcont2").css({textShadow: "0 0 0"});
                        $("#bandtextinside1").css({textShadow: "0 0 0"});
                        $("#bandtextinside2").css({textShadow: "0 0 0"});
                }
            });


            $('#btnSave').click(function () {

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
        /*
         * ================================================================================================================================
         Code for warp arround message
         * ================================================================================================================================        
         */
        $(document).ready(function () {
            //dev         
            $("#bandtextcont1").attr("display", "none");
            $("#bandtextcont2").attr("display", "none");
            $("#bandtextinside1").attr("display", "none");
            $("#bandtextinside1").attr("display", "none");
            $("#bandtextinside1").removeAttr("display");
            $("#bandtextinside2").attr("display", "none");
            $("#rectBackShadow").attr("display", "none");
            function showbackshadow() {
                $("#rectBackShadow").removeAttr("display");
            }
            function hidebackshadow() {
                $("#rectBackShadow").attr("display", "none");
            }
            function enableWrapped() {
                $('#bandtextcont1')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextcont1')[0].setAttribute('textLength', '250');
                $('#bandtextcont1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtextpathcont1')[0].setAttribute('startOffset', '50%');

                $('#bandtextcont2')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextcont2')[0].setAttribute('textLength', '255');
                $('#bandtextcont2')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtextpathcont2')[0].setAttribute('startOffset', '50%');
            }
            function enableWrapped2() {
                $('#bandtextinside1')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextinside1')[0].setAttribute('textLength', '250');
                $('#bandtextinside1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtextpathinside1')[0].setAttribute('startOffset', '50%');

                $('#bandtextinside2')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextinside2')[0].setAttribute('textLength', '255');
                $('#bandtextinside2')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtextpathinside2')[0].setAttribute('startOffset', '50%');
            }
            function disableWrapped() {
                $('#bandtextcont1')[0].setAttribute('text-anchor', '');
                $('#bandtextcont1')[0].setAttribute('textLength', '');
                $('#bandtextcont1')[0].setAttribute('lengthAdjust', '');
                $('#bandtextpathcont1')[0].setAttribute('startOffset', '0%');

                $('#bandtextcont2')[0].setAttribute('text-anchor', '');
                $('#bandtextcont2')[0].setAttribute('textLength', '');
                $('#bandtextcont2')[0].setAttribute('lengthAdjust', '');
                $('#bandtextpathcont2')[0].setAttribute('startOffset', '0%');
            }
            function disableWrapped2() {
                $('#bandtextinside1')[0].setAttribute('text-anchor', '');
                $('#bandtextinside1')[0].setAttribute('textLength', '');
                $('#bandtextinside1')[0].setAttribute('lengthAdjust', '');
                $('#bandtextpathinside1')[0].setAttribute('startOffset', '0%');

                $('#bandtextinside2')[0].setAttribute('text-anchor', '');
                $('#bandtextinside2')[0].setAttribute('textLength', '');
                $('#bandtextinside2')[0].setAttribute('lengthAdjust', '');
                $('#bandtextpathinside2')[0].setAttribute('startOffset', '0%');
            }

            $(':radio[name="textdesign"]').change(function () {
                var design = $(this).filter(':checked').val();
                if (design === 'frontback') {
                    $("#outsidesolid").removeAttr("display");
                    $("#mask1").removeAttr("display");
                    $("#mask2").removeAttr("display");

                    $("#bandtext").removeAttr("display");
                    $("#bandtextcont1").attr("display", "none");
                    $("#bandtextcont2").attr("display", "none");

                    $('input[name=wraparound]').attr("disabled", true);
                    $('input[name=insidemessage]').attr("disabled", true);
                    $("#imagepathinside").attr("display", "none");
                    hidebackshadow();
                } else if (design === 'cont') {
                    $("#outsidesolid").removeAttr("display");
                    $("#mask1").removeAttr("display");
                    $("#mask2").removeAttr("display");

                    $('input[name=wraparound]').attr("disabled", false);
                    $("input[name=wraparound][value='front']").prop("checked", true);
                    $('input[name=insidemessage]').attr("disabled", true);
                    $("#bandtextcont1").removeAttr("display");
                    $("#bandtextcont2").attr("display", "none");
                    $("#bandtext").attr("display", "none");
                    $("#imagepathinside").attr("display", "none");
                    hidebackshadow();
                } else {
                    $("#outsidesolid").attr("display", "none");
                    $("#mask1").attr("display", "none");
                    $("#mask2").attr("display", "none");

                    $('input[name=wraparound]').attr("disabled", true);
                    $("#bandtext").attr("display", "none");
                    $("#bandtextcont1").attr("display", "none");
                    $("#bandtextcont2").attr("display", "none");
                    $('input[name=insidemessage]').attr("disabled", false);
                    $("input[name=insidemessage][value='front']").prop("checked", true);
                    $("#bandtextinside1").removeAttr("display");
                    $("#bandtextinside2").attr("display", "none");
                    $("#imagepathinside").removeAttr("display");
                    hidebackshadow();

                }
            });
            $(':radio[name="wraparound"]').change(function () {
                var frontback = $(this).filter(':checked').val();
                if (frontback === 'front') {
                    $("#bandtextcont1").removeAttr("display");
                    $("#bandtextcont2").attr("display", "none");

                    $("#bandtextinside1").removeAttr("display");
                    $("#bandtextinside2").attr("display", "none");
                    hidebackshadow();
                } else {
                    $("#bandtextcont2").removeAttr("display");
                    $("#bandtextcont1").attr("display", "none");

                    $("#bandtextinside2").removeAttr("display");
                    $("#bandtextinside1").attr("display", "none");
                    showbackshadow();
                }
            });
            $(':radio[name="insidemessage"]').change(function () {
                var frontback = $(this).filter(':checked').val();
                if (frontback === 'front') {
                    $("#bandtextinside1").removeAttr("display");
                    $("#bandtextinside2").attr("display", "none");
                    hidebackshadow();
                } else {
                    $("#bandtextinside2").removeAttr("display");
                    $("#bandtextinside1").attr("display", "none");
                    showbackshadow();
                }
            });
            $("#front-startcont1-icon").change(function () {
                $('#front-startcont1').empty().append($('#front-startcont1-icon').val());
            });
            $("#front-endcont2-icon").change(function () {
                $('#front-endcont2').empty().append($('#front-endcont2-icon').val());
            });
            $("#txtInputCont").on('change keyup copy', function (e) {
                if ($("#txtInputCont").val().length < $('input[name=textcount]').val().length + 1) {
                    $("#front-textcont2").text('');
                    disableWrapped();
                }
                $("#front-textcontainer").text($('#txtInputCont').val());
                if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '1160') {

                    enableWrapped();

                    $("#front-textcont1").text($('#txtInputCont').val().substring(0, Math.ceil($("#txtInputCont").val().length / 2)));
                    $("#front-textcont2").text($('#txtInputCont').val().substring((Math.ceil($("#txtInputCont").val().length / 2) - 1), $("#txtInputCont").val().length));
                }
                else {
                    disableWrapped();
                    //if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '715') {
                    if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '640') {
                        var span_textcont1 = $('input[name=textcount]').val().length;
                        $("#front-textcont2").text($('#txtInputCont').val().substring(span_textcont1 - 1, $("#txtInputCont").val().length));
                        //test
//                        $('input[name=textcount2]').val($('#txtInputCont').val().length));
                    } else {

                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                        $('input[name=textcount]').val($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                    }

                }
            });

            $("#front-startinside1-icon").change(function () {
                $('#front-startinside1').empty().append($('#front-startinside1-icon').val());
            });
            $("#front-endinside2-icon").change(function () {
                $('#front-endinside2').empty().append($('#front-endinside2-icon').val());
            });
            $("#txtInputInside").on('change keyup copy', function (e) {
                if ($("#txtInputInside").val().length < $('input[name=textinside]').val().length + 1) {
                    $("#front-textinside2").text('');
                    disableWrapped2();
                }
                $("#front-textcontainer2").text($('#txtInputInside').val());
                if ($("#bandtextcontainer2")[0].getBoundingClientRect().width > '1160') {

                    enableWrapped2();

                    $("#front-textinside1").text($('#txtInputInside').val().substring(0, Math.ceil($("#txtInputInside").val().length / 2)));
                    $("#front-textinside2").text($('#txtInputInside').val().substring((Math.ceil($("#txtInputInside").val().length / 2) - 1), $("#txtInputInside").val().length));
                }
                else {
                    disableWrapped2();
                    if ($("#bandtextcontainer2")[0].getBoundingClientRect().width > '640') {
                        var span_textinside1 = $('input[name=textinside]').val().length;
                        $("#front-textinside2").text($('#txtInputInside').val().substring(span_textinside1 - 1, $("#txtInputInside").val().length));
                    } else {
                        $("#front-textinside1").text($('#txtInputInside').val().substring(0, $("#txtInputInside").val().length));
                        $('input[name=textinside]').val($('#txtInputInside').val().substring(0, $("#txtInputInside").val().length));
                    }
                }
            });
        });
        var currentZoom = 1.0;

        $(document).ready(function () {
            $('#btn_ZoomIn').click(
                    function () {
                        $('#mycontainer').animate({'zoom': currentZoom += .1}, 'slow');
                    });
            $('#btn_ZoomOut').click(
                    function () {
                        $('#mycontainer').animate({'zoom': currentZoom -= .1}, 'slow');
                    });
            $('#btn_ZoomReset').click(
                    function () {
                        currentZoom = 1.0;
                        $('#mycontainer').animate({'zoom': 1}, 'slow');
                    });
        });
    </script>
    <body>
        <input type="hidden" name="textcount" value="0">
        <input type="hidden" name="textcount2" value="0">
        <input type="hidden" name="textinside" value="0">

        <div id="maincontainer" class="maincontainer">
            <div id="mycontainer" class="container">
                <svg id="svgelement" viewBox="0 0 300 180" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                <path id="OrigPath" fill-opacity="0" d="M0 50 q 80 -18 444 -2"/>
                <path id="MyPath" fill-opacity="0" d="M28 98 q 125 23 250 -2"/>
                <path id="MyPath1" fill-opacity="0" d="M28 98 q 125 23 255 -2"/>
                <path id="MyPath2" fill-opacity="0" d="M25 97 q 125 25 255 0"/>
                <path id="MyPathInside" fill-opacity="0" d="M28 90 q 80 -18 255 -1.5"/>
                <path id="MyPathInsideUnder" fill-opacity="0" d="M28 105 q 80 -18 250 -2"/>
                <filter id="blur">
                    <feGaussianBlur stdDeviation="2" />
                </filter>
                <filter id="blurFilter" x="-20" y="-20" width="200" height="200">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="20" />
                </filter>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#FFFFFF;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#FFFFFF; stop-opacity:0" />
                </linearGradient>
                <radialGradient id = "g" x1 = "50%" y1 = "0%">
                <stop stop-color = "white" offset = "0%"/>
                <!--<stop id="gcolor" stop-color = "gray" offset = "0%"/>-->
                <stop id="gcolor" stop-color = "gray" offset = "80%"/>
                </radialGradient>                
                <radialGradient id = "g1" x1 = "50%" y1 = "0%">
                <stop stop-color = "white" offset = "0%"/>
                <!--<stop id="g1color" stop-color = "red" offset = "0%"/>-->
                <stop id="g1color" stop-color = "red" offset = "80%"/>
                </radialGradient>                
                <!--</linearGradient>-->
                <radialGradient id = "g2" x1 = "50%" y1 = "0%">
                <stop stop-color = "white" offset = "0%"/>
                <!--<stop id="g2color" stop-color = "blue" offset = "0%"/>-->
                <stop id="g2color" stop-color = "blue" offset = "80%"/>
                </radialGradient>                
                </defs>
                <rect id="bandcolor" height="100%" width="100%" style="fill: gray" />

                <?php echo $mask_inside_band; ?>
                <?php echo $mask2_inside . $mask1_inside; ?>
                <text id="bandtextinside1" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathinside1" xlink:href="#MyPathInside" startOffset="0%">
                    <tspan id="front-startinside1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                    <tspan id="front-textinside1" dominant-baseline="middle"></tspan>
                    <tspan id="front-endinside1" class="fa" dominant-baseline="middle"></tspan>
                </textPath>
                </text>            
                <text id="bandtextinside2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathinside2" xlink:href="#MyPathInside" startOffset="0%">
                    <tspan id="front-startinside2" class="fa" dominant-baseline="middle"></tspan>
                    <tspan id="front-textinside2" dominant-baseline="middle"></tspan>
                    <tspan id="front-endinside2" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                </textPath>
                </text>            
                <?php echo $mask_outside_band; ?>
                <?php echo $mask2 . $mask1; ?>
                <ellipse id="maskeffect1" cx="290" cy="98" rx="50" ry="30" fill="white" opacity="0.5" filter="url(#blur)" display="none"/>

                <text id="bandtext" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpath" xlink:href="#MyPath" startOffset="50%">
                    <tspan id="front-start" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                    <tspan id="front-text" dominant-baseline="middle">TEXT</tspan>
                    <tspan id="front-end" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                </textPath>
                </text>
                <text id="bandtextcont1" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathcont1" xlink:href="#MyPath1" startOffset="0%">
                    <tspan id="front-startcont1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                    <tspan id="front-textcont1" dominant-baseline="middle"></tspan>
                    <tspan id="front-endcont1" class="fa" dominant-baseline="middle"></tspan>
                </textPath>
                </text>            
                <text id="bandtextcont2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathcont2" xlink:href="#MyPath2" startOffset="0%">
                    <tspan id="front-startcont2" class="fa" dominant-baseline="middle"></tspan>
                    <tspan id="front-textcont2" dominant-baseline="middle"></tspan>
                    <tspan id="front-endcont2" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                </textPath>
                </text>            
                <text id="bandtextcontainer" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathcontainer" xlink:href="#OrigPath" startOffset="0%">
                    <tspan id="front-startcontainer" class="fa" dominant-baseline="middle"></tspan>
                    <tspan id="front-textcontainer" dominant-baseline="middle"></tspan>
                    <tspan id="front-endcontainer" class="fa" dominant-baseline="middle"></tspan>
                </textPath>
                </text>            
                <text id="bandtextcontainer2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathcontainer2" xlink:href="#OrigPath" startOffset="0%">
                    <tspan id="front-startcontainer2" class="fa" dominant-baseline="middle"></tspan>
                    <tspan id="front-textcontainer2" dominant-baseline="middle"></tspan>
                    <tspan id="front-endcontainer2" class="fa" dominant-baseline="middle"></tspan>
                </textPath>
                </text>            
                <rect x="15" y="75" width="30" height="50" filter="url(#blurFilter)" />
                <rect x="260" y="75" width="30" height="50" filter="url(#blurFilter)" />
                <rect id="rectBackShadow" x="50" y="30" width="30" height="30" filter="url(#blurFilter)" />
                <?php // echo $mask_outside_band_gloss; ?>
                <!--<image id="imagepathinside" height="100%" width="100%" y="41" xlink:href="WRISTBAND_INSIDEPATH.png" display="none"/>-->
                <!--<image height="100%" width="100%" xlink:href="3_4.png" />-->
                <image height="100%" width="100%" xlink:href="WRISTBAND2.png" />


                <!--<use xlink:href="#MyPathInside" fill="none" stroke="blue"  />-->
                <!--<use xlink:href="#MyPathInside2" fill="none" stroke="red"  />-->
                <!--<use xlink:href="#MyPath1" fill="none" stroke="red"  />-->
                <!--<use xlink:href="#MyPathInside" fill="none" stroke="red"  />-->
                </svg>            
            </div>
        </div>

        </svg>        
        <div class="container2" style="margin: 0 auto; text-align: center;">
            <table border="1" style="width:100%">
                <tr>
                    <th colspan="2" style="width:33.333333333%"><input type="radio" name="textdesign" value="frontback" checked>Front/Back</th>
                    <th colspan="2" style="width:33.333333333%"><input type="radio" name="textdesign" value="inside">Inside Message</th>
                    <th colspan="2" style="width:33.333333333%"><input type="radio" name="textdesign" value="cont">Wrap Around</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>

                    <td><input type="radio" name="insidemessage" value="front" checked>Front View</td>
                    <td><input type="radio" name="insidemessage" value="back">Back View</td>
                    <td><input type="radio" name="wraparound" value="front" checked>Front View</td>
                    <td><input type="radio" name="wraparound" value="back">Back View</td>
                </tr> 
            </table>            
            <table border="1" style="width:100%">
                <tr>
                    <th colspan="1" style="width:10%"></th>
                    <th colspan="1" style="width:10%">Clip-art Start</th>
                    <th colspan="1" style="width:50%">Message</th>
                    <th colspan="1" style="width:10%">Font</th>
                    <th colspan="1" style="width:10%">Clip-art End</th>
                    <th colspan="1" style="width:10%">Text Color</th>
                </tr>
                <tr>
                    <td>Front/Back</td>
                    <td>
                        <select id="front-start-icon" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>                    
                    <td><input id="txtInput" size="40" type="text" name="text" placeholder="Front Message"></td>
                    <td>
                        <select id="front-font-family">
                            <option value="Arial">Arial</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Droid Sans">Droid Sans</option>
                            <option value="Droid Serif">Droid Serif</option>
                            <option value="Oswald">Oswald</option>
                            <option value="Lora">Lora</option>
                            
                        </select>                         
                    </td>
                    <td>
                        <select id="front-end-icon" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>
                    <td>
                        <select id="front-color">
                            <option value="0" selected>Clear</option>
                            <option value="white">White</option>
                            <option value="black">Black</option>
                        </select>                        
                    </td>
                </tr> 
                <tr>
                    <td>Inside</td>
                    <td>
                        <select id="front-startinside1-icon" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>
                    <td><input id="txtInputInside" size="80" type="text" name="text" placeholder="Inside Message"></td>
                    <td>
                        <select id="inside-font-family">
                            <option value="Arial">Arial</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Droid Sans">Droid Sans</option>
                            <option value="Droid Serif">Droid Serif</option>
                            <option value="Oswald">Oswald</option>
                            <option value="Lora">Lora</option>
                            
                        </select>                         
                    </td>                    
                    <td>
                        <select id="front-endinside2-icon" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>
                    <td>
                        <select id="front-color-inside">
                            <option value="0" selected>Clear</option>
                            <option value="white">White</option>
                            <option value="black">Black</option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>Continuous</td>
                    <td>
                        <select id="front-startcont1-icon" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>
                    <td><input id="txtInputCont" size="80" type="text" name="text" placeholder="Continuous Message"></td>
                    <td>
                        <select id="cont-font-family">
                            <option value="Arial">Arial</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Droid Sans">Droid Sans</option>
                            <option value="Droid Serif">Droid Serif</option>
                            <option value="Oswald">Oswald</option>
                            <option value="Lora">Lora</option>
                            
                        </select>                         
                    </td>                    
                    <td>
                        <select id="front-endcont2-icon" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>        
                    </td>
                    <td>
                        <select id="front-color-cont">
                            <option value="0" selected>Clear</option>
                            <option value="white">White</option>
                            <option value="black">Black</option>
                        </select>
                    </td>
                </tr> 
            </table>                 
            <button class="textClass" type="button" value="Imprinted">Imprinted</button>
            <button class="textClass" type="button" value="Debossed">Debossed</button>
            <button class="textClass" type="button" value="Embossed">Embossed</button>
            <!--            <br>
                        <button id="btn_ZoomIn" type="button" >+</button>
                        <button id="btn_ZoomOut" type="button" value="Debossed">-</button>
                        <button id="btn_ZoomReset" type="button" value="Embossed">Reset</button>                                  
                        <br>-->
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
                    <td><button class="solid_color" type="button" value="white" style=" background-color: white;">White</button></td>
                    <td><button class="inside_color" type="button" value="white" style=" background-color: white;">White</button></td>
                    <td><button class="outside_color" type="button" value="white" style=" background-color: white;">White</button></td>
                    <td><button class="mask1_color" type="button" value="white" style=" background-color: white;">White</button></td>
                    <td><button class="mask2_color" type="button" value="white" style=" background-color: white;">White</button></td>
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