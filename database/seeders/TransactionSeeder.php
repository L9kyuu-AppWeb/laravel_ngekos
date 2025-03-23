<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        Transaction::insert([
            [
                'code' => Str::upper(Str::random(10)),
                'boarding_house_id' => 1,
                'room_id' => 1,
                'name' => 'Husna Ramadhani',
                'email' => 'husna@example.com',
                'phone_number' => '081234567890',
                'payment_method' => 'Bank Transfer',
                'payment_status' => 'pending',
                'start_date' => '2025-04-01',
                'duration' => 6,
                'total_amount' => 6000000,
                'snap_token' => null
            ],
            [
                'code' => Str::upper(Str::random(10)),
                'boarding_house_id' => 2,
                'room_id' => 3,
                'name' => 'Rizky Pratama',
                'email' => 'rizky@example.com',
                'phone_number' => '081298765432',
                'payment_method' => 'E-Wallet',
                'payment_status' => 'paid',
                'start_date' => '2025-05-01',
                'duration' => 3,
                'total_amount' => 3000000,
                'snap_token' => null
            ],
            [
                'code' => Str::upper(Str::random(10)),
                'boarding_house_id' => 1,
                'room_id' => 2,
                'name' => 'Nadia Rahma',
                'email' => 'nadia@example.com',
                'phone_number' => '081212345678',
                'payment_method' => 'Credit Card',
                'payment_status' => 'failed',
                'start_date' => '2025-06-01',
                'duration' => 1,
                'total_amount' => 1000000,
                'snap_token' => null
            ],
            [
                'code' => Str::upper(Str::random(10)),
                'boarding_house_id' => 3,
                'room_id' => 4,
                'name' => 'Dian Permana',
                'email' => 'dian@example.com',
                'phone_number' => '081276543210',
                'payment_method' => 'Bank Transfer',
                'payment_status' => 'paid',
                'start_date' => '2025-07-01',
                'duration' => 12,
                'total_amount' => 12000000,
                'snap_token' => null
            ],
            [
                'code' => Str::upper(Str::random(10)),
                'boarding_house_id' => 2,
                'room_id' => 5,
                'name' => 'Adi Wijaya',
                'email' => 'adi@example.com',
                'phone_number' => '081298761234',
                'payment_method' => 'E-Wallet',
                'payment_status' => 'pending',
                'start_date' => '2025-08-01',
                'duration' => 2,
                'total_amount' => 2000000,
                'snap_token' => null
            ],
        ]);
    }
}
