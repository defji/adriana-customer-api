<?php

namespace App\Services;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Exception;

class CustomerApiService
{


    public function getAll()
    {
        return Customer::all();
    }

    public function create(StoreCustomerRequest $request)
    {
        try {
            $customer = Customer::create([
                "name"          => $request->name,
                "code"          => $request->code,
                "contract_date" => $request->contract_date,
            ]);
            return response($customer, 201);
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {
            $customer->update([
                "name"          => $request->name,
                "code"          => $request->code,
                "contract_date" => $request->contract_date,
            ]);
            return response($customer, 200);
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }


}
