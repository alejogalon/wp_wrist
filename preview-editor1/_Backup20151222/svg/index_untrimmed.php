<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pablo SVG</title>
    </head>
    <style>
/*        #mycontainer svg {
            width: 100%;
            border:1px #000 solid;            
        }*/
    .container {
      border: 10px solid #b6bdc3;
      width: 60%;
      background: #fff;
      margin: 0 auto;
    }
    .container2 {
     display: table;
     margin: 0 auto;
      
    }
    input { width: 100%; padding: .5em 1em; }
    
/*#txttest, bandtext {

transform:scale(1, 1);
-webkit-transform:scale(1, 1);
-moz-transform:scale(1, 1);
-ms-transform:scale(1, 1);
-o-transform:scale(1, 1);

}     */
    </style>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">    
    <script src="js/jquery-2.0.0.js"></script>
    <script src="js/pablo.js"></script>
    <script src="js/flowtype.js"></script>
    <script>

        $(document).ready(function () {                        
            //fetch the svg file
            Pablo(mycontainer).load('mycanvas.svg');
   
            //change color of the wristband
            $('.color_button').click(function () {
                var $svgelement = $("#svgelement");
                $svgelement.find(".bandcolor").attr("stop-color", $(this).val());
            });

            //add text
            $("#txtInput").keyup(function(){
                $("#bandtextpath").text($('#txtInput').val().toUpperCase());
                
                
                var textpath = document.getElementById("bandtext");
                var path = document.getElementById("MyPath");
                
//                  if((textpath.getComputedTextLength()*1) > path.getTotalLength()){
//                        alert('here');
//                  }
//                  
//                    var webkit = 1;
//                    $("#bandtext").css({
//                        '-webkit-transform': 'scale(1,' + webkit + ')',
//                        '-moz-transform': 'scale(1,' + webkit + ')',
//                        '-ms-transform': 'scale(1,' + webkit + ')',
//                        '-o-transform': 'scale(1,' + webkit + ')',
//                        'transform': 'scale(1,' + webkit + ')'
//                    });
//                $("#bandtextpath").flowtype({
//                     minimum   : 500,
//                     maximum   : 1200,
//                     minFont   : 12,
//                     maxFont   : 40,
//                     fontRatio : 30
//                });
//                var textpath = document.getElementById("bandtext");
//                var path = document.getElementById("MyPath");
//                var $svgelement = $("#svgelement");
//              
//                var fontsize = 60;
//                var webkit = 1;
//                var downpath = 60;
//                while ((textpath.getComputedTextLength()*1.20) > path.getTotalLength())
//                {
//                    fontsize -= 0.01;
//                    textpath.setAttribute("font-size", fontsize);
//                    
//                    downpath += 0.01;
//                    $svgelement.find("#MyPath").attr("d","M 47 170 q 140 "+downpath+" 264 0");                      
//                    
//            
//                    webkit += 0.00001;
//                    $("#bandtext").css({
//                        '-webkit-transform': 'scale(1,' + webkit + ')',
//                        '-moz-transform': 'scale(1,' + webkit + ')',
//                        '-ms-transform': 'scale(1,' + webkit + ')',
//                        '-o-transform': 'scale(1,' + webkit + ')',
//                        'transform': 'scale(1,' + webkit + ')'
//                    });                         
//                    
//                }                
            });
            
            $('.fontweightneg').click(function () {
                var fontWeight = parseInt($("#bandtext").css('font-weight'));                
                fontWeight -= 100;
                document.getElementById("bandtext").style.fontWeight = fontWeight;
//                $("#bandtext").css('font-weight', fontWeight);
//                alert(fontWeight);
                $("#fval").text(fontWeight);
            });
            $('.fontweightpos').click(function () {
                var fontWeight = parseInt($("#bandtext").css('font-weight'));
                fontWeight += 100;
                document.getElementById("bandtext").style.fontWeight = fontWeight;
//                $("#bandtext").css('font-weight', fontWeight);
                $("#fval").text(fontWeight);
            });            

        });         
    </script>
    <body>
       
        <div id="mycontainer" class="container container--ph">

        </div>
        <div class="container2">
        <button class="color_button" type="button" value="#FF4747">Red</button>
        <button class="color_button" type="button" value="#3399ff">Blue</button>
        <button class="color_button" type="button" value="#4DDB4D">Green</button>

        <br>
<!--<svg height="30" width="200">
  <text id="txttest" x="0" y="15" fill="red">I love SVG!</text>
  Sorry, your browser does not support inline SVG.
</svg>-->
       
         <!--<p id="txttest">test</p><i class="fa fa-camera-retro fa-lg"></i>--> 
        <input id="txtInput" size="30" type="text" name="text" placeholder="Your Text">
        <div>
            <p>font-weight</p><p id="fval"></p>
            <button class="fontweightneg" type="button">-</button>
            <button class="fontweightpos" type="button">+</button>
        </div>
        </div>        
        <br>

     
      
    </body>
</html> 