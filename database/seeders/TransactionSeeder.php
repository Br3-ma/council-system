<?php

namespace Database\Seeders;

use App\Livewire\Dashboard\Customs;
use App\Models\CustomDetail;
use App\Models\Reciept;
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
        $t1 = Transaction::create([
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
        $t2 = Transaction::create([
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
        $t2 = Transaction::create([
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
        $t3 = Transaction::create([
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
        $t4 = Transaction::create([
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
        $t5 = Transaction::create([
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
            'transaction_id' => $t5->id,
            'type' => 'vehicle',
            'vehicleRegNumber' => '8383762739',
            'entity' => 'vehicle'
        ]);

        Reciept::create([
            'transaction_id' => $t5->id,
            'receipt_date' => now(),
            'total_amount'  => $t5->total_amount,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => $t5->total_amount,
            'payment_method' => $t5->payment_method,
            'payment_status' => $t5->total_amount,
            'printed_date' => now(),
            'voided' => 0,
        ]);

        Reciept::create([
            'transaction_id' => $t1->id,
            'receipt_date' => now(),
            'total_amount'  => $t5->total_amount,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => $t5->total_amount,
            'payment_method' => $t5->payment_method,
            'payment_status' => $t5->total_amount,
            'printed_date' => now(),
            'voided' => 0,
        ]);

        Reciept::create([
            'transaction_id' => $t2->id,
            'receipt_date' => now(),
            'total_amount'  => $t5->total_amount,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => $t5->total_amount,
            'payment_method' => $t5->payment_method,
            'payment_status' => $t5->total_amount,
            'printed_date' => now(),
            'voided' => 0,
        ]);

        Reciept::create([
            'transaction_id' => $t3->id,
            'receipt_date' => now(),
            'total_amount'  => $t5->total_amount,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => $t5->total_amount,
            'payment_method' => $t5->payment_method,
            'payment_status' => $t5->total_amount,
            'printed_date' => now(),
            'voided' => 0,
        ]);

        Reciept::create([
            'transaction_id' => $t4->id,
            'receipt_date' => now(),
            'total_amount'  => $t5->total_amount,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'net_amount' => $t5->total_amount,
            'payment_method' => $t5->payment_method,
            'payment_status' => $t5->total_amount,
            'printed_date' => now(),
            'voided' => 0,
        ]);
    }
}
