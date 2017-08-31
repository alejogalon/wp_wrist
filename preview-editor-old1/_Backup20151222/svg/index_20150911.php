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
    </style>
    <script src="js/jquery-2.0.0.js"></script>
    <script src="js/pablo.js"></script>
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
        <input id="txtInput" size="30" type="text" name="text" placeholder="Your Text"> 
        </div>        
         <br>
     
      
    </body>
</html> 