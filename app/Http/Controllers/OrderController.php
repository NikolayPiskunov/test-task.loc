<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            'id',
            'name',
            'title',
            'phone',
            'company',
        ];
        $userId = Auth::id();
        $items = Order::select($columns)
            ->where('user_id', $userId)
            ->paginate(10);
        return view('orders.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request, Order $order)
    {
        $data = $request->except('file');
        $filename = $order->saveFile($request->file('file'));
        $data['file'] = $filename;
        $result = $order->create($data);
        return back()->with('success', 'Заявка успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $user_id = Auth::id();
        if (intval($order->user_id) !== intval($user_id)) {
            abort(404);
        }
        return view('orders.show', compact('order'));
    }
}
