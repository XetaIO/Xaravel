<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscussCategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $categories = [
            [
                'title' => 'Xetaravel',
                'slug' => 'xetaravel',
                'description' => 'All threads related to the development and announcements of Xetaravel.',
                'color' => '#F4645F',
                'thread_count' => 1,
                'is_locked' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Development',
                'slug' => 'development',
                'description' => 'All threads related to the development in general.',
                'color' => '#48BF83',
                'thread_count' => 0,
                'is_locked' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Feedback',
                'slug' => 'feedback',
                'description' => 'For discussing about Xetaravel features and design.',
                'color' => '#9354CA',
                'thread_count' => 0,
                'is_locked' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'General',
                'slug' => 'general',
                'description' => 'Discussions about everything that don\'t fit into any other categories.',
                'color' => '#00B1B3',
                'thread_count' => 0,
                'is_locked' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        DB::table('discuss_categories')->insert($categories);
    }
}
