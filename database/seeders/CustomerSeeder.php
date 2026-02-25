<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['name' => 'PT Maju Jaya Abadi', 'email' => 'majujaya@example.com', 'phone' => '021-1234567', 'address' => 'Jl. Sudirman No. 123, Jakarta Pusat'],
            ['name' => 'CV Sumber Rejeki', 'email' => 'sumber@example.com', 'phone' => '021-7654321', 'address' => 'Jl. Asia Afrika No. 45, Bandung'],
            ['name' => 'PT Berkah Sejahtera', 'email' => 'berkah@example.com', 'phone' => '031-1112222', 'address' => 'Jl. Basuki Rahmat No. 78, Surabaya'],
            ['name' => 'Toko Elektronik Bersama', 'email' => 'toko-elek@example.com', 'phone' => '022-3334444', 'address' => 'Jl. Braga No. 56, Bandung'],
            ['name' => 'PT Indo Makmur', 'email' => 'indomakmur@example.com', 'phone' => '024-5556666', 'address' => 'Jl. Ahmad Yani No. 89, Semarang'],
            ['name' => 'CV Bangun Jaya', 'email' => 'bangunjayapt@example.com', 'phone' => '0274-777888', 'address' => 'Jl. Malioboro No. 112, Yogyakarta'],
            ['name' => 'PT Anugerah Bersama', 'email' => 'anugerahbpt@example.com', 'phone' => '061-9990000', 'address' => 'Jl. Sudirman No. 234, Medan'],
            ['name' => 'UD Wahana Utama', 'email' => 'wahana_ud@example.com', 'phone' => '0431-111222', 'address' => 'Jl. Pangeran Diponegoro No. 67, Makassar'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
