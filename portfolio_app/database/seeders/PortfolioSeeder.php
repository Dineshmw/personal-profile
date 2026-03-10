<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Skill::create(['name' => 'Laravel / PHP', 'proficiency' => 90]);
        \App\Models\Skill::create(['name' => 'Vue.js / React', 'proficiency' => 85]);
        \App\Models\Skill::create(['name' => 'Tailwind CSS', 'proficiency' => 95]);
        \App\Models\Skill::create(['name' => 'MySQL / PostgreSQL', 'proficiency' => 88]);

        \App\Models\Project::create([
            'title' => 'E-Commerce Platform',
            'category' => 'Backend/Frontend',
            'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js.',
            'image_url' => 'https://via.placeholder.com/800x600?text=E-Commerce+Project',
            'project_url' => '#'
        ]);
        
        \App\Models\Project::create([
            'title' => 'Task Management App',
            'category' => 'Backend/Frontend',
            'description' => 'Real-time task management system using Laravel WebSockets.',
            'image_url' => 'https://via.placeholder.com/800x600?text=Task+Manager',
            'project_url' => '#'
        ]);

        \App\Models\Project::create([
            'title' => 'Customer Segmentation API',
            'category' => 'Data Science Machine learning',
            'description' => 'A machine learning pipeline for clustering customer data to improve targeted marketing.',
            'image_url' => 'https://via.placeholder.com/800x600?text=Customer+Segmentation',
            'project_url' => '#'
        ]);

        \App\Models\Project::create([
            'title' => 'AI Chatbot Assistant',
            'category' => 'Gen AI',
            'description' => 'An automated assistant powered by LLMs to handle complex customer queries.',
            'image_url' => 'https://via.placeholder.com/800x600?text=AI+Chatbot',
            'project_url' => '#'
        ]);

        \App\Models\Project::create([
            'title' => 'Workflow RPA Tool',
            'category' => 'Automations',
            'description' => 'Robotic process automation scripts to streamline reporting and data entry.',
            'image_url' => 'https://via.placeholder.com/800x600?text=RPA+Automations',
            'project_url' => '#'
        ]);
    }
}
