@extends('admin.layout.layout')
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-info card-outline mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Service Details</h3>
                                <a href="{{ route('servicepurchase.create') }}" class="btn btn-primary btn-sm">Add
                                    Service Amount</a>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Category Images -->
                                    <div class="col-md-12">
                                        @php
                                            $image = explode('|', $details->image);
                                        @endphp

                                        <div class="row">
                                            @foreach ($image as $key => $value)
                                                <div class="col-md-3 mb-3">
                                                    <img src="{{ asset('service/' . $value) }}" alt="Category Image"
                                                        class="img-fluid rounded zoom-trigger"
                                                        style="max-width: 150px; cursor: pointer;" data-bs-toggle="modal"
                                                        data-bs-target="#imageModal"
                                                        data-bs-image="{{ asset('service/' . $value) }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Bootstrap Modal -->
                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img id="modalImage" src="" alt="Preview Image"
                                                        class="img-fluid rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>First Name:</strong> <?php echo $details->first_name; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Last Name:</strong> <?php echo $details->last_name; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Email:</strong> <?php echo $details->email; ?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <p><strong>Phone Number</strong> <?php echo $details->phone; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Service Name:</strong> <?php echo $details->service_name; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Pic Date:</strong> <?php echo $details->pic_date; ?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <p><strong>Address</strong> <?php echo $details->address; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>City:</strong> <?php echo $details->city; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Number Shoes:</strong> <?php echo $details->number_shoes; ?></p>
                                            </div>

                                            <div class="col-md-12">
                                                <p><strong>Comments:</strong> <?php echo $details->comment; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('servicepurchase.index') }}" class="btn btn-secondary">Back to
                                Servicepurchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@stop
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Get the clicked image
            var imageUrl = button.getAttribute('data-bs-image'); // Get image URL

            // Set the modal image
            var modalImage = document.getElementById('modalImage');
            modalImage.setAttribute('src', imageUrl);
        });
    });
</script>
