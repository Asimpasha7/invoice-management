<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 fake users
        $users = User::factory(10)->create();

        // For each user, create invoices with items
        foreach ($users as $user) {
            // Create 5 invoices for each user
            $invoices = Invoice::factory(5)->create(['user_id' => $user->id]);

            // For each invoice, create 3 invoice items
            foreach ($invoices as $invoice) {
                $invoice->items()->saveMany(InvoiceItem::factory(3)->make());
            }
        }
    }
}
