# Living Release Note Portfolio - Quick Setup Script
# Run this script to set up the project automatically

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Living Release Note Portfolio Setup" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Check if running in project directory
if (-not (Test-Path "composer.json")) {
    Write-Host "❌ Error: Please run this script from the project root directory" -ForegroundColor Red
    exit 1
}

# Step 1: Check prerequisites
Write-Host "✓ Checking prerequisites..." -ForegroundColor Yellow

# Check PHP
try {
    $phpVersion = php -v | Select-String "PHP (\d+\.\d+)" | ForEach-Object { $_.Matches.Groups[1].Value }
    Write-Host "  ✓ PHP $phpVersion found" -ForegroundColor Green
} catch {
    Write-Host "  ❌ PHP not found. Please install PHP 8.2 or higher" -ForegroundColor Red
    exit 1
}

# Check Composer
try {
    composer --version | Out-Null
    Write-Host "  ✓ Composer found" -ForegroundColor Green
} catch {
    Write-Host "  ❌ Composer not found. Please install Composer" -ForegroundColor Red
    exit 1
}

# Check Node.js
try {
    $nodeVersion = node -v
    Write-Host "  ✓ Node.js $nodeVersion found" -ForegroundColor Green
} catch {
    Write-Host "  ❌ Node.js not found. Please install Node.js" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 2: Install PHP dependencies
Write-Host "📦 Installing PHP dependencies..." -ForegroundColor Yellow
composer install
if ($LASTEXITCODE -eq 0) {
    Write-Host "  ✓ PHP dependencies installed" -ForegroundColor Green
} else {
    Write-Host "  ❌ Failed to install PHP dependencies" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 3: Install JavaScript dependencies
Write-Host "📦 Installing JavaScript dependencies..." -ForegroundColor Yellow
npm install
if ($LASTEXITCODE -eq 0) {
    Write-Host "  ✓ JavaScript dependencies installed" -ForegroundColor Green
} else {
    Write-Host "  ❌ Failed to install JavaScript dependencies" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 4: Setup environment file
Write-Host "⚙️  Setting up environment..." -ForegroundColor Yellow
if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" ".env"
    Write-Host "  ✓ .env file created" -ForegroundColor Green
} else {
    Write-Host "  ℹ️  .env file already exists" -ForegroundColor Cyan
}

Write-Host ""

# Step 5: Generate application key
Write-Host "🔑 Generating application key..." -ForegroundColor Yellow
php artisan key:generate
if ($LASTEXITCODE -eq 0) {
    Write-Host "  ✓ Application key generated" -ForegroundColor Green
} else {
    Write-Host "  ❌ Failed to generate application key" -ForegroundColor Red
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "✅ Basic Setup Complete!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Next steps
Write-Host "📋 Next Steps:" -ForegroundColor Yellow
Write-Host ""
Write-Host "1. Configure Database:" -ForegroundColor White
Write-Host "   - Create a MySQL database named 'portfolio_db'" -ForegroundColor Gray
Write-Host "   - Edit .env file and update these settings:" -ForegroundColor Gray
Write-Host "     DB_DATABASE=portfolio_db" -ForegroundColor Gray
Write-Host "     DB_USERNAME=your_username" -ForegroundColor Gray
Write-Host "     DB_PASSWORD=your_password" -ForegroundColor Gray
Write-Host ""

Write-Host "2. Run Migrations:" -ForegroundColor White
Write-Host "   php artisan migrate --seed" -ForegroundColor Cyan
Write-Host ""

Write-Host "3. Configure Email (in .env):" -ForegroundColor White
Write-Host "   MAIL_MAILER=smtp" -ForegroundColor Gray
Write-Host "   MAIL_HOST=smtp.gmail.com" -ForegroundColor Gray
Write-Host "   MAIL_PORT=587" -ForegroundColor Gray
Write-Host "   MAIL_USERNAME=your-email@gmail.com" -ForegroundColor Gray
Write-Host "   MAIL_PASSWORD=your-app-password" -ForegroundColor Gray
Write-Host ""

Write-Host "4. Build Assets:" -ForegroundColor White
Write-Host "   npm run dev" -ForegroundColor Cyan
Write-Host "   (or 'npm run build' for production)" -ForegroundColor Gray
Write-Host ""

Write-Host "5. Start Development Server:" -ForegroundColor White
Write-Host "   php artisan serve" -ForegroundColor Cyan
Write-Host ""

Write-Host "📚 Documentation:" -ForegroundColor Yellow
Write-Host "   - SETUP.md    - Detailed setup instructions" -ForegroundColor Gray
Write-Host "   - FEATURES.md - Complete feature list" -ForegroundColor Gray
Write-Host "   - README.md   - Project overview" -ForegroundColor Gray
Write-Host ""

Write-Host "🎉 Happy coding!" -ForegroundColor Green
Write-Host ""
