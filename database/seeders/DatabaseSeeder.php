<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Enum\UserType;
use App\Models\RoundRecord;
use App\Models\Route;
use App\Models\Stop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user1 = new User([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => bcrypt('admin'),
            'type' => UserType::MANAGER,
            'active' => true,
        ]);
        $user1->save();

        $user2 = new User([
            'name' => 'Maria Oliveira',
            'email' => 'mariaoliveira@email.com',
            'password' => bcrypt('123'),
            'type' => UserType::EMPLOYEE,
            'active' => true,
        ]);
        $user2->save();

        $user3 = new User([
            'name' => 'Mario Oliveira',
            'email' => 'mariooliveira@email.com',
            'password' => bcrypt('123'),
            'type' => UserType::EMPLOYEE,
            'active' => true,
        ]);
        $user3->save();

        $route1 = new Route([
            'name' => 'Rota 1',
            'description' => 'Descrição da Rota 1',
            'is_active' => true,
            'user_id' => 2,
        ]);
        $route1->save();

        $route2 = new Route([
            'name' => 'Rota 2',
            'description' => 'Descrição da Rota 2',
            'user_id' => null,
        ]);
        $route2->save();

        $route3 = new Route([
            'name' => 'Rota 3',
            'description' => 'Descrição da Rota 3',
            'user_id' => 3,
        ]);
        $route3->save();

        $stop1 = new Stop([
            'route_id' => $route1->id,
            'name' => 'Ponto 1',
            'description' => 'Descrição do Ponto 1',
            'latitude' => -23.550520,
            'longitude' => -46.633309,
            'qrcode' => '1234567890123456',
        ]);
        $stop1->save();

        $stop2 = new Stop([
            'route_id' => $route1->id,
            'name' => 'Ponto 2',
            'description' => 'Descrição do Ponto 2',
            'latitude' => -23.549970,
            'longitude' => -46.632849,
            'qrcode' => '2345678901234567',
        ]);
        $stop2->save();

        $stop3 = new Stop([
            'route_id' => $route2->id,
            'name' => 'Ponto 3',
            'description' => 'Descrição do Ponto 3',
            'latitude' => -23.551070,
            'longitude' => -46.634149,
            'qrcode' => '3456789012345678',
        ]);
        $stop3->save();

        $stop4 = new Stop([
            'route_id' => $route3->id,
            'name' => 'Ponto 4',
            'description' => 'Descrição do Ponto 4',
            'latitude' => -23.551070,
            'longitude' => -46.634149,
            'qrcode' => '3456789012345678',
        ]);
        $stop4->save();

        $stop5 = new Stop([
            'route_id' => $route3->id,
            'name' => 'Ponto 5',
            'description' => 'Descrição do Ponto 5',
            'latitude' => -23.551070,
            'longitude' => -46.634149,
            'qrcode' => '3456789012345678',
        ]);
        $stop5->save();

        // Qaundo tirar a foto vai inserir aqui
        // $roundRecord1 = new RoundRecord([
        //     'stop_id' => $stop1->id,
        //     'user_id' => $user2->id,
        //     'date_time' => '2024-02-27 10:00:00',
        //     'photo' => 'null',
        //     'observation' => 'Observação da ronda 1',
        // ]);
        // $roundRecord1->save();

        // $roundRecord2 = new RoundRecord([
        //     'stop_id' => $stop2->id,
        //     'user_id' => $user2->id,
        //     'date_time' => '2024-02-27 11:00:00',
        //     'photo' => 'null',
        //     'observation' => 'Observação da ronda 2',
        // ]);
        // $roundRecord2->save();

        // $roundRecord3 = new RoundRecord([
        //     'stop_id' => $stop3->id,
        //     'user_id' => $user2->id,
        //     'date_time' => '2024-02-27 12:00:00',
        //     'photo' => 'null',
        //     'observation' => 'Observação da ronda 3',
        // ]);
        // $roundRecord3->save();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
