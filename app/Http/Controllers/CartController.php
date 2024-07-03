<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\VNPayTransaction;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart', []);
        $totalAmount = 0;
        // Tính tổng thành tiền
        foreach ($cart as $item) {
            $totalAmount += $item['total'];
        }
        return view('cart', compact('cart', 'totalAmount'));
    }

    public function cart_detail()
    {
        $cart = session()->get('cart', []);
        $totalAmount = 0;
        // Tính tổng thành tiền
        foreach ($cart as $item) {
            $totalAmount += $item['total'];
        }
        return view('cart_detail', compact('cart', 'totalAmount'));
    }

    public function history()
    {
        return view('history');
    }



    public function favorite()
    {
        return view('favorite');
    }

    public function addTOCart(Request $request)
    {
        $id = $request->input('id_product');
        $Product = Products::find($id);

        $cartItem = [
            'id_product' => $Product->id,
            'name' => $Product->name,
            'img' => $Product->img,
            'price' => $Product->price,
            'quantity' => $request->input('quantity'),
            'total' => $Product->price * $request->input('quantity'),
        ];

        $cart = session()->get('cart', []);

        $found = false;
        foreach ($cart as &$item) {
            if ($item['id_product'] == $cartItem['id_product']) {
                $item['quantity'] += $cartItem['quantity'];
                $item['total'] = $item['price'] * $item['quantity'];
                $found = true;
                break;
            }
        }
        if (!$found) {
            $cart[] = $cartItem;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }
    /* public function buyNow(Request $request)
    {
        $id = $request->input('id_product');
        $quantity = $request->input('quantity');

        $this->addToCart($request);

        return redirect()->route('cart_detail');
    } */

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['id_product'] == $id) {
                unset($cart[$key]);
                break;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }


    public function payment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        if ($paymentMethod === 'momo') {
            return $this->Momo($request);
        } elseif ($paymentMethod === 'vnpay') {
            return $this->createVNPayUrl($request);
        }

        $id_user = Auth::id();

        if (!$id_user) {
            $user = User::create([
                'name' => $request->input('customer_name'),
                'email' => $request->input('customer_email'),
                'address' => $request->input('customer_address'),
                'phone' => $request->input('customer_phone'),
            ]);
            $id_user = $user->id;
        }

        $data = $request->only([
            'receiver_name',
            'receiver_phone',
            'receiver_address',
            'customer_name',
            'customer_email',
            'customer_address',
            'customer_phone',
            'payment_method'
        ]);

        $cart = session()->get('cart', []);
        $totalAmount = array_sum(array_column($cart, 'total'));

        // Thêm thông tin người đặt hàng vào thông tin người nhận nếu không có thông tin riêng
        if (empty($data['receiver_name']) || empty($data['receiver_phone']) || empty($data['receiver_address'])) {
            $data['receiver_name'] = $data['customer_name'];
            $data['receiver_phone'] = $data['customer_phone'];
            $data['receiver_address'] = $data['customer_address'];
        }

        $data['total_amount'] = $totalAmount;
        $data['id_user'] = $id_user;

        $order = Orders::create($data);
        $order_id = $order->id;

        foreach ($cart as $item) {
            Carts::create([
                'id_product' => $item['id_product'],
                'name' => $item['name'],
                'image' => $item['img'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total' => $item['total'],
                'id_order' => $order_id,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('cart_detail')->with('success', 'Order placed successfully!');
    }


    public function orderhistory()
    {

        if (Auth::check()) {
            $id_user = Auth::id();
        }
        $orders = Orders::where('id_user', $id_user)->get();
        return view('history', compact('orders'));
    }

    public function history_detail($id)
    {
        $order = Orders::findOrFail($id);
        $cartItems = Carts::where('id_order', $id)->get();
        return view('history_detail', compact('order', 'cartItems'));
    }

    //VNPay

    private function createVNPayUrl(Request $request)
    {
        $vnp_TmnCode = env('VNPAY_TMN_CODE'); // Mã terminal của VNPay
        $vnp_HashSecret = env('VNPAY_HASH_SECRET'); // Key bí mật của VNPay
        $vnp_Url = env('VNPAY_URL'); // URL thanh toán của VNPay
        $vnp_Returnurl = route('payment.return'); // URL trả về sau khi thanh toán

        $order_id = date("YmdHis"); // Tạo mã đơn hàng duy nhất
        $vnp_TxnRef = rand(00, 9999);
        $vnp_OrderInfo = "Thanh toán đơn hàng " . rand(00, 9999);;
        $vnp_OrderType = "billpayment";
        $totalAmount = ($request->input('amount') + 35000) * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $totalAmount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= urlencode($key) . "=" . urlencode($value) . '&';
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', rtrim($hashdata, '&'), $vnp_HashSecret);
            $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );

        echo json_encode($returnData);

        /*
        // Lưu thông tin giao dịch vào cơ sở dữ liệu
        $transaction = new VNPayTransaction();
        $transaction->user()->associate(Auth::user()); // Gán user hiện tại cho transaction
        $transaction->order_id = $order_id;
        $transaction->transaction_ref = $vnp_TxnRef;
        $transaction->amount = $vnp_Amount / 100; // Chuyển lại về VND
        $transaction->payment_url = $vnp_Url;
        $transaction->save();
 */

        return redirect($vnp_Url);
    }

    public function paymentReturn(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_TxnRef = $request->input('vnp_TxnRef');
        $vnp_Amount = $request->input('vnp_Amount');

        if ($vnp_ResponseCode == '00') {
            // Payment successful, save order to database
            $order = new Orders();
            $order->order_id = $vnp_TxnRef;
            $order->amount = $vnp_Amount / 100; // Convert back to VND
            $order->status = 'paid';
            $order->save();
            return redirect()->route('cart.success');
        } else {
            // Payment failed
            return redirect()->route('cart.failure');
        }
    }

    //MOMO
    public function Momo(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = "100000";
        $orderId = time() . "";
        $returnUrl = "http://127.0.0.1:8000/cart_detail";
        $notifyUrl = "http://127.0.0.1:8000/cart_detail"; // Đảm bảo link notifyUrl không phải là dạng localhost
        $bankCode = "SML";

        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        $extraData = "";

        // Tạo mảng dữ liệu để tạo chữ ký
        $rawHashArr =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'bankCode' => $bankCode,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyUrl,
            'extraData' => $extraData,
            'requestType' => $requestType
        );
        // echo $serectkey;die;
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyUrl . "&extraData=" . $extraData . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        // Tạo mảng dữ liệu để gửi đi
        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyUrl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        // Thực hiện POST request và lấy kết quả
        $result = $this->execPostRequest($endpoint, json_encode($data));

        /* // Đoạn code này chỉ dùng để debug, có thể xóa sau khi đã kiểm tra và sẵn sàng triển khai
        dd($result); */

        // Chuyển kết quả thành mảng dữ liệu
        $jsonResult = json_decode($result, true);

        // Redirect đến trang thanh toán
        return redirect()->to($jsonResult['payUrl']);
    }

    // Hàm thực hiện POST request
    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
