# Living Release Note Portfolio

## Project Overview
A dual-mode portfolio website built with Laravel and Livewire 3, showcasing IT student expertise in Programming, Project Management, and Quality Assurance.

## Concept
The "Living Release Note" - A portfolio that proves your skills through its very design:
- **Dual-Mode Interface**: Toggle between Client Mode (professional/PM view) and Dev Mode (technical/code view)
- **Kanban Career Timeline**: Visualize your journey as an Agile project board
- **QA-Verified Portfolio**: Each project displays quality metrics and test coverage
- **Support Ticket Contact**: IT-themed contact form with email notifications

## Technology Stack
- **Backend**: Laravel 11.x
- **Frontend Logic**: Livewire 3
- **Styling**: Tailwind CSS + Alpine.js
- **Database**: MySQL
- **Email**: Laravel Mailable with queue support

## Features
1. **Perspective Engine**: Global view toggle (Client/Dev mode)
2. **Agile Career Module**: Kanban-style about section
3. **QA-Verified Portfolio**: Project showcase with health metrics
4. **Support Ticket System**: Contact form with severity levels
5. **Real-time Activity Feed**: Show recent coding activity
6. **Changelog Blog**: Version history style updates
7. **Interactive Resume Export**: Multiple format options

## Installation

```bash
# Clone and setup
composer install
npm install

# Environment
cp .env.example .env
php artisan key:generate

# Database
php artisan migrate --seed

# Build assets
npm run dev

# Serve
php artisan serve
```

## Project Structure
```
├── app/
│   ├── Livewire/
│   │   ├── PerspectiveToggle.php
│   │   ├── KanbanCareer.php
│   │   ├── PortfolioGrid.php
│   │   └── SupportTicket.php
│   ├── Models/
│   │   ├── Career.php
│   │   ├── Portfolio.php
│   │   └── Ticket.php
│   └── Mail/
│       └── TicketSubmitted.php
├── database/
│   └── migrations/
├── resources/
│   ├── views/
│   │   ├── livewire/
│   │   └── components/
│   └── js/
└── routes/
```

## License
Personal Portfolio Project - 2025
