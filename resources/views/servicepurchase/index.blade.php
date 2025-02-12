<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Image Upload</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Multiple Image Upload with Preview</h2>

    <form id="uploadForm" enctype="multipart/form-data">
        @csrf
        <input type="file" id="images" name="images[]" multiple>
        <div id="preview"></div>
        <button type="submit">Upload</button>
    </form>

    <script>
        $(document).ready(function() {
            $("#images").on("change", function() {
                $("#preview").html(""); // Clear previous previews
                let files = this.files;

                if (files) {
                    $.each(files, function(index, file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            $("#preview").append(
                                `<img src="${e.target.result}" width="100" height="100" style="margin:5px;">`
                                );
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });

            $("#uploadForm").on("submit", function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('image.upload') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert("Images uploaded successfully!");
                        console.log(response.paths);
                    },
                    error: function(error) {
                        alert("Upload failed!");
                        console.log(error);
                    }
                });
            });
        });
    </script>

</body>

</html>
