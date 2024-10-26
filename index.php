<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Carousel with Drag-and-Drop</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-image: url('http://www.desktopwallpaperhd.net/wallpapers/18/d/andromeda-space-background-computer-images-187549.jpg');
            background-attachment: fixed;
            background-size: cover;
        }

        h1 {
            margin: 0 0 30px 0;
            padding: 20px;
            background-color: rgba(20,20,20,0.9);
            color: #fff;
            text-align: center;
            font-family: Arial;
            text-transform: uppercase;
            box-shadow: 0 0 20px -1px #efefef;
        }

        .carousel_wrapper {
            position: relative;
            width: 320px;
            margin: 100px auto 0 auto;
            perspective: 1000px;
            cursor: grab;
        }

        .carousel {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transform: rotateY(-360deg) translateZ(-412px);
            animation: swirl 40s steps(10000, end) infinite;
            
        }

        .slide {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 300px;
            height: 187px;
        }

        .slide img {
            width: 280px;
            height: 175px;
            border: 3px inset rgba(47, 115, 201, 0.75);
            box-shadow: 0 0 15px 3px rgba(110, 72, 221, 0.9);
            user-select: none; /* Prevents selecting the image */
            object-fit: cover;
        }

        .slide.one { transform: rotateY(0deg) translateZ(412px); }
        .slide.two { transform: rotateY(40deg) translateZ(412px); }
        .slide.three { transform: rotateY(80deg) translateZ(412px); }
        .slide.four { transform: rotateY(120deg) translateZ(412px); }
        .slide.five { transform: rotateY(160deg) translateZ(412px); }
        .slide.six { transform: rotateY(200deg) translateZ(412px); }
        .slide.seven { transform: rotateY(240deg) translateZ(412px); }
        .slide.eight { transform: rotateY(280deg) translateZ(412px); }
        .slide.nine { transform: rotateY(320deg) translateZ(412px); }

        @keyframes swirl {   
            from { transform: rotateY(-360deg); }
            to { transform: rotateY(0deg); }
        } 
    </style>
</head>
<body>
<h1>Time-pass</h1>

<div class="carousel_wrapper" id="carousel-wrapper">
  <div class="carousel" id="carousel">
    <div class="slide one">
      <img src="./8.jpg" />
    </div>
    <div class="slide two">
      <img src="./9.jpg" />
    </div>
    <div class="slide three">
      <img src="./1.jpg" />
    </div>
    <div class="slide four">
      <img src="./2.jpg" />
    </div>
    <div class="slide five">
      <img src="./3.jpg" />
    </div>
    <div class="slide six">
      <img src="./4.jpg" />
    </div>
    <div class="slide seven">
      <img src="./5.jpg" />
    </div>
    <div class="slide eight">
      <img src="./6.jpg" />
    </div>
    <div class="slide nine">
      <img src="./7.jpg" />
    </div>
  </div>
</div>

<script>
    const carouselWrapper = document.getElementById('carousel-wrapper');
    const carousel = document.getElementById('carousel');
    let isDragging = false;
    let startX, startY;

    carouselWrapper.addEventListener('mousedown', function(event) {
        isDragging = true;
        startX = event.clientX - carouselWrapper.offsetLeft;
        startY = event.clientY - carouselWrapper.offsetTop;
        carouselWrapper.style.cursor = 'grabbing';
    });

    document.addEventListener('mouseup', function() {
        isDragging = false;
        carouselWrapper.style.cursor = 'grab';
    });

    document.addEventListener('mousemove', function(event) {
        if (isDragging) {
            let x = event.clientX - startX;
            let y = event.clientY - startY;
            carouselWrapper.style.left = `${x}px`;
            carouselWrapper.style.top = `${y}px`;
            carouselWrapper.style.position = 'absolute';
        }
    });
</script>

</body>
</html>