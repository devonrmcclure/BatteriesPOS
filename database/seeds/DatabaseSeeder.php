<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(CustomersTableSeeder::class);
        // $this->call(StaffTableSeeder::class);
        // $this->call(StaffLocationTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(InventoryTableSeeder::class);
        // $this->call(SettingsTableSeeder::class);
        // $this->call(ToDoTableSeeder::class);
        // $this->call(QOHTableSeeder::class);
        // $this->call(AssociatedSkusTableSeeder::class);
        $this->call('UsersTableSeeder');
        $this->call('CustomersTableSeeder');
        $this->call('StaffTableSeeder');
        $this->call('StaffLocationTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('InventoryTableSeeder');
        $this->call('SettingsTableSeeder');
        $this->call('TodoTableSeeder');
        $this->call('QohTableSeeder');
        // $this->call('AssociatedSkusTableSeeder');
        $this->call('DailyCloseOutsTableSeeder');
        $this->call('InvoicesTableSeeder');
        $this->call('PartOrdersTableSeeder');
        $this->call('PurchasesTableSeeder');
        $this->call('RepairOrdersTableSeeder');
        $this->call('SalesTableSeeder');
        $this->call('StockOrderHistoryTableSeeder');
        $this->call('StockOrderProductsTableSeeder');
        $this->call('TransferHistoryTableSeeder');
        $this->call('VendorTableSeeder');
        $this->call('VendorInvoicesTableSeeder');
    }
}
