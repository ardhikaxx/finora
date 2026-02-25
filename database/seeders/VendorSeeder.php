<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = [
            ['name' => 'PT Supplier Utama', 'email' => 'supplierutama@example.com', 'phone' => '021-5556666', 'address' => 'Jl. Kamal Raya No. 78, Jakarta Barat'],
            ['name' => 'CV Distributor Barang', 'email' => 'distributor@example.com', 'phone' => '021-7778888', 'address' => 'Jl. MH Thamrin No. 90, Tangerang'],
            ['name' => 'Toko Perlengkapan Kantor', 'email' => 'atk@example.com', 'phone' => '022-9990000', 'address' => 'Jl. Merdeka No. 23, Bandung'],
            ['name' => 'PT Utilities Indonesia', 'email' => 'utilities@example.com', 'phone' => '031-1112222', 'address' => 'Jl. Dharmahongsa No. 45, Surabaya'],
            ['name' => 'CV Jaya Abadi Supplies', 'email' => 'jayaabadi@example.com', 'phone' => '024-2223333', 'address' => 'Jl. Pandanaran No. 67, Semarang'],
            ['name' => 'PT Berkat Sentosa', 'email' => 'berkatsentosa@example.com', 'phone' => '0274-444555', 'address' => 'Jl. Magelang No. 89, Yogyakarta'],
            ['name' => 'UD Sumber Rejeki Makassar', 'email' => 'sumbermks@example.com', 'phone' => '0431-666777', 'address' => 'Jl. Pettarani No. 34, Makassar'],
            ['name' => 'CV Indo Equip', 'email' => 'indoequip@example.com', 'phone' => '061-888999', 'address' => 'Jl. Hang Tuah No. 56, Medan'],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}
