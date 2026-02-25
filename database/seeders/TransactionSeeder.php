<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\JournalEntry;
use App\Models\ChartOfAccount;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        // Get accounts
        $kas = ChartOfAccount::where('account_number', '1100')->first();
        $piutang = ChartOfAccount::where('account_number', '1300')->first();
        $penjualan = ChartOfAccount::where('account_number', '4100')->first();
        $bebanGaji = ChartOfAccount::where('account_number', '5100')->first();
        $bebanSewa = ChartOfAccount::where('account_number', '5200')->first();
        $utangUsaha = ChartOfAccount::where('account_number', '2100')->first();
        $utangPajak = ChartOfAccount::where('account_number', '2300')->first();
        $modal = ChartOfAccount::where('account_number', '3100')->first();

        // Transaction 1: Penjualan Tunai
        $t1 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(5),
            'description' => 'Pendapatan penjualan bulan ini',
            'reference_number' => 'JL-001',
            'transaction_type' => 'credit',
        ]);
        JournalEntry::create(['transaction_id' => $t1->id, 'account_id' => $kas->id, 'debit' => 50000000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t1->id, 'account_id' => $penjualan->id, 'debit' => 0, 'credit' => 50000000]);

        // Transaction 2: Pembayaran Gaji
        $t2 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(10),
            'description' => 'Pembayaran gaji karyawan bulan lalu',
            'reference_number' => 'JL-002',
            'transaction_type' => 'debit',
        ]);
        JournalEntry::create(['transaction_id' => $t2->id, 'account_id' => $bebanGaji->id, 'debit' => 45000000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t2->id, 'account_id' => $kas->id, 'debit' => 0, 'credit' => 45000000]);

        // Transaction 3: Pembayaran Sewa
        $t3 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(15),
            'description' => 'Pembayaran sewa kantor bulan ini',
            'reference_number' => 'JL-003',
            'transaction_type' => 'debit',
        ]);
        JournalEntry::create(['transaction_id' => $t3->id, 'account_id' => $bebanSewa->id, 'debit' => 15000000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t3->id, 'account_id' => $kas->id, 'debit' => 0, 'credit' => 15000000]);

        // Transaction 4: Penjualan Kredit
        $t4 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(3),
            'description' => 'Penjualan kepada PT Maju Jaya',
            'reference_number' => 'JL-004',
            'transaction_type' => 'credit',
        ]);
        JournalEntry::create(['transaction_id' => $t4->id, 'account_id' => $piutang->id, 'debit' => 25000000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t4->id, 'account_id' => $penjualan->id, 'debit' => 0, 'credit' => 25000000]);

        // Transaction 5: Pembelian Perlengkapan
        $t5 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(7),
            'description' => 'Pembelian supplies kantor',
            'reference_number' => 'JL-005',
            'transaction_type' => 'debit',
        ]);
        $supplies = ChartOfAccount::where('account_number', '5400')->first();
        JournalEntry::create(['transaction_id' => $t5->id, 'account_id' => $supplies->id, 'debit' => 2500000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t5->id, 'account_id' => $utangUsaha->id, 'debit' => 0, 'credit' => 2500000]);

        // Transaction 6: Penyetoran Modal
        $t6 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(30),
            'description' => 'Penyetoran modal awal',
            'reference_number' => 'JL-006',
            'transaction_type' => 'credit',
        ]);
        JournalEntry::create(['transaction_id' => $t6->id, 'account_id' => $kas->id, 'debit' => 100000000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t6->id, 'account_id' => $modal->id, 'debit' => 0, 'credit' => 100000000]);

        // Transaction 7: Pembayaran Listrik
        $t7 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(12),
            'description' => 'Pembayaran tagihan listrik',
            'reference_number' => 'JL-007',
            'transaction_type' => 'debit',
        ]);
        $listrik = ChartOfAccount::where('account_number', '5300')->first();
        JournalEntry::create(['transaction_id' => $t7->id, 'account_id' => $listrik->id, 'debit' => 3500000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t7->id, 'account_id' => $kas->id, 'debit' => 0, 'credit' => 3500000]);

        // Transaction 8: Piutang Diterima
        $t8 = Transaction::create([
            'transaction_date' => Carbon::now()->subDays(2),
            'description' => 'Penerimaan piutang dari PT Maju Jaya',
            'reference_number' => 'JL-008',
            'transaction_type' => 'debit',
        ]);
        JournalEntry::create(['transaction_id' => $t8->id, 'account_id' => $kas->id, 'debit' => 25000000, 'credit' => 0]);
        JournalEntry::create(['transaction_id' => $t8->id, 'account_id' => $piutang->id, 'debit' => 0, 'credit' => 25000000]);
    }
}
