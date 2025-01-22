<!-- third party script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- End Google Tag Manager (noscript) -->
<script>
    const playButton = document.getElementById('playButton');
    const videoPopup = document.getElementById('videoPopup');
    const closeButton = document.getElementById('closeButton');
    const video = document.getElementById('video');
    const thumbnail = document.getElementById('thumbnail');

    function openPopup() {
        videoPopup.style.display = 'flex';
        video.play();
    }

    function closePopup() {
        videoPopup.style.display = 'none';
        video.pause();
        video.currentTime = 0;
    }

    playButton.addEventListener('click', openPopup);
    thumbnail.addEventListener('click', openPopup);
    closeButton.addEventListener('click', closePopup);
</script>

