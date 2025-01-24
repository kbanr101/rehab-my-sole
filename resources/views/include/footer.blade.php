@if (empty($transparentClass))
    <footer class="footer-container pt-5 pb-5">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer_item mb-4">
                        <h3 class="footer_title">RehabMySole</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui, architecto? Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Nobis, tempora.</p><br>
                        <a href="#">More about us</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer_item mb-4">
                        <h3 class="footer_title">Contact Us</h3>
                        <p><a href="tel:+19998887766">+1 (999) 888-77-66</a></p>
                        <p><a href="mailto:info@rehabmysole.com">info@rehabmysole.com</a></p>
                    </div>
                    <div class="footer_item mb-4">
                        <h3 class="footer_title">Location</h3>
                        <p>591 Connecticut 12, Groton, Connecticut - 06340</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer_item mb-4">
                        <ul class="footer_social">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/rehabmysole/"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-regular fa-paper-plane"></i></a></li>
                            <li><a href="https://www.instagram.com/rehab_my_sole/"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer_item mb-4">
                        <p>&copy; 2025 - Copyright All right reserved</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) --}}
    </footer>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.like_Blog').on('click', function() {
            var postId = $(this).data('post-id');

            var $label = $(this).nextAll('label').first();
            var $icon = $(this).find('.like_Blog' + postId);
            // console.log($icon);
            $.ajax({
                type: 'POST',
                url: '/post/' + postId + '/like',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $label.text(response.likes_count + ' Likes');
                        console.log(response.likes_count);
                        if (response.liked) {
                            $('.like_Blog' + postId).addClass('active')
                            console.log("Icon color changed to red."); // Debugging
                        } else {
                            $('.like_Blog' + postId).removeClass('active')
                            // $icon.removeClass('active'); // Add red color if liked
                            console.log("Icon color reset."); // Debugging
                        }

                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('read-selected-content');
        const content = document.getElementById('selected-content');

        button.addEventListener('click', function() {
            const text = content.textContent || content
                .innerText; // Get the text from the selected section
            const speech = new SpeechSynthesisUtterance(text); // Create a speech instance
            window.speechSynthesis.speak(speech); // Speak the text
        });
    });
</script>
<script>
    document.getElementById('stop-reading').addEventListener('click', function() {
        window.speechSynthesis.cancel(); // Stop any ongoing speech
    });
</script>
