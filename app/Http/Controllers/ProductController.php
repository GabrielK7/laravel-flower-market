<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
    {
        $products = Product::with('category')->get();
       return view('products.index', compact('products'));
    }

    public function create()
    {
       $categories = Category::all();
       return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produkt bol úspešne vytvorený.');
    }

    public function show($id)
    {
        // Logika pre zobrazenie konkrétneho produktu
    }

    
    public function edit($id)
    {
        // Logika pre zobrazenie formulára pre úpravu existujúceho produktu
    }

    public function update(Request $request, $id)
    {
        // Logika pre aktualizáciu existujúceho produktu v databáze
    }

    public function destroy($id)
    {
        // Logika pre vymazanie produktu z databázy
    }
}
