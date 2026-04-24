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
            ["product_picture"=>"","code"=>"JTM90GREY38","name"=>"JOTAMASTIC 90 GREY 38","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTTHINNER17","name"=>"THINNER NO. 17","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTHXPR7030G","name"=>"Hardtop XP Ral 7030 Grey","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTTHINNER10","name"=>"THINNER NO. 10","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTM90AL","name"=>"JOTAMASTIC 90 ALUMINIUM","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUTC24","name"=>"HARDTOP XP BROOM YELLOW RAL 1032","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"NPC0,7","name"=>"HARDTOP XP, SULFUR YELLOW RAL 1016","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTCOAT2","name"=>"JOTAFLOOR EP COATING GREY STD071","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTFGFG1","name"=>"JOTAFLOOR EP GLASSFLAKE GREEN STD257","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUT615","name"=>"HARDTOP XP, LIGHT GREY RAL 7035","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUTC17","name"=>"HARDTOP XP YELLOW RALL 1021","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUTC18","name"=>"HARDTOP XP BLACK RAL 9005","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUTC2","name"=>"HARDTOP XP, SIGNAL RED RAL 3001","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTSFPRIMER","name"=>"JOTAFLOOR SF PRIMER","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"CBLACKCS650","name"=>"Epoxy Finish Paint Black CS 650","unit"=>"KG"],
            ["product_picture"=>"","code"=>"CGREYCS611","name"=>"Epoxy Finish Paint Grey CS 611","unit"=>"KG"],
            ["product_picture"=>"","code"=>"CORANGECS623","name"=>"Epoxy Finish Paint Orange CS 623","unit"=>"KG"],
            ["product_picture"=>"","code"=>"CTEP","name"=>"Thinner for Epoxy Paint","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTEPRIMERHS","name"=>"JOTAFLOOR EASYFLOW PRIMER HS","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUTC10","name"=>"JOTAFLOOR PU TC, GREY STD 71","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUTC14","name"=>"JOTAFLOOR PU TC, TRAFFIC BLUE RAL 5017","unit"=>"LTR"],
            ["product_picture"=>"","code"=>"JTPUTY34","name"=>"HARDTOP XP CREAM Y34 (AS2700)","unit"=>"LTR"],
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
