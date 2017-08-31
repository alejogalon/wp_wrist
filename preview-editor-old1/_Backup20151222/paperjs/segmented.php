<!DOCTYPE html>
<html>
    <head>
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
        
            borderUp.fillColor = {
            gradient: {
                stops: [['white', 0.01], ['#3399FF', 0.8]],
                radial: true
            },
            origin: {x: 165, y: 0},
            destination: borderUp.bounds.rightCenter    
            }            

            var bandUpLeft = new Path();
            bandUpLeft.add(new Point(51, 118));            
//            bandUpLeft.add(new Point(60, 75));
            bandUpLeft.add(new Point(69, 68));
//            bandUpLeft.add(new Point(105, 56));
//            bandUpLeft.add(new Point(118, 52));
            bandUpLeft.add(new Point(140, 49));            
            bandUpLeft.add(new Point(180, 48));            
            
            bandUpLeft.add(new Point(165, 48));
            bandUpLeft.add(new Point(178, 47.5));
            bandUpLeft.add(new Point(180, 50));
            bandUpLeft.add(new Point(180, 60));
            bandUpLeft.add(new Point(180, 70));
            bandUpLeft.add(new Point(180, 80));
            bandUpLeft.add(new Point(180, 90));
            bandUpLeft.add(new Point(180, 100));
            bandUpLeft.add(new Point(180, 110));            
            bandUpLeft.add(new Point(180, 120));
            bandUpLeft.add(new Point(185, 130));
            bandUpLeft.add(new Point(180, 150));
    
            bandUpLeft.closed = true;
            var copybandUpLeft = bandUpLeft.clone();
            copybandUpLeft.position.x += 0;
            copybandUpLeft.position.y += -5;
            copybandUpLeft.smooth();            
            

            copybandUpLeft.fillColor = {
            gradient: {
                stops: [['white', 0.01], ['#FF4747', 0.8]],
                radial: true
            },
            origin: {x: 165, y: 0},
            destination: borderUp.bounds.rightCenter    
            }
//                        copybandUpLeft.fullySelected = true;
//            copybandUpLeft.fillColor = 'black';

        var bandInner = new Path.Circle(new Point(179, 104), 137);
        bandInner.removeSegment(1);

            bandInner.fillColor = {
            gradient: {
                stops: [['white', 0.1],['#3399FF', 0.7], ['black', 1]],
                radial: true
            },   
            origin: {x: 165, y: 0},
            destination: bandInner.bounds.rightCenter    
            }
            
            
            var bandInnerLeft = new Path();
            bandInnerLeft.add(new Point(58, 120));            
            bandInnerLeft.add(new Point(60, 74));
            bandInnerLeft.add(new Point(105, 55));
            bandInnerLeft.add(new Point(138, 49));            
            
            bandInnerLeft.add(new Point(165, 47.8));
            bandInnerLeft.add(new Point(178, 47.5));
            bandInnerLeft.add(new Point(180, 50));
            bandInnerLeft.add(new Point(180, 60));
            bandInnerLeft.add(new Point(180, 70));
            bandInnerLeft.add(new Point(180, 80));
            bandInnerLeft.add(new Point(180, 90));
            bandInnerLeft.add(new Point(180, 100));
            bandInnerLeft.add(new Point(180, 110));            
            bandInnerLeft.add(new Point(180, 120));
            bandInnerLeft.add(new Point(185, 130));
            bandInnerLeft.add(new Point(180, 150));
    
            bandInnerLeft.closed = true;
            var copybandInnerLeft = bandInnerLeft.clone();
            copybandInnerLeft.position.x += 0;
            copybandInnerLeft.position.y += -0.5;
            copybandInnerLeft.smooth();               
            copybandInnerLeft.smooth();

            copybandInnerLeft.fillColor = {
            gradient: {
                stops: [['white', 0.1],['#FF4747', 0.7], ['black', 1]],
                radial: true
            },   
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
            origin: {x: 200, y: 170},
            destination: CopyborderDown.bounds.rightCenter    
            }
    
    
            var borderDownLeft = new Path();
            borderDownLeft.add(new Point(90, 159));//added lower-left 
            borderDownLeft.add(new Point(38, 110));//lower-left     
            borderDownLeft.add(new Point(42.5, 44));
            borderDownLeft.add(new Point(54, 69));//L corner  
            borderDownLeft.add(new Point(110, 93.5));//added L corner                      
            borderDownLeft.add(new Point(111, 94));//added L corner            
            borderDownLeft.add(new Point(140, 99));//added L corner            
                        
            borderDownLeft.add(new Point(175, 102));//added L corner                        
            borderDownLeft.add(new Point(180, 102.3));//added L corner                        
            borderDownLeft.add(new Point(180, 110));//added L corner   
            borderDownLeft.add(new Point(180, 130));//lower-center
            borderDownLeft.add(new Point(180, 150));//lower-center
            borderDownLeft.add(new Point(180, 160));//lower-center
            borderDownLeft.add(new Point(180, 169));//lower-center
            borderDownLeft.add(new Point(165, 171.8));//lower-center
            borderDownLeft.closed = true;
    
            var CopyborderDownLeft = borderDownLeft.clone();
            CopyborderDownLeft.fullySelected = false;
//            CopyborderDownLeft.strokeColor = '#3399FF';
            CopyborderDownLeft.position.x += 0;
            CopyborderDownLeft.position.y += 45;
            CopyborderDownLeft.smooth();
  
            CopyborderDownLeft.fillColor = {
            gradient: {
                stops: [['white', 0.01], ['#FF4747', 0.9]],
                radial: true
            },
            origin: {x: 200, y: 170},
            destination: CopyborderDown.bounds.rightCenter    
            }    
    
    
    
    
    
            var bandOut = new Path();
            bandOut.add(new Point(90, 159));//added lower-left 
            bandOut.add(new Point(40, 110));//lower-left     
            bandOut.add(new Point(39, 43));
            bandOut.add(new Point(50, 67));//L corner
            bandOut.add(new Point(130, 98));//added L corner
            bandOut.add(new Point(230, 98));//added L corner
    
            bandOut.add(new Point(309, 67));//inverted L corner
            bandOut.add(new Point(319.5, 48));    
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
            
            
            var bandOutLeft = new Path();
            bandOutLeft.add(new Point(90, 159));//added lower-left 
            bandOutLeft.add(new Point(39, 110));//lower-left     
            bandOutLeft.add(new Point(38.5, 45));
            bandOutLeft.add(new Point(53, 69));//L corner  
            bandOutLeft.add(new Point(110, 93.5));//added L corner                      
            bandOutLeft.add(new Point(111, 94));//added L corner            
            bandOutLeft.add(new Point(140, 99));//added L corner            
                        
            bandOutLeft.add(new Point(175, 102));//added L corner                        
            bandOutLeft.add(new Point(180, 102.3));//added L corner                        
            bandOutLeft.add(new Point(180, 110));//added L corner   
            bandOutLeft.add(new Point(180, 130));//lower-center
            bandOutLeft.add(new Point(180, 150));//lower-center
            bandOutLeft.add(new Point(180, 160));//lower-center
            bandOutLeft.add(new Point(180, 169));//lower-center
            bandOutLeft.add(new Point(165, 171.8));//lower-center
    
            bandOutLeft.closed = true;
//            bandOutLeft.fullySelected = true;
//            bandOutLeft.fillColor = 'black';
            
            var copybandOutLeft = bandOutLeft.clone();
            copybandOutLeft.position.x += 0;
            copybandOutLeft.position.y += 50;
            copybandOutLeft.smooth();
    
            copybandOutLeft.fillColor = {
            gradient: {
//                stops: [['#3399FF', 0.5], ['black', 0.8]],
                stops: [['#FF4747', 0.5], ['black', 0.8]],
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
        </div>       
    </body>
</html>