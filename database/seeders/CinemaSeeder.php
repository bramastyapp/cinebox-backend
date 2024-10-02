<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\CinemaClass;
use App\Models\Room;
use App\Models\RoomBook;
use App\Models\Seat;
use App\Models\TimeSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cinema1 = Cinema::create([
            "name" => "CINEBOX JAKARTA UTARA",
            "address" => "JAKARTA UTARA",
            "map_location" => "MqogC3dg8w8GYQkS7",
        ]);
        $cinema2 = Cinema::create([
            "name" => "CINEBOX DENPASAR BALI",
            "address" => "DENPASAR, BALI",
            "map_location" => "AWL8Ekr3eaeGbdwD7",
        ]);

        $class1 = CinemaClass::create([
            "name" => "TITANIUM",
            "priority" => 1,
        ]);
        $class2 = CinemaClass::create([
            "name" => "GOLD",
            "priority" => 2,
        ]);
        $class3 = CinemaClass::create([
            "name" => "REGULAR",
            "priority" => 3,
        ]);

        $room11 = Room::create([
            'cinema_id' => $cinema1->id,
            'cinema_class_id' => $class1->id,
            'name' => 'DOUBLE SUITE',
        ]);
        $room12 = Room::create([
            'cinema_id' => $cinema1->id,
            'cinema_class_id' => $class2->id,
            'name' => 'BIG SUITE',
        ]);
        $room13 = Room::create([
            'cinema_id' => $cinema1->id,
            'cinema_class_id' => $class3->id,
            'name' => 'REGULAR SUITE',
        ]);
        $room21 = Room::create([
            'cinema_id' => $cinema2->id,
            'cinema_class_id' => $class1->id,
            'name' => 'DOUBLE SUITE',
        ]);
        $room22 = Room::create([
            'cinema_id' => $cinema2->id,
            'cinema_class_id' => $class2->id,
            'name' => 'BIG SUITE',
        ]);
        $room23 = Room::create([
            'cinema_id' => $cinema2->id,
            'cinema_class_id' => $class3->id,
            'name' => 'REGULAR SUITE',
        ]);

        $type = 'A';
        for ($i = 1; $i < 3; $i++) {
            Seat::create([
                'room_id' => $room11->id,
                'name' => "$type$i",
            ]);
        }
        for ($i = 1; $i < 5; $i++) {
            $type = $i > 2 ? 'B' :  'A';
            Seat::create([
                'room_id' => $room12->id,
                'name' => "$type$i",
            ]);
        }
        for ($i = 1; $i < 7; $i++) {
            $type = $i > 3 ? 'B' :  'A';
            Seat::create([
                'room_id' => $room13->id,
                'name' => "$type$i",
            ]);
        }
        for ($i = 1; $i < 3; $i++) {
            Seat::create([
                'room_id' => $room21->id,
                'name' => "$type$i",
            ]);
        }
        for ($i = 1; $i < 5; $i++) {
            $type = $i > 2 ? 'B' :  'A';
            Seat::create([
                'room_id' => $room22->id,
                'name' => "$type$i",
            ]);
        }
        for ($i = 1; $i < 7; $i++) {
            $type = $i > 3 ? 'B' :  'A';
            Seat::create([
                'room_id' => $room23->id,
                'name' => "$type$i",
            ]);
        }

        $sesi1 = TimeSession::create([
            "name" => "SESI 1",
            'start_time' => '10:00',
            'end_time' => '12:00',
        ]);
        $sesi2 = TimeSession::create([
            "name" => "SESI 2",
            'start_time' => '12:00',
            'end_time' => '14:00',
        ]);
        $sesi3 = TimeSession::create([
            "name" => "SESI 3",
            'start_time' => '14:00',
            'end_time' => '16:00',
        ]);
        $sesi4 = TimeSession::create([
            "name" => "SESI 4",
            'start_time' => '16:00',
            'end_time' => '18:00',
        ]);
        $sesi5 = TimeSession::create([
            "name" => "SESI 5",
            'start_time' => '18:00',
            'end_time' => '20:00',
        ]);
        $sesi6 = TimeSession::create([
            "name" => "MIDNIGHT 1",
            'start_time' => '20:00',
            'end_time' => '22:00',
        ]);
        $sesi7 = TimeSession::create([
            "name" => "MIDNIGHT 2",
            'start_time' => '22:00',
            'end_time' => '24:00',
        ]);

        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                RoomBook::create([
                    'room_id' => $room11->id,
                    'time_session_id' => $j,
                    'day' => $i,
                    'price' => $j < 6 ? 80000 : 100000,
                ]);
            }
        }
        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                RoomBook::create([
                    'room_id' => $room12->id,
                    'time_session_id' => $j,
                    'day' => $i,
                    'price' => $j < 6 ? 40000 : 60000,
                ]);
            }
        }
        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                RoomBook::create([
                    'room_id' => $room13->id,
                    'time_session_id' => $j,
                    'day' => $i,
                    'price' => $j < 6 ? 30000 : 40000,
                ]);
            }
        }
        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                RoomBook::create([
                    'room_id' => $room21->id,
                    'time_session_id' => $j,
                    'day' => $i,
                    'price' => $j < 6 ? 80000 : 100000,
                ]);
            }
        }
        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                RoomBook::create([
                    'room_id' => $room22->id,
                    'time_session_id' => $j,
                    'day' => $i,
                    'price' => $j < 6 ? 40000 : 60000,
                ]);
            }
        }
        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                RoomBook::create([
                    'room_id' => $room23->id,
                    'time_session_id' => $j,
                    'day' => $i,
                    'price' => $j < 6 ? 30000 : 40000,
                ]);
            }
        }
    }
}
