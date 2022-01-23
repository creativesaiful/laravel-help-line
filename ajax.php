  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- header link -->


<!-- //Route section -->

Route::get('/subsubcata/ajax/{cate_id}', [subsubcateController::class, 'SubcateAjax'])->name('subcata.ajax');

 

<!-- //Controller and Method -->

 function SubcateAjax($cate_id){

        $subcataInfo = Subcata::where('category_id', $cate_id)->orderBy('subcata_name_en', 'ASC')->get();
        return json_encode($subcataInfo);
    }//End Method




 <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var cateId = $(this).val();

                if (cateId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('subsubcata/ajax') }}/" + cateId,
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_category_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_category_id"]').append(
                                    ' <option value="' + value.id + '">' + value
                                    .subcata_name_en + '</option>'
                                )
                            });
                        }
                    });
                } else {
                    alert('sorry');
                }

            })
        });
    </script>

