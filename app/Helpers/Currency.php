<?php

namespace App\Helpers;

class Currency
{
    public static function formatRp($amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}
