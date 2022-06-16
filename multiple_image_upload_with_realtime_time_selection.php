 <div>
                                <div class="row" id="coba"></div>
  </div>



  
<script type="text/javascript" src="{{asset('admin/js/spartan-multi-image-picker-min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $("#coba").spartanMultiImagePicker({
            fieldName: 'identity_image[]',
            maxCount: 5,
            rowHeight: '120px',
            groupClassName: 'col-md-2',
            maxFileSize: '',
            placeholderImage: {
                image: '{{asset('admin/img/placeholder/img1.jpg')}}',
                width: '100%'
            },
            dropFileLabel: "Drop Here",
            onAddRow: function (index, file) {

            },
            onRenderedPreview: function (index) {

            },
            onRemoveRow: function (index) {

            },
            onExtensionErr: function (index, file) {
                toastr.error('Please only input png or jpg type file', {
                    CloseButton: true,
                    ProgressBar: true
                });
            },
            onSizeErr: function (index, file) {
                toastr.error('File size too big', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
        });
    });
</script>