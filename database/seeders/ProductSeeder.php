<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ["code"=>"JTM90GREY38","name"=>"JOTAMASTIC 90 GREY 38","unit"=>"LTR"],
            ["code"=>"JTTHINNER17","name"=>"THINNER NO. 17","unit"=>"LTR"],
            ["code"=>"JTHXPR7030G","name"=>"Hardtop XP Ral 7030 Grey","unit"=>"LTR"],
            ["code"=>"JTTHINNER10","name"=>"THINNER NO. 10","unit"=>"LTR"],
            ["code"=>"JTM90AL","name"=>"JOTAMASTIC 90 ALUMINIUM","unit"=>"LTR"],
            ["code"=>"JTPUTC24","name"=>"HARDTOP XP BROOM YELLOW RAL 1032","unit"=>"LTR"],
            ["code"=>"NPC0,7","name"=>"HARDTOP XP, SULFUR YELLOW RAL 1016","unit"=>"LTR"],
            ["code"=>"JTCOAT2","name"=>"JOTAFLOOR EP COATING GREY STD071","unit"=>"LTR"],
            ["code"=>"JTFGFG1","name"=>"JOTAFLOOR EP GLASSFLAKE GREEN STD257","unit"=>"LTR"],
            ["code"=>"JTPUT615","name"=>"HARDTOP XP, LIGHT GREY RAL 7035","unit"=>"LTR"],
            ["code"=>"JTPUTC17","name"=>"HARDTOP XP YELLOW RALL 1021","unit"=>"LTR"],
            ["code"=>"JTPUTC18","name"=>"HARDTOP XP BLACK RAL 9005","unit"=>"LTR"],
            ["code"=>"JTPUTC2","name"=>"HARDTOP XP, SIGNAL RED RAL 3001","unit"=>"LTR"],
            ["code"=>"JTSFPRIMER","name"=>"JOTAFLOOR SF PRIMER","unit"=>"LTR"],
            ["code"=>"CBLACKCS650","name"=>"Epoxy Finish Paint Black CS 650","unit"=>"KG"],
            ["code"=>"CGREYCS611","name"=>"Epoxy Finish Paint Grey CS 611","unit"=>"KG"],
            ["code"=>"CORANGECS623","name"=>"Epoxy Finish Paint Orange CS 623","unit"=>"KG"],
            ["code"=>"CTEP","name"=>"Thinner for Epoxy Paint","unit"=>"LTR"],
            ["code"=>"JTEPRIMERHS","name"=>"JOTAFLOOR EASYFLOW PRIMER HS","unit"=>"LTR"],
            ["code"=>"JTPUTC10","name"=>"JOTAFLOOR PU TC, GREY STD 71","unit"=>"LTR"],
            ["code"=>"JTPUTC14","name"=>"JOTAFLOOR PU TC, TRAFFIC BLUE RAL 5017","unit"=>"LTR"],
            ["code"=>"JTPUTY34","name"=>"HARDTOP XP CREAM Y34 (AS2700)","unit"=>"LTR"],
        ];

        foreach ($products as $item) {
            DB::table('products')->updateOrInsert(
                ['product_code' => $item['code']],
                [
                    'product_name'    => $item['name'],
                    'product_brand'   => "null", // default
                    'product_unit'    => strtoupper($item['unit']),
                    'product_picture' => null,
                    'description'     => $item['name'],
                    'product_price'   => 0,
                    'created_at'      => Carbon::now(),
                    'updated_at'      => Carbon::now(),
                ]
            );
        }
    }
}
