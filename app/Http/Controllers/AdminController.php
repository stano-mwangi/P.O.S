<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Sales;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
$request->validate([
'category'=>'required|string'
]);
Category::create($request->all());

return redirect()->back();
    }
    public function delete_category($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function view_product(){
        $product=Product::all();
        $category=Category::all();
        return view('admin.product',compact('product','category'));
    }
   
        public function add_product(Request $request)
        {
   $request->validate([
'image'=>'max:1000'
   ]);
   
    $product= new product;
    $product->product_name=$request->product_name;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->discount_price=$request->discount_price;
    $product->quantity=$request->quantity;
    $product->category=$request->category;
    $product->save();

    
    return redirect()->back()->with('message','product added successfully');
        }
       
        public function homeAdmin(){
            return view('admin.home');
        }

        public function show_product()
        {
            $show=Product::all();
            return view('admin.show_product',compact('show'));
        }
        public function delete_product($id)
        {
            $show=product::find($id);
            $show->delete();
            return redirect()->back();
        }
        
        public function clearAllproducts(Request $request)
        {
            // Delete all items from the products table
            DB::table('products')->delete();
    
            return redirect()->back()->with('success', 'All items have been cleared from products');
        }

        public function filterSalesAdmin(Request $request)
        {
            $startDate = $request->input('from_date');
            $endDate = $request->input('to_date');
            
            if ($startDate && $endDate) {
                // Convert dates to include time part for accurate filtering
                $startDate = $startDate . ' 00:00:00';
                $endDate = $endDate . ' 23:59:59';
        
                $sales = Sales::whereBetween('updated_at', [$startDate, $endDate])->get();
            } else {
                return redirect()->back()->with('error', 'Please provide both start and end dates.');
            }
        
            if ($sales->isEmpty()) {
                return view('admin.sales', compact('sales'))->with('error', 'No sales records found for the selected period.');
            }
        
            return view('admin.sales', compact('sales'));
        }
        
        // Method to show the edit form
    public function edit_product($id)
    {
        // Retrieve the product from the database
        $category=Category::all();
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('admin.edit_product',compact('category','product'));
    }

    // Method to handle form submission and update the product
    public function update_product(Request $request, $id)
    {
        // Validate the submitted form data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            
            // Add validation rules for other fields as needed
        ]);

        // Retrieve the product from the database

        $product = Product::findOrFail($id);

        // Update the product with the new information
        // Update other fields as needed
$product->update($request->all());
        // Save the changes to the database
      
        // Redirect the user to a relevant page
      return redirect()->back();
    }

    public function importProducts(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Read the file and convert each line to an array using str_getcsv
            $path = $request->file('file')->getRealPath();
            $productsArray = array_map('str_getcsv', file($path));

            // Check if file is empty or has no data
            if (empty($productsArray)) {
                return redirect()->back()->with('error', 'The uploaded file is empty or invalid.');
            }

            // Skip the header row and validate the headers
            $header = array_shift($productsArray);
            $requiredHeaders = [ 'product_name', 'description',  'price','discount_price', 'quantity', 'in_stock','category'];
            if ($header !== $requiredHeaders) {
                return redirect()->back()->with('error', 'The uploaded file does not have the required headers.');
            }

            // Process each row
            foreach ($productsArray as $productRow) {
                $data = array_combine($header, $productRow);

                // Validate product data
                $productValidator = Validator::make($data, [
                    'product_name' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'price' => 'required|numeric',
                    'discount_price'=>'nullable|numeric',
                    'in_stock' => 'required|numeric',
                    'quantity' => 'required|integer',
                    'category' => 'required|string|max:255',
                ]);

                if ($productValidator->fails()) {
                    return redirect()->back()->with('error', 'The uploaded file contains invalid product data.');
                }

                // Create or update the product
                Product::updateOrCreate(
                  
                    [
                        'product_name' => $data['product_name'],
                        'description' => $data['description'],
                        'price' => $data['price'],
                        'discount_price' => $data['discount_price'],
                        'quantity' => $data['quantity'],
                        'in_stock' => $data['in_stock'],
                        'category' => $data['category']
                    ]
                );
            }

            return redirect()->back()->with('success', 'Products imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing the file.');
        }
    }
    
    public function exportSales()
    {
        try {
            // Fetch all sales records
            $sales = Sales::all();

            // Create a CSV file content
            $csvContent = '';
            $header = ['Sale ID', 'Product Name', 'Description', 'Price', 'Quantity', 'Date','Cart Total' ];
            $csvContent .= implode(',', $header) . "\n";

            $currentCartId = null;
            $previousTotal = 0;

            foreach ($sales as $sale) {
                if ($currentCartId !== null && $currentCartId !== $sale->cart_id) {
                    $csvContent .= 'Cart Total,,,,' . ',' . ',' . $previousTotal . "\n";
                }

                if ($currentCartId !== $sale->cart_id) {
                    $currentCartId = $sale->cart_id;
                    $previousTotal = $sale->total;
                }

                $csvContent .= $sale->cart_id . ',' . $sale->product_name . ',' . $sale->description . ',' . $sale->price . ',' . $sale->quantity . ',' . $sale->updated_at .','.','."\n";
            }

            if ($currentCartId !== null) {
                $csvContent .= 'Cart Total,,,,' . ',' . ',' . $previousTotal . "\n";
            }

            // Generate file name and path
            $fileName = 'sales_' . date('Y_m_d_H_i_s') . '.csv';
            $filePath = storage_path('app/public/' . $fileName);

            // Store the file in the public storage
            Storage::disk('public')->put($fileName, $csvContent);

            // Return the file for download
            return response()->download($filePath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while exporting the sales data.');
        }
    }

    
    public function search(Request $request){
$search = $request->search;
$show = Product::where(function($query) use ($search){
    $query->where('product_name','like',"%$search%")
    ->orWhere('description','like',"$search")
    ->orWhere('category','like',"$search%");
    
})->get();
return view('admin.show_product',compact('show'));
    }
   
    public function searchSales(Request $request){
        $searchSales = $request->searchSales;
        $sales = Sales::where(function($query) use ($searchSales){
            $query->where('product_name','like',"%$searchSales%")
            ->orWhere('description','like',"$searchSales")
            ->orWhere('updated_at','like',"$searchSales%");
            
        })->get();
        return view('admin.sales',compact('sales'));
            }

    public function view_sales(){
        $sales=Sales::all();
        return view('admin.sales',compact('sales'));
    }
    public function show_orders(){
        $orders=Order::all();
        return view('admin.show_orders',compact('orders'));
    }

    public function viewCustomeradmin()
    {
        $customers = Customer::all();
        return view('admin.view_customer', compact('customers'));
    }

    public function createCustomeradmin(){

        return view('customers.view_customer');
    }

    public function storeCustomeradmin(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'location' => 'nullable|string|max:255',
            'total_debt' => 'nullable|numeric'

        ]);

        Customer::create($request->all());

        return redirect()->back()->with('success', 'Customer Created Successfully');
    }

    public function editCustomeradmin($id)
    {
        $customer = Customer::findOrFail($id);
        
        return view('admin.edit_customer', compact('customer'));
    }

    public function updateCustomeradmin(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'location' => 'nullable|string|max:255',
            'total_debt' => 'nullable|numeric'

        ]);

        $customer->update($request->all());

        return redirect('/viewCustomeradmin')->with('success', 'Customer Updated Successfully');
    }

    public function destroyCustomeradmin($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->back()->with('success', 'Customer Deleted Successfully');
    }

    public function searchCustomeradmin(Request $request){
        $searchCustomeradmin = $request->searchCustomeradmin;
        $customers= Customer::where(function($query) use ($searchCustomeradmin){
            $query->where('customer_name','like',"%$searchCustomeradmin%")
            ->orWhere('phone_number','like',"$searchCustomeradmin");
            
        })->get();
        return view('admin.view_customer',compact('customers'));
    }
}
