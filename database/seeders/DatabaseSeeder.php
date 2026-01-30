<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Career Timeline
        $this->seedCareers();
        
        // Seed Portfolio Projects
        $this->seedPortfolios();
    }

    private function seedCareers()
    {
        $careers = [
            // BACKLOG
            [
                'title' => 'Master\'s Degree in IT',
                'description' => 'Pursue advanced studies in Information Technology with specialization in Software Engineering.',
                'status' => 'backlog',
                'progress' => 0,
                'technologies' => ['Research', 'Advanced Algorithms', 'Cloud Architecture'],
                'category' => 'Education',
                'sort_order' => 1,
            ],
            [
                'title' => 'Learn Docker & Kubernetes',
                'description' => 'Master containerization and orchestration for modern DevOps workflows.',
                'status' => 'backlog',
                'progress' => 0,
                'technologies' => ['Docker', 'Kubernetes', 'CI/CD'],
                'category' => 'Certification',
                'sort_order' => 2,
            ],
            [
                'title' => 'AWS Cloud Practitioner',
                'description' => 'Get certified in Amazon Web Services cloud fundamentals.',
                'status' => 'backlog',
                'progress' => 0,
                'technologies' => ['AWS', 'Cloud Computing', 'Infrastructure'],
                'category' => 'Certification',
                'sort_order' => 3,
            ],

            // IN PROGRESS
            [
                'title' => 'BS IT Thesis',
                'description' => 'Developing an AI-powered project management tool for agile teams.',
                'status' => 'in_progress',
                'progress' => 75,
                'technologies' => ['Laravel', 'Vue.js', 'Machine Learning', 'MySQL'],
                'category' => 'Education',
                'started_at' => now()->subMonths(6),
                'deadline' => now()->addMonths(2),
                'sort_order' => 1,
            ],
            [
                'title' => 'Learning Livewire 3',
                'description' => 'Mastering Laravel Livewire 3 for building dynamic SPAs without leaving Laravel.',
                'status' => 'in_progress',
                'progress' => 60,
                'technologies' => ['Livewire', 'Laravel', 'Alpine.js'],
                'category' => 'Skill Development',
                'started_at' => now()->subMonth(),
                'deadline' => now()->addMonth(),
                'sort_order' => 2,
            ],
            [
                'title' => 'Portfolio Website V2',
                'description' => 'Building this dual-mode portfolio to showcase full-cycle IT skills.',
                'status' => 'in_progress',
                'progress' => 85,
                'technologies' => ['Laravel', 'Livewire', 'Tailwind CSS', 'MySQL'],
                'category' => 'Project',
                'started_at' => now()->subMonths(2),
                'deadline' => now()->addWeeks(2),
                'sort_order' => 3,
            ],

            // SHIPPED
            [
                'title' => 'PHP Certification',
                'description' => 'Successfully completed Zend PHP Certification demonstrating advanced PHP knowledge.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['PHP', 'OOP', 'Design Patterns'],
                'category' => 'Certification',
                'completed_at' => now()->subMonths(3),
                'sort_order' => 1,
            ],
            [
                'title' => 'Internship @ TechCorp',
                'description' => 'Completed 6-month internship as Full-Stack Developer, contributing to 3 major projects.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Git'],
                'category' => 'Experience',
                'started_at' => now()->subYear(),
                'completed_at' => now()->subMonths(6),
                'sort_order' => 2,
            ],
            [
                'title' => 'Lead QA for E-Commerce Platform',
                'description' => 'Led quality assurance efforts for a complete e-commerce rebuild, achieving 98% test coverage.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['PHPUnit', 'Selenium', 'JIRA', 'Test Automation'],
                'category' => 'Project',
                'started_at' => now()->subMonths(8),
                'completed_at' => now()->subMonths(4),
                'sort_order' => 3,
            ],
            [
                'title' => 'Scrum Master Training',
                'description' => 'Completed Professional Scrum Master I certification and led 5 sprints.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['Agile', 'Scrum', 'Project Management'],
                'category' => 'Certification',
                'completed_at' => now()->subMonths(5),
                'sort_order' => 4,
            ],
        ];

        foreach ($careers as $career) {
            Career::create($career);
        }
    }

    private function seedPortfolios()
    {
        $portfolios = [
            [
                'title' => 'E-Commerce Platform Rebuild',
                'description' => 'Complete rebuild of a legacy e-commerce system serving 10,000+ daily users. Implemented modern architecture with microservices approach.',
                'url' => 'https://example.com/ecommerce',
                'github_url' => 'https://github.com/example/ecommerce',
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 2,
                'performance_score' => 94,
                'technologies' => ['Laravel', 'Vue.js', 'Redis', 'MySQL', 'Docker'],
                'challenge' => 'Legacy system was slow, unreliable, and difficult to maintain with frequent downtime.',
                'solution' => 'Rebuilt with Laravel microservices architecture, implemented caching layer, and achieved 99.9% uptime.',
                'results' => 'Reduced page load time by 60%, eliminated critical bugs, and improved conversion rate by 25%.',
                'completed_at' => now()->subMonths(2),
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Task Management SaaS',
                'description' => 'A Trello-like project management tool with real-time collaboration features built with Livewire.',
                'url' => 'https://example.com/taskmanager',
                'github_url' => 'https://github.com/example/taskmanager',
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 0,
                'performance_score' => 98,
                'technologies' => ['Laravel', 'Livewire 3', 'Tailwind CSS', 'PostgreSQL', 'WebSockets'],
                'challenge' => 'Building real-time collaboration without heavy JavaScript framework overhead.',
                'solution' => 'Leveraged Livewire 3 for reactive interfaces and Laravel Broadcasting for real-time updates.',
                'results' => 'Delivered a smooth UX with 98/100 Lighthouse score and 100% test coverage.',
                'completed_at' => now()->subMonths(4),
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Inventory Management System',
                'description' => 'Complete inventory tracking system for a manufacturing company with barcode scanning and reporting.',
                'url' => 'https://example.com/inventory',
                'github_url' => 'https://github.com/example/inventory',
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 3,
                'performance_score' => 91,
                'technologies' => ['Laravel', 'MySQL', 'Bootstrap', 'Chart.js'],
                'challenge' => 'Complex reporting requirements and integration with legacy barcode scanners.',
                'solution' => 'Built modular reporting system and created hardware abstraction layer for scanner integration.',
                'results' => 'Reduced inventory discrepancies by 85% and saved 20 hours/week in manual tracking.',
                'completed_at' => now()->subMonths(6),
                'is_featured' => false,
                'sort_order' => 3,
            ],
            [
                'title' => 'Customer Portal & API',
                'description' => 'RESTful API and customer portal for a logistics company, handling 50K+ daily API calls.',
                'url' => 'https://example.com/customerportal',
                'github_url' => 'https://github.com/example/api',
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 1,
                'performance_score' => 96,
                'technologies' => ['Laravel', 'API Platform', 'OAuth2', 'Redis', 'Nginx'],
                'challenge' => 'High traffic API with strict SLA requirements (99.9% uptime, <100ms response).',
                'solution' => 'Implemented aggressive caching strategy, database optimization, and horizontal scaling.',
                'results' => 'Achieved 99.95% uptime with average response time of 45ms under load.',
                'completed_at' => now()->subMonths(8),
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'School Management System',
                'description' => 'Comprehensive school management platform handling student records, grades, and parent communication.',
                'url' => 'https://example.com/schoolsystem',
                'github_url' => 'https://github.com/example/school',
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 4,
                'performance_score' => 88,
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Pusher'],
                'challenge' => 'Managing complex role-based access for students, teachers, parents, and administrators.',
                'solution' => 'Implemented Laravel permissions system with granular role controls and audit logging.',
                'results' => 'Successfully deployed to 3 schools serving 5,000+ students with positive feedback.',
                'completed_at' => now()->subYear(),
                'is_featured' => false,
                'sort_order' => 5,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
