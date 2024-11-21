<?php

namespace App\Http\Controllers;

use App\Events\StockUpdated;
use App\Models\Product;
use App\Models\User;
use App\Notifications\StockAlertNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->q) {
            $products = Product::with('notifications')->where('name', 'like', '%' . $request->q . '%')->paginate(8);
        } else {
            $products = Product::with('notifications')->paginate(8);
        }
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity_in_stock' => 'required|integer',
            'minimum_stock' => 'required|integer',
        ]);
        $validated['user_id'] = Auth::id();  // Add the user_id to the validated array

        $product = Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity_in_stock' => 'required|integer',
            'minimum_stock' => 'required|integer',
        ]);

        $product->update($validated);

        if ($product->quantity_in_stock < $product->minimum_stock) {
            event(new StockUpdated($product));
            User::where('id', Auth::id())->get()->first()->notify(new StockAlertNotification($product));
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
