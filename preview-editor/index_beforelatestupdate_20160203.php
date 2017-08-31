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
        .wbdiv {
            width:528px;
            margin: 0 auto;      
        }
        .containersvg1{
            width:100%;
            height: 200px;
            margin: 0 auto;
        }
        .containersvg2{
            width:100%;
            height: 200px;
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
        //var timer, timeout = 750;
        var timer, timeout = 300;
        var wb = wristband;

        new function ($) {
            $.fn.getCursorPosition = function () {
                var pos = 0;
                var el = $(this).get(0);
                // IE Support
                if (document.selection) {
                    el.focus();
                    var Sel = document.selection.createRange();
                    var SelLength = document.selection.createRange().text.length;
                    Sel.moveStart('character', -el.value.length);
                    pos = Sel.text.length - SelLength;
                }
                // Firefox support
                else if (el.selectionStart || el.selectionStart == '0')
                    pos = el.selectionStart;
                return pos;
            }
        }(jQuery);
        function setSelectionRange(input, selectionStart, selectionEnd) {
            if (input.setSelectionRange) {
                input.focus();
                input.setSelectionRange(selectionStart, selectionEnd);
            } else if (input.createTextRange) {
                var range = input.createTextRange();
                range.collapse(true);
                range.moveEnd('character', selectionEnd);
                range.moveStart('character', selectionStart);
                range.select();
            }
        }
        function setCaretToPos(input, pos) {
            setSelectionRange(input, pos, pos);
        }
        $(document).ready(function () {
            //alert($('.wbdiv').width());
//==================================================
//change color of the wristband - START
//==================================================
            function disableGlow() {
                $('#cboxglow').attr('checked', false);
                enableGlow();
            }
            function enableGlow() {
                var glow1 = document.getElementById("glow1");
                var glow2 = document.getElementById("glow2");

                if ($('#cboxglow').is(':checked') === true) {
                    glow1.style.opacity = 1;
                    glow2.style.opacity = 1;
                } else {
                    glow1.style.opacity = 0;
                    glow2.style.opacity = 0;
                }
            }
            $('#cboxglow').click(function () {
                enableGlow();
            });
            $('.solid_color').click(function () {

                hideAllColor();
                var insidesolid1 = document.getElementById("insidesolid1");
                var insidesolid2 = document.getElementById("insidesolid2");
                var outsidesolid1 = document.getElementById("outsidesolid1");
                var outsidesolid2 = document.getElementById("outsidesolid2");
                var bandcolor = document.getElementById("bandcolor");
                var bandcolor2 = document.getElementById("bandcolor2");

                insidesolid1.style.opacity = 1;
                insidesolid2.style.opacity = 1;
                outsidesolid1.style.opacity = 1;
                outsidesolid2.style.opacity = 1;
                bandcolor.style.opacity = 1;
                bandcolor2.style.opacity = 1;

                insidesolid1.style.fill = $(this).data('color');
                insidesolid2.style.fill = $(this).data('color');
                outsidesolid1.style.fill = $(this).data('color');
                outsidesolid2.style.fill = $(this).data('color');
                bandcolor.style.fill = $(this).data('color');
                bandcolor2.style.fill = $(this).data('color');

                $("#gcolor").css({stopColor: $(this).data('color')});
            });
            $('.inside_color').click(function () {
                disableGlow();
//                hideAllColor();
                var insidesolid1 = document.getElementById("insidesolid1");
                var insidesolid2 = document.getElementById("insidesolid2");

                insidesolid1.style.fill = $(this).data('color');
                insidesolid2.style.fill = $(this).data('color');

            });
            $('.outside_color').click(function () {
                disableGlow();
//                hideAllColor();
                var outsidesolid1 = document.getElementById("outsidesolid1");
                var outsidesolid2 = document.getElementById("outsidesolid2");
                var bandcolor = document.getElementById("bandcolor");
                var bandcolor2 = document.getElementById("bandcolor2");

                outsidesolid1.style.fill = $(this).data('color');
                outsidesolid2.style.fill = $(this).data('color');
                bandcolor.style.fill = $(this).data('color');
                bandcolor2.style.fill = $(this).data('color');
            });
            $('.mask1_color').click(function () {
                disableGlow();
                var mask1_band1 = document.getElementById("mask1_band1");
                var mask1inside_band1 = document.getElementById("mask1inside_band1");
                if ('clear' === $(this).data('color')) {
                    mask1_band1.style.opacity = 0;
                    mask1inside_band1.style.opacity = 0;
                } else {
                    mask1_band1.style.opacity = 1;
                    mask1inside_band1.style.opacity = 1;
                    mask1_band1.style.fill = $(this).data('color');
                    mask1inside_band1.style.fill = $(this).data('color');
                }
                var mask1_band2 = document.getElementById("mask1_band2");
                var mask1inside_band2 = document.getElementById("mask1inside_band2");
                if ('clear' === $(this).data('color')) {
                    mask1_band2.style.opacity = 0;
                    mask1inside_band2.style.opacity = 0;
                } else {
                    mask1_band2.style.opacity = 1;
                    mask1inside_band2.style.opacity = 1;
                    mask1_band2.style.fill = $(this).data('color');
                    mask1inside_band2.style.fill = $(this).data('color');
                }
            });
            $('.mask2_color').click(function () {
                disableGlow();
                var mask2_band1 = document.getElementById("mask2_band1");
                var mask2inside_band1 = document.getElementById("mask2inside_band1");
                if ('clear' === $(this).data('color')) {
                    mask2_band1.style.opacity = 0;
                    mask2inside_band1.style.opacity = 0;
                } else {
                    mask2_band1.style.opacity = 1;
                    mask2inside_band1.style.opacity = 1;
                    mask2_band1.style.fill = $(this).data('color');
                    mask2inside_band1.style.fill = $(this).data('color');
                }
                var mask2_band2 = document.getElementById("mask2_band2");
                var mask2inside_band2 = document.getElementById("mask2inside_band2");
                if ('clear' === $(this).data('color')) {
                    mask2_band2.style.opacity = 0;
                    mask2inside_band2.style.opacity = 0;
                } else {
                    mask2_band2.style.opacity = 1;
                    mask2inside_band2.style.opacity = 1;
                    mask2_band2.style.fill = $(this).data('color');
                    mask2inside_band2.style.fill = $(this).data('color');
                }
            });
            $('.segmented_color').click(function () {
                disableGlow();
                hideAllColor();
                var segcolor1_band1 = document.getElementById("segcolor1_band1");
                var segcolor2_band1 = document.getElementById("segcolor2_band1");
                var segcolor3_band1 = document.getElementById("segcolor3_band1");
                var segcolor1_band2 = document.getElementById("segcolor1_band2");
                var segcolor2_band2 = document.getElementById("segcolor2_band2");
                var segcolor3_band2 = document.getElementById("segcolor3_band2");
                var segcolor1_cover_band1 = document.getElementById("segcolor1_cover_band1");
                var segcolor2_cover_band1 = document.getElementById("segcolor2_cover_band1");
                var segcolor1_cover_band2 = document.getElementById("segcolor1_cover_band2");
                var segcolor2_cover_band2 = document.getElementById("segcolor2_cover_band2");
                var colors = $(this).data('color').split(",");
//                alert(colors[0] + '|' + colors[1] + '|' + colors[2]);

                if (colors.length === 3) {
                    segcolor3_band1.style.opacity = 1;
                    segcolor3_band1.style.fill = colors[1];

                    segcolor3_band2.style.opacity = 1;
                    segcolor3_band2.style.fill = colors[1];

                    colors[1] = colors[2];
                } else {
                    segcolor3_band1.style.opacity = 0;
                    segcolor3_band2.style.opacity = 0;
                }


                segcolor1_band1.style.opacity = 1;
                segcolor1_band1.style.fill = colors[0];
                segcolor1_cover_band1.style.opacity = 1;
                segcolor1_cover_band1.style.fill = colors[0];

                segcolor2_band1.style.opacity = 1;
                segcolor2_band1.style.fill = colors[1];
                segcolor2_cover_band1.style.opacity = 1;
                segcolor2_cover_band1.style.fill = colors[1];

                segcolor1_band2.style.opacity = 1;
                segcolor1_band2.style.fill = colors[1];
                segcolor1_cover_band2.style.opacity = 1;
                segcolor1_cover_band2.style.fill = colors[1];

                segcolor2_band2.style.opacity = 1;
                segcolor2_band2.style.fill = colors[0];
                segcolor2_cover_band2.style.opacity = 1;
                segcolor2_cover_band2.style.fill = colors[0];

            });
            function hideAllColor() {
                var insidesolid1 = document.getElementById("insidesolid1");
                var insidesolid2 = document.getElementById("insidesolid2");
                var outsidesolid1 = document.getElementById("outsidesolid1");
                var outsidesolid2 = document.getElementById("outsidesolid2");
                var bandcolor = document.getElementById("bandcolor");
                var bandcolor2 = document.getElementById("bandcolor2");
                var mask1_band1 = document.getElementById("mask1_band1");
                var mask1inside_band1 = document.getElementById("mask1inside_band1");
                var mask2_band1 = document.getElementById("mask2_band1");
                var mask2inside_band1 = document.getElementById("mask2inside_band1");

                var segcolor1_band1 = document.getElementById("segcolor1_band1");
                var segcolor2_band1 = document.getElementById("segcolor2_band1");
                var segcolor3_band1 = document.getElementById("segcolor3_band1");
                var segcolor1_band2 = document.getElementById("segcolor1_band2");
                var segcolor2_band2 = document.getElementById("segcolor2_band2");
                var segcolor3_band2 = document.getElementById("segcolor3_band2");
                var segcolor1_cover_band1 = document.getElementById("segcolor1_cover_band1");
                var segcolor2_cover_band1 = document.getElementById("segcolor2_cover_band1");
                var segcolor1_cover_band2 = document.getElementById("segcolor1_cover_band2");
                var segcolor2_cover_band2 = document.getElementById("segcolor2_cover_band2");


                insidesolid1.style.opacity = 0;
                insidesolid2.style.opacity = 0;
                outsidesolid1.style.opacity = 0;
                outsidesolid2.style.opacity = 0;
                bandcolor.style.opacity = 0;
                bandcolor2.style.opacity = 0;
                mask1_band1.style.opacity = 0;
                mask1inside_band1.style.opacity = 0;
                mask2_band1.style.opacity = 0;
                mask2inside_band1.style.opacity = 0;

                segcolor1_band1.style.opacity = 0;
                segcolor2_band1.style.opacity = 0;
                segcolor3_band1.style.opacity = 0;
                segcolor1_band2.style.opacity = 0;
                segcolor2_band2.style.opacity = 0;
                segcolor3_band2.style.opacity = 0;
                segcolor1_cover_band1.style.opacity = 0;
                segcolor2_cover_band1.style.opacity = 0;
                segcolor1_cover_band2.style.opacity = 0;
                segcolor2_cover_band2.style.opacity = 0;
            }
//==================================================
//change color of the wristband - END
//==================================================
            $("#txtInput1").attr("maxlength", 40);
            $("#txtInput2").attr("maxlength", 40);
            $("#txtInputCont").attr("maxlength", 80);
            $("#txtInputInside").attr("maxlength", 80);
            $("#txtInput1").on('custom', function (e, cpos) {
                var txtlen = $("#txtInput1").val().length;
                if (txtlen < 6) {
                    document.getElementById("bandtext1").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
                    $('#bandtext1')[0].setAttribute('lengthAdjust', '');
                    $('#bandtext1')[0].setAttribute('textLength', '');
                    $('input[name=lengthAdjustFlagBand1]').val(0);
                }
                $("#front-text").text($('#txtInput1').val());
                if (($("#bandtext1")[0].getBoundingClientRect().width > (wb[$('input[name=wbsize]').val()][$('.wbdiv').width()]['FBPathLimit'])) && (parseInt($("#bandtext1").css('font-size')) > 9)) {
                    $('#bandtext1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                    $('#bandtext1')[0].setAttribute('textLength', '270');
                    $('input[name=lengthAdjustFlagBand1]').val(1);
                }
                if ($('input[name=lengthAdjustFlagBand1]').val() === '1') {
                    document.getElementById("bandtext1").style.fontSize = (wb[$("#ddlSize").val()]['MaxFont'] - (0.5 * $("#txtInput1").val().length)) + 'px';
                    $("#front-text").text($('#txtInput1').val());
                }
                setCaretToPos(document.getElementById("txtInput1"), cpos);
            });
            $("#txtInput1").on('paste keyup', function (e) {

                if (typeof timer !== undefined) {
                    clearTimeout(timer);
                }
                $("#status").html("Typing ...").css("color", "#009900");
                timer = setTimeout(function () {
                    $("#status").html("Stopped").css("color", "#990000");
                    setTimeout(function () {
                        var cpos = $("#txtInput1").getCursorPosition();
                        var tmpString = $("#txtInput1").val();
                        $("#txtInput1").val('');
                        for (var x = 0; x < tmpString.length; x++)
                        {
                            $("#txtInput1").val($("#txtInput1").val() + tmpString.charAt(x));
                            $("#txtInput1").trigger("custom", [cpos]);
                        }
                        if (tmpString.length === 0) {
                            $("#txtInput1").trigger("custom", [cpos]);
                        }
                    }, 100);
                }, timeout);
            });
            $('#front-start-icon').change(function () {
                $('#front-start').empty().append($('#front-start-icon').val());
            });
            $("#front-end-icon").change(function () {
                $('#front-end').empty().append($('#front-end-icon').val());
            });
            $("#txtInput2").on('custom', function (e, cpos) {
                var txtlen = $("#txtInput2").val().length;
                if (txtlen < 6) {
                    document.getElementById("bandtext2").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
                    $('#bandtext2')[0].setAttribute('lengthAdjust', '');
                    $('#bandtext2')[0].setAttribute('textLength', '');
                    $('input[name=lengthAdjustFlagBand2]').val(0);
                }
                $("#front-text2").text($('#txtInput2').val());
                if (($("#bandtext2")[0].getBoundingClientRect().width > (wb[$('input[name=wbsize]').val()][$('.wbdiv').width()]['FBPathLimit'])) && (parseInt($("#bandtext2").css('font-size')) > 9)) {
                    $('#bandtext2')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                    $('#bandtext2')[0].setAttribute('textLength', '270');
                    $('input[name=lengthAdjustFlagBand2]').val(1);
                }
                if ($('input[name=lengthAdjustFlagBand2]').val() === '1') {
                    document.getElementById("bandtext2").style.fontSize = (wb[$("#ddlSize").val()]['MaxFont'] - (0.5 * $("#txtInput2").val().length)) + 'px';
                    $("#front-text2").text($('#txtInput2').val());
                }
                setCaretToPos(document.getElementById("txtInput2"), cpos);
            });
            $("#txtInput2").on('paste keyup', function (e) {
                if (typeof timer !== undefined) {
                    clearTimeout(timer);
                }
                $("#status").html("Typing ...").css("color", "#009900");
                timer = setTimeout(function () {
                    $("#status").html("Stopped").css("color", "#990000");
                    setTimeout(function () {
                        var cpos = $("#txtInput2").getCursorPosition();
                        var tmpString = $("#txtInput2").val();
                        $("#txtInput2").val('');
                        for (var x = 0; x < tmpString.length; x++)
                        {
                            $("#txtInput2").val($("#txtInput2").val() + tmpString.charAt(x));
                            $("#txtInput2").trigger("custom", [cpos]);
                        }
                        if (tmpString.length === 0) {
                            $("#txtInput2").trigger("custom", [cpos]);
                        }
                    }, 100);
                }, timeout);
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
                //added test
                $('#bandtext1')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtext1')[0].setAttribute('textLength', '270');
                $('input[name=frontPaste]').val(1);
                //added test
            });
            $("#front-font-family2").change(function () {
                document.getElementById("bandtext2").style.fontFamily = $('#front-font-family2').val();
                //added test
                $('#bandtext2')[0].setAttribute('lengthAdjust', 'spacingAndGlyphs');
                $('#bandtext2')[0].setAttribute('textLength', '270');
                $('input[name=backPaste]').val(1);
                //added test
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
//                $('#bandtextinside1')[0].setAttribute('text-anchor', '');
                $('#bandtextinside1')[0].setAttribute('textLength', '');
                $('#bandtextinside1')[0].setAttribute('lengthAdjust', '');
//                $('#bandtextpathinside1')[0].setAttribute('startOffset', '0%');

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
                    $("#segcolor1_cover_band1").removeAttr("display");
                    $("#segcolor2_cover_band1").removeAttr("display");
                    $("#segcolor3_band1").removeAttr("display");

                    $("#segcolor1_cover_band2").removeAttr("display");
                    $("#segcolor2_cover_band2").removeAttr("display");

                    if ($("#txtInputCont").val().length > 40) {
                        $("#txtInput1").val($('#txtInputCont').val().substring(0, 40));
                    } else {
                        $("#txtInput1").val($("#txtInputCont").val());
                    }
                    $("#txtInput1").trigger("paste");
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
                    $("#segcolor1_cover_band1").removeAttr("display");
                    $("#segcolor2_cover_band1").removeAttr("display");
                    $("#segcolor3_band1").removeAttr("display");

                    $("#segcolor1_cover_band2").removeAttr("display");
                    $("#segcolor2_cover_band2").removeAttr("display");

                    if ($("#txtInputCont").val().length > 40) {
                        $("#txtInputCont").val($("#txtInput1").val() + $('#txtInputCont').val().substring(40, 80));
                    } else {
                        $("#txtInputCont").val($("#txtInput1").val());
                    }
                    $("#txtInputCont").trigger("paste");
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
                    $("#segcolor1_cover_band1").attr("display", "none");
                    $("#segcolor2_cover_band1").attr("display", "none");
                    $("#segcolor3_band1").attr("display", "none");

                    $("#segcolor1_cover_band2").attr("display", "none");
                    $("#segcolor2_cover_band2").attr("display", "none");
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
            $("#txtInputCont").on('paste keyup', function () {
                //$('input[name=wrapPaste]').val(1);
                if (typeof timer !== undefined) {
                    clearTimeout(timer);
                }
                $("#status").html("Typing ...").css("color", "#009900");
                timer = setTimeout(function () {
                    $("#status").html("Stopped").css("color", "#990000");
                    setTimeout(function () {
                        var cpos = $("#txtInputCont").getCursorPosition();
                        var contString = $("#txtInputCont").val();
                        $("#txtInputCont").val('');
                        for (var x = 0; x < contString.length; x++)
                        {
                            $("#txtInputCont").val($("#txtInputCont").val() + contString.charAt(x));
                            $("#txtInputCont").trigger("custom", [cpos]);
                        }
                        if (contString.length === 0) {
                            $("#txtInputCont").trigger("custom", [cpos]);
                        }
                    }, 100);
                }, timeout);
            });
            $("#txtInputCont").on('cut', function () {
                $("#txtInputCont").val('');
                $('input[name=wrapPaste]').val(0);
                disableWrapped();
                $("#front-endcont1").empty().append($("#front-endcont2-icon :selected").text());
                $("#front-endcont2").empty();
                $("#txtInputCont").trigger("custom");
            });
            $("#txtInputCont").on('custom', function (e, cpos) {
                if (e.keyCode === 46 || e.keyCode === 8) {
                    if ($('input[name=wrapPaste]').val() === '1') {
                        $('input[name=wrapPaste]').val(0);
                        disableWrapped();
                        $("#txtInputCont").val('');
                    }
                }
                if ($("#txtInputCont").val().length < $('input[name=textcount]').val().length + 1) {
                    $("#front-textcont2").text('');
                    disableWrapped();
                }
                $("#front-textcontainer").text($('#txtInputCont').val());
                if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '750') {

                    enableWrapped();
                    $("#front-textcont1").text($('#txtInputCont').val().substring(0, Math.ceil($("#txtInputCont").val().length / 2)));
                    $("#front-textcont2").text($('#txtInputCont').val().substring((Math.ceil($("#txtInputCont").val().length / 2) - 1), $("#txtInputCont").val().length));
                } else {
                    disableWrapped();

                    if ($("#bandtextcontainer")[0].getBoundingClientRect().width > '415') {
                        $("#front-endcont1").empty();
                        $("#front-endcont2").empty().append($("#front-endcont2-icon :selected").text());
                        $('input[name=isWrapCont]').val('1');

                        var span_textcont1 = $('input[name=textcount]').val().length;
                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, span_textcont1 + 1));
                        $("#front-textcont2").text($('#txtInputCont').val().substring(span_textcont1, $("#txtInputCont").val().length));

                    } else {
                        $("#front-endcont1").empty().append($("#front-endcont2-icon :selected").text());
                        $("#front-endcont2").empty();
                        $('input[name=isWrapCont]').val('0');

                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                        $('input[name=textcount]').val($('#txtInputCont').val().substring(0, $("#txtInputCont").val().length));
                    }
                    if ($('input[name=wrapPaste]').val() === '1') {
                        enableWrapped();
                        $("#front-textcont1").text($('#txtInputCont').val().substring(0, Math.ceil($("#txtInputCont").val().length / 2)));
                        $("#front-textcont2").text($('#txtInputCont').val().substring((Math.ceil($("#txtInputCont").val().length / 2) - 1), $("#txtInputCont").val().length));
                        $("#front-endcont2").empty().append($("#front-endcont2-icon :selected").text());
                        $("#front-endcont1").empty();
                    }

                }
                setCaretToPos(document.getElementById("txtInputCont"), cpos);
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
            $("#txtInputInside").on('paste keyup', function () {
                //$('input[name=backPaste]').val(1);
                if (typeof timer !== undefined) {
                    clearTimeout(timer);
                }
                $("#status").html("Typing ...").css("color", "#009900");
                timer = setTimeout(function () {
                    $("#status").html("Stopped").css("color", "#990000");

                    setTimeout(function () {
                        var cpos = $("#txtInputInside").getCursorPosition();
                        var insideString = $("#txtInputInside").val();
                        $("#txtInputInside").val('');
                        for (var x = 0; x < insideString.length; x++)
                        {
                            $("#txtInputInside").val($("#txtInputInside").val() + insideString.charAt(x));
                            $("#txtInputInside").trigger("custom", [cpos]);
                        }
                        if (insideString.length === 0) {
                            $("#txtInputInside").trigger("custom", [cpos]);
                        }
                    }, 100);
                }, timeout);
            });
            $("#txtInputInside").on('cut', function () {
                $("#txtInputInside").val('');
                $('input[name=backPaste]').val(0);
                disableWrapped2();
                $("#front-endinside1").empty().append($("#front-endinside2-icon :selected").text());
                $("#front-endinside2").empty();
            });
            $("#txtInputInside").on('custom', function (e, cpos) {

                if (e.keyCode === 46 || e.keyCode === 8) {
                    if ($('input[name=backPaste]').val() === '1') {
                        $('input[name=backPaste]').val(0);
                        disableWrapped2();
                        $("#txtInputInside").val('');
                    }
                }
                $("#front-textcontainer2").text($('#txtInputInside').val());

                if ($("#bandtextcontainer2")[0].getBoundingClientRect().width > '750') {

                    enableWrapped2();
                    $("#front-textinside1").text($('#txtInputInside').val().substring(0, Math.ceil($("#txtInputInside").val().length / 2)));
                    $("#front-textinside2").text($('#txtInputInside').val().substring((Math.ceil($("#txtInputInside").val().length / 2) - 1), $("#txtInputInside").val().length));
                } else {
                    disableWrapped2();
                    if ($("#bandtextcontainer2")[0].getBoundingClientRect().width < '410') {
                        $("#front-endinside1").empty().append($("#front-endinside2-icon :selected").text());
                        $("#front-endinside2").empty();
                        $("#front-textinside1").text($('#txtInputInside').val());
                        $('input[name=textinside]').val($('#txtInputInside').val().substring(0, $("#txtInputInside").val().length));
                        $("#front-textinside2").text('');

                    } else {
                        $("#front-endinside2").empty().append($("#front-endinside2-icon :selected").text());
                        $("#front-endinside1").empty();
                        var span_textinside1 = $('input[name=textinside]').val().length;
                        $("#front-textinside1").text($('#txtInputInside').val().substring(0, span_textinside1 + 1));
                        $("#front-textinside2").text($('#txtInputInside').val().substring(span_textinside1, $("#txtInputInside").val().length));
                    }
                }
                if ($('input[name=backPaste]').val() === '1') {
                    enableWrapped2();
                    $("#front-textinside1").text($('#txtInputInside').val().substring(0, Math.ceil($("#txtInputInside").val().length / 2)));
                    $("#front-textinside2").text($('#txtInputInside').val().substring((Math.ceil($("#txtInputInside").val().length / 2) - 1), $("#txtInputInside").val().length));
                    $("#front-endinside2").empty().append($("#front-endinside2-icon :selected").text());
                    $("#front-endinside1").empty();
                }
                setCaretToPos(document.getElementById("txtInputInside"), cpos);
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
        <span id="status"></span>
        <input type="hidden" name="wbsize" value="2">
        <input type="hidden" name="fbfront" value="0">
        <input type="hidden" name="fbback" value="0">
        <input type="hidden" name="textcount" value="0">
        <input type="hidden" name="textcount2" value="0">
        <input type="hidden" name="textinside" value="0">
        <input type="hidden" name="isWrapCont" value="0">
        <input type="hidden" name="isWrapInside" value="0">
        <input type="hidden" name="frontPaste" value="0">
        <input type="hidden" name="backPaste" value="0">
        <input type="hidden" name="wrapPaste" value="0">
        <input type="hidden" name="insidePaste" value="0">
        <input type="hidden" name="lengthAdjustFlagBand1" value="0">
        <input type="hidden" name="lengthAdjustFlagBand2" value="0">
        <div class="wbdiv">
            <!--<h1 style="margin-bottom: -9px; text-align: center;">FRONT</h1>-->
            <div class="containersvg1">
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
                <?php echo $segcolor1_band1 . $segcolor2_band1; ?>
                <?php echo $mask_inside_band1; ?>
                <?php // $mask1_inside;  ?>            
                <?php echo $mask2_inside_band1 . $mask1_inside_band1; ?>         
                <text id="bandtextinside1" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathinside1" xlink:href="#MyPathInside1" startOffset="50%">
                    <tspan id="front-startinside1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                    <tspan id="front-textinside1" dominant-baseline="middle"></tspan>
                    <tspan id="front-endinside1" class="fa" dominant-baseline="middle">&#xf096;</tspan>
                </textPath>
                </text>
                <?php echo $mask_outside_band1; ?>
                <?php // echo $mask1;  ?>            
                <?php echo $mask2_band1 . $mask1_band1; ?>
                <?php echo $segcolor1_cover_band1 . $segcolor2_cover_band1; ?>            
                <?php echo $segcolor3_band1; ?>            
                <text id="bandtext1" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpath" xlink:href="#MyPath1" startOffset="50%">
                    <tspan id="front-start" class="fa" dominant-baseline="middle">&#xf17c;</tspan>
                    <tspan id="front-text" dominant-baseline="middle">FRONT</tspan>
                    <tspan id="front-end" class="fa" dominant-baseline="middle">&#xf11c;</tspan>
                </textPath>
                </text>
                <text id="bandtextcont1" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;"  display="none">
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
                <!--<use xlink:href="#MyPathInside1" fill="none" stroke="blue"  />-->
                <!--<use xlink:href="#MyPathInside1" fill="none" stroke="green"  />-->
                <?php echo $glow1; ?>
                <text x="3" y="16" style="fill: white; stroke: White; stroke-width: 3">FRONT</text>
                <text x="3" y="16" style="fill: black; stroke: Black; stroke-width: 1">FRONT</text>
                <rect width="100%" height="100%" style="stroke:white;stroke-width:2;fill-opacity:0;">
                </svg>
            </div>
            <!--<h1 style="margin-bottom: -9px; text-align: center;">BACK</h1>-->
            <div class="containersvg2">
                <svg id="svgelement2" viewBox="0 0 300 113" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect id="bandcolor2" height="100%" width="100%" style="fill: gray" />
                <?php echo $mask_inside_band2; ?>
                <?php echo $mask2_inside_band2 . $mask1_inside_band2; ?>
                <?php echo $segcolor1_band2 . $segcolor2_band2; ?>
                <?php echo $segcolor3_band2; ?>
                <text id="bandtextinside2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpathinside2" xlink:href="#MyPathInside2" startOffset="0%">
                    <tspan id="front-startinside2" class="fa" dominant-baseline="middle"></tspan>
                    <tspan id="front-textinside2" dominant-baseline="middle"></tspan>
                    <tspan id="front-endinside2" class="fa" dominant-baseline="middle"></tspan>
                </textPath>
                </text>
                <?php echo $mask_outside_band2; ?>
                <?php echo $mask2_band2 . $mask1_band2; ?>
                <?php echo $segcolor1_cover_band2 . $segcolor2_cover_band2; ?>               
                <text id="bandtext2" text-anchor="middle" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;">
                <textPath id="bandtextpath2" xlink:href="#MyPath2" startOffset="50%">
                    <tspan id="front-start2" class="fa" dominant-baseline="middle">&#xf17c;</tspan>
                    <tspan id="front-text2" dominant-baseline="middle">BACK</tspan>
                    <tspan id="front-end2" class="fa" dominant-baseline="middle">&#xf11c;</tspan>
                </textPath>
                </text>
                <text id="bandtextcont2" fill="#9d1d20" style="font-family: Arial; font-weight: 600; font-size: 30px; fill: #999999; opacity: 0.6;" display="none">
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
                <?php echo $glow2; ?>
                <text x="3" y="16" style="fill: white; stroke: White; stroke-width: 3">BACK</text>
                <text x="3" y="16" style="fill: black; stroke: Black; stroke-width: 1">BACK</text>
                <rect width="100%" height="100%" style="stroke:white;stroke-width:2;fill-opacity:0;">
                </svg>
            </div>
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
                    <th>solid color<br><input type="checkbox" id="cboxglow" value="1">(enable glow)</th>
                    <th>inside color</th>
                    <th>outside color</th>
                    <th>swirl-mask 1</th>
                    <th>swirl-mask 2</th>
                    <th>segmented</th>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" data-color="red" style=" background-color: red;">Red</button></td>
                    <td><button class="inside_color" type="button" data-color="red" style=" background-color: red;">Red</button></td>
                    <td><button class="outside_color" type="button" data-color="red" style=" background-color: red;">Red</button></td>
                    <td><button class="mask1_color" type="button" data-color="red" style=" background-color: red;">Red</button></td>
                    <td><button class="mask2_color" type="button" data-color="red" style=" background-color: red;">Red</button></td>
                    <td><button class="segmented_color" type="button" data-color="blue,red" style=" background-color: blue,red; background: linear-gradient(90deg,blue,red);" >Blue|Red</button></td>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" data-color="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="inside_color" type="button" data-color="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="outside_color" type="button" data-color="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="mask1_color" type="button" data-color="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="mask2_color" type="button" data-color="blue" style=" background-color: blue;">Blue</button></td>
                    <td><button class="segmented_color" type="button" data-color="blue,white" style=" background-color: blue,white; background: linear-gradient(90deg,blue,white);" >Blue|White</button></td>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" data-color="green" style=" background-color: green;">Green</button></td>
                    <td><button class="inside_color" type="button" data-color="green" style=" background-color: green;">Green</button></td>
                    <td><button class="outside_color" type="button" data-color="green" style=" background-color: green;">Green</button></td>
                    <td><button class="mask1_color" type="button" data-color="green" style=" background-color: green;">Green</button></td>
                    <td><button class="mask2_color" type="button" data-color="green" style=" background-color: green;">Green</button></td>
                    <td><button class="segmented_color" type="button" data-color="red,white" style=" background-color: red,white; background: linear-gradient(90deg,red,white);" >Red|White</button></td>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" data-color="white" style=" background-color: white;">White</button></td>
                    <td><button class="inside_color" type="button" data-color="white" style=" background-color: white;">White</button></td>
                    <td><button class="outside_color" type="button" data-color="white" style=" background-color: white;">White</button></td>
                    <td><button class="mask1_color" type="button" data-color="white" style=" background-color: white;">White</button></td>
                    <td><button class="mask2_color" type="button" data-color="white" style=" background-color: white;">White</button></td>
                    <td><button class="segmented_color" type="button" data-color="red,white,blue" style="background-color: red,white,blue; background: linear-gradient(90deg,red,white,blue);" >Red|White|Blue</button></td>
                </tr>
                <tr>
                    <td><button class="solid_color" type="button" data-color="gray">Clear</button></td>
                    <td><button class="inside_color" type="button" data-color="gray">Clear</button></td>
                    <td><button class="outside_color" type="button" data-color="gray">Clear</button></td>
                    <td><button class="mask1_color" type="button" data-color="clear">Clear</button></td>
                    <td><button class="mask2_color" type="button" data-color="clear">Clear</button></td>
                    <td><button class="segmented_color" type="button" data-color="red,green,blue" style=" background-color: red,green,blue; background: linear-gradient(90deg,red,green,blue);" >Red|Green|Blue</button></td>
                </tr>
            </table>            

            <br>
            <button id="btnSave" type="button">SAVE</button>
        </div>        



    </body>
</html> 
<script>
    function changeFontSize() {
        if ($("#txtInput1").val().length < 6) {
            document.getElementById("bandtext1").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
        }
        if ($("#txtInput2").val().length < 6) {
            document.getElementById("bandtext2").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
        }
        if ($("#txtInputCont").val().length < 18) {
            document.getElementById("bandtextcontainer").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
            document.getElementById("bandtextcont1").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
            document.getElementById("bandtextcont2").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
        }
        if ($("#txtInputInside").val().length < 18) {
            document.getElementById("bandtextcontainer2").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
            document.getElementById("bandtextinside1").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
            document.getElementById("bandtextinside2").style.fontSize = wb[$("#ddlSize").val()]['MaxFont'] + 'px';
        }
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
    function changeSegmentedSize(size) {
        $('#sc1b1_c')[0].setAttribute('d', wb[size]['Segmented']['sc1b1_c']);
        $('#sc2b1_c')[0].setAttribute('d', wb[size]['Segmented']['sc2b1_c']);
        $('#sc3b1')[0].setAttribute('d', wb[size]['Segmented']['sc3b1']);

        $('#sc1b2_c')[0].setAttribute('d', wb[size]['Segmented']['sc1b2_c']);
        $('#sc2b2_c')[0].setAttribute('d', wb[size]['Segmented']['sc2b2_c']);
        $('#sc3b2')[0].setAttribute('d', wb[size]['Segmented']['sc3b2']);
    }
    $(document).ready(function () {

        $("#ddlSize").change(function () {
            var size = $(this).val();
            changeFontSize();
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

            $('#glow1path')[0].setAttribute('d', wb[size]['Glow']);
            $('#glow2path')[0].setAttribute('d', wb[size]['Glow']);
            changeSwirlSize(size);
            changeSegmentedSize(size);
            //END - code for wristband solid color (svg)
        });

    });
</script>