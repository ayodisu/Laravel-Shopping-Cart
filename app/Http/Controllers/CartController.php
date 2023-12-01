<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;

    class CartController extends Controller
    {
        public function cart()
        {
            return view('cart.cart');
        }

        public function addToCart($id)
        {
            $product = Product::FindOrFail($id);
            $cartItems = session()->get('cartItems', []);

            if (isset($cartItems[$id])) {
                $cartItems[$id]['quantity']++;
            } else {
                $cartItems[$id] = [
                    "image_path" => $product->image_path,
                    "name" => $product->name,
                    // "brand" => $product->brand,
                    "details" => $product->details,
                    "price" => $product->price,
                    "quantity" => 1
                ];
            }

            session()->put('cartItems', $cartItems);
            return redirect()->back()->with('success', 'Added to cart!');
        }

            public function delete(Request $request)
            {
                if ($request->id) {
                    $cartItems = session()->get('cartItems');

                    if (isset($cartItems[$request->id])) {
                        unset($cartItems[$request->id]);
                        session()->put('cartItems', $cartItems);
                    }

                    return redirect()->back()->with('success', 'Deleted');
                }
            }

        public function updateToCart($id, Request $request)
    {
        // Get the product
        $product = Product::find($id);

        // Validate the request data
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Get the cart items from the session
        $cartItems = session()->get('cartItems', []);

        // Check if the product exists in the cart
        if(isset($cartItems[$id])) {
            // Update the quantity
            $cartItems[$id]['quantity'] = $request->quantity;
        }

        // Put the cart items back in the session
        session()->put('cartItems', $cartItems);

        // Redirect back to the cart page with a success message
        return redirect()->route('cart')->with('success', 'Cart updated successfully');
    }

}
