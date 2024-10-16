<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate(8);
        
        return view('admin/payment/index', compact('payments'));
    }

    public function create()
    {
        return view('admin/payment/create');
    }

    public function store(StorePaymentRequest $request)
    {
        $validated = $request->validated();

        Payment::create($validated);

        return redirect(route('paymentPage'))->with('success', 'Payment created successfully!');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin/payment/edit', compact('payment'));
    }

    public function update(UpdatePaymentRequest $request, $id)
    {
        $validated = $request->validated();

        $payment = Payment::findOrFail($id);

        $payment->update($validated);

        return redirect(route('paymentPage'))->with('success', 'Payment updated successfully!');
    }

    public function delete($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin/payment/delete', compact('payment'));
    }

    public function destroy($id)
    {
        Payment::destroy($id);

        return redirect(route('paymentPage'))->with('success', 'Payment deleted successfully!');
    }
}
