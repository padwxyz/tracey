<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Location;
use App\Models\Category;
use App\Models\Item;
use App\Models\Note;
use Faker\Factory as Faker;

class FullTestSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $admins = User::factory()->count(3)->create([
            'role' => 'admin',
            'email' => fn() => strtolower($faker->firstName()) . rand(10, 99) . '@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        $users = User::factory()->count(5)->create([
            'role' => 'user',
            'email' => fn() => strtolower($faker->firstName()) . rand(10, 99) . '@gmail.com',
            'password' => bcrypt('user123'),
        ]);

        $locationNames = [
            'Terminal Domestik',
            'Terminal Internasional',
            'Ruang Kontrol Utama',
            'Area Keamanan',
            'Pintu Masuk VIP'
        ];

        $locations = collect();
        foreach ($locationNames as $name) {
            $locations->push(Location::factory()->create([
                'location_name' => $name,
            ]));
        }

        $categories = collect();
        foreach ($locations as $location) {
            $categories->push(Category::factory()->create([
                'location_id' => $location->id,
                'category_name' => 'Peralatan ' . $faker->randomElement(['Elektronik', 'Jaringan', 'Keamanan']),
            ]));
        }

        $items = collect();
        foreach ($categories as $category) {
            $itemName = $faker->randomElement(['CCTV', 'LED Signage', 'Kabel LAN', 'Router', 'Access Point']);
            $brand = $faker->randomElement(['Hikvision', 'TP-Link', 'Ubiquiti', 'Samsung', 'Panasonic']);
            $type = match ($itemName) {
                'CCTV' => $faker->randomElement(['Dome', 'Bullet', 'PTZ']),
                'LED Signage' => $faker->randomElement(['Outdoor', 'Indoor']),
                'Kabel LAN' => 'Cat6',
                'Router' => $faker->randomElement(['Gigabit', 'Dual Band']),
                'Access Point' => 'Wireless',
                default => 'Lainnya',
            };

            $items->push(Item::factory()->create([
                'category_id' => $category->id,
                'item_name' => $itemName,
                'quantity' => $faker->numberBetween(1, 10),
                'condition' => $faker->randomElement(['Normal', 'Not Normal']),
                'brand' => $brand,
                'type' => $type,
            ]));
        }

        $problems = [
            'LED signage mati total',
            'Kabel LAN putus karena tertarik trolley',
            'CCTV mati di area boarding gate',
            'Router tidak merespons',
            'Access point tidak menjangkau area lounge'
        ];

        $activities = [
            'Dilakukan pengecekan visual',
            'Penggantian perangkat baru',
            'Diusulkan untuk perbaikan oleh teknisi',
            'Sementara dipindahkan ke lokasi lain',
            'Sudah dilaporkan ke bagian IT'
        ];

        for ($i = 0; $i < 5; $i++) {
            Note::create([
                'user_id' => $users->random()->id,
                'location_id' => $locations->random()->id,
                'category_id' => $categories->random()->id,
                'item_id' => $items->random()->id,
                'date' => now()->toDateString(),
                'time' => now()->toTimeString(),
                'problem' => $faker->randomElement($problems),
                'activity' => $faker->randomElement($activities),
                'status' => $faker->randomElement(['todo', 'pending', 'inprogress', 'done', 'cancel']),
                'image' => 'https://www.whatyourbossthinks.com/wp-content/uploads/2018/05/cctv-camera-types.jpeg',
            ]);
        }
    }
}
