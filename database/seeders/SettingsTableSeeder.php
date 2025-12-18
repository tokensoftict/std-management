<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => date('Y').'-'.(date('Y')+1)],
            ['type' => 'system_title', 'description' => 'SAROD'],
            ['type' => 'system_name', 'description' => 'SAROD ACADEMY'],
            ['type' => 'term_ends', 'description' => date('d/m/Y')],
            ['type' => 'term_begins', 'description' =>  date('d/m/Y')],
            ['type' => 'phone', 'description' => '08032911222'],
            ['type' => 'motto', 'description' => 'Knowledge is life'],
            ['type' => 'address', 'description' => 'IYAWO ESTATE SOBI ROAD, ILORIN KWARA STATE'],
            ['type' => 'system_email', 'description' => 'info@sarodacedemy.com'],
            ['type' => 'website', 'description' => 'www.saratuodeeinternationalacademy.com'],
            ['type' => 'alt_email', 'description' => ''],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 1],
            ['type' => 'logo', 'description' => asset('storage/uploads//logo.png')],
            ['type' => 'principal_sign', 'description' => NULL],
            ['type' => 'next_term_fees_j', 'description' => '0'],
            ['type' => 'next_term_fees_pn', 'description' => '0'],
            ['type' => 'next_term_fees_p', 'description' => '0'],
            ['type' => 'next_term_fees_n', 'description' => '0'],
            ['type' => 'next_term_fees_s', 'description' => '0'],
            ['type' => 'next_term_fees_c', 'description' => '0'],
        ];

        DB::table('settings')->insert($data);

    }
}
