use Intervention\Image\Facades\Image;

//Image Intervension for image resize


<?php 
$imagepath = $request->file('product_thumbnail');
        $imgName = hexdec(uniqid()).'.'.$imagepath->getClientOriginalExtension();

        Image::make($imagepath)->resize(917, 1000)->save('upload/product/thumbnail/'.$imgName);
        $imgUrl = ('upload/product/multiImg/'.$imgName);
 ?>





//Multiimage upload
<?php 

$multi_images = $request->file('multi_images');

        foreach($multi_images as $img){
            $singleImg = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();

            Image::make($img)->resize(917, 1000)->save('upload/products/multiImg/'.$singleImg);
            $imageUrl = ('upload/products/multiImg/'.$imgName);

            MultiImage::insert([
                'product_id'=> $productId,
                'image_path'=>$imageUrl,
            ]);

        }
 ?>

<!-- Simple Laravel Image Upload  -->
<?php
 function ProfileUpdate(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required || min:11 || max:11',
            'default_currency'=>'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        
        $name = $request->name;
        $phone = $request->phone;
        $default_currency= $request->default_currency;

        //profile image procesing
        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/uploads'), $imageName); 
        }



        $user = User::where('id', auth()->user()->id)->first();
        $user->name = $name;
        $user->phone = $phone;
        $user->default_currency = $default_currency;

        if($imageName){
            $user->profile_photo_path = $imageName;
        }
        
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile Updated');


       
    }
