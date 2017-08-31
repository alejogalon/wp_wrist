<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/raphael.js"></script>
    </head>
    <body>
        <style type="text/css">
            #canvas_container {
                width: 100%;
                border: 1px solid #aaa;
            }
        </style>
        <script>
            window.onload = function () {
//                // Creates canvas 250 × 250 at 0, 0
//                var canvas = Raphael(0, 0, 250, 250);
//                // Creates circle at x = 125, y = 125, with radius 50
//                var circle = canvas.circle(125, 125, 100);
//                // Sets the fill attribute of the circle to red (#f00)
//                circle.attr("fill", "#f00");
//                // Sets the stroke attribute of the circle to white
//                circle.attr("stroke", "#fff");
//
//                // Creates canvas 250 × 250 at 0, 0
//                canvas = Raphael(300, 300, 250, 250);
//
//                // Creates ellipse at x and y = 180 ,horizontal-axis = 20 and vertical-axis = 30
//                var ellipse = canvas.ellipse(100, 100, 100, 60);
//                ellipse.attr("fill", "red");
//                var ellipse = canvas.ellipse(100, 80, 100, 60);
//                ellipse.attr("fill", "red");
//                var ellipse = canvas.ellipse(100, 70, 80, 20);
//                ellipse.attr("fill", "red");
                
    var paper = new Raphael(document.getElementById('canvas_container'), 1000, 1000);
    for(var i = 0; i < 2; i+=1) {
        var multiplier = i*5;
        //paper.circle(250 + (2*multiplier), 100 + multiplier, 50 - multiplier)
        paper.circle(300 + (2*multiplier), 100 + multiplier, 50)
    }
    for(var i = 0; i < 2; i+=1) {
        var multiplier = i*15;
        //paper.circle(250 + (2*multiplier), 100 + multiplier, 50 - multiplier)
        paper.ellipse(100 , 100 + multiplier, 60, 17);
    }
    for(var i = 0; i < 2; i+=1) {
        var multiplier = i*25;
        //paper.circle(250 + (2*multiplier), 100 + multiplier, 50 - multiplier)
        paper.ellipse(200 , 180 + multiplier, 120, 10);
    }   
    //paper.path("M100 100L100 10");
    
            }
            
        </script>
        <?php
        // put your code here
        ?>
        <div id="canvas_container"></div>
        
    </body>
</html>
