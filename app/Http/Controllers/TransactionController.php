<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Customer;
use App\Models\Fleet;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $base_price = 500000;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::paginate(10);
        return view('dashboard', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $fleets = Fleet::all();

        return view('transaction.create_edit', ['customers' => $customers, 'fleets' => $fleets]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $data = $request->validated();
        $data['base_price'] = $this->base_price;
        $data['total_price'] = $this->base_price * (date_diff(date_create($data['started_at']), date_create($data['ended_at']))->d + 1);

        Transaction::create($data);

        return redirect('/')->with('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $customers = Customer::all();
        $fleets = Fleet::all();

        return view('transaction.create_edit', ['customers' => $customers, 'fleets' => $fleets, 'transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $data = $request->validated();
        $data['base_price'] = $this->base_price;
        $data['total_price'] = $this->base_price * (date_diff(date_create($data['started_at']), date_create($data['ended_at']))->d + 1);

        $transaction->update($data);

        return redirect('/')->with('success');
    }
}
