{{-- view user --}}

 <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#alter_pagination').DataTable( {
                "pagingType": "full_numbers",
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

    {{-- endview user  --}}

 @if(Route::currentRouteName() == 'addUsers')
     <script>
         $(document).ready(function (){

             $('.vendorOptions').hide();
             $('.shopperOptions').hide();

             $('#roleId').change(function (){
                let roleId=$(this).val();
                if (roleId == 2)
                {
                    $('.vendorOptions').show();
                    $('.shopperOptions').hide();
                }
                 if (roleId == 3)
                 {
                     $('.vendorOptions').hide();
                     $('.shopperOptions').show();
                 }
             });

             $('#categoriesUser').select2();


         });
     </script>
@endif

 @if(Route::currentRouteName() == 'createCategory')
     <script>
         $(document).ready(function (){

             $('.parentOptions').hide();
             $('.childOptions').hide();

             $('#parentCategory').change(function (){
                 let parent=$(this).val();
                 if (parent == 1)
                 {
                     $('.parentOptions').show();
                     $('.childOptions').hide();
                 }
                 else
                 {
                     $('.parentOptions').hide();
                     $('.childOptions').show();
                 }
             });

             $('#parentId').select2();


         });
     </script>


 @endif

    <!--   <script>-->

    <!-- var firstUpload = new FileUploadWithPreview('myFirstImage')-->
    <!-- var secondUpload = new FileUploadWithPreview('mySecondImage')-->
    <!-- var thirdUpload = new FileUploadWithPreview('myThirdImage')-->

    <!--    CKEDITOR.replace('miniContent');-->
    <!--</script>-->