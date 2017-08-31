<!DOCTYPE html>
<html>
<head>
<!-- Load the Paper.js library -->
<script type="text/javascript" src="dist/paper-full.js"></script>
<!-- Define inlined PaperScript associate it with myCanvas -->
<script type="text/paperscript" canvas="myCanvas">
        
var myCircle = new Path.Circle(new Point(300, 250), 100);
//myCircle.strokeColor = 'gray';
//myCircle.selected = true;
//myCircle.fillColor = 'black';
myCircle.removeSegment(3);

myCircle.fillColor = {
    gradient: {
        stops: [['white', 0.1],['red', 0.8],['#'+'A3141B', 1]],
        radial: true
    },
    origin: myCircle.position,
    destination: myCircle.bounds.rightCenter
};

var myCircle2 = new Path.Circle(new Point(300, 215), 100);
//myCircle.strokeColor = 'black';
//myCircle.selected = true;
myCircle2.fillColor = 'white';
myCircle2.removeSegment(3);

var myCircle3 = new Path.Circle(new Point(500, 230), 70);
//myCircle.strokeColor = 'black';
//myCircle.selected = true;
myCircle3.fillColor = 'black';
myCircle3.removeSegment(1);

var rectangle = new Rectangle(new Point(203, 211), new Size(194, 30));
var shape = new Shape.Ellipse(rectangle);
shape.fillColor = 'black';

// Define two points which we will be using to construct
// the path and to position the gradient color:
var point1 = [0,350];
var point2 = [350, 0];

// Create a line between point1 and point2 points:
var path = new Path.Line({
    from: point1,
    to: point2,
    // Fill the line stroke with a gradient of two color stops
    strokeColor: {
    gradient: {
        stops: ['blue', 'red']
    },
            //origin and destination defines the direction of your gradient. In this case its vertical i.e bottom(blue/cooler) to up(red/warmer) refering to link you sent.
    origin: [0,200], //gradient will start applying from y=200 towards y=0. Adjust this value to get your desired result
    destination: [0,0]
},
    strokeWidth: 5
});

</script>
</head>
<body>
	<canvas id="myCanvas" resize width="1000" height="800" style></canvas>
</body>
</html>