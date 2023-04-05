<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            [
                'kode_order' => 'OR001',
                'kode_supplier' => 'S0001',
                'kode_karyawan' => 'K0001',
                'tanggal' => '2022-11-01',
                'do' => 'DO001',
                'keterangan' => 'Beli Bahan1',
                'grandtotal' => '10000',
            ],
            [
                'kode_order' => 'OR002',
                'kode_supplier' => 'S0002',
                'kode_karyawan' => 'K0002',
                'tanggal' => '2022-11-02',
                'do' => 'DO002',
                'keterangan' => 'Beli Bahan2',
                'grandtotal' => '20000',
            ],
            [
                'kode_order' => 'OR003',
                'kode_supplier' => 'S0001',
                'kode_karyawan' => 'K0002',
                'tanggal' => '2022-11-03',
                'do' => 'DO003',
                'keterangan' => 'Beli Bahan3',
                'grandtotal' => '30000',
            ],

        ];
    }
}
