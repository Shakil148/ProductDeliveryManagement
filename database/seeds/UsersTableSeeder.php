<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
//    public function run()
//    {
//        factory(\App\Models\Common\User::class)->create(
//            [
//                'email' => 'a@a.a',
//                'password'=> bcrypt('aaaaaa'),
//            ]
//        );
//    }

    public function run()
    {
        //Admin
        $user = factory(\SGFL\User::class)->create(
            [
                'id' => 1,
                'name' =>'Admin',
                'address' =>'Test',
                'contact' =>'01238765432',
                'email' => 'admin@demo.com',
                'password'=> bcrypt('aaaaaa'),
                'designation' => 'Admin',
                'role' => 'admin',
            ]
        );
        //Dealer
        $dealer = factory(\SGFL\Dealer::class)->create(
            [
                'id' => 1,
                'name' =>'Demo Dealer',
                'code' =>'1430',
                'address' => 'dhaka',
                'contact' =>'01238765432',
                'status' => 'Active',
                ]
            );
        //Product
        $product = factory(\SGFL\Product::class)->create(
            [
                'id' => 1,
                'name' =>'Demo Product',
                'price' =>25.4,
                'unit' =>350.9,
                'date' => \Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
                'status' => 'Active',
                ]
            );
        //Depo
        $depo = factory(\SGFL\Depo::class)->create(
            [
                'id' => 1,
                'name' =>'Demo Depo',
                'address' => 'dhaka',
                'contact' =>'01238765432',
                'status' => 'Active',
            ]
        );
        // $dealer = factory(\SGFL\Dealer::class)->create();
        $dealerInvoices = factory(\SGFL\DealerInvoice::class)->create(
            [
                'id' => 1,
                'dealerId' => $dealer->id,
                'invoiceNo' =>'3008',
                'date' => \Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
                'grandTotalUnit' => 0,
                'truckNo' =>'Demo Truck',
                'driverName' =>'Demo Driver',
                'driverMobile' =>'749872347',
                'comment' =>'Demo Data',
            ]
        );

        $depoInvoices = factory(\SGFL\DepoInvoice::class)->create(
            [
                'id' => 1,
                'depoId'=> $depo->id,
                'invoiceNo' =>'1125',
                'date' => \Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
                'grandTotalUnit' => 0,
                'truckNo' =>'Demo Truck',
                'driverName' =>'Demo Driver',
                'driverMobile' =>'749872347',
                'comment' =>'Demo Data',
            ]
        );
        // $dealer = factory(\SGFL\Dealer::class)->create();
        $dealerbalancerecord = factory(\SGFL\DealerBalanceRecord::class)->create(
            [
                'id' => 1,
                'dealerId' => $dealer->id,
                'paymentNo' =>'2038',
                'type' =>'Cash',
                'accountNo' =>'Demo Account',
                'bankName' =>'Demo Bank',
                'date' => \Carbon\Carbon::createFromDate(2020,01,01)->toDateTimeString(),
                'comment' =>'Demo Data',
            ]
        );



        //Moderator
        $user = factory(\SGFL\User::class)->create(
            [
                'id' => 2,
                'name' =>'Rifat',
                'address' =>'Dhaka',
                'contact' =>'01987667834',
                'email' => 'moderator@demo.com',
                'password'=> bcrypt('aaaaaa'),
                'designation' => 'Moderator',
                'role' => 'moderator',
            ]
        );

        //TSM
        $user = factory(\SGFL\User::class)->create(
            [
                'id' => 3,
                'name' =>'Sifat',
                'address' =>'Rajshahi',
                'contact' =>'01987667834',
                'email' => 'tsm@demo.com',
                'password'=> bcrypt('aaaaaa'),
                'designation' => 'Moderator',
                'role' => 'tsm',
            ]
        );

        //Accounts
        $user = factory(\SGFL\User::class)->create(
            [
                'id' => 4,
                'name' =>'Daniel',
                'address' =>'Rajshahi',
                'contact' =>'01987667834',
                'email' => 'accounts@demo.com',
                'password'=> bcrypt('aaaaaa'),
                'designation' => 'Account',
                'role' => 'account',
            ]
        );

        //Factory Incharge
        $user = factory(\SGFL\User::class)->create(
            [
                'id' => 5,
                'name' =>'Qualak',
                'address' =>'Dinajpor',
                'contact' =>'01987667834',
                'email' => 'incharge@demo.com',
                'password'=> bcrypt('aaaaaa'),
                'designation' => 'Factory Incharge',
                'role' => 'factoryIncharge',
            ]
        );

        //Viewer
        $user = factory(\SGFL\User::class)->create(
            [
                'id' => 6,
                'name' =>'Bill Gates',
                'address' =>'Rangpor',
                'contact' =>'01987667834',
                'email' => 'viewer@demo.com',
                'password'=> bcrypt('aaaaaa'),
                'designation' => 'Viewer',
                'role' => 'viewer',
            ]
        );
    }
}


