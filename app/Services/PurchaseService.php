<?php

namespace App\Services;

use App\Models\Transaction;

class PurchaseService
{
    /**  
     *  Create Transaction
     */
    public function create($userId, $data, $price): Transaction
    {
        return Transaction::create([
            'product_id' => $data['product_id'],
            'user_id' => $userId,
            'qty' => $data['qty'],
            'price' => $price,
            'total_amount' => $data['qty'] * $price,
        ]);
    }
}
