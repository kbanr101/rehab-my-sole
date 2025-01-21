 <footer class="app-footer">
     <!--begin::To the end-->
     <div class="float-end d-none d-sm-inline">Anything you want</div>
     <!--end::To the end-->
     <!--begin::Copyright-->
     <strong>
         Copyright &copy; 2024-2025&nbsp;
         <a class="text-decoration-none">Mtriplet</a>.
     </strong>
     All rights reserved.
     <!--end::Copyright-->
 </footer>

 <script>
     tinymce.init({
         selector: 'textarea',
         plugins: [
             // Core editing features
             'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
             'searchreplace', 'table', 'visualblocks', 'wordcount',
             // Your account includes a free trial of TinyMCE premium features
             // Try the most popular premium features until Feb 4, 2025:
             'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker',
             'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage',
             'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
             'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
         ],
         toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
         tinycomments_mode: 'embedded',
         tinycomments_author: 'Author name',
         mergetags_list: [{
                 value: 'First.Name',
                 title: 'First Name'
             },
             {
                 value: 'Email',
                 title: 'Email'
             },
         ],
         ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
             'See docs to implement AI Assistant')),
     });
 </script>
