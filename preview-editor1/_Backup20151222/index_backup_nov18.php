<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pablo SVG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>        -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
    
    .forTextFit{
        lengthAdjust: spacingAndGlyphs;
    }
    </style>
    
    <script src="js/jquery-2.0.0.js"></script>
    <script src="js/pablo.js"></script>    
    <script>

        $(document).ready(function () {                        
            //fetch the svg file
            Pablo(mycontainer).load('mycanvas_1.svg');                      
                        
            $('.test_button').click(function () {
                var $svgelement = $("#svgelement");
                $svgelement.find(".bandtexttest").attr("font-size", "1"+"em");
            });
            
            //change color of the wristband
            $('.color_button').click(function () {

                var background = document.getElementById("bandcolor"); 
                background.style.fill=$(this).val();
            });

            //add text
            $("#txtInput").attr("maxlength", 30);
            $("#txtInput").keyup(function(){
                //$("#bandtextpath").text($('#txtInput').val().toUpperCase());
                $("#front-text").text($('#txtInput').val());
                var myLength = $("#txtInput").val().length;
                var path = document.getElementById('MyPath');
                if(myLength > '22'){
                    document.getElementById("bandtext").style.fontSize  = "20px";                    
//                    document.getElementById("front-start").style.fontSize  = "30px";                  
                    path.setAttribute('d','M28 100 q 125 23 250 -2');
                }else{
                    document.getElementById("bandtext").style.fontSize  = "30px";
//                    document.getElementById("front-start").style.fontSize  = "30px";
                    path.setAttribute('d','M28 105 q 125 23 250 -2')
                }
            });
            $("#front-start-icon").keyup(function(){
                $('#front-start').empty().append($('#front-start-icon').val());
                 //document.getElementById("front-start").style.color = "red";
            });
            $("#front-end-icon").keyup(function(){
                $('#front-end').empty().append($('#front-end-icon').val());                        
            });
            
            
            $("#front-color").keyup(function(){
                //$('#front-end').empty().append($('#front-color').val());
                document.getElementById("bandtext").style.fill = $('#front-color').val();
                document.getElementById("bandtext").style.opacity = "1";                    
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
        <button class="color_button" type="button" value="red">Red</button>
        <button class="color_button" type="button" value="blue">Blue</button>
        <button class="color_button" type="button" value="green">Green</button>
        <!--<button class="test_button" type="button" >Test</button>-->
        <br>
        <input id="txtInput" size="22" type="text" name="text" placeholder="Your Text">
        <input id="front-start-icon" size="10" type="text" name="text" placeholder="Front Start (fontawesome cheatsheet)">
        <input id="front-end-icon" size="10" type="text" name="text" placeholder="Front End (fontawesome cheatsheet)">
        <input id="front-color" type="text" name="text" placeholder="Hex Color">
        </div>        
        <br>

     
      
    </body>
</html> 