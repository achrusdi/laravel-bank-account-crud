<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BankAccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bankAccounts = BankAccount::paginate();
        // dd($bankAccounts[0]->user->name);

        return view('bank-account.index', compact('bankAccounts'))
            ->with('i', ($request->input('page', 1) - 1) * $bankAccounts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $bankAccount = new BankAccount();

        $customers = User::role('customer')->get();

        return view('bank-account.create', compact('bankAccount', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankAccountRequest $request): RedirectResponse
    {
        BankAccount::create($request->validated());

        return Redirect::route('bank-accounts.index')
            ->with('success', 'BankAccount created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $bankAccount = BankAccount::find($id);

        return view('bank-account.show', compact('bankAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $bankAccount = BankAccount::find($id);

        $customers = User::role('customer')->get();

        return view('bank-account.edit', compact('bankAccount', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankAccountRequest $request, BankAccount $bankAccount): RedirectResponse
    {
        $bankAccount->update($request->validated());

        return Redirect::route('bank-accounts.index')
            ->with('success', 'BankAccount updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        BankAccount::find($id)->delete();

        return Redirect::route('bank-accounts.index')
            ->with('success', 'BankAccount deleted successfully');
    }
}
