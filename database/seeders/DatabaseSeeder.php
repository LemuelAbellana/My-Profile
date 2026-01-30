<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder - Complete CV Data
 * 
 * This seeder contains all real CV information including:
 * - 13 Academic and Personal Projects (in portfolios table)
 * - Education milestones and leadership (in careers table)
 * - Static methods for education, skills, and leadership data
 * 
 * Usage in Blade views:
 * @php
 *     $education = \Database\Seeders\DatabaseSeeder::getEducation();
 *     $skills = \Database\Seeders\DatabaseSeeder::getSkills();
 *     $leadership = \Database\Seeders\DatabaseSeeder::getLeadership();
 * @endphp
 * 
 * Or in Controllers:
 *     use Database\Seeders\DatabaseSeeder;
 *     $education = DatabaseSeeder::getEducation();
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Career Timeline (includes education, certifications, leadership)
        $this->seedCareers();
        
        // Seed Portfolio Projects (all 13 CV projects)
        $this->seedPortfolios();
    }

    /**
     * Get education data for use in views/components
     */
    public static function getEducation()
    {
        return [
            'university' => 'University of the Immaculate Conception',
            'degree' => 'Bachelor of Science in Information Technology',
            'status' => 'In Progress',
            'expected_graduation' => '2027',
            'coursework' => [
                'Database Management',
                'Software Engineering',
                'Web Development',
                'Mobile Development',
                'Systems Analysis and Design',
                'Cloud Computing Fundamentals',
                'AI - System Integration',
                'Project Management',
                'Organizational Leadership'
            ]
        ];
    }

    /**
     * Get technical skills organized by category
     */
    public static function getSkills()
    {
        return [
            'Languages & Frameworks' => [
                'HTML', 'CSS', 'JavaScript', 'Java', 'PHP',
                'Laravel (Livewire)', 'React (JS/TS)', 'Express.js'
            ],
            'Databases' => ['MySQL', 'MongoDB'],
            'Stacks' => ['MERN Stack', 'LAMP Stack'],
            'Other' => ['Server Administration', 'PWA Development', 'Mobile App Development']
        ];
    }

    /**
     * Get leadership positions and affiliations
     */
    public static function getLeadership()
    {
        return [
            [
                'position' => 'UIC-VIBE Club Mayor',
                'organization' => 'UIC-VIBE',
                'period' => '2023-2024',
                'description' => 'Facilitated IT and tech-focused seminars for students'
            ],
            [
                'position' => 'NSTP-CWTS Leader/Spearheader',
                'organization' => 'NSTP-CWTS',
                'period' => '2023-2024',
                'description' => 'Led DIGISKWELA program, providing digital literacy training to 54 grade 6 students'
            ],
            [
                'position' => 'Vice Mayor',
                'organization' => 'GDGOC-UIC',
                'period' => '2025-2026',
                'description' => 'Co-leader facilitating workshops, building partnerships, and organizing tech events'
            ],
            [
                'position' => 'Scholar',
                'organization' => 'DOST-SEI',
                'period' => '2023-2027',
                'description' => 'Merit scholarship recipient, participated in leadership camps, ONSSE, and DOST-START programs'
            ]
        ];
    }

    private function seedCareers()
    {
        $careers = [
            // BACKLOG
            [
                'title' => 'Master\'s Degree in IT',
                'description' => 'Pursue advanced studies in Information Technology with specialization in Software Engineering and AI.',
                'status' => 'backlog',
                'progress' => 0,
                'technologies' => ['Research', 'Advanced Algorithms', 'Cloud Architecture', 'AI'],
                'category' => 'Education',
                'sort_order' => 1,
            ],
            [
                'title' => 'AWS Solutions Architect Certification',
                'description' => 'Get certified in AWS cloud architecture and infrastructure design.',
                'status' => 'backlog',
                'progress' => 0,
                'technologies' => ['AWS', 'Cloud Computing', 'Infrastructure'],
                'category' => 'Certification',
                'sort_order' => 2,
            ],
            [
                'title' => 'Full-Stack MERN Certification',
                'description' => 'Complete advanced certification in MongoDB, Express.js, React, and Node.js stack.',
                'status' => 'backlog',
                'progress' => 0,
                'technologies' => ['MongoDB', 'Express.js', 'React', 'Node.js'],
                'category' => 'Certification',
                'sort_order' => 3,
            ],

            // IN PROGRESS
            [
                'title' => 'BS IT Degree - UIC',
                'description' => 'Bachelor of Science in Information Technology at University of the Immaculate Conception. DOST-SEI Scholar with focus on full-stack development, mobile apps, and cloud computing.',
                'status' => 'in_progress',
                'progress' => 80,
                'technologies' => ['Software Engineering', 'Web Development', 'Mobile Development', 'Database Management', 'AI Integration', 'Cloud Computing'],
                'category' => 'Education',
                'started_at' => now()->subYears(3),
                'deadline' => now()->addYear(),
                'sort_order' => 1,
            ],
            [
                'title' => 'GDGOC-UIC Vice Mayor',
                'description' => 'Co-leading Google Developer Groups on Campus at UIC, organizing workshops, building tech partnerships, and mentoring students.',
                'status' => 'in_progress',
                'progress' => 60,
                'technologies' => ['Leadership', 'Community Building', 'Event Management', 'Google Technologies'],
                'category' => 'Leadership',
                'started_at' => now()->subMonths(4),
                'deadline' => now()->addYear(),
                'sort_order' => 2,
            ],
            [
                'title' => 'Weather Forecasting App - NASA Challenge',
                'description' => 'Developing mobile app using NASA weather data API for hikers and outdoor enthusiasts as part of NASA Space Apps Challenge 2025.',
                'status' => 'in_progress',
                'progress' => 70,
                'technologies' => ['React Native', 'NASA API', 'Mobile Development', 'Weather Data'],
                'category' => 'Project',
                'started_at' => now()->subMonths(2),
                'deadline' => now()->addMonth(),
                'sort_order' => 3,
            ],

            // SHIPPED
            [
                'title' => 'DOST-SEI Scholarship',
                'description' => 'Merit-based scholarship from Department of Science and Technology. Participated in leadership camps, ONSSE, and DOST-START programs.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['Leadership', 'Research', 'STEM Education'],
                'category' => 'Achievement',
                'started_at' => now()->subYears(3),
                'completed_at' => now(),
                'sort_order' => 1,
            ],
            [
                'title' => 'UIC-VIBE Club Mayor',
                'description' => 'Successfully led UIC-VIBE club (2023-2024), facilitating IT and technology seminars for student community.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['Leadership', 'Event Management', 'Public Speaking'],
                'category' => 'Leadership',
                'started_at' => now()->subYears(2),
                'completed_at' => now()->subYear(),
                'sort_order' => 2,
            ],
            [
                'title' => 'DIGISKWELA NSTP Program',
                'description' => 'Led digital literacy program for 54 grade 6 students as NSTP-CWTS Leader, teaching basic computer skills and internet safety.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['Teaching', 'Digital Literacy', 'Community Service'],
                'category' => 'Leadership',
                'started_at' => now()->subYears(2),
                'completed_at' => now()->subYear(),
                'sort_order' => 3,
            ],
            [
                'title' => 'Personal Portfolio V2',
                'description' => 'Built dual-mode cyber-themed portfolio website showcasing full-stack Laravel and Livewire skills.',
                'status' => 'shipped',
                'progress' => 100,
                'technologies' => ['Laravel', 'Livewire', 'Tailwind CSS', 'MySQL'],
                'category' => 'Project',
                'started_at' => now()->subMonths(3),
                'completed_at' => now(),
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
            // ACADEMIC PROJECTS
            [
                'title' => 'IP Management System',
                'description' => 'Progressive Web Application for streamlining intellectual property protection application processes. Developed for System Architecture, Software Engineering, and Technopreneurship courses.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 0,
                'performance_score' => 92,
                'technologies' => ['PWA', 'JavaScript', 'HTML', 'CSS', 'Service Workers', 'IndexedDB'],
                'challenge' => 'Creating an offline-capable application to handle sensitive IP documentation and complex application workflows.',
                'solution' => 'Implemented PWA architecture with service workers for offline functionality, secure local storage, and progressive enhancement for various devices.',
                'results' => 'Successfully delivered a cross-platform solution that works seamlessly online and offline, improving IP application efficiency.',
                'completed_at' => now()->subMonths(10),
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'RPIC Research Management System',
                'description' => 'Progressive Web Application designed for managing research paper defense scheduling and coordination at RPIC. Built as part of Software Engineering course requirements.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 1,
                'performance_score' => 90,
                'technologies' => ['PWA', 'JavaScript', 'PHP', 'MySQL', 'Bootstrap'],
                'challenge' => 'Coordinating multiple stakeholders (students, faculty, panel members) for research defense scheduling with conflict resolution.',
                'solution' => 'Built an intuitive scheduling system with real-time availability checking, automated notifications, and conflict detection.',
                'results' => 'Streamlined the research defense process, reducing scheduling conflicts by 80% and administrative overhead significantly.',
                'completed_at' => now()->subMonths(9),
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Anime Dojo Game',
                'description' => 'Interactive gaming Progressive Web Application incorporating AI models for enhanced gameplay experience. Developed for Machine Learning course.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 2,
                'performance_score' => 88,
                'technologies' => ['PWA', 'JavaScript', 'Machine Learning', 'TensorFlow.js', 'HTML5 Canvas'],
                'challenge' => 'Integrating AI models into a browser-based game while maintaining performance and responsiveness.',
                'solution' => 'Leveraged TensorFlow.js for client-side ML inference, optimized model size, and implemented progressive loading strategies.',
                'results' => 'Created an engaging AI-powered game that runs smoothly in browsers with intelligent opponent behavior.',
                'completed_at' => now()->subMonths(8),
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Guide to Loratadine (Allerta)',
                'description' => 'Educational mobile application providing comprehensive information about Loratadine medication. Created for IT Elective course.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 0,
                'performance_score' => 95,
                'technologies' => ['React Native', 'JavaScript', 'Mobile Development', 'Healthcare IT'],
                'challenge' => 'Presenting complex medical information in an accessible, user-friendly format for general public.',
                'solution' => 'Designed intuitive UI/UX with clear medication guides, dosage calculators, and safety information sections.',
                'results' => 'Delivered an informative app that helps users understand medication usage, interactions, and precautions.',
                'completed_at' => now()->subMonths(7),
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'NeuroZen - Stress Management App',
                'description' => 'Mobile application prototype focused on mental wellness and stress management techniques. Developed for IT Elective course with emphasis on user experience.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 1,
                'performance_score' => 93,
                'technologies' => ['React Native', 'JavaScript', 'Mobile Development', 'UI/UX Design'],
                'challenge' => 'Creating a calming, intuitive interface for stress management while tracking user wellness metrics.',
                'solution' => 'Implemented meditation guides, breathing exercises, mood tracking, and progress visualization with soothing design.',
                'results' => 'Prototype received excellent feedback for its user-centric design and effective stress management features.',
                'completed_at' => now()->subMonths(6),
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'TUN-AN Corporate Landing Page',
                'description' => 'Professional corporate landing page with integrated email system for client communications. Built for Technopreneurship course.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 0,
                'performance_score' => 96,
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Email Integration'],
                'challenge' => 'Creating a professional corporate presence with seamless client communication capabilities.',
                'solution' => 'Developed responsive landing page with contact forms, email integration, and modern business design.',
                'results' => 'Successfully delivered a professional web presence that enhanced client engagement and communication.',
                'completed_at' => now()->subMonths(11),
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'title' => 'Clinic-Connect Pediatric Care',
                'description' => 'Healthcare Progressive Web Application enabling patients to book appointments at pediatric clinics. Healthcare IT project focusing on accessibility and usability.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 1,
                'performance_score' => 91,
                'technologies' => ['PWA', 'JavaScript', 'PHP', 'MySQL', 'Healthcare IT', 'Booking System'],
                'challenge' => 'Building a secure, HIPAA-conscious booking system that works across devices and offline.',
                'solution' => 'Implemented PWA with secure authentication, real-time appointment availability, and patient record management.',
                'results' => 'Improved appointment booking efficiency and reduced no-shows through automated reminders.',
                'completed_at' => now()->subMonths(5),
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Ayo-ayo AI Smart Green Computing',
                'description' => 'Mobile application providing AI-powered e-waste management solutions and promoting environmental sustainability in technology.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 2,
                'performance_score' => 87,
                'technologies' => ['React Native', 'AI/ML', 'Environmental Tech', 'Mobile Development'],
                'challenge' => 'Educating users about e-waste while providing practical recycling solutions using AI.',
                'solution' => 'Created AI-powered waste classification, location-based recycling centers, and gamified sustainability tracking.',
                'results' => 'Raised environmental awareness and provided actionable e-waste disposal guidance to users.',
                'completed_at' => now()->subMonths(4),
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'title' => 'Public Health Research Forum Materials',
                'description' => 'Complete publication materials design and production for Public Health Research Forum 2024, including posters, programs, and digital assets.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 0,
                'performance_score' => 98,
                'technologies' => ['Graphic Design', 'Adobe Suite', 'Print Design', 'Digital Media'],
                'challenge' => 'Creating cohesive, professional publication materials for an academic health forum under tight deadlines.',
                'solution' => 'Designed comprehensive branding package with consistent visual identity across all print and digital materials.',
                'results' => 'Successfully delivered all materials on time, contributing to a professional and well-organized forum.',
                'completed_at' => now()->subMonths(3),
                'is_featured' => false,
                'sort_order' => 9,
            ],

            // PERSONAL PROJECTS
            [
                'title' => 'House Rental Management System',
                'description' => 'Progressive Web Application for managing rental properties, tenant records, payments, and maintenance requests. Personal project to learn full-stack development.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 3,
                'performance_score' => 89,
                'technologies' => ['PWA', 'JavaScript', 'PHP', 'MySQL', 'Payment Integration'],
                'challenge' => 'Managing complex landlord-tenant relationships, payment tracking, and maintenance workflows.',
                'solution' => 'Built comprehensive system with tenant portals, automated payment reminders, and maintenance ticket system.',
                'results' => 'Created a functional rental management platform demonstrating full-stack capabilities.',
                'completed_at' => now()->subMonths(12),
                'is_featured' => false,
                'sort_order' => 10,
            ],
            [
                'title' => 'UIC Digital Christmas Tree',
                'description' => 'Interactive web application created for University of the Immaculate Conception\'s Christmas celebrations. Features virtual tree decorating and holiday messages.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 0,
                'performance_score' => 94,
                'technologies' => ['JavaScript', 'HTML5 Canvas', 'CSS3', 'Animation', 'Interactive Design'],
                'challenge' => 'Creating an engaging, festive interactive experience that handles multiple concurrent users.',
                'solution' => 'Developed real-time collaborative Christmas tree with animations, user decorations, and message sharing.',
                'results' => 'Successfully deployed for university event, bringing holiday cheer to the campus community.',
                'completed_at' => now()->subMonths(2),
                'is_featured' => false,
                'sort_order' => 11,
            ],
            [
                'title' => 'Professional Portfolio Website',
                'description' => 'Dual-mode cyber-themed portfolio showcasing full-stack development skills with Laravel, Livewire, and modern web technologies. Features QA dashboard and project case studies.',
                'thumbnail' => null,
                'url' => 'https://your-portfolio.com',
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 0,
                'performance_score' => 97,
                'technologies' => ['Laravel', 'Livewire 3', 'Tailwind CSS', 'MySQL', 'PWA'],
                'challenge' => 'Creating a unique, memorable portfolio that demonstrates both technical skills and design sense.',
                'solution' => 'Built dual-mode interface (professional/cyber) with Kanban career board, live tech stack, and QA metrics.',
                'results' => 'Modern, responsive portfolio successfully showcasing projects, skills, and professional journey.',
                'completed_at' => now(),
                'is_featured' => true,
                'sort_order' => 12,
            ],
            [
                'title' => 'Weather Forecasting Mobile App',
                'description' => 'Mobile application utilizing NASA weather data API to provide accurate forecasts for hikers and outdoor enthusiasts. Developed for NASA Space Apps Challenge 2025.',
                'thumbnail' => null,
                'url' => null,
                'github_url' => null,
                'tests_passing' => true,
                'critical_bugs' => 0,
                'minor_bugs' => 2,
                'performance_score' => 90,
                'technologies' => ['React Native', 'NASA API', 'Weather Data', 'Mobile Development', 'Geolocation'],
                'challenge' => 'Integrating complex NASA weather data into user-friendly mobile interface for outdoor activity planning.',
                'solution' => 'Built intuitive app with location-based forecasts, hiking trail weather overlays, and safety alerts.',
                'results' => 'Participating in NASA Space Apps Challenge 2025 with innovative weather solution for hikers.',
                'completed_at' => now()->addMonths(1), // In progress
                'is_featured' => true,
                'sort_order' => 13,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
