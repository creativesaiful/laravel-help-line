

pacakge name: bumbummen99/shoppingcart

use Gloudemans\Shoppingcart\Facades\Cart;

 public function AddToCart(Request $request, $id)
    {
        $product =  Product::findOrFail($id);

        $product_name = $product->product_name_en;

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'size' => $product->size,
                    'color' => $product->color,
                    'image' => $product->product_thumbnail,

                ]
            ]);

            return response()->json(['success' => 'Product added to cart successfully!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'size' => $product->size,
                    'color' => $product->color,
                    'image' => $product->product_thumbnail,

                ]
            ]);

            return response()->json(['success' => 'Product added to cart successfully!']);
        }
    }