#!/bin/bash

# Living Release Note Portfolio - Quick Setup Script
# Run this script to set up the project automatically

echo "========================================"
echo "Living Release Note Portfolio Setup"
echo "========================================"
echo ""

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color

# Check if running in project directory
if [ ! -f "composer.json" ]; then
    echo -e "${RED}❌ Error: Please run this script from the project root directory${NC}"
    exit 1
fi

# Step 1: Check prerequisites
echo -e "${YELLOW}✓ Checking prerequisites...${NC}"

# Check PHP
if command -v php &> /dev/null; then
    PHP_VERSION=$(php -v | head -n 1 | cut -d " " -f 2 | cut -d "." -f 1,2)
    echo -e "${GREEN}  ✓ PHP $PHP_VERSION found${NC}"
else
    echo -e "${RED}  ❌ PHP not found. Please install PHP 8.2 or higher${NC}"
    exit 1
fi

# Check Composer
if command -v composer &> /dev/null; then
    echo -e "${GREEN}  ✓ Composer found${NC}"
else
    echo -e "${RED}  ❌ Composer not found. Please install Composer${NC}"
    exit 1
fi

# Check Node.js
if command -v node &> /dev/null; then
    NODE_VERSION=$(node -v)
    echo -e "${GREEN}  ✓ Node.js $NODE_VERSION found${NC}"
else
    echo -e "${RED}  ❌ Node.js not found. Please install Node.js${NC}"
    exit 1
fi

echo ""

# Step 2: Install PHP dependencies
echo -e "${YELLOW}📦 Installing PHP dependencies...${NC}"
composer install
if [ $? -eq 0 ]; then
    echo -e "${GREEN}  ✓ PHP dependencies installed${NC}"
else
    echo -e "${RED}  ❌ Failed to install PHP dependencies${NC}"
    exit 1
fi

echo ""

# Step 3: Install JavaScript dependencies
echo -e "${YELLOW}📦 Installing JavaScript dependencies...${NC}"
npm install
if [ $? -eq 0 ]; then
    echo -e "${GREEN}  ✓ JavaScript dependencies installed${NC}"
else
    echo -e "${RED}  ❌ Failed to install JavaScript dependencies${NC}"
    exit 1
fi

echo ""

# Step 4: Setup environment file
echo -e "${YELLOW}⚙️  Setting up environment...${NC}"
if [ ! -f ".env" ]; then
    cp .env.example .env
    echo -e "${GREEN}  ✓ .env file created${NC}"
else
    echo -e "${CYAN}  ℹ️  .env file already exists${NC}"
fi

echo ""

# Step 5: Generate application key
echo -e "${YELLOW}🔑 Generating application key...${NC}"
php artisan key:generate
if [ $? -eq 0 ]; then
    echo -e "${GREEN}  ✓ Application key generated${NC}"
else
    echo -e "${RED}  ❌ Failed to generate application key${NC}"
fi

echo ""
echo "========================================"
echo -e "${GREEN}✅ Basic Setup Complete!${NC}"
echo "========================================"
echo ""

# Next steps
echo -e "${YELLOW}📋 Next Steps:${NC}"
echo ""
echo -e "${NC}1. Configure Database:${NC}"
echo "   - Create a MySQL database named 'portfolio_db'"
echo "   - Edit .env file and update these settings:"
echo "     DB_DATABASE=portfolio_db"
echo "     DB_USERNAME=your_username"
echo "     DB_PASSWORD=your_password"
echo ""

echo -e "${NC}2. Run Migrations:${NC}"
echo -e "${CYAN}   php artisan migrate --seed${NC}"
echo ""

echo -e "${NC}3. Configure Email (in .env):${NC}"
echo "   MAIL_MAILER=smtp"
echo "   MAIL_HOST=smtp.gmail.com"
echo "   MAIL_PORT=587"
echo "   MAIL_USERNAME=your-email@gmail.com"
echo "   MAIL_PASSWORD=your-app-password"
echo ""

echo -e "${NC}4. Build Assets:${NC}"
echo -e "${CYAN}   npm run dev${NC}"
echo "   (or 'npm run build' for production)"
echo ""

echo -e "${NC}5. Start Development Server:${NC}"
echo -e "${CYAN}   php artisan serve${NC}"
echo ""

echo -e "${YELLOW}📚 Documentation:${NC}"
echo "   - SETUP.md    - Detailed setup instructions"
echo "   - FEATURES.md - Complete feature list"
echo "   - README.md   - Project overview"
echo ""

echo -e "${GREEN}🎉 Happy coding!${NC}"
echo ""
