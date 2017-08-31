<!DOCTYPE html>
<html>
<head>
    <title>rasterizeHTML.js example</title>
    <script type="text/javascript" src="rasterizeHTML.allinone.js"></script>
</head>
<body>
    <canvas id="canvas" width="400" height="200"></canvas>
    <script type="text/javascript">
        var canvas = document.getElementById("canvas");

        rasterizeHTML.drawHTML('<div style="font-size: 20px;">' +
            'Some <span style="color: green">HTML</span>' +
            ' with an image <img src="someimg.png">' +
            '</div>',
            canvas);
    </script>
</body>
</html>