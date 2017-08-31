<?php include_once 'check_mask.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Wristband SVG</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <script src="js/jquery-2.0.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
    <script src="wristbandData.js"></script>
    <script>
        $(document).ready(function () {
            var setTextPath = function (wb) {
                $("#FBPath1").attr("d", wb['FBPath1']);
                $("#FBPath2").attr("d", wb['FBPath2']);
                $("#InPath1").attr("d", wb['InPath1']);
                $("#InPath2").attr("d", wb['InPath2']);
                $("#WrapPath1").attr("d", wb['WrapPath2']);
                $("#WrapPath2").attr("d", wb['WrapPath2']);
                $("#wbimage").attr("xlink:href", wb['ImgSource']);
                return true;
            };
            var setImage = function (wb) {
                $("#wbimage").attr("xlink:href", wb['ImgSource']);
                return true;
            };

            var sTP = setTextPath(wb[1]);
            var sI = setImage(wb[1]);
            
            console.log(sTP +','+ sI);
        });
//        console.log(wb);
    </script>
    <body>
        <svg id="svgelement" viewBox="0 0 300 180" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
        <path id="FBPath1" fill-opacity="0" />
        <path id="FBPath2" fill-opacity="0" />
        <path id="InPath1" fill-opacity="0" />
        <path id="InPath2" fill-opacity="0" />
        <path id="WrapPath1" fill-opacity="0" />
        <path id="WrapPath2" fill-opacity="0" />
        </defs>


    <use xlink:href="#FBPath1" fill="none" stroke="blue"  />
    <use xlink:href="#FBPath2" fill="none" stroke="red"  />
    <use xlink:href="#InPath1" fill="none" stroke="green"  />
    <use xlink:href="#InPath2" fill="none" stroke="yellow"  />
    <use xlink:href="#WrapPath1" fill="none" stroke="black"  />
    <use xlink:href="#WrapPath2" fill="none" stroke="brown"  />
    <image id="wbimage" height="100%" width="100%" xlink:href="" />
    </svg> 
</body>
</html> 