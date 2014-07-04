 // $(window).on('resize',respondCanvas());
var canvas=document.getElementById("canvas");
var ctx=canvas.getContext("2d");
var canvasTemp=document.getElementById("canvasTemp");
var ctxTemp=canvasTemp.getContext("2d");
drawType = 0; //0 line, 1 circle
var startX = '';
var startY = '';
var isDown=false;

$('#draw-color').hover(function(){
  $('#color-picker').show();
});

$('#draw-line').click(function(){
  drawType = 0;
});

$('#draw-circle').click(function(){
  drawType = 1;
});
$('#color-red').click(function(){
  ctx.strokeStyle = 'red';
  ctxTemp.strokeStyle = 'red';
});
$('#color-blue').click(function(){
  ctx.strokeStyle = 'blue';
  ctxTemp.strokeStyle = 'blue';
});
$('#color-black').click(function(){
  ctx.strokeStyle = 'black';
  ctxTemp.strokeStyle = 'black';
});
$('#color-yellow').click(function(){
  ctx.strokeStyle = 'yellow';
  ctxTemp.strokeStyle = 'yellow';
});
$('#color-green').click(function(){
  ctx.strokeStyle = 'green';
  ctxTemp.strokeStyle = 'green';
});

$('#clear-all').click(function(){
  ctx.clearRect(0,0,canvasTemp.width,canvasTemp.height);
})

$("#canvasTemp").css({ left:-1500, top:0 });

function drawLine(toX,toY,context){
    context.beginPath();
    context.moveTo(startX, startY);
    context.lineTo(toX,toY);
    context.stroke();
}
function drawOval(x, y, context) {
    context.beginPath();
    context.moveTo(startX, startY + (y - startY) / 2);
    context.bezierCurveTo(startX, startY, x, startY, x, startY + (y - startY) / 2);
    context.bezierCurveTo(x, y, startX, y, startX, startY + (y - startY) / 2);
    context.closePath();
    context.stroke();
}

function handleMouseDown(e){
  e.preventDefault();
  mouseX=parseInt(e.clientX-offsetX);
  mouseY=parseInt(e.clientY-offsetY);
  console.log(offsetX, offsetY);

  // save drag-startXY, 
  // move temp canvas over main canvas,
  // set dragging flag
  startX=mouseX;
  startY=mouseY;
  ctxTemp.clearRect(0,0,canvasTemp.width,canvasTemp.height);
  $("#canvasTemp").css({ left:0, top:35 });
  isDown=true;
}

function handleMouseUp(e){
  e.preventDefault();
  if(!isDown){return;}
  // clear dragging flag
  // move temp canvas offscreen
  // draw the user's line on the main canvas
  isDown=false;
  mouseX=parseInt(e.clientX-offsetX);
  mouseY=parseInt(e.clientY-offsetY);
  $("#canvasTemp").css({ left:-1500, top:0 });
  if(drawType == 0){
    drawLine(mouseX,mouseY,ctx);
  } else {
    drawOval(mouseX,mouseY, ctx);
  }
}

function handleMouseMove(e){
  e.preventDefault();        
  if(!isDown){return;}
  mouseX=parseInt(e.clientX-offsetX);
  mouseY=parseInt(e.clientY-offsetY);
  // clear the temp canvas
  // on temp canvas draw a line from drag-start to mouseXY
  ctxTemp.clearRect(0,0,canvasTemp.width,canvasTemp.height);
  if(drawType == 0){
    drawLine(mouseX,mouseY,ctxTemp);
  } else {
    drawOval(mouseX,mouseY, ctxTemp);
  }
}


$("#canvas").mousedown(function(e){handleMouseDown(e);});
$("#canvas").mousemove(function(e){handleMouseMove(e);});
$("#canvas").mouseup(function(e){handleMouseUp(e);});
$("#canvas").mouseout(function(e){handleMouseUp(e);});

function respondCanvas(){
    var startX = '';
    var startY = '';
    var isDown=false;

    canvas.width = $('#video-wrapper-grp').width(); //max width
    canvas.height = $('#video-wrapper-grp').height(); //max height
    canvasTemp.width = $('#video-wrapper-grp').width(); //max width
    canvasTemp.height = $('#video-wrapper-grp').height(); //max height
    videoOffset=$("#video-wrapper1").offset();
    canvasOffset=$("#canvas").offset({top:videoOffset.top, left: videoOffset.left});
    canvasTempOffset=$("#canvasTemp").offset({top:videoOffset.top, left: videoOffset.left});
 //   $("#canvasTemp").css({ left:videoOffset.left, top:0 });
    offsetX=videoOffset.left;
    offsetY=videoOffset.top;
}