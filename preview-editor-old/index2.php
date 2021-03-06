<?php include_once 'check_mask.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WB SVG</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="js/jquery-2.0.0.js"></script>
        <script src="js/wristbandData.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
    </head>
    <style>
        .container {
            border: 2px solid #b6bdc3;
            width:528px;
            margin: 0 auto;
        }
        .container2 {
            display: table;
            margin: 0 auto;

        }
        input { width: 100%; }
    </style>
    <script>
        WebFont.load({
            google: {
                families: ['Droid Sans', 'Droid Serif', 'Oswald', 'Lora', 'Tangerine']
            }
        });
    </script>
    <script>
        var wb = wristband;
        $(document).ready(function () {
//==================================================
//change color of the wristband - START
//==================================================
            $('.solid_color').click(function () {
                var insidesolid1 = document.getElementById("insidesolid1");
                var insidesolid2 = document.getElementById("insidesolid2");
                var outsidesolid1 = document.getElementById("outsidesolid1");
                var outsidesolid2 = document.getElementById("outsidesolid2");
                var bandcolor = document.getElementById("bandcolor");
                var bandcolor2 = document.getElementById("bandcolor2");

                insidesolid1.style.fill = $(this).val();
                insidesolid2.style.fill = $(this).val();
                outsidesolid1.style.fill = $(this).val();
                outsidesolid2.style.fill = $(this).val();
                bandcolor.style.fill = $(this).val();
                bandcolor2.style.fill = $(this).val();
                $("#gcolor").css({stopColor: $(this).val()});
            });
            $('.inside_color').click(function () {
                var insidesolid1 = document.getElementById("insidesolid1");
                var insidesolid2 = document.getElementById("insidesolid2");

                insidesolid1.style.fill = $(this).val();
                insidesolid2.style.fill = $(this).val();

            });
            $('.outside_color').click(function () {
                var outsidesolid1 = document.getElementById("outsidesolid1");
                var outsidesolid2 = document.getElementById("outsidesolid2");
                var bandcolor = document.getElementById("bandcolor");
                var bandcolor2 = document.getElementById("bandcolor2");

                outsidesolid1.style.fill = $(this).val();
                outsidesolid2.style.fill = $(this).val();
                bandcolor.style.fill = $(this).val();
                bandcolor2.style.fill = $(this).val();
            });
            $('.mask1_color').click(function () {
                var mask1_band1 = document.getElementById("mask1_band1");
                var mask1inside_band1 = document.getElementById("mask1inside_band1");
                if ('clear' === $(this).val()) {
                    mask1_band1.style.opacity = 0;
                    mask1inside_band1.style.opacity = 0;
                } else {
                    mask1_band1.style.opacity = 1;
                    mask1inside_band1.style.opacity = 1;
                    mask1_band1.style.fill = $(this).val();
                    mask1inside_band1.style.fill = $(this).val();
                }
                var mask1_band2 = document.getElementById("mask1_band2");
                var mask1inside_band2 = document.getElementById("mask1inside_band2");
                if ('clear' === $(this).val()) {
                    mask1_band2.style.opacity = 0;
                    mask1inside_band2.style.opacity = 0;
                } else {
                    mask1_band2.style.opacity = 1;
                    mask1inside_band2.style.opacity = 1;
                    mask1_band2.style.fill = $(this).val();
                    mask1inside_band2.style.fill = $(this).val();
                }
            });
            $('.mask2_color').click(function () {
                var mask2_band1 = document.getElementById("mask2_band1");
                var mask2inside_band1 = document.getElementById("mask2inside_band1");
                if ('clear' === $(this).val()) {
                    mask2_band1.style.opacity = 0;
                    mask2inside_band1.style.opacity = 0;
                } else {
                    mask2_band1.style.opacity = 1;
                    mask2inside_band1.style.opacity = 1;
                    mask2_band1.style.fill = $(this).val();
                    mask2inside_band1.style.fill = $(this).val();
                }
                var mask2_band2 = document.getElementById("mask2_band2");
                var mask2inside_band2 = document.getElementById("mask2inside_band2");
                if ('clear' === $(this).val()) {
                    mask2_band2.style.opacity = 0;
                    mask2inside_band2.style.opacity = 0;
                } else {
                    mask2_band2.style.opacity = 1;
                    mask2inside_band2.style.opacity = 1;
                    mask2_band2.style.fill = $(this).val();
                    mask2inside_band2.style.fill = $(this).val();
                }
            });
//==================================================
//change color of the wristband - END
//==================================================
//START - prevent any key long pressing
            var flag1 = 0;
            $("#txtInput1").on('keydown', function (e) {
                flag1++;
                if (flag1 > 2) {
                    e.preventDefault();
                }
            });
            $("#txtInput1").on('keyup', function (e) {
                flag1 = 0;
            });
            var flag2 = 0;
            $("#txtInput2").on('keydown', function (e) {
                flag2++;
                if (flag2 > 2) {
                    e.preventDefault();
                }
            });
            $("#txtInput2").on('keyup', function (e) {
                flag2 = 0;
            });
            var flag3 = 0;
            $("#txtInputCont").on('keydown', function (e) {
                flag3++;
                if (flag3 > 2) {
                    e.preventDefault();
                }
            });
            $("#txtInputCont").on('keyup', function (e) {
                flag3 = 0;
            });
            var flag4 = 0;
            $("#txtInputInside").on('keydown', function (e) {
                flag4++;
                if (flag4 > 2) {
                    e.preventDefault();
                }
            });
            $("#txtInputInside").on('keyup', function (e) {
                flag4 = 0;
            });
//END - prevent any key long pressing
            $("#txtInput1").attr("maxlength", 40);
            $("#txtInput2").attr("maxlength", 40);
            $("#txtInputCont").attr("maxlength", 80);
            $("#txtInputInside").attr("maxlength", 80);

            var timer = null;
            var timer2 = null;
            $('#txtInput1').keydown(function () {
                clearTimeout(timer);
                timer = setTimeout(doStuff, 1000);
            });
            


function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

            
            function doStuff() {
                var txtString = $("#txtInput1").val();
                $("#txtInput1").val('');
                for (var x = 0; x < txtString.length; x++)
                {
                    var c = txtString.charAt(x);
                    //setTimeout(displaytext(c), 50000);
//                    clearTimeout(timer2);
//                    timer2 = setTimeout(FrontMessage1(), 1000);
//                    window.setTimeout(displaytext(c), 1000); // 5 seconds
//                    setInterval(function () {
//                        displaytext(c);
//                    }, 500);
//                    setTimeout(displaytext(c),2000);
//                      window.setTimeout(displaytext(c),2000);
//                      sleep(500);
                        
                      $("#txtInput1").val($("#txtInput1").val() + c);
                        var pathLength = wb[$('input[name=wbsize]').val()]['FBPathLimit'];
                        for (x = 1; x <= 10; x++) {
                            if ($("#bandtext1")[0].getBoundingClientRect().width > pathLength) {
                                if ($("#bandtext1").val().length < '15' && parseInt($("#bandtext1").css('font-size')) > 16) {
                                    document.getElementById("bandtext1").style.fontSize = (parseInt($("#bandtext1").css('font-size')) - 1) + 'px';
//                                    $("#front-text").text($('#txtInput1').val());
                                    console.log(c);
//                                    $("#front-text").text($("#txtInput1").val() + c);
                                } else {
                                    console.log(c);
//                                    $("#front-text").text($('#txtInput1').val());
                                    $("#front-text").text($("#txtInput1").val() + c);
                                    $('#bandtext1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                                    $('#bandtext1')[0].setAttribute('textLength', '270');
                                    $('input[name=fbfront]').val($("#txtInput1").val().length);
                                    break;
                                }
                            } else {
                                break;
                            }

                        }                      
                }
//                var x = 0;
//                
//                    if (x < txtString.length) {
//                        $("#txtInput1").val($("#txtInput1").val() + txtString.charAt(x));
//                        x += 1;
//

//                    }else{
//                        return false;
//                    }
                    
                

            }
            function displaytext(c) {
                console.log(new Date());
                console.log(c);
                $("#txtInput1").val($("#txtInput1").val() + c);
//                $("#txtInput1").val(c);
            }
//            function FrontMessage1() {
            $("#txtInput1x").on('change keyup copy paste', function (e) {
                $('input[name=fbfront]').val().length;

                if ($("#txtInput1").val().length < 6) {
                    //document.getElementById("bandtext1").style.fontSize = "30px";
                    document.getElementById("bandtext1").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
                    $('#bandtext1')[0].setAttribute('lengthAdjust', '');
                    $('#bandtext1')[0].setAttribute('textLength', '');
                }
                $("#front-text").text($('#txtInput1').val());

                if (e.keyCode === 46 || e.keyCode === 8) {
                    var pathLength = wb[$('input[name=wbsize]').val()]['FBPathDelete'];
                    if ($("#txtInput1").val().length > $('input[name=fbfront]').val()) {
                        $("#front-text").text($('#txtInput1').val());
                    } else {
                        $('#bandtext1')[0].setAttribute('lengthAdjust', '');
                        $('#bandtext1')[0].setAttribute('textLength', '');
                        for (d = 1; d < 10; d++) {
                            //console.log($("#bandtext1")[0].getBoundingClientRect().width+'<'+pathLength+'|'+parseInt($("#bandtext1").css('font-size')) +'<'+ 31)
                            //if (($("#bandtext1")[0].getBoundingClientRect().width < pathLength) && (parseInt($("#bandtext1").css('font-size')) < 31)) {
                            if (($("#bandtext1")[0].getBoundingClientRect().width < pathLength) && (parseInt($("#bandtext1").css('font-size')) < (wb[$("#ddlSize").val()]['MaxFont'] + 1))) {
//                                console.log('here');
                                document.getElementById("bandtext1").style.fontSize = (parseInt($("#bandtext1").css('font-size')) + 1) + 'px';
                                $("#front-text").text($('#txtInput1').val());
                            } else {
                                break;
                            }
                        }
                    }
                } else {
                    var pathLength = wb[$('input[name=wbsize]').val()]['FBPathLimit'];
                    for (x = 1; x <= 10; x++) {
                        if ($("#bandtext1")[0].getBoundingClientRect().width > pathLength) {
                            if ($("#bandtext1").val().length < '15' && parseInt($("#bandtext1").css('font-size')) > 16) {
                                document.getElementById("bandtext1").style.fontSize = (parseInt($("#bandtext1").css('font-size')) - 1) + 'px';
                                $("#front-text").text($('#txtInput1').val());
                            } else {
                                $('#bandtext1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                                $('#bandtext1')[0].setAttribute('textLength', '270');
                                $('input[name=fbfront]').val($("#txtInput1").val().length);
                                break;
                            }
                        } else {
                            break;
                        }

                    }
                }
            });
//            }//test function pause typing
            $('#front-start-icon').change(function () {
                $('#front-start').empty().append($('#front-start-icon').val());
            });
            $("#front-end-icon").change(function () {
                $('#front-end').empty().append($('#front-end-icon').val());
            });
            $("#txtInput2").on('change keyup copy', function (e) {
                $('input[name=fbback]').val().length;
                if ($("#txtInput2").val().length < 6) {
                    //document.getElementById("bandtext2").style.fontSize = "30px";
                    document.getElementById("bandtext2").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
                    $('#bandtext2')[0].setAttribute('lengthAdjust', '');
                    $('#bandtext2')[0].setAttribute('textLength', '');
                }
                $("#front-text2").text($('#txtInput2').val());
                if (e.keyCode === 46 || e.keyCode === 8) {
                    var pathLength = wb[$('input[name=wbsize]').val()]['FBPathDelete'];
                    if ($("#txtInput2").val().length > $('input[name=fbback]').val()) {
                        $("#front-text2").text($('#txtInput2').val());
                    } else {
                        $('#bandtext2')[0].setAttribute('lengthAdjust', '');
                        $('#bandtext2')[0].setAttribute('textLength', '');
                        for (d = 1; d < 10; d++) {
                            //if (($("#bandtext2")[0].getBoundingClientRect().width < pathLength) && (parseInt($("#bandtext2").css('font-size')) < 31)) {
                            if (($("#bandtext2")[0].getBoundingClientRect().width < pathLength) && (parseInt($("#bandtext2").css('font-size')) < (wb[$("#ddlSize").val()]['MaxFont'] + 1))) {
                                document.getElementById("bandtext2").style.fontSize = (parseInt($("#bandtext2").css('font-size')) + 1) + 'px';
                                $("#front-text2").text($('#txtInput2').val());
                            } else {
                                break;
                            }
                        }
                    }
                } else {
                    var pathLength = wb[$('input[name=wbsize]').val()]['FBPathLimit'];
                    for (x = 1; x <= 10; x++) {
                        if ($("#bandtext2")[0].getBoundingClientRect().width > pathLength) {
                            if ($("#bandtext2").val().length < '15' && parseInt($("#bandtext2").css('font-size')) > 16) {
                                document.getElementById("bandtext2").style.fontSize = (parseInt($("#bandtext2").css('font-size')) - 1) + 'px';
                                $("#front-text2").text($('#txtInput2').val());
                            } else {
                                $('#bandtext2')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                                $('#bandtext2')[0].setAttribute('textLength', '270');
                                $('input[name=fbback]').val($("#txtInput2").val().length);
                                break;
                            }
                        } else {
                            break;
                        }

                    }
                }
            });
            $('#front-start-icon2').change(function () {
                $('#front-start2').empty().append($('#front-start-icon2').val());
            });
            $("#front-end-icon2").change(function () {
                $('#front-end2').empty().append($('#front-end-icon2').val());
            });
//===================================================================================================================            
//START - Change Color===============================================================================================            
//===================================================================================================================            
            $("#front-color").change(function () {
                if ('0' === $('#front-color').val()) {
                    document.getElementById("bandtext1").style.fill = '#999999';
                    document.getElementById("bandtext1").style.opacity = "0.6";
                } else {
                    document.getElementById("bandtext1").style.fill = $('#front-color').val();
                    document.getElementById("bandtext1").style.opacity = "1";
                }
            });
            $("#front-color2").change(function () {
                if ('0' === $('#front-color2').val()) {
                    document.getElementById("bandtext2").style.fill = '#999999';
                    document.getElementById("bandtext2").style.opacity = "0.6";
                } else {
                    document.getElementById("bandtext2").style.fill = $('#front-color2').val();
                    document.getElementById("bandtext2").style.opacity = "1";
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
                document.getElementById("bandtext1").style.fontFamily = $('#front-font-family').val();
            });
            $("#front-font-family2").change(function () {
                document.getElementById("bandtext2").style.fontFamily = $('#front-font-family2').val();
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
                        var cssVal = "0 0 0";
                        $("#bandtext1").css({textShadow: cssVal});
                        $("#bandtext2").css({textShadow: cssVal});
                        $("#bandtextcont1").css({textShadow: cssVal});
                        $("#bandtextcont2").css({textShadow: cssVal});
                        $("#bandtextinside1").css({textShadow: cssVal});
                        $("#bandtextinside2").css({textShadow: cssVal});
                        break;
                    case 'Debossed':
                        var cssVal = "0px -1px 1px black";
                        $("#bandtext1").css({textShadow: cssVal});
                        $("#bandtext2").css({textShadow: cssVal});
                        $("#bandtextcont1").css({textShadow: cssVal});
                        $("#bandtextcont2").css({textShadow: cssVal});
                        $("#bandtextinside1").css({textShadow: cssVal});
                        $("#bandtextinside2").css({textShadow: cssVal});
                        break;
                    case 'Embossed':
                        var cssVal = "rgba(255, 255, 255, 0.1) -2px -2px 2px, rgba(0, 0, 0, 0.5) 2px 2px 2px";
                        $("#bandtext1").css({textShadow: cssVal});
                        $("#bandtext2").css({textShadow: cssVal});
                        $("#bandtextcont1").css({textShadow: cssVal});
                        $("#bandtextcont2").css({textShadow: cssVal});
                        $("#bandtextinside1").css({textShadow: cssVal});
                        $("#bandtextinside2").css({textShadow: cssVal});
                        break;
                    default:
                        var cssVal = "0 0 0";
                        $("#bandtext1").css({textShadow: cssVal});
                        $("#bandtext2").css({textShadow: cssVal});
                        $("#bandtextcont1").css({textShadow: cssVal});
                        $("#bandtextcont2").css({textShadow: cssVal});
                        $("#bandtextinside1").css({textShadow: cssVal});
                        $("#bandtextinside2").css({textShadow: cssVal});
                }
            });


            $('#btnSave').click(function () {

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "ajax_save.php",
                    data: {front: $("#container").html()},
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
            function showbackshadow() {
                $("#rectBackShadow").removeAttr("display");
            }
            function hidebackshadow() {
                $("#rectBackShadow").attr("display", "none");
            }
            function enableWrapped() {

                $('#bandtextcont1')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextcont1')[0].setAttribute('textLength', '280');
                $('#bandtextcont1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtextpathcont1')[0].setAttribute('startOffset', '50%');

                $('#bandtextcont2')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextcont2')[0].setAttribute('textLength', '280');
                $('#bandtextcont2')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtextpathcont2')[0].setAttribute('startOffset', '50%');
            }
            function enableWrapped2() {
                $('#bandtextinside1')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextinside1')[0].setAttribute('textLength', '280');
                $('#bandtextinside1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtextpathinside1')[0].setAttribute('startOffset', '50%');

                $('#bandtextinside2')[0].setAttribute('text-anchor', 'middle');
                $('#bandtextinside2')[0].setAttribute('textLength', '280');
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
                    $("#outsidesolid1").removeAttr("display");
                    $("#outsidesolid2").removeAttr("display");
                    $("#mask1_band1").removeAttr("display");
                    $("#mask2_band1").removeAttr("display");
                    $("#mask1_band2").removeAttr("display");
                    $("#mask2_band2").removeAttr("display");

                    $("#bandtext1").removeAttr("display");
                    $("#bandtext2").removeAttr("display");
                    $("#bandtextcont1").attr("display", "none");
                    $("#bandtextcont2").attr("display", "none");

                    $("#imagepathinside").attr("display", "none");
                    hidebackshadow();
                } else if (design === 'cont') {
                    $("#outsidesolid1").removeAttr("display");
                    $("#outsidesolid2").removeAttr("display");
                    $("#mask1_band1").removeAttr("display");
                    $("#mask2_band1").removeAttr("display");
                    $("#mask1_band2").removeAttr("display");
                    $("#mask2_band2").removeAttr("display");

                    $("#bandtextcont1").removeAttr("display");
                    $("#bandtextcont2").removeAttr("display");
                    $("#bandtext1").attr("display", "none");
                    $("#bandtext2").attr("display", "none");
                    $("#imagepathinside").attr("display", "none");
                    hidebackshadow();
                } else {
                    $("#outsidesolid1").attr("display", "none");
                    $("#outsidesolid2").attr("display", "none");
                    $("#mask1_band1").attr("display", "none");
                    $("#mask2_band1").attr("display", "none");
                    $("#mask1_band2").attr("display", "none");
                    $("#mask2_band2").attr("display", "none");

                    $("#bandtext1").attr("display", "none");
                    $("#bandtext2").attr("display", "none");
                    $("#bandtextcont1").attr("display", "none");
                    $("#bandtextcont2").attr("display", "none");
                    $("#bandtextinside1").removeAttr("display");
                    $("#bandtextinside2").removeAttr("display");
                    hidebackshadow();

                }
                getImageToDisplay();
            });
            $("#front-startcont1-icon").change(function () {
                $('#front-startcont1').empty().append($('#front-startcont1-icon').val());
            });
            $("#front-endcont2-icon").change(function () {
                if ($('input[name=isWrapCont]').val() === '1') {
                    $('#front-endcont2').empty().append($('#front-endcont2-icon').val());
                } else {
                    $('#front-endcont1').empty().append($('#front-endcont2-icon').val());
                }

            });
            $("#txtInputCont").on('change keyup copy', function (e) {
                if ($("#txtInputCont").val().length < $('input[name=textcount]').val().length + 1) {
                    $("#front-textcont2").text('');
                    disableWrapped();
                }
                $("#front-textcontainer").text($('#txtInputCont').val());
                if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '750') {

                    enableWrapped();
                    $("#front-textcont1").text($('#txtInputCont').val().substring(0, Math.ceil($("#txtInputCont").val().length / 2)));
                    $("#front-textcont2").text($('#txtInputCont').val().substring((Math.ceil($("#txtInputCont").val().length / 2) - 1), $("#txtInputCont").val().length));
                }
                else {
                    disableWrapped();
                    //if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '715') {
                    if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '480') {

                        $("#front-endcont2").empty().append($("#front-endcont2-icon :selected").text());
                        $("#front-endcont1").empty();
                        $('input[name=isWrapCont]').val('1');

                        var span_textcont1 = $('input[name=textcount]').val().length;
                        $("#front-textcont2").text($('#txtInputCont').val().substring(span_textcont1 - 1, $("#txtInputCont").val().length));

                    } else {
                        $("#front-endcont1").empty().append($("#front-endcont2-icon :selected").text());
                        $("#front-endcont2").empty();
                        $('input[name=isWrapCont]').val('0');

                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                        $('input[name=textcount]').val($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                    }

                }
            });

            $("#front-startinside1-icon").change(function () {
                $('#front-startinside1').empty().append($('#front-startinside1-icon').val());
            });
            $("#front-endinside2-icon").change(function () {
                if ($('input[name=isWrapInside]').val() === '1') {
                    $('#front-endinside2').empty().append($('#front-endinside2-icon').val());
                } else {
                    $('#front-endinside1').empty().append($('#front-endinside2-icon').val());
                }
            });
            $("#txtInputInside").on('change keyup copy', function (e) {
                if ($("#txtInputInside").val().length < $('input[name=textinside]').val().length + 1) {
                    $("#front-textinside2").text('');
                    disableWrapped2();
                }
                $("#front-textcontainer2").text($('#txtInputInside').val());
                if ($("#bandtextcontainer2")[0].getBoundingClientRect().width > '750') {

                    enableWrapped2();

                    $("#front-textinside1").text($('#txtInputInside').val().substring(0, Math.ceil($("#txtInputInside").val().length / 2)));
                    $("#front-textinside2").text($('#txtInputInside').val().substring((Math.ceil($("#txtInputInside").val().length / 2) - 1), $("#txtInputInside").val().length));
                }
                else {
                    disableWrapped2();
                    if ($("#bandtextcontainer2")[0].getBoundingClientRect().width > '480') {
                        $("#front-endinside2").empty().append($("#front-endinside2-icon :selected").text());
                        $("#front-endinside1").empty();
                        $('input[name=isWrapInside]').val('1');

                        var span_textinside1 = $('input[name=textinside]').val().length;
                        $("#front-textinside2").text($('#txtInputInside').val().substring(span_textinside1 - 1, $("#txtInputInside").val().length));
                    } else {
                        $("#front-endinside1").empty().append($("#front-endinside2-icon :selected").text());
                        $("#front-endinside2").empty();
                        $('input[name=isWrapInside]').val('0');

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
                        $('#container').animate({'zoom': currentZoom += .1}, 'slow');
                    });
            $('#btn_ZoomOut').click(
                    function () {
                        $('#container').animate({'zoom': currentZoom -= .1}, 'slow');
                    });
            $('#btn_ZoomReset').click(
                    function () {
                        currentZoom = 1.0;
                        $('#container').animate({'zoom': 1}, 'slow');
                    });
        });
    </script>
    <body>
        <input type="hidden" name="wbsize" value="2">
        <input type="hidden" name="fbfront" value="0">
        <input type="hidden" name="fbback" value="0">
        <input type="hidden" name="textcount" value="0">
        <input type="hidden" name="textcount2" value="0">
        <input type="hidden" name="textinside" value="0">
        <input type="hidden" name="isWrapCont" value="0">
        <input type="hidden" name="isWrapInside" value="0">
        <div class="container">
            <svg id="svgelement" viewBox="0 0 300 113" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
            <path id="ContainerPath" fill-opacity="0" d="M0 0 q 80 -18 444 -2"/>
            <path id="MyPath1" fill-opacity="0" d="M15 75 q 125 23 270 -2"/>
            <path id="MyPath2" fill-opacity="0" d="M15 75 q 125 23 270 -2"/>
            <path id="MyPathCont1" fill-opacity="0" d="M15 78 q 125 23 280 -4"/>
            <path id="MyPathCont2" fill-opacity="0" d="M8 77 q 130 25 280 -2"/>
            <path id="MyPathInside1" fill-opacity="0" d="M15 60 q 80 -18 270 -1.5"/>
            <path id="MyPathInside2" fill-opacity="0" d="M15 60 q 80 -18 270 -1.5"/>
            <path id="InsideArc" fill-opacity="0" d="M15 68 q 125 15 270 -2"/>

            <filter id="blurSideShadow" x="-20" y="-20" width="200" height="200">
                <feGaussianBlur in="SourceAlpha" stdDeviation="20" />
            </filter>
            </defs>
            <rect id="bandcolor" height="100%" width="100%" style="fill: gray" />
            <?php echo $mask_inside_band1; ?>
            <?php // $mask1_inside; ?>            
            <?php echo $mask2_inside_band1 . $mask1_inside_band1; ?>            
            <text id="bandtextinside1" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathinside1" xlink:href="#MyPathInside1" startOffset="0%">
                <tspan id="front-startinside1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                <tspan id="front-textinside1" dominant-baseline="middle"></tspan>
                <tspan id="front-endinside1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
            </textPath>
            </text>
            <?php echo $mask_outside_band1; ?>
            <?php // echo $mask1; ?>            
            <?php echo $mask2_band1 . $mask1_band1; ?>            
            <text id="bandtext1" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpath" xlink:href="#MyPath1" startOffset="50%">
                <tspan id="front-start" class="fa" dominant-baseline="middle">&#xf17c;</tspan>
                <tspan id="front-text" dominant-baseline="middle">GWP</tspan>
                <tspan id="front-end" class="fa" dominant-baseline="middle">&#xf11c;</tspan>
            </textPath>
            </text>
            <text id="bandtextcont1" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathcont1" xlink:href="#MyPathCont1" startOffset="0%">
                <tspan id="front-startcont1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                <tspan id="front-textcont1" dominant-baseline="middle"></tspan>
                <tspan id="front-endcont1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
            </textPath>
            </text>

            <rect x="0" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
            <rect x="275" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
            <image  id="img1_1" height="100%" width="100%" xlink:href="1.png" display="none"/>
            <image  id="img1_1_2" height="100%" width="100%" xlink:href="1_2.png" display="none"/>
            <image  id="img1_3_4" height="100%" width="100%" xlink:href="3_4.png" />
            <image  id="img1_1_4" height="100%" width="100%" xlink:href="1_4.png" display="none"/>
            <image  id="no_arc_img1_1" height="100%" width="100%" xlink:href="no_arc_1.png" display="none"/>
            <image  id="no_arc_img1_1_2" height="100%" width="100%" xlink:href="no_arc_1_2.png" display="none"/>
            <image  id="no_arc_img1_3_4" height="100%" width="100%" xlink:href="no_arc_3_4.png" />
            <image  id="no_arc_img1_1_4" height="100%" width="100%" xlink:href="no_arc_1_4.png" display="none"/>

            <use id="arc1" xlink:href="#InsideArc" stroke-dasharray="5, 5" stroke="black" display="none"/>
            <!--<use xlink:href="#MyPathCont1" fill="none" stroke="blue"  />-->
            <!--<use xlink:href="#MyPathInside1" fill="none" stroke="green"  />-->

            </svg>
            <svg id="svgelement" viewBox="0 0 300 113" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <rect id="bandcolor2" height="100%" width="100%" style="fill: gray" />
            <?php echo $mask_inside_band2; ?>
            <?php echo $mask2_inside_band2 . $mask1_inside_band2; ?>   
            <text id="bandtextinside2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathinside2" xlink:href="#MyPathInside2" startOffset="0%">
                <tspan id="front-startinside2" class="fa" dominant-baseline="middle"></tspan>
                <tspan id="front-textinside2" dominant-baseline="middle"></tspan>
                <tspan id="front-endinside2" class="fa" dominant-baseline="middle"></tspan>
            </textPath>
            </text>
            <?php echo $mask_outside_band2; ?>
            <?php echo $mask2_band2 . $mask1_band2; ?>            
            <text id="bandtext2" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpath2" xlink:href="#MyPath2" startOffset="50%">
                <tspan id="front-start2" class="fa" dominant-baseline="middle">&#xf17c;</tspan>
                <tspan id="front-text2" dominant-baseline="middle">GWP</tspan>
                <tspan id="front-end2" class="fa" dominant-baseline="middle">&#xf11c;</tspan>
            </textPath>
            </text>
            <text id="bandtextcont2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathcont2" xlink:href="#MyPathCont2" startOffset="0%">
                <tspan id="front-startcont2" class="fa" dominant-baseline="middle"></tspan>
                <tspan id="front-textcont2" dominant-baseline="middle"></tspan>
                <!--<tspan id="front-endcont2" class="fa" dominant-baseline="middle">&#xf096;</tspan>-->
                <tspan id="front-endcont2" class="fa" dominant-baseline="middle"></tspan>
            </textPath>
            </text>

            <text id="bandtextcontainer" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathcontainer" xlink:href="#ContainerPath" startOffset="0%">
                <tspan id="front-startcontainer" class="fa" dominant-baseline="middle"></tspan>
                <tspan id="front-textcontainer" dominant-baseline="middle"></tspan>
                <tspan id="front-endcontainer" class="fa" dominant-baseline="middle"></tspan>
            </textPath>
            </text>            
            <text id="bandtextcontainer2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
            <textPath id="bandtextpathcontainer2" xlink:href="#ContainerPath" startOffset="0%">
                <tspan id="front-startcontainer2" class="fa" dominant-baseline="middle"></tspan>
                <tspan id="front-textcontainer2" dominant-baseline="middle"></tspan>
                <tspan id="front-endcontainer2" class="fa" dominant-baseline="middle"></tspan>
            </textPath>
            </text>
            <rect x="0" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
            <rect x="275" y="15" width="30" height="120" filter="url(#blurSideShadow)" />
            <image  id="img2_1" height="100%" width="100%" xlink:href="1.png" display="none"/>
            <image  id="img2_1_2" height="100%" width="100%" xlink:href="1_2.png" display="none"/>
            <image  id="img2_3_4" height="100%" width="100%" xlink:href="3_4.png" />
            <image  id="img2_1_4" height="100%" width="100%" xlink:href="1_4.png" display="none"/>
            <image  id="no_arc_img2_1" height="100%" width="100%" xlink:href="no_arc_1.png" display="none"/>
            <image  id="no_arc_img2_1_2" height="100%" width="100%" xlink:href="no_arc_1_2.png" display="none"/>
            <image  id="no_arc_img2_3_4" height="100%" width="100%" xlink:href="no_arc_3_4.png" />
            <image  id="no_arc_img2_1_4" height="100%" width="100%" xlink:href="no_arc_1_4.png" display="none"/>

            <use id="arc2" xlink:href="#InsideArc" stroke-dasharray="5, 5" stroke="black" display="none"/>
            <!--<use xlink:href="#MyPath2" fill="none" stroke="red"  />-->
            <!--<use xlink:href="#MyPathCont2" fill="none" stroke="blue"  />-->
            <!--<use xlink:href="#MyPathInside2" fill="none" stroke="green"  />-->

            </svg>            
        </div>
        <div class="container2" style="margin: 0 auto; text-align: center;">
            <p>Change Wristband Size
                <select id="ddlSize">
                    <option value="0">1 Inch</option>
                    <option value="1">1/2 Inch</option>
                    <option value="2" selected>3/4 Inch</option>
                    <option value="3">1/4 Inch</option>
                </select></p>
            <table border="1" style="width:100%">
                <tr>
                    <th colspan="2" style="width:33.333333333%"><input type="radio" name="textdesign" value="frontback" checked>Front/Back</th>
                    <th colspan="2" style="width:33.333333333%"><input type="radio" name="textdesign" value="inside">Inside Message</th>
                    <th colspan="2" style="width:33.333333333%"><input type="radio" name="textdesign" value="cont">Wrap Around</th>
                </tr>
<!--                <tr>
                    <td></td>
                    <td></td>

                    <td><input type="radio" name="insidemessage" value="front" checked>Front View</td>
                    <td><input type="radio" name="insidemessage" value="back">Back View</td>
                    <td><input type="radio" name="wraparound" value="front" checked>Front View</td>
                    <td><input type="radio" name="wraparound" value="back">Back View</td>
                </tr> -->
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
                    <td>Front</td>
                    <td>
                        <select id="front-start-icon" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>                    
                    <td><input id="txtInput1" size="40" type="text" name="text" placeholder="Front Message"></td>
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
                    <td>Back</td>
                    <td>
                        <select id="front-start-icon2" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>                    
                    <td><input id="txtInput2" size="40" type="text" name="text" placeholder="Back Message"></td>
                    <td>
                        <select id="front-font-family2">
                            <option value="Arial">Arial</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Droid Sans">Droid Sans</option>
                            <option value="Droid Serif">Droid Serif</option>
                            <option value="Oswald">Oswald</option>
                            <option value="Lora">Lora</option>

                        </select>                         
                    </td>
                    <td>
                        <select id="front-end-icon2" class="fa">
                            <option class="fa" value="&#xf17c;">&#xf17c;</option>
                            <option class="fa" value="&#xf11c;">&#xf11c;</option>
                            <option class="fa" value="&#xf1d8;">&#xf1d8;</option>
                            <option class="fa" value="&#xf1ba;">&#xf1ba;</option>
                        </select>                        
                    </td>
                    <td>
                        <select id="front-color2">
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



    </body>
</html> 
<script>
    function changeFontSize() {
        document.getElementById("bandtext1").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
        document.getElementById("bandtext2").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
    }
    function getImageToDisplay() {
        var textdesign = $('input[name=textdesign]').filter(':checked').val();
        var size = $("#ddlSize").val();
        $("#img1_1").attr("display", "none");
        $("#img1_1_2").attr("display", "none");
        $("#img1_3_4").attr("display", "none");
        $("#img1_1_4").attr("display", "none");
        $("#img2_1").attr("display", "none");
        $("#img2_1_2").attr("display", "none");
        $("#img2_3_4").attr("display", "none");
        $("#img2_1_4").attr("display", "none");
        $("#arc1").attr("display", "none");

        $("#no_arc_img1_1").attr("display", "none");
        $("#no_arc_img1_1_2").attr("display", "none");
        $("#no_arc_img1_3_4").attr("display", "none");
        $("#no_arc_img1_1_4").attr("display", "none");
        $("#no_arc_img2_1").attr("display", "none");
        $("#no_arc_img2_1_2").attr("display", "none");
        $("#no_arc_img2_3_4").attr("display", "none");
        $("#no_arc_img2_1_4").attr("display", "none");
        $("#arc2").attr("display", "none");

        if (textdesign !== 'inside') {
            $("#img1_" + wb[size]['ImgSource']).removeAttr("display");
            $("#img2_" + wb[size]['ImgSource']).removeAttr("display");
        } else {
            $("#no_arc_img1_" + wb[size]['ImgSource']).removeAttr("display");
            $("#no_arc_img2_" + wb[size]['ImgSource']).removeAttr("display");

            $('#InsideArc')[0].setAttribute('d', wb[size]['InsideArc']);
            $("#arc1").removeAttr("display");
            $("#arc2").removeAttr("display");
        }
    }
    function changeSwirlSize(size) {
        //band1
        $('#m1b1_p1')[0].setAttribute('d', wb[size]['OutMask1']['Path1']);
        $('#m1b1_p2')[0].setAttribute('d', wb[size]['OutMask1']['Path2']);
        $('#m1b1_p3')[0].setAttribute('d', wb[size]['OutMask1']['Path3']);
        $('#m1b1i_p1')[0].setAttribute('d', wb[size]['InMask1']['Path1']);
        $('#m1b1i_p2')[0].setAttribute('d', wb[size]['InMask1']['Path2']);
        $('#m1b1i_p3')[0].setAttribute('d', wb[size]['InMask1']['Path3']);
        $('#m2b1_p1')[0].setAttribute('d', wb[size]['OutMask2']['Path1']);
        $('#m2b1_p2')[0].setAttribute('d', wb[size]['OutMask2']['Path2']);
        $('#m2b1_p3')[0].setAttribute('d', wb[size]['OutMask2']['Path3']);
        $('#m2b1i_p1')[0].setAttribute('d', wb[size]['InMask2']['Path1']);
        $('#m2b1i_p2')[0].setAttribute('d', wb[size]['InMask2']['Path2']);
        $('#m2b1i_p3')[0].setAttribute('d', wb[size]['InMask2']['Path3']);
        //band2
        $('#m1b2_p1')[0].setAttribute('d', wb[size]['OutMask1']['Path1']);
        $('#m1b2_p2')[0].setAttribute('d', wb[size]['OutMask1']['Path2']);
        $('#m1b2_p3')[0].setAttribute('d', wb[size]['OutMask1']['Path3']);
        $('#m1b2i_p1')[0].setAttribute('d', wb[size]['InMask1']['Path1']);
        $('#m1b2i_p2')[0].setAttribute('d', wb[size]['InMask1']['Path2']);
        $('#m1b2i_p3')[0].setAttribute('d', wb[size]['InMask1']['Path3']);
        $('#m2b2_p1')[0].setAttribute('d', wb[size]['OutMask2']['Path1']);
        $('#m2b2_p2')[0].setAttribute('d', wb[size]['OutMask2']['Path2']);
        $('#m2b2_p3')[0].setAttribute('d', wb[size]['OutMask2']['Path3']);
        $('#m2b2i_p1')[0].setAttribute('d', wb[size]['InMask2']['Path1']);
        $('#m2b2i_p2')[0].setAttribute('d', wb[size]['InMask2']['Path2']);
        $('#m2b2i_p3')[0].setAttribute('d', wb[size]['InMask2']['Path3']);

    }
    $(document).ready(function () {

        $("#ddlSize").change(function () {
            var size = $(this).val();
            //changeFontSize();
            //START - code for wristband image
            getImageToDisplay();

            $('#MyPath1')[0].setAttribute('d', wb[size]['FBPath1']);
            $('#MyPath2')[0].setAttribute('d', wb[size]['FBPath2']);
            $('#MyPathInside1')[0].setAttribute('d', wb[size]['InPath1']);
            $('#MyPathInside2')[0].setAttribute('d', wb[size]['InPath2']);
            $('#MyPathCont1')[0].setAttribute('d', wb[size]['WrapPath1']);
            $('#MyPathCont2')[0].setAttribute('d', wb[size]['WrapPath2']);
            //END - code for wristband image
            //START - code for wristband solid color (svg)
            $('#insidesolidpath1')[0].setAttribute('d', wb[size]['InsideSolid']);
            $('#insidesolidpath2')[0].setAttribute('d', wb[size]['InsideSolid']);
            $('#outsidesolidpath1')[0].setAttribute('d', wb[size]['OutsideSolid']);
            $('#outsidesolidpath2')[0].setAttribute('d', wb[size]['OutsideSolid']);

            changeSwirlSize(size);
            //END - code for wristband solid color (svg)
        });

    });
</script>