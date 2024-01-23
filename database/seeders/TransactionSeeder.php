<?php

namespace Database\Seeders;

use App\Livewire\Dashboard\Customs;
use App\Models\CustomDetail;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'stream_id' => 1,
            'customer_id' => null,
            'employee_id' => null,
            'terminal_id' => 1,
            'district_id' => 1,
            'transaction_date' => now(),
            'category' => 'markets',
            'entity' => 'markets',
            'total_amount' => 350,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => 350,
            'payment_method' => 'cash',
            'payment_status' => 1,
        ]);
        Transaction::create([
            'stream_id' => 1,
            'customer_id' => null,
            'employee_id' => null,
            'terminal_id' => 2,
            'district_id' => 2,
            'transaction_date' => now(),
            'category' => 'markets',
            'entity' => 'markets',
            'total_amount' => 150,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => 150,
            'payment_method' => 'cash',
            'payment_status' => 1,
        ]);
        Transaction::create([
            'stream_id' => 1,
            'customer_id' => null,
            'employee_id' => null,
            'terminal_id' => 2,
            'district_id' => 2,
            'transaction_date' => now(),
            'category' => 'markets',
            'entity' => 'markets',
            'total_amount' => 150,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => 150,
            'payment_method' => 'cash',
            'payment_status' => 1,
        ]);
        Transaction::create([
            'stream_id' => 2,
            'customer_id' => null,
            'employee_id' => null,
            'terminal_id' => 3,
            'district_id' => 3,
            'transaction_date' => now(),
            'total_amount' => 453,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => 150,
            'payment_method' => 'cash',
            'payment_status' => 1,
        ]);
        Transaction::create([
            'stream_id' => 3,
            'customer_id' => null,
            'employee_id' => null,
            'terminal_id' => 1,
            'district_id' => 1,
            'transaction_date' => now(),
            'total_amount' => 150,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => 150,
            'payment_method' => 'cash',
            'payment_status' => 1,
        ]);
        $transac = Transaction::create([
            'stream_id' => 3,
            'customer_id' => null,
            'employee_id' => null,
            'terminal_id' => 2,
            'district_id' => 2,
            'transaction_date' => now(),
            'total_amount' => 350,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => 150,
            'payment_method' => 'cash',
            'payment_status' => 1,
        ]);

        CustomDetail::create([
            'transaction_id' => $transac->id,
            'type' => 'vehicle',
            'vehicleRegNumber' => '8383762739',
            'entity' => 'vehicle'
        ]);
    }
}
