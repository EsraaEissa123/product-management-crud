<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SearchCheapest extends Command
{ 
    protected $signature = 'products:search-cheapest {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $pharmacies = DB::table('pharmacies as phar')
        ->join('pharmacy_product as pivot', 'phar.id', '=', 'pivot.pharmacy_id')
        ->select('phar.id', 'phar.name', 'pivot.price')
        ->where('pivot.product_id', '=', $id)
        ->orderBy('pivot.price', 'asc')
        ->limit(5)
        ->get();
            echo response()->json($pharmacies);
    }
}
