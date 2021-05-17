<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\tag;

class ProductController extends Controller
{
    public function index(){
        $product = Product::where('status', 2)->latest('id')->paginate(4); //Retorna todos los productos que esten en estado 2 (como borrador)

        return view('pages.products.index',compact('product'));
    }

    public function show(Product $product){

        $similares = Product::where('category_id', $product->category_id) //Filtra TODOS los productos cuyo category_id coincide con el category_id del $product
                            ->where('status', 2)
                            ->where('id','!=', $product) //Muestra todos los productos y que no se repita él mismo 
                            ->latest('id')//Ordenar de manera descendente
                            ->take(4)//Trae solo (x) product
                            ->get(); //Crear coleccion

        return view('pages.products.show', compact('product', 'similares'));
    }

    public function category(Category $category){
        $products = Product::where('category_id', $category->id)
                            ->where('status', 2)
                            ->latest('id')
                            ->paginate(4);

        return view('pages.products.category', compact('products', 'category'));
    }

    public function tag(Tag $tag){
        $products = $tag->products()->where('status', 2)->latest('id')->paginate(4);

        return view('pages.products.tag', compact('products', 'tag'));
    }
}