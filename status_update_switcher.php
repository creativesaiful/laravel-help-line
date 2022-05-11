
<!-- View  -->

 <label class="switch switch-primary">
                                        <input class="switch-input status_change" type="checkbox"
                                        {{ $brand->status == 1 ? 'checked' : '' }} data-flag='{{ $brand->status }}'
                                            data-id="{{ $brand->id }}">
                                        <span class="switch-track"></span>
                                        <span class="switch-thumb"></span>
</label>

<!-- ajax -->

<script> 

        $('.status_change').change(function() {
            var status = $(this).attr('data-flag');
            var id = $(this).attr('data-id');

            if (status == 1) {
                status = 0;


            } else {
                status = 1;
            }

            $.ajax({
                type: "post",
                url: "{{ route('brand.status') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": status,
                    "id": id
                },
                success: function(response) {

                    toastr.success(response.message);

                }
            });


        });
</script>

<<?php 

 // Route

Route::post('brand/status', [BrandController::class, 'ajax_brand_list'])->name('brand.status');



//Contoller Method 


 public function ajax_brand_list(Request $request){
        $brands = Brand::find($request->id);
        $brands->status = $request->status;
        $brands->save();
        return response()->json(['status' => 'success', 'message' => 'Brand status updated successfully']);
    }