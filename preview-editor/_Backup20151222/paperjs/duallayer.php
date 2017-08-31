<!DOCTYPE html>
<html>
    <head>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <!--<script type="text/javascript" src="dist/paper-full.js"></script>-->
        <script type="text/javascript" src="dist/jquery.min.js"></script>        
        <script type="text/javascript" src="dist/paper-full.min.js"></script>        
        <style>
            body {
                margin: 0px;
                padding: 0px;
                /*background-image: url("1-inch-300x240.png");*/
                background-color: white;
            }
            #contain {
                width: 350px;
                height: 230px;
                margin: 0 auto;
                position: relative;    
            }

            #myCanvas,
            #myCanvas2,
            #canvas{
                top: 0;
                left: 0;
                position: absolute;
               border:1px solid #d3d3d3;
            }     
        </style>
        <script type="text/paperscript" canvas="myCanvas">
            
        var borderUp = new Path.Circle(new Point(179, 101), 141)
        borderUp.removeSegment(1);
//            borderUp.fillColor = {
//            gradient: {
//                stops: [['white', 0.01], ['#3399FF', 0.8]],
//                radial: true
//            },
//            origin: borderUp.position,
//            destination: borderUp.bounds.rightCenter    
//            }
            borderUp.fillColor = {
            gradient: {
                stops: [['white', 0.01], ['#3399FF', 0.8]],
                radial: true
            },
            origin: {x: 165, y: 0},
            destination: borderUp.bounds.rightCenter    
            }            
            
        var bandInner = new Path.Circle(new Point(179, 104), 137);
        bandInner.removeSegment(1);

            bandInner.fillColor = {
            gradient: {
                stops: [['white', 0.1],['#FF4747', 0.7], ['black', 1]],
                radial: true
            },
//            origin: bandInner.position,
//            destination: bandInner.bounds.rightCenter    
            origin: {x: 165, y: 0},
            destination: bandInner.bounds.rightCenter    
            }

        var whiteCircle = new Path.Circle(new Point(179, 178), 138);
        whiteCircle.fillColor = 'white';
        whiteCircle.removeSegment(1);

//Lower side of band

            var borderDown = new Path();
            borderDown.add(new Point(90, 160));//added lower-left
            borderDown.add(new Point(40, 118));//lower-left
            //borderDown.add(new Point(39, 43));
            borderDown.add(new Point(41, 51));
            borderDown.add(new Point(44, 52));

            borderDown.add(new Point(52, 67));//L corner
            borderDown.add(new Point(73, 82));
            borderDown.add(new Point(105, 93));
            borderDown.add(new Point(130, 98));//added L corner
            borderDown.add(new Point(180, 102));
            borderDown.add(new Point(230, 98));//added L corner
            borderDown.add(new Point(255, 93));
            borderDown.add(new Point(287, 82));
    
            borderDown.add(new Point(309, 67));//inverted L corner
            //borderDown.add(new Point(319, 43));
            borderDown.add(new Point(315, 50));
            borderDown.add(new Point(318, 50));
            borderDown.add(new Point(319, 118));//lower-right
            borderDown.add(new Point(265, 160));//added lower-right
            borderDown.add(new Point(180, 172));//lower-center
    
            borderDown.closed = true;
    
            var CopyborderDown = borderDown.clone();
            CopyborderDown.fullySelected = false;
//            CopyborderDown.strokeColor = '#3399FF';
            CopyborderDown.position.x += 0;
            CopyborderDown.position.y += 45;
            CopyborderDown.smooth();
  
            CopyborderDown.fillColor = {
            gradient: {
                stops: [['white', 0.01], ['#3399FF', 0.9]],
                radial: true
            },
//            origin: CopyborderDown.position,
            origin: {x: 200, y: 170},
            destination: CopyborderDown.bounds.rightCenter    
            }
    
    
            var bandOut = new Path();
            //bandOut.add(new Point(90, 160));//added lower-left
            bandOut.add(new Point(90, 159));//added lower-left
            //bandOut.add(new Point(38, 118));//lower-left     
            bandOut.add(new Point(40, 110));//lower-left     
            bandOut.add(new Point(39, 43));
            bandOut.add(new Point(50, 67));//L corner
            bandOut.add(new Point(130, 98));//added L corner
            bandOut.add(new Point(230, 98));//added L corner
    
            bandOut.add(new Point(309, 69));//inverted L corner
            bandOut.add(new Point(319.6, 46));    
            bandOut.add(new Point(319, 115));//lower-right
            bandOut.add(new Point(265, 160));//added lower-right
            bandOut.add(new Point(180, 172));//lower-center
    
            bandOut.closed = true;
//            bandOut.fullySelected = true;
//            bandOut.fillColor = 'black';
            
            var copybandOut = bandOut.clone();
            copybandOut.position.x += 0;
            copybandOut.position.y += 50;
            copybandOut.smooth();
    
            copybandOut.fillColor = {
            gradient: {
                stops: [['#3399FF', 0.5], ['black', 0.8]],
                radial: true
            },
            origin: copybandOut.position,
            destination: copybandOut.bounds.Center
          
            }
            


</script>
<script type="text/javascript" src="mod_js/curvetext.js"></script>
    </head>
    <body>
        <div id="contain">
        <canvas id="myCanvas" width="350" height="230"></canvas>
        <!--<canvas id="myCanvas2" width="350" height="230"></canvas>-->
        <!--<canvas id="canvas" width="350" height="230"></canvas>-->
        <!--<img id="img1" src="1-inch-300x240.png" style="float: right; margin: 0 0 10px 10px;">-->
        </div>       
    </body>
</html>