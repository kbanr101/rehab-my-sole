@extends('include.master')
@section('content')
    <!-- FilePond CSS -->
    <div class="pageNavigaton">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('personalize') }}">Personalize</a></li>
            </ul>
        </div>
    </div>
    <section class="serviceSection pt-3 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-left m-auto pb-4">
                <h3>Personalize your service</h3>
                <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet, esse omnis
                    illum
                    sed nihil, debitis dolorum quae pariatur harum asperiores quidem saepe quas, necessitatibus earum quod
                    itaque. Molestias expedita eveniet aliquid cupiditate? Consectetur cumque error ipsam?</p>
            </div>
            @php
                $user = session('user');
            @endphp
            <div class="Personalize_form">
                <div id="responseMessage"></div>
                <form method="post" id="personalizeForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="form-title">Basic Information</h3>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user['id'] ?? '' }}">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="name">Enter your first name</label>
                                <input class="form-control" type="text" readonly id="name" name="name"
                                    value="{{ $user['name'] ?? '' }}" placeholder="John" />

                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="lname">Enter your last name</label>
                                <input class="form-control" type="lname" id="lname" name="lname" value=""
                                    placeholder="Doe" />
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Enter your email address</label>
                                <input class="form-control" readonly type="email" id="email" name="email"
                                    value="{{ $user['email'] ?? '' }}" placeholder="example@gmail.com" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone">Enter your phone number</label>
                                <input class="form-control" readonly type="phone" id="phone" name="phone"
                                    value="{{ $user['phone_number'] ?? '' }}" placeholder="+91 98 765 4321" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="form-title">Appointment Information</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="service">Service type</label>
                                <select class="form-control" id="service" name="service">
                                    <option value="">Choose service type</option>
                                    @foreach ($service as $val)
                                        <option value="{{ $val->id }}">{{ $val->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="date">Date</label>
                                <input class="form-control" type="date" id="date" name="date" value=""
                                    placeholder="Pick date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="street">Street address</label>
                                <input class="form-control" type="text" id="address" name="address" value=""
                                    placeholder="Street address" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="city">City</label>
                                <input class="form-control" type="text" id="city" name="city" value=""
                                    placeholder="city" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="form-title">Shoe Information</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="number_shoes">Number of shoes</label>
                                <input class="form-control" type="number" id="number_shoes" name="number_shoes"
                                    value="" placeholder="Number of shoes" />
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="image">Upload image</label>
                                <div class="fileupload">
                                    <input type="file" id="imageUpload" accept="image/*" multiple hidden>
                                    <label for="imageUpload" class="defaultBtnClass trBtnClass">Upload from device</label>
                                    <div class="image-preview"></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="image">Upload image</label>
                                <input type="file" id="imageInput" placeholder="image " name="image[]" multiple>
                                <p id="imageCount" style="margin-top: 10px;">Total Images: 0</p>
                                <div id="previewContainer"
                                    style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="comments">Comments (what should we know?)</label>
                                <textarea class="form-control" rows="5" type="text" id="comments" name="comments" value=""
                                    placeholder="Comments (what should we know?)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="defaultBtnClass">Send your request</button>
                            {{-- <a class="defaultBtnClass" href="{{ route('checkout') }}">Send your request</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let selectedFiles = []; // Store selected files
        let inputElement = document.getElementById("imageInput");
        let previewContainer = document.getElementById("previewContainer");
        let imageCountDisplay = document.getElementById("imageCount");

        if (!inputElement || !previewContainer || !imageCountDisplay) {
            console.error("Error: Required elements not found in the DOM!");
            return;
        }

        // Function to preview selected images
        function previewImages(event) {
            let files = Array.from(event.target.files);

            files.forEach((file) => {
                if (!selectedFiles.some(f => f.name === file.name)) { // Prevent duplicates
                    selectedFiles.push(file);

                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let div = document.createElement('div');
                        div.style.position = "relative";
                        div.style.display = "inline-block";
                        div.style.margin = "5px";

                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = "100px";
                        img.style.height = "100px";
                        img.style.borderRadius = "8px";
                        img.style.objectFit = "cover";

                        let removeBtn = document.createElement('button');
                        removeBtn.innerHTML = "✖";
                        removeBtn.style.position = "absolute";
                        removeBtn.style.top = "5px";
                        removeBtn.style.right = "5px";
                        removeBtn.style.background = "red";
                        removeBtn.style.color = "white";
                        removeBtn.style.border = "none";
                        removeBtn.style.cursor = "pointer";
                        removeBtn.style.padding = "2px 5px";
                        removeBtn.style.borderRadius = "50%";

                        removeBtn.onclick = function() {
                            removeFile(file, div);
                        };

                        div.appendChild(img);
                        div.appendChild(removeBtn);
                        previewContainer.appendChild(div);
                    };

                    reader.readAsDataURL(file);
                }
            });

            updateFileInput(); // Ensure file input is updated
        }

        // Function to remove selected file from input
        function removeFile(fileToRemove, previewElement) {
            selectedFiles = selectedFiles.filter(file => file.name !== fileToRemove.name); // Remove from array

            // Update input field with the remaining files
            let dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            inputElement.files = dataTransfer.files;

            previewElement.remove(); // Remove preview from UI
            updateFileInput();
        }

        // Function to update image count
        function updateFileInput() {
            imageCountDisplay.innerText = `Total Images: ${selectedFiles.length}`;
        }

        // Attach the event listener safely
        inputElement.addEventListener("change", previewImages);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let today = new Date().toISOString().split('T')[0];
        $('#date').attr('min', today);

        $('#personalizeForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default submission

            let isUserLoggedIn = {{ $user ? 'true' : 'false' }};
            if (!isUserLoggedIn) {
                window.location.href = "{{ route('login') }}";
                return;
            }

            let isValid = true;
            $('.error-message').remove();

            $('#personalizeForm input, #personalizeForm textarea, #personalizeForm select').each(
                function() {
                    if ($(this).val().trim() === '') {
                        isValid = false;
                        $(this).css('border', '1px solid red');
                        let fieldName = $("label[for='" + $(this).attr('id') + "']").text()
                            .trim() || $(this).attr('placeholder');
                        $(this).after(
                            `<small class="error-message" style="color: red;">${fieldName} is required</small>`
                        );
                    } else {
                        $(this).css('border', '');
                    }
                });

            let imageInput = document.getElementById('imageInput');
            if (imageInput.files.length === 0) {
                isValid = false;
                $('#imageInput').css('border', '1px solid red');
                if ($('#imageInput').next('.error-message').length === 0) {
                    $('#imageInput').after(
                        '<small class="error-message" style="color: red;">Please upload at least one image</small>'
                    );
                }
            } else {
                $('#imageInput').css('border', '');
            }

            if (!isValid) {
                return;
            }

            const submitButton = $('#personalizeForm button[type="submit"]');
            submitButton.prop('disabled', true).text('Submitting...');

            $.ajax({
                url: '{{ route('personalize') }}',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#responseMessage').text(response.message).css({
                        'color': 'darkslategrey',
                        'padding': '8px 10px'
                    }).fadeIn();
                    $('#personalizeForm')[0].reset();
                    selectedFiles = [];
                    $('#imageInput').val(''); // Reset file input
                    $('#previewContainer').empty(); // Remove image previews
                    $('#imageCount').text('Total Images: 0'); // Reset image count
                },
                error: function(xhr, status, error) {
                    $('#responseMessage').text('An error occurred. Please try again.').css({
                        'color': 'maroon',
                        'padding': '8px 10px'
                    }).fadeIn();
                },
                complete: function() {
                    submitButton.prop('disabled', false).text('Submit');
                }
            });
        });
    });
</script>
