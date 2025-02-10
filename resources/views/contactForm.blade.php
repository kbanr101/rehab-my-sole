<div class="container pt-4 pb-4">
    <div class="mainTitle text-center m-auto pb-4">
        <h3>Contact us</h3>
        <p class="m-auto">Have a question? We're here to help.</p>
    </div>
    <div id="responseMessage"></div>
    <form action="method" class="queryForm row" id="contactForm">
        @csrf
        <div class="form-group mb-3 col-md-6">
            <label for="name">Enter your full name</label>
            <input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control"
                autocomplete="off" />
        </div>
        <div class="form-group mb-3 col-md-6">
            <label for="email">Enter your email address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address"
                class="form-control" autocomplete="off" />
        </div>
        <div class="form-group mb-3 col-md-12">
            <label for="message">Type your message</label>
            <textarea type="text" rows="5" id="message" name="message" placeholder="Type your message"
                class="form-control" autocomplete="off"></textarea>
        </div>
        <div class="form-group col-md-12">
            <button type="submit" class="w-100 defaultBtnClass" aria-label="Submit Button">Send</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>

<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Validate form fields
            let isValid = true;
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Email validation regex

            $('#contactForm input').each(function() {
                if ($(this).val().trim() === '') {
                    isValid = false;
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', '');
                }
            });

            // Validate name
            const name = $('#name').val().trim();
            if (name.length < 3) {
                isValid = false;
                $('#name').css('border', '1px solid red');
                $('#responseMessage').text('Name must be at least 3 characters long.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            } else {
                $('#name').css('border', '');
            }

            // Validate email
            const email = $('#email').val().trim();
            if (!emailRegex.test(email)) {
                isValid = false;
                $('#email').css('border', '1px solid red');
                $('#responseMessage').text('Please enter a valid email address.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            } else {
                $('#email').css('border', '');
            }

            if (!isValid) {
                $('#responseMessage').text('Please fill in all required fields.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            }

            const submitButton = $('#contactForm button[type="submit"]');
            submitButton.prop('disabled', true).text('Submitting...');

            // Send AJAX request
            $.ajax({
                url: '{{ route('contact_submit') }}', // Backend PHP script
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#responseMessage').text(response.message).css({
                        'color': 'darkslategrey',
                        'padding': '8px 10px'
                    }).fadeIn();
                    $('#contactForm')[0].reset(); // Reset the form
                },
                error: function(xhr, status, error) {
                    $('#responseMessage').text('An error occurred. Please try again.').css({
                        'color': 'maroon',
                        'padding': '8px 10px'
                    }).fadeIn();
                },
                complete: function() {
                    // Re-enable the button after the request is complete
                    submitButton.prop('disabled', false).text('Submit');
                }
            });
        });
    });
</script>
