<?php

namespace Database\Seeders;

use App\Models\ChartOfAccount;
use Illuminate\Database\Seeder;

class ChartOfAccountSeeder extends Seeder
{
    public function run(): void
    {
        // AKTIVA
        ChartOfAccount::create(['account_number' => '1000', 'account_name' => 'AKTIVA', 'account_type' => 'asset']);
        ChartOfAccount::create(['account_number' => '1100', 'account_name' => 'Kas', 'account_type' => 'asset', 'parent_account_id' => 1]);
        ChartOfAccount::create(['account_number' => '1200', 'account_name' => 'Bank', 'account_type' => 'asset', 'parent_account_id' => 1]);
        ChartOfAccount::create(['account_number' => '1300', 'account_name' => 'Piutang Usaha', 'account_type' => 'asset', 'parent_account_id' => 1]);
        ChartOfAccount::create(['account_number' => '1400', 'account_name' => 'Piutang Lainnya', 'account_type' => 'asset', 'parent_account_id' => 1]);
        ChartOfAccount::create(['account_number' => '1500', 'account_name' => 'Persediaan', 'account_type' => 'asset', 'parent_account_id' => 1]);
        ChartOfAccount::create(['account_number' => '1600', 'account_name' => 'Aktiva Tetap', 'account_type' => 'asset', 'parent_account_id' => 1]);
        ChartOfAccount::create(['account_number' => '1700', 'account_name' => 'Aktiva Tidak Berwujud', 'account_type' => 'asset', 'parent_account_id' => 1]);
        
        // KEWAJIBAN
        ChartOfAccount::create(['account_number' => '2000', 'account_name' => 'KEWAJIBAN', 'account_type' => 'liability']);
        ChartOfAccount::create(['account_number' => '2100', 'account_name' => 'Utang Usaha', 'account_type' => 'liability', 'parent_account_id' => 9]);
        ChartOfAccount::create(['account_number' => '2200', 'account_name' => 'Utang Gaji', 'account_type' => 'liability', 'parent_account_id' => 9]);
        ChartOfAccount::create(['account_number' => '2300', 'account_name' => 'Utang Pajak', 'account_type' => 'liability', 'parent_account_id' => 9]);
        ChartOfAccount::create(['account_number' => '2400', 'account_name' => 'Utang Bank', 'account_type' => 'liability', 'parent_account_id' => 9]);
        
        // EKUITAS
        ChartOfAccount::create(['account_number' => '3000', 'account_name' => 'EKUITAS', 'account_type' => 'equity']);
        ChartOfAccount::create(['account_number' => '3100', 'account_name' => 'Modal Saham', 'account_type' => 'equity', 'parent_account_id' => 14]);
        ChartOfAccount::create(['account_number' => '3200', 'account_name' => 'Laba Ditahan', 'account_type' => 'equity', 'parent_account_id' => 14]);
        ChartOfAccount::create(['account_number' => '3300', 'account_name' => 'Laba/Rugi Tahun Berjalan', 'account_type' => 'equity', 'parent_account_id' => 14]);
        
        // PENDAPATAN
        ChartOfAccount::create(['account_number' => '4000', 'account_name' => 'PENDAPATAN', 'account_type' => 'revenue']);
        ChartOfAccount::create(['account_number' => '4100', 'account_name' => 'Pendapatan Penjualan', 'account_type' => 'revenue', 'parent_account_id' => 18]);
        ChartOfAccount::create(['account_number' => '4200', 'account_name' => 'Pendapatan Jasa', 'account_type' => 'revenue', 'parent_account_id' => 18]);
        ChartOfAccount::create(['account_number' => '4300', 'account_name' => 'Pendapatan Lainnya', 'account_type' => 'revenue', 'parent_account_id' => 18]);
        
        // BEBAN
        ChartOfAccount::create(['account_number' => '5000', 'account_name' => 'BEBAN', 'account_type' => 'expense']);
        ChartOfAccount::create(['account_number' => '5100', 'account_name' => 'Beban Gaji dan Tunjangan', 'account_type' => 'expense', 'parent_account_id' => 22]);
        ChartOfAccount::create(['account_number' => '5200', 'account_name' => 'Beban Sewa', 'account_type' => 'expense', 'parent_account_id' => 22]);
        ChartOfAccount::create(['account_number' => '5300', 'account_name' => 'Beban Listrik dan Air', 'account_type' => 'expense', 'parent_account_id' => 22]);
        ChartOfAccount::create(['account_number' => '5400', 'account_name' => 'Beban Supplies Kantor', 'account_type' => 'expense', 'parent_account_id' => 22]);
        ChartOfAccount::create(['account_number' => '5500', 'account_name' => 'Beban Penyusutan', 'account_type' => 'expense', 'parent_account_id' => 22]);
        ChartOfAccount::create(['account_number' => '5600', 'account_name' => 'Beban Administrasi', 'account_type' => 'expense', 'parent_account_id' => 22]);
        ChartOfAccount::create(['account_number' => '5700', 'account_name' => 'Beban Lainnya', 'account_type' => 'expense', 'parent_account_id' => 22]);
    }
}
