var canvas = document.querySelector('#myCanvas');
var ctx = canvas.getContext('2d');

var x = (canvas.width / 2) + Math.floor(Math.random() + 21) - 10;
var y = (canvas.height - 30) + Math.floor(Math.random() + 21) - 10;
var dx = 3;
var dy = -3;
var ballRadius = 20;
var paddleHeight = 10;
var paddleWidth = 75;
var paddleX = (canvas.width - paddleWidth)/2;
var rightPress = false;
var leftPress = false;
var brickRowCount = 3;
var brickColumnCount = 5;
var brickWidth = 75;
var brickHeight = 20;
var brickPadding = 10;
var brickOffsetTop = 30;
var brickOffsetLeft = 30;
var score = 0;
var lives = 3;
var level = 1;
var maxLevel = 5;
var pause = false;
var ball = new Image();
ball.src = 'https://s20.postimg.org/cayyuwmal/ball.jpg';

var bricks = [];
initBricks();
function initBricks() {
    for(c=0;c<brickColumnCount;c++) {
        bricks[c] = [];
        for(r=0;r<brickRowCount;r++) {
            bricks[c][r] = {x:0, y:0, status: 1};
        }
    }
}


document.addEventListener('keydown', keyDownHandler);
document.addEventListener('keyup', keyUpHandler);

function drawBricks() {
    for( c=0;c<brickColumnCount;c++) {
        for(r=0;r<brickRowCount;r++) {
            if(bricks[c][r].status == 1){
                var brickX = (c*(brickWidth + brickPadding))+brickOffsetLeft;
                var brickY = (r*(brickHeight + brickPadding))+brickOffsetTop;
                bricks[c][r].x = brickX;
                bricks[c][r].y = brickY;
                ctx.beginPath();
                ctx.rect(brickX, brickY, brickWidth, brickHeight);
                ctx.fillStyle = "#0095DD";
                ctx.fill();
                ctx.closePath();
            }
        }
    }
}

function keyDownHandler(e) {
    if(e.keyCode == 39){
        rightPress = true;
    } else if (e.keyCode == 37){
        leftPress = true;
    }
}

function keyUpHandler(e) {
    if (e.keyCode == 39) {
        rightPress = false;
    } else if (e.keyCode == 37) {
        leftPress = false;
    }
}

function drawBall() {
    ctx.drawImage(ball, x, y, ballRadius, ballRadius);
}

function drawPadlle() {
    ctx.beginPath();
    ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
    ctx.fillStyle = "#0095DD";
    ctx.fill();
    ctx.closePath();
}

function collisionDetection() {
    for(c=0;c<brickColumnCount;c++){
        for(r=0;r<brickRowCount;r++){
            var b = bricks[c][r];
            if(b.status == 1){
               if(x > b.x && x < b.x + brickWidth && y > b.y && y < b.y + brickHeight){
                    dy = -dy;
                   b.status = 0;
                   score++;
                   if(score == brickColumnCount*brickRowCount){
                      if(level == maxLevel){
                          alert('You Won!');
                          document.location.reload();
                      } else {
                          level++;
                          brickRowCount++;
                          initBricks();
                          score = 0;
                          dx += 1;
                          dy = -dy;
                          dy -= 1;
                          x = (canvas.width/2) + Math.floor(Math.random() + 21) - 10;              
                          y = (canvas.height - 30) + Math.floor(Math.random() + 21) - 10;
                          paddleX = (canvas.width - paddleWidth)/2;
                          pause = true;
                          
                          ctx.beginPath();
                          ctx.rect(0,0,canvas.width, canvas.height);
                          ctx.fillStyle = "#0095DD";
                          ctx.fill();
                          ctx.font = "16px Arial";
                          ctx.fillStyle = "#FFF";
                          ctx.fillText("Livel " + (level - 1) + " completed, starting next level...", 110, 150);  
                          ctx.closePath();
                          
                          setTimeout(function() {
                              pause = false;
                              draw();
                          }, 3000);
                      }
                   }
                } 
            }
        }
    }
}

function drawScore(){
    ctx.font = "16px Arial";
    ctx.fillStyle = "0095DD";
    ctx.fillText("Score: " + score, 8, 20);
}

function drawLives() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "0095DD";
    ctx.fillText("Lives: " + lives, canvas.width-65, 20);  
}

function drawLevel() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "0095DD";
    ctx.fillText("Level: " + level, 210, 20);
}

function draw() {
    ctx.clearRect(0,0, canvas.width, canvas.height);
    drawBall();
    drawPadlle();
    drawBricks();
    drawScore();
    collisionDetection();
    drawLives();
    drawLevel();
    
    if(y + dy < ballRadius){
        dy = -dy;
    }else if (y + dy > (canvas.height - ballRadius) ) {
        if(x > paddleX && x < paddleX + paddleWidth) {
            dy = -dy;
        }else if( y > canvas.height - ballRadius){
             lives--;
             console.log(lives);
             if(!lives){
                 alert("Game Over");
                 document.location.reload();
             } else {
                 x = (canvas.width/2) + Math.floor(Math.random() + 21) - 10 ;
                 y = (canvas.height-30) + Math.floor(Math.random() + 21) - 10;
                 paddleX = (canvas.width - paddleWidth)/2;
             }
        }
    }
    else if (x + dx < ballRadius || x + dx > canvas.width - ballRadius){
        dx = -dx;
    }
    if(rightPress && paddleX < canvas.width - paddleWidth){
        paddleX += 7;
    } else if (leftPress && paddleX > 0){
        paddleX -= 7;
    }
    
    x += dx;
    y += dy;
    if(!pause){
       requestAnimationFrame(draw);
    }
    
    
}

document.addEventListener("mousemove", mouseMoveHandler);
  
function mouseMoveHandler(e){
     var relativeX = e.clientX - canvas.offsetLeft;
     if(relativeX > 0+paddleWidth/2 && relativeX < canvas.width-paddleWidth/2) {
         paddleX = relativeX - paddleWidth/2;
     }
}

draw();