<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Orders;
use App\Models\Carts;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    //Show sản phẩm
    public function product()
    {
        $products = Products::product_admin();
        $categories = Categories::Allcategory();
        return view('admin.product_admin', compact('products', 'categories'));
    }
    //Thêm sản phẩm
    public function storeProduct(Request $request)
    {
        $data = $request->only(['name', 'description', 'price', 'category_id']);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'upload/' . $imageName;
            $image->move(public_path('upload'), $imageName);
            $data['img'] = url($imagePath);
        }

        Products::create($data);
        return redirect()->route('product_admin')->with('success', 'Sản phẩm đã được thêm!');
    }
    //Xóa sản phẩm
    public function destroyProduct($id)
    {
        try {
            $product = Products::findOrFail($id);
            if ($product->img) {
                $filePath = public_path($product->img);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $product->delete();
            return redirect()->route('product_admin')->with('success', 'Sản phẩm xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xóa sản phẩm.');
        }
    }

    //Sửa sản phẩm
    public function editProduct($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::Allcategory();
        return view('products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $data = $request->only(['name', 'description', 'price', 'category_id']);

        // Upload hình ảnh mới nếu có
        if ($request->hasFile('img')) {
            if ($product->img) {
                $filePath = public_path($product->img);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'upload/' . $imageName;
            $image->move(public_path('upload'), $imageName);
            $data['img'] = url($imagePath);
        }
        $product->update($data);

        return redirect()->route('product_admin')->with('success', 'Sản phẩm đã được cập nhật!');
    }


    //Show danh mục
    public function category()
    {
        $categories = Categories::category_ad();
        return view('admin.cetegory_admin', compact('categories'));
    }

    // Thêm danh mục
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Categories::create([
            'name' => $request->name
        ]);

        return redirect()->route('category_admin')->with('success', 'Danh mục đã được thêm!');
    }

    // Sửa danh mục
    public function editCategory($id)
    {
        $category = Categories::findOrFail($id);
        return view('admin.edit_category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Categories::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('category_admin')->with('success', 'Danh mục đã được cập nhật!');
    }

    // Xóa danh mục
    public function destroyCategory($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return redirect()->route('category_admin')->with('success', 'Danh mục đã được xóa!');
    }

    //Show tài khoản
    public function user()
    {
        $users = User::all();
        return view('admin.user_admin', compact('users'));
    }
    public function updateRole(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:1,2',
        ]);

        $user = User::findOrFail($request->user_id);

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Quyền đã được cập nhật.');
    }

    public function lockUser($id)
    {
        $user = User::findOrFail($id);
        $user->locked = true;
        $user->save();
        return redirect()->back()->with('success', 'Tài khoản đã được khóa.');
    }

    public function unlockUser($id)
    {
        $user = User::findOrFail($id);
        $user->locked = false;
        $user->save();
        return redirect()->back()->with('success', 'Tài khoản đã được mở khóa.');
    }
    //Show bill
    public function bill()
    {
        $orders = orders::all();
        return view('admin.bill_admin', compact('orders'));
    }

    public function bill_detail($id)
    {
        $cartItems = Carts::where('id_order', $id)->get();
        $order = Orders::find($id); // Assuming you have an Order model to fetch order details
        return view('admin.bill_admin_detail', compact('cartItems', 'order'));
    }
    //Show comment
    public function comment()
    {
        return view('admin.comment_admin');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Orders::find($id);
        if (!$order) {

            return redirect()->back()->with('error', 'Order not found.');
        }

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Đã cập nhật trạng thái.');
    }
}
