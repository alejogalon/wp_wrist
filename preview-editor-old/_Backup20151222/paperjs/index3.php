<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="mod_js/curvetext.js"></script>
    <body>
        <table>
            <TR>
                <TH>Bezier Curve</TH><TD>
                    <!--<input size="80" type="text" id="curve" name="curve" value="99.2,177.2,130.02,60.0,300.5,276.2,300.7,176.2">-->
                    <input size="80" type="text" id="curve" name="curve" value="50,150,100,200,200,200,250,150">
                </TD>
            </TR>
            <TR>
                <TH>Text</TH>
                <TD><input size="80" type="text" id="text" name="text" value="testing 1234567890"></TD>
            </TR>
            <TR>
                <TD colspan=2><div id="canvasDiv"><canvas id="canvas"></canvas></div></TD>
            </TR>
        </table>
    </body>


</html> 