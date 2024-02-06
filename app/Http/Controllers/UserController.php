<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;

use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() {
        $menus = Menu::all();
        $order = session()->get('order', []);
        $total = 0;

        foreach ($order as $id => $order_detail) {
            $subtotal = isset($order_detail['subtotal']) ? $order_detail['subtotal'] : 0;
            $subtotal += $order_detail['quantity'] * $order_detail['menu_price'];
            $order[$id]['subtotal'] = $subtotal;
            $total += $subtotal;
        }
        session()->put('order', $order);  // Update the session with new subtotal values
        return view('pointakses/user/index', compact('menus', 'order', 'total'));
    }
    public function menu_user(){
        $menus = Menu::all();

        return view('pointakses/user/page_menu', compact('menus'));
    }

    public function filterMenu_user(Request $request){
        $query = Menu::query();
        $categories = Category::all();

        if($request->ajax()){
            $menus = $query->where(['category_id'=>$request->category])->get();
            return response() -> json(['menus'=>$menus]);
        }
        $menus = $query->get();

        return view ('pointakses/user/page_menu', compact('categories', 'menus'));
    }

    public function about_user(){
        return view('pointakses/user/page_about');
    }
    public function contact_user(){
        return view('pointakses/user/page_contact');
    }
    public function menuOrder(){
        return view('pointakses/user/order');
    }

    public function addMenutoOrder($id)
    {
        // Ensure the user is authenticated
        $this->middleware('auth');

        $menu = Menu::findOrFail($id);
        $userId = auth()->id();

        // Get the user's cart from the session
        $order = session()->get("order_$userId", []);

        if(isset($order[$id])) {
            $order[$id]['quantity']++;
            $order[$id]['subtotal'] = $order[$id]['quantity'] * $order[$id]['menu_price'];
        } else {
            $order[$id] = [
                "menu_id" => $menu->id,
                "menu_name" => $menu->menu_name,
                "menu_pic" => $menu->menu_pic,
                "quantity" => 1,
                "menu_price" => $menu->menu_price,
                "menu_desc" => $menu->menu_desc,
                "subtotal" =>$menu->menu_price
            ];
        }

        // Store the updated cart in the user's session
        session()->put("order_$userId", $order);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
    }
    
    public function updateorder(Request $request)
    {
        $this->middleware('auth');

        $userId = auth()->id();

        if ($request->id && $request->quantity) {
            // Get the user's cart from the session
            $order = session()->get("order_$userId");

            if (isset($order[$request->id])) {
                $order[$request->id]["quantity"] = $request->quantity;
                // Recalculate subtotal when updating quantity
                $order[$request->id]["subtotal"] = $request->quantity * $order[$request->id]["menu_price"];
                // Store the updated cart in the user's session
                session()->put("order_$userId", $order);
                session()->flash('success', 'Product quantity updated.');
            }
        }
    }
  
    public function deleteMenu(Request $request)
    {
        $this->middleware('auth');

        $userId = auth()->id();

        if($request->id) {
            // Get the user's cart from the session
            $order = session()->get("order_$userId");

            if(isset($order[$request->id])) {
                unset($order[$request->id]);
                // Store the updated cart in the user's session
                session()->put("order_$userId", $order);
            }

            session()->flash('success', 'Menu successfully deleted.');
        }
    }

    public function checkout()
    {
        $order = Session::get("order_" . auth()->id(), []);
        $total = $this->calculateTotal($order);

        return view('pointakses/user/checkout', compact('order', 'total'));
    }

    private function calculateTotal($order)
    {
        $total = 0;

        foreach ($order as $id => $order_detail) {
            $total += $order_detail['subtotal'];
        }

        return $total;
    }
    public function history_order()
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang saat ini masuk
    
        $groupedOrders = DB::table('orders')
            ->select('id_pesanan', 'total', DB::raw('GROUP_CONCAT(menu_name SEPARATOR ", ") as menu_names'))
            ->where('users_id', $userId) // Menambahkan kondisi untuk hanya mengambil pesanan oleh pengguna yang saat ini masuk
            ->groupBy('id_pesanan', 'total')
            ->get();
    
        return view('pointakses/user/history_order', ['groupedOrders' => $groupedOrders]);
    }
}