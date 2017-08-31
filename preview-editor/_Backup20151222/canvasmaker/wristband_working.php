<!DOCTYPE HTML>
<html>
    <head>
        <style>
            body {
                margin: 0px;
                padding: 0px;
                /*background-color: #b0c4de;*/
                /*text-align: center;*/
            }
            #c{
                /*  opacity:0.5;*/
               background:transparent;
            }
            canvas {
                /*position: absolute;*/
            /*    top: 0;
                left: 0;*/
            }
        </style>
        <script>
        function cfunction(a,b){
           var t = a + b;
           return t;
           //tmp disabled
            if(t > 255){
                t = t % 255;
                return(t);
            }else{
                return(t);
            }
        }            
        function convertHex(hex){
            r = parseInt(hex.substring(0,2), 16) - 156;
            g = parseInt(hex.substring(2,4), 16) - 73;
            b = parseInt(hex.substring(4,6), 16) - 70;
            var arr = [r,g,b];
            return arr;
        }        
        </script>
        <!--<script src="js/working_final.js"></script>-->
        <!--<script src="js/new_inside.js"></script>-->
        <script src="js/dev.js"></script>
    </head>
    <body>
        <canvas id="c" width="500" height="500" style="border:0px solid #d3d3d3;"></canvas>
        
        <script>
//            var i = convertHex('FFFF00'); //yellow
            var i = convertHex('FF0000'); //red
//            var i = convertHex('0033CC'); //blue
//            var i = convertHex('29A329'); //green
            var j = convertHex('1D5690');
            imgToCanvas(i[0], i[1] , i[2], 0, j[0], j[1] , j[2], 0, 0, 17);
            
            function changecolor()
            {
                var i = convertHex('FF0000'); //red 
                var j = convertHex('29A329'); //green
               imgToCanvas(i[0], i[1] , i[2], 0, j[0], j[1] , j[2], 0, 0, 17);
            }
        </script>
        <br>
<button type="button" onclick="changecolor()">Click Me!</button>

    </body>
</html>      