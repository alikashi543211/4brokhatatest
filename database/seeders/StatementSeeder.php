<?php

namespace Database\Seeders;

use App\Models\Statement;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class StatementSeeder extends Seeder
{
    public function run(): void
    {
        $stmt = Statement::create([
            'title' => 'Statement Until Date 23-3-2026',
            'statement_date' => '2026-03-23',
            'notes' => 'Barsi ki tayari ka hisaab',
            'is_active' => 1,
            'created_by' => 1,
        ]);

        $kharcha = [
            [1, 'Dua E Kumail', 7000, null],
            [2, 'Namaz Abu', 2500, null],
            [3, 'Khatam', 3500, null],
            [4, 'Onn', 6000, null],
            [5, 'Bottle Jumerat', 3500, null],
            [6, 'Mistri Ramzan', 3000, null],
            [7, 'Chawal + Chicken', 1000, null],
            [8, 'Sabzi', 5000, null],
            [10, 'Sabzi', 3700, null],
            [11, 'Mulazim (Dasti)', 5000, 'green'],
            [12, 'Name Plate for Qabr', 5000, null],
        ];

        foreach ($kharcha as [$sr, $desc, $amt, $color]) {
            Transaction::create([
                'statement_id' => $stmt->id,
                'type' => 'kharcha',
                'description' => $desc,
                'amount' => $amt,
                'sr_no' => $sr,
                'color_tag' => $color,
                'transaction_date' => '2026-03-23',
                'created_by' => 1,
            ]);
        }

        $amad = [
            [1, 'Mujahid Bhai Ny Bhejy', 25000],
            [2, 'Kashif Ny Diye', 6500],
            [3, 'Mujahid Bhai Ny Bhejy', 10000],
            [4, 'Kumail Bhai Ny Diye', 10000],
        ];

        foreach ($amad as [$sr, $desc, $amt]) {
            Transaction::create([
                'statement_id' => $stmt->id,
                'type' => 'amad',
                'description' => $desc,
                'amount' => $amt,
                'sr_no' => $sr,
                'transaction_date' => '2026-03-23',
                'created_by' => 1,
            ]);
        }

        $stmt2 = Statement::create([
            'title' => 'Statement March 2026 - Week 1',
            'statement_date' => '2026-03-07',
            'notes' => 'Hafta awal ka hisaab',
            'is_active' => 1,
            'created_by' => 1,
        ]);

        $kharcha2 = [
            [1, 'Roti Aata', 2000, null],
            [2, 'Bijli Bill', 5500, null],
            [3, 'Gas Bill', 1800, null],
            [4, 'Dawa Dawai', 3200, null],
            [5, 'Transport', 1500, null],
        ];

        foreach ($kharcha2 as [$sr, $desc, $amt, $color]) {
            Transaction::create([
                'statement_id' => $stmt2->id,
                'type' => 'kharcha',
                'description' => $desc,
                'amount' => $amt,
                'sr_no' => $sr,
                'color_tag' => $color,
                'transaction_date' => '2026-03-07',
                'created_by' => 1,
            ]);
        }

        $amad2 = [
            [1, 'Ahmed Bhai Salary', 20000],
            [2, 'Rental Income', 12000],
        ];

        foreach ($amad2 as [$sr, $desc, $amt]) {
            Transaction::create([
                'statement_id' => $stmt2->id,
                'type' => 'amad',
                'description' => $desc,
                'amount' => $amt,
                'sr_no' => $sr,
                'transaction_date' => '2026-03-07',
                'created_by' => 1,
            ]);
        }
    }
}

