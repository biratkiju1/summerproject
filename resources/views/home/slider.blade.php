<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Slider</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="slider">
        <div class="slides">
            <!-- Slide 1 -->
            <div class="slide">
                <img src="home/images/paese4.png" alt="Gift Box 2">
            </div>
            <!-- Slide 2 -->
            <div class="slide">
                <img src="home/images/paese3.jpg" alt="Gift Box 2">
            </div>
             <!-- Slide 3 -->
             <div class="slide">
                <img src="home/images/Paese1.jpg" alt="Gift Box 1">
            </div>
        </div>
        <!-- Navigation Arrows -->
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </section>

   <script>
    let currentSlide = 0;

function moveSlide(direction) {
    const slides = document.querySelector(".slides");
    const totalSlides = slides.children.length;

    currentSlide += direction;

    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }

    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
}
</script>
