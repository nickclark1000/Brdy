$(function(){

    var canvas=document.getElementById("canvas");
    var ctx=canvas.getContext("2d");
    var canvasTemp=document.getElementById("canvasTemp");
    var ctxTemp=canvasTemp.getContext("2d");
    var canvasOffset=$("#canvas").offset();
    var offsetX=canvasOffset.left;
    var offsetY=canvasOffset.top;

    var startX;
    var startY;
    var isDown=false;

    $("#canvasTemp").css({ left:-1500, top:0 });

    function drawLine(toX,toY,context){
        context.beginPath();
        context.moveTo(startX, startY);
        context.lineTo(toX,toY);
        context.stroke();
    }

    function handleMouseDown(e){
      e.preventDefault();
      mouseX=parseInt(e.clientX-offsetX);
      mouseY=parseInt(e.clientY-offsetY);

      // save drag-startXY, 
      // move temp canvas over main canvas,
      // set dragging flag
      startX=mouseX;
      startY=mouseY;
      ctxTemp.clearRect(0,0,canvasTemp.width,canvasTemp.height);
      $("#canvasTemp").css({ left:0, top:0 });
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
      drawLine(mouseX,mouseY,ctx);
    }

    function handleMouseMove(e){
      e.preventDefault();        
      if(!isDown){return;}
      mouseX=parseInt(e.clientX-offsetX);
      mouseY=parseInt(e.clientY-offsetY);
      // clear the temp canvas
      // on temp canvas draw a line from drag-start to mouseXY
      ctxTemp.clearRect(0,0,canvasTemp.width,canvasTemp.height);
      drawLine(mouseX,mouseY,ctxTemp);
    }

    $("#canvas").mousedown(function(e){handleMouseDown(e);});
    $("#canvas").mousemove(function(e){handleMouseMove(e);});
    $("#canvas").mouseup(function(e){handleMouseUp(e);});
    $("#canvas").mouseout(function(e){handleMouseUp(e);});

}); // end $(function(){});