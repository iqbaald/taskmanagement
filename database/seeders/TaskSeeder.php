<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tasks = [];

        for ($i = 1; $i <= 20; $i++) {
            $userId = rand(1, 6);
            $isDone = rand(0, 1) === 1; // 0 = false, 1 = true

            $tasks[] = [
                'user_id' => $userId,
                'task' => $this->generateTask($userId),
                'user_comment' => $isDone ? 'Task completed successfully' : null,
                'is_done' => $isDone,
                'proof_file_path' => $isDone ? 'uploads/proofs/proof_' . $i . '.jpg' : null,
                'admin_feedback' => $isDone ? 'Good job!' : null,
            ];
        }

        DB::table('todo')->insert($tasks);
    }

    private function generateTask($userId)
    {
        if (in_array($userId, [1, 5])) {
            // Kalau PM, tugasnya lebih serius
            $pmTasks = [
                'Review project milestone',
                'Prepare sprint planning',
                'Evaluate team performance',
                'Update client report',
                'Coordinate with stakeholders',
            ];
            return $pmTasks[array_rand($pmTasks)];
        } else {
            // Untuk user biasa
            $userTasks = [
                'Fix UI bug',
                'Implement login feature',
                'Write unit tests',
                'Update documentation',
                'Optimize database queries',
                'Refactor codebase',
                'Assist in QA testing',
            ];
            return $userTasks[array_rand($userTasks)];
        }
    }
}
