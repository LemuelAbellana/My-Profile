# Living Release Note Portfolio - Setup Guide

## 🚀 Quick Start Guide

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL 8.0+
- Git (optional)

### Step 1: Install Dependencies

```bash
# Navigate to project directory
cd living-release-note-portfolio

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### Step 2: Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 3: Configure Database

Edit `.env` file and update these settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Create the database:
```bash
# Using MySQL command line
mysql -u root -p
CREATE DATABASE portfolio_db;
exit;
```

### Step 4: Run Migrations & Seed Data

```bash
# Run migrations
php artisan migrate

# Seed sample data
php artisan db:seed
```

### Step 5: Configure Email

Update `.env` with your email settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Your Name"

# Admin notification email
ADMIN_EMAIL=your-email@gmail.com
ADMIN_NAME="Your Name"
```

**For Gmail:**
1. Go to Google Account settings
2. Enable 2-Step Verification
3. Generate App Password
4. Use that password in MAIL_PASSWORD

### Step 6: Build Assets

```bash
# Development build (with hot reload)
npm run dev

# Or production build
npm run build
```

### Step 7: Start Development Server

```bash
php artisan serve
```

Visit: http://localhost:8000

---

## 📝 Customization Guide

### 1. Update Personal Information

#### Hero Section
Edit `resources/views/welcome.blade.php`:
- Replace "Your Name" with your actual name
- Update headline and description
- Add your profile photo to `public/images/profile.jpg`

#### Footer
Edit `resources/views/layouts/app.blade.php`:
- Update copyright name

### 2. Add Your Career Timeline

```bash
php artisan tinker
```

```php
use App\Models\Career;

Career::create([
    'title' => 'Your Achievement',
    'description' => 'Detailed description...',
    'status' => 'shipped', // backlog, in_progress, or shipped
    'progress' => 100,
    'technologies' => ['Laravel', 'Vue.js'],
    'category' => 'Project',
    'completed_at' => now(),
    'sort_order' => 1,
]);
```

### 3. Add Your Projects

```php
use App\Models\Portfolio;

Portfolio::create([
    'title' => 'Project Name',
    'description' => 'Project description...',
    'thumbnail' => '/images/project-thumbnail.jpg',
    'url' => 'https://live-demo.com',
    'github_url' => 'https://github.com/yourusername/project',
    'tests_passing' => true,
    'critical_bugs' => 0,
    'minor_bugs' => 2,
    'performance_score' => 95,
    'technologies' => ['Laravel', 'Livewire', 'MySQL'],
    'challenge' => 'What problem did you solve?',
    'solution' => 'How did you solve it?',
    'results' => 'What were the results?',
    'is_featured' => true,
    'completed_at' => now(),
    'sort_order' => 1,
]);
```

### 4. Customize Colors

Edit `tailwind.config.js`:

```javascript
colors: {
    'client': {
        500: '#3b82f6', // Your brand color
        600: '#2563eb',
    },
    'dev': {
        500: '#16a34a', // Terminal green
        600: '#15803d',
    },
}
```

### 5. Update GitHub Integration (Optional)

Add to `.env`:
```env
GITHUB_USERNAME=your-github-username
GITHUB_REPO_ACTIVITY=true
```

---

## 🧪 Testing the Contact Form

### Test Email Locally

Use **Mailtrap** or **MailHog** for testing:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
```

### Queue Configuration (Production)

For production, use queues for email:

```env
QUEUE_CONNECTION=database
```

```bash
php artisan queue:table
php artisan migrate
php artisan queue:work
```

---

## 🎨 Customization Checklist

- [ ] Update personal name and info
- [ ] Add profile photo (public/images/profile.jpg)
- [ ] Configure email settings
- [ ] Add your career timeline data
- [ ] Add your portfolio projects
- [ ] Update color scheme (optional)
- [ ] Add project thumbnails
- [ ] Test contact form
- [ ] Update social links (if adding)
- [ ] Update SEO meta tags

---

## 🚀 Deployment Guide

### Option 1: Shared Hosting

1. Build assets locally:
```bash
npm run build
```

2. Upload files via FTP (excluding node_modules, .git)

3. Set document root to `/public`

4. Import database using phpMyAdmin

5. Update `.env` with production settings

### Option 2: VPS (DigitalOcean, AWS, etc.)

```bash
# SSH into server
ssh user@your-server-ip

# Install requirements
sudo apt update
sudo apt install php8.2 php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring nginx mysql-server

# Clone project
git clone your-repo-url /var/www/portfolio

# Install dependencies
cd /var/www/portfolio
composer install --optimize-autoloader --no-dev
npm install && npm run build

# Set permissions
sudo chown -R www-data:www-data /var/www/portfolio
sudo chmod -R 755 /var/www/portfolio/storage

# Configure nginx, SSL, etc.
```

### Option 3: Laravel Forge (Easiest)

1. Create server on Laravel Forge
2. Create new site
3. Deploy via Git integration
4. Configure environment variables
5. Enable queue worker
6. Setup SSL certificate

---

## 📊 Analytics & Monitoring

The system tracks:
- Mode toggles (Client vs Dev)
- Card clicks in Kanban
- Project views
- Ticket submissions

View analytics:
```bash
php artisan tinker
```

```php
use App\Models\PageInteraction;

// Most popular mode
PageInteraction::where('event_type', 'mode_toggle')
    ->get()
    ->groupBy('metadata.new_mode')
    ->map->count();

// Most viewed projects
PageInteraction::where('event_type', 'project_view')
    ->get()
    ->groupBy('metadata.project_title')
    ->map->count()
    ->sortDesc();
```

---

## 🐛 Troubleshooting

### "Class 'Livewire' not found"
```bash
composer dump-autoload
php artisan optimize:clear
```

### Styles not loading
```bash
npm run build
php artisan optimize:clear
```

### Email not sending
- Check `.env` credentials
- Test with Mailtrap first
- Check `storage/logs/laravel.log`

### Database connection error
- Verify MySQL is running
- Check database credentials in `.env`
- Ensure database exists

---

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Livewire Documentation](https://livewire.laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Heroicons](https://heroicons.com) - Free SVG icons

---

## 🤝 Support

For issues or questions about this portfolio template, please check:
- Laravel logs: `storage/logs/laravel.log`
- Browser console for JavaScript errors
- Network tab for failed requests

---

**Good luck with your portfolio! 🎉**
