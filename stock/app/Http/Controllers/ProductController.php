<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Category;
use App\Models\Demande;
use App\Models\Employée;
use App\Models\Product;
use App\Models\Profile;
use App\Models\StockEnier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $products = Product::paginate(5);
        $category = Category::all();
        return view('products.index',compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $Formfildes = $request->validated();
        $this->uploadImage($request,$Formfildes);
        $Formfildes['created_at'] = $request->created_at;
        Product::create($Formfildes);
        return to_route('products.index')->with('successModal', 'new product crated successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, Product $product)
    {
        $Formfildes = $request->validated();
        $this->uploadImage($request,$Formfildes);
        $product->fill($Formfildes)->save();
        return to_route('products.index')->with('success',"product $product->name is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index'); 
       }

    private function uploadImage(ProductsRequest $request,array &$Formfildes)
    {
     unset($Formfildes['image']);
     if($request->hasFile('image'))
     {
        $Formfildes['image'] = $request->file('image')->store('images/products','public');
     }
    }
    public function addToCart(Request $request, $productId)
    {
        // dd($request->quantity);
        $product = Product::find($productId);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        
        // Get the current cart from the session, or initialize an empty array if it's not set yet
        $cart = $request->session()->get('cart', []);
        $profile_id = Auth::id();
        // Add the selected product to the cart with the product's ID as the key
        $cart[$product->id] = [
            'id' => $product->id,
            'quantity' => $request->quantity,
            'profile_id' => 2,

            // Add any other relevant product information you want to store in the cart
        ];
    
        // Store the updated cart back into the session
        $request->session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
    public function panier() {
        $carts = session()->get('cart',[]);
        $Employes = Employée::all();
       return view('products.panier',compact('carts','Employes'));
    }



public function removeFromCart(Request $request, $productId)
{
    $carts = $request->session()->get('cart', []);

    if (isset($carts[$productId])) {
        unset($carts[$productId]);
        $request->session()->put('cart', $carts);
    }
    if(sizeof($carts)>=1)
  {
    $Employes = Employée::all();
    return view('products.panier',compact('carts','Employes'));

  }else{
    return to_route('demandes.index');

  }

}
public function confirmCart(Request $request)
{
    $carts = session()->get('cart', []);
    $checked = $request->input('cheked');
    $profile_id = Auth::id();
    $employé_id = null; // Initialize employé_id with null by default

    if ($checked !== null) {
        $employé_id = $request->employé_id;
    }

    foreach ($carts as $productId => $cartItem) {
        $Formfildes = [
            'product_id' => $cartItem['id'],
            'quantité' => $cartItem['quantity'],
            'profile_id' => $profile_id,
            'employé_id' => $employé_id,
        ];

        $stock = StockEnier::where('product_id', $Formfildes['product_id'])->first();

        if ($stock && $stock->status === 'En_stock') {
            if ($stock->quantité >= $Formfildes['quantité']) {
                $Formfildes['status'] = 'accepter';
                $stock->quantité -= $Formfildes['quantité'];
                $stock->save();
            } else {
                $Formfildes['status'] = 'traiter';
            }
        } else {
            $Formfildes['status'] = 'traiter';
        }

        Demande::create($Formfildes);

    }
    
    // Clear the cart after confirmation
    $request->session()->forget('cart');
    
    $profile = Profile::find($profile_id);
    // dd($profile);
    if($profile->role === 'admin'){
        return redirect()->route('mesDemande')->with('successModal', 'Cart confirmed successfully. Proceed to checkout.');

    }else{
        return to_route('demandes.user')->with('successModal', 'new Demande add successfully');;

    }
}


}
