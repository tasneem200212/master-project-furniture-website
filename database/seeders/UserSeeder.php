<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => bcrypt('password'), 'phone' => '123456789', 'address' => 'Amman, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => bcrypt('password'), 'phone' => '987654321', 'address' => 'Zarqa, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Mohammad Ali', 'email' => 'mohammad@example.com', 'password' => bcrypt('password'), 'phone' => '112233445', 'address' => 'Irbid, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Sarah Khan', 'email' => 'sarah@example.com', 'password' => bcrypt('password'), 'phone' => '223344556', 'address' => 'Aqaba, Jordan', 'role' => 'admin','created_at' => now(),'updated_at' => now()],
            ['name' => 'Ahmed Qasem', 'email' => 'ahmed@example.com', 'password' => bcrypt('password'), 'phone' => '334455667', 'address' => 'Amman, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Nadia Yusuf', 'email' => 'nadia@example.com', 'password' => bcrypt('password'), 'phone' => '445566778', 'address' => 'Mafraq, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Faisal Ahmad', 'email' => 'faisal@example.com', 'password' => bcrypt('password'), 'phone' => '556677889', 'address' => 'Salt, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Layla Rami', 'email' => 'layla@example.com', 'password' => bcrypt('password'), 'phone' => '667788990', 'address' => 'Tafilah, Jordan', 'role' => 'admin','created_at' => now(),'updated_at' => now()],
            ['name' => 'Omar Khaled', 'email' => 'omar@example.com', 'password' => bcrypt('password'), 'phone' => '778899001', 'address' => 'Jerash, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Mona Najjar', 'email' => 'mona@example.com', 'password' => bcrypt('password'), 'phone' => '889900112', 'address' => 'Karak, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Samir Fawzi', 'email' => 'samir@example.com', 'password' => bcrypt('password'), 'phone' => '990011223', 'address' => 'Madaba, Jordan', 'role' => 'admin','created_at' => now(),'updated_at' => now()],
            ['name' => 'Khaled Hani', 'email' => 'khaled@example.com', 'password' => bcrypt('password'), 'phone' => '101112223', 'address' => 'Ajloun, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Rania Saleh', 'email' => 'rania@example.com', 'password' => bcrypt('password'), 'phone' => '202223334', 'address' => 'Al-Fuhais, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Tariq Jaber', 'email' => 'tariq@example.com', 'password' => bcrypt('password'), 'phone' => '303334445', 'address' => 'Bethany, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Omar Rashed', 'email' => 'omar_rashed@example.com', 'password' => bcrypt('password'), 'phone' => '404445556', 'address' => 'Amman, Jordan', 'role' => 'admin','created_at' => now(),'updated_at' => now()],
            ['name' => 'Aisha Youssef', 'email' => 'aisha@example.com', 'password' => bcrypt('password'), 'phone' => '515556667', 'address' => 'Aqaba, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Yasmin Zayed', 'email' => 'yasmin@example.com', 'password' => bcrypt('password'), 'phone' => '626667778', 'address' => 'Irbid, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
            ['name' => 'Karim Juma', 'email' => 'karim@example.com', 'password' => bcrypt('password'), 'phone' => '737778889', 'address' => 'Mafraq, Jordan', 'role' => 'admin','created_at' => now(),'updated_at' => now()],
            ['name' => 'Nasser Kassem', 'email' => 'nasser@example.com', 'password' => bcrypt('password'), 'phone' => '848889900', 'address' => 'Zarqa, Jordan', 'role' => 'customer','created_at' => now(),'updated_at' => now()],
        ]);
    }
}
