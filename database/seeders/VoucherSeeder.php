<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vouchers = [
            [
                'title' => 'Voucher Ramadhan',
                'description' => 'Voucher ramadhan',
                'active_date' => "2024-04-05 00:00:00",
                'expiration_date' => "2024-04-15 00:00:00",
                'discount_value' => 20000,
                'quota' => 10
            ],
            [
                'title' => 'Voucher Back to School',
                'description' => 'Voucher habis cuti',
                'active_date' => "2024-05-06 00:00:00",
                'expiration_date' => "2024-05-20 00:00:00",
                'discount_value' => 10000,
                'quota' => 5
            ],
            [
                'title' => 'Voucher 5.5',
                'description' => 'Voucher Bulan Mey',
                'active_date' => "2024-05-05 00:00:00",
                'expiration_date' => "2024-05-15 00:00:00",
                'discount_value' => 20000,
                'quota' => 10
            ],
            [
                'title' => 'Voucher Pengguna Baru',
                'description' => 'Voucher pengguna baru eudaimonia bakeri',
                'active_date' => "2024-05-05 00:00:00",
                'expiration_date' => "2024-05-15 00:00:00",
                'discount_value' => 20000,
                'quota' => 30
            ],
        ];

        foreach($vouchers as $voucher){
            Voucher::create($voucher);
        }
    }
}
