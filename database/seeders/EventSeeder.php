<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'time' => '10:00:00',
                'date' => '2024-08-12',
                'place' => 'Auditorium',
                'heading' => 'Guest Lecture on AI',
                'description' => 'An insightful session on the future of Artificial Intelligence.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '11:00:00',
                'date' => '2024-08-13',
                'place' => 'Library',
                'heading' => 'Workshop on Data Science',
                'description' => 'Hands-on workshop on modern data science techniques.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '12:00:00',
                'date' => '2024-08-14',
                'place' => 'Conference Room',
                'heading' => 'Seminar on Cloud Computing',
                'description' => 'A seminar discussing the latest trends in cloud technology.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '13:00:00',
                'date' => '2024-08-15',
                'place' => 'Gymnasium',
                'heading' => 'Annual Sports Meet',
                'description' => 'Annual sports event for all students and faculty.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '14:00:00',
                'date' => '2024-08-16',
                'place' => 'Hallway',
                'heading' => 'Social Event',
                'description' => 'Casual meet-and-greet with refreshments.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '10:30:00',
                'date' => '2024-08-17',
                'place' => 'Auditorium',
                'heading' => 'Workshop on Blockchain',
                'description' => 'An interactive workshop on blockchain technology.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '11:30:00',
                'date' => '2024-08-18',
                'place' => 'Library',
                'heading' => 'Seminar on Cybersecurity',
                'description' => 'A seminar focusing on cybersecurity best practices.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '12:30:00',
                'date' => '2024-08-19',
                'place' => 'Conference Room',
                'heading' => 'Conference on Sustainable Development',
                'description' => 'A conference discussing sustainable development goals.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '13:30:00',
                'date' => '2024-08-20',
                'place' => 'Gymnasium',
                'heading' => 'Cultural Fest',
                'description' => 'Cultural fest showcasing student talents.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '14:30:00',
                'date' => '2024-08-21',
                'place' => 'Hallway',
                'heading' => 'Alumni Meet',
                'description' => 'Meet with alumni to discuss career opportunities.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => '10:00:00',
                'date' => '2024-08-22',
                'place' => 'Auditorium',
                'heading' => 'Innovations in Technology',
                'description' => 'A lecture on the latest innovations in technology.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data into events table
        DB::table('events')->insert($events);
    }
}
