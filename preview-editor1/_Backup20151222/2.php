<!DOCTYPE HTML>
<html>
  <head>
    <style>
      body {
        margin: 0px;
        padding: 0px;
      }
    </style>
  </head>
  <body>
    <canvas id="myCanvas" width="578" height="200"></canvas>
    <script>
      function loadImages(sources, callback) {
        var images = {};
        var loadedImages = 0;
        var numImages = 0;
        // get num of sources
        for(var src in sources) {
          numImages++;
        }
        for(var src in sources) {
          images[src] = new Image();
          images[src].onload = function() {
            if(++loadedImages >= numImages) {
              callback(images);
            }
          };
          images[src].src = sources[src];
        }
      }
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');

      var sources = {
        //darthVader: 'http://www.html5canvastutorials.com/demos/assets/darth-vader.jpg',
        darthVader: 'band.png',
        darthVader2: 'band2.png',
        yoda: 'http://www.html5canvastutorials.com/demos/assets/yoda.jpg'
      };

      loadImages(sources, function(images) {
        context.drawImage(images.darthVader, 0, 0, 200, 137);
        context.drawImage(images.darthVader2, 0, 0, 200, 137);
        context.drawImage(images.yoda, 350, 55, 93, 104);
      });
    context.rect(20,20,150,100);
    context.fillStyle="red";
    context.fill(); 

    </script>
    <button onclick="myFunction()">Click me</button>

  </body>
<script>
function myFunction() {
//var canvas = document.getElementById("myCanvas");
//var data = canvas.toDataURL();
//alert(data);
var data = document.getElementById("myCanvas").toDataURL();
$.post("process.php", {
	imageData : data
}, function(data) {
	window.location = data;
});
}    

//setTimeout(function() {
//canvas = document.getElementById("myCanvas");
//var jpegUrl = canvas.toDataURL("image/jpeg");
//var pngUrl = canvas.toDataURL(); // PNG is the default
//console.log("jp"+jpegUrl);
//console.log("png"+pngUrl);
//window.open("data:application/pdf;base64," + pngUrl);
//console.log('new');
//},500);
</script>
</html>      