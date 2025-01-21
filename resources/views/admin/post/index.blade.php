 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
 <!-- Bootstrap 5 CSS (optional for better styling) -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

 @extends('admin.layout.layout')
 @section('content')
     <!--begin::App Main-->
     <main class="app-main">
         <!--begin::App Content Header-->
         <div class="app-content-header">
             <!--begin::Container-->
             <div class="container-fluid">
                 <!--begin::Row-->
                 <div class="row">
                     {{-- <div class="col-sm-6">
                        <h3 class="mb-0">Simple Tables</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                        </ol>
                    </div> --}}
                 </div>
                 <!--end::Row-->
             </div>
             <!--end::Container-->
         </div>
         <!--end::App Content Header-->
         <!--begin::App Content-->
         <div class="app-content">
             <!--begin::Container-->
             <div class="container-fluid">
                 <!--begin::Row-->
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card mb-4">
                             <div class="card-header">
                                 <h3 class="card-title">Post List</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">

                                 <table id="dataTable" class="table table-bordered" style="width:100%">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>Title</th>
                                             <th>Slug</th>
                                             <th>Description</th>
                                             <th>Image</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @php $i = 1; @endphp
                                         @foreach ($posts as $post)
                                             <td>{{ $i++ }}</td>
                                             <td>{{ $post->title }}</td>
                                             <td>{{ $post->slug }}</td>
                                             <td>{{ $post->description }}</td>
                                             <td>{{ $post->image }}</td>
                                             <td><a class="btn btn-primary btn-sm">Edit</a>
                                                 <a class="btn btn-warning btn-sm">View</a>
                                                 <a class="btn btn-danger btn-sm">Delete</a>
                                             </td>
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
                         </div>

                     </div>

                 </div>
             </div>
         </div>
     </main>

 @stop
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- DataTables JS -->
 <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
 <!-- Bootstrap 5 JS (optional for better styling) -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable({
             responsive: true, // Enables responsiveness
             paging: true, // Enables pagination
             searching: true, // Enables search box
             ordering: true, // Enables column sorting
             info: true // Shows table info
         });
     });
 </script>
 <style>
     table,
     th,
     td {
         border: 0.5px solid rgb(172, 167, 167) !important;
     }
 </style>
