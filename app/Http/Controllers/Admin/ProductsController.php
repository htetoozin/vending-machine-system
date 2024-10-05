<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Requests\StorePurchaseRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\PurchaseService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct(private PurchaseService $purchaseService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(ProductFilter $filter)
    {
        $theads = config('table.products');
        $products = Product::filter($filter)->latest()->paginate(1);

        return view('admin.products.index', compact('theads', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        Gate::authorize('viewAny', Product::class);

        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        Gate::authorize('viewAny', Product::class);

        $data = $request->validated();

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('flash', "{$data['name']} has been successfully created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize('viewAny', Product::class);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('flash', "{$data['name']} has been successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('flash', "{$product->name} has been successfully deleted!");
    }


    /**
     * Display the specified purchase resource.
     */
    public function createPurchase(Product $product)
    {
        $theads = config('table.transactions');

        $transactions = Transaction::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->latest()
            ->get();

        return view('admin.products.purchases.create', compact('theads', 'product', 'transactions'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storePurchase(StorePurchaseRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $userId = auth()->id();

        DB::transaction(function () use ($data, $userId) {

            $product = Product::find($data['product_id']);

            $this->purchaseService->create($userId, $data, $product->price);

            $product->quantity_available -= $data['qty'];
            $product->save();
        });

        return back()->with('flash', "Save successfully!");
    }
}
