# Laravel 11 Deployment Guide
## Contabo VPS + CloudPanel + Cloudflare

This guide covers deploying a Laravel 11 application with Livewire 3 to a Contabo VPS running CloudPanel, with Cloudflare DNS and SSL protection.

---

## Prerequisites

- Contabo VPS with root access
- CloudPanel installed and running
- Domain registered with DNS pointing to Cloudflare
- SSH client (PuTTY, Terminal, etc.)
- Git repository with your Laravel application
- Basic knowledge of SSH and terminal commands

---

## 1. CloudPanel Setup

### 1.1 Access Your VPS

```bash
ssh root@your-server-ip
```

### 1.2 Verify CloudPanel Installation

```bash
clpctl system:status
```

### 1.3 Access CloudPanel Admin

Navigate to: `https://your-server-ip:8443`

- Default admin credentials are set during CloudPanel installation
- Change the default password immediately after first login

### 1.4 Update System Packages

```bash
apt update && apt upgrade -y
```

### 1.5 Install Required PHP Extensions

CloudPanel comes with PHP pre-installed, but verify Laravel 11 requirements:

```bash
# Check PHP version (should be 8.2+)
php -v

# Install/verify required extensions
apt install -y php8.3-cli php8.3-fpm php8.3-mysql php8.3-mbstring php8.3-xml \
  php8.3-curl php8.3-zip php8.3-gd php8.3-intl php8.3-bcmath php8.3-soap \
  php8.3-redis php8.3-imagick
```

### 1.6 Install Composer (if not already installed)

```bash
cd /tmp
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer
composer --version
```

### 1.7 Install Node.js and NPM

```bash
# Install Node.js 20.x
curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
apt install -y nodejs

# Verify installation
node -v
npm -v
```

---

## 2. Domain Configuration

### 2.1 Configure Cloudflare DNS

1. Log in to Cloudflare dashboard
2. Select your domain
3. Go to **DNS** → **Records**
4. Add/Update A Record:
   - **Type**: A
   - **Name**: @ (for root domain) or subdomain
   - **IPv4 address**: Your Contabo VPS IP
   - **Proxy status**: Proxied (orange cloud)
   - **TTL**: Auto

5. If using www subdomain, add CNAME:
   - **Type**: CNAME
   - **Name**: www
   - **Target**: yourdomain.com
   - **Proxy status**: Proxied

### 2.2 Cloudflare SSL/TLS Settings

1. Go to **SSL/TLS** → **Overview**
2. Set encryption mode to: **Full (strict)**
3. Go to **SSL/TLS** → **Edge Certificates**
4. Enable:
   - Always Use HTTPS
   - HTTP Strict Transport Security (HSTS)
   - Automatic HTTPS Rewrites
   - Minimum TLS Version: 1.2

---

## 3. Site Creation in CloudPanel

### 3.1 Create New Site

1. Log in to CloudPanel: `https://your-server-ip:8443`
2. Go to **Sites** → **Add Site**
3. Fill in the form:
   - **Site Type**: PHP
   - **PHP Version**: 8.3
   - **Domain Name**: yourdomain.com
   - **Site User**: Create new user (e.g., `myprofile`)
   - **Site User Password**: Generate strong password
   - **Vhost Template**: Laravel
4. Click **Create**

### 3.2 Configure Vhost for Laravel

CloudPanel's Laravel template should work, but verify:

```bash
nano /etc/nginx/sites-enabled/yourdomain.com.conf
```

Ensure the root points to `/public`:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com www.yourdomain.com;
    
    root /home/myprofile/htdocs/yourdomain.com/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

Reload Nginx:

```bash
systemctl reload nginx
```

### 3.3 SSL Certificate (Origin Certificate)

CloudPanel can generate Let's Encrypt certificates, but since you're using Cloudflare:

**Option A: Let's Encrypt (Recommended)**

In CloudPanel:
1. Go to **Sites** → Select your site
2. Click **SSL/TLS** tab
3. Click **New Let's Encrypt Certificate**
4. Enter email and click **Create**

**Option B: Cloudflare Origin Certificate**

1. In Cloudflare: **SSL/TLS** → **Origin Server**
2. Create Certificate (15-year validity)
3. Copy certificate and private key
4. Save to VPS:

```bash
nano /etc/ssl/certs/yourdomain.com.crt
# Paste certificate

nano /etc/ssl/private/yourdomain.com.key
# Paste private key

chmod 600 /etc/ssl/private/yourdomain.com.key
```

5. Update Nginx config to use these certificates

---

## 4. Database Setup

### 4.1 Create MySQL Database via CloudPanel

1. In CloudPanel: **Databases** → **Add Database**
2. Fill in:
   - **Database Name**: myprofile_db
   - **Database User Name**: myprofile_user
   - **Password**: Generate strong password
3. Click **Create**

### 4.2 Alternative: CLI Method

```bash
mysql -u root -p

# In MySQL:
CREATE DATABASE myprofile_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'myprofile_user'@'localhost' IDENTIFIED BY 'strong-password';
GRANT ALL PRIVILEGES ON myprofile_db.* TO 'myprofile_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 4.3 Note Database Credentials

Save these for `.env` configuration:
- Database Name: `myprofile_db`
- Database User: `myprofile_user`
- Database Password: (your password)
- Database Host: `localhost`

---

## 5. Application Deployment

### 5.1 SSH as Site User

```bash
ssh myprofile@your-server-ip
```

Or if logged in as root:

```bash
su - myprofile
```

### 5.2 Navigate to Site Directory

```bash
cd ~/htdocs/yourdomain.com
```

### 5.3 Remove Default Files

```bash
rm -rf *
rm -rf .* 2>/dev/null || true
```

### 5.4 Clone Repository

**Option A: From Git Repository**

```bash
git clone https://github.com/yourusername/your-repo.git .
```

**Option B: Upload Files via SFTP**

Use FileZilla, WinSCP, or similar:
- Host: `your-server-ip`
- Protocol: SFTP
- Port: 22
- User: `myprofile`
- Password: (site user password)
- Upload to: `/home/myprofile/htdocs/yourdomain.com/`

### 5.5 Install Composer Dependencies

```bash
composer install --optimize-autoloader --no-dev
```

> **Note**: `--no-dev` excludes development dependencies for production.

### 5.6 Install NPM Dependencies and Build Assets

```bash
npm install
npm run build
```

### 5.7 Set Proper Permissions

```bash
# Set ownership
sudo chown -R myprofile:myprofile /home/myprofile/htdocs/yourdomain.com

# Set directory permissions
find /home/myprofile/htdocs/yourdomain.com -type d -exec chmod 755 {} \;

# Set file permissions
find /home/myprofile/htdocs/yourdomain.com -type f -exec chmod 644 {} \;

# Storage and bootstrap/cache writable
chmod -R 775 storage bootstrap/cache
```

If using www-data as the web server user:

```bash
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
```

---

## 6. Environment Configuration

### 6.1 Create .env File

```bash
cp .env.example .env
nano .env
```

### 6.2 Configure Production Settings

```env
APP_NAME="My Profile"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_TIMEZONE=UTC
APP_URL=https://yourdomain.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myprofile_db
DB_USERNAME=myprofile_user
DB_PASSWORD=your-database-password

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

### 6.3 Important Production Settings

- **APP_ENV=production** - Never use local/development in production
- **APP_DEBUG=false** - Disable debug mode to prevent information disclosure
- **APP_KEY** - Will be generated in next step
- **APP_URL** - Use your actual domain with HTTPS
- **LOG_LEVEL=error** - Only log errors in production
- **SESSION_DRIVER=database** - Use database for session storage
- **CACHE_STORE=database** - Use database for caching
- **QUEUE_CONNECTION=database** - Use database for queues

---

## 7. Laravel Configuration

### 7.1 Generate Application Key

```bash
php artisan key:generate
```

### 7.2 Run Database Migrations

```bash
php artisan migrate --force
```

> **Note**: `--force` is required in production environment.

### 7.3 Seed Database (if needed)

```bash
php artisan db:seed --force
```

### 7.4 Create Storage Link

```bash
php artisan storage:link
```

### 7.5 Clear and Cache Configuration

```bash
# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7.6 Verify Installation

```bash
php artisan about
```

Check that everything shows correctly, especially:
- Environment: production
- Debug Mode: OFF
- Database: Connected

---

## 8. Cloudflare Security & Performance

### 8.1 Firewall Rules

In Cloudflare dashboard:

1. **Security** → **WAF** (Web Application Firewall)
   - Enable OWASP Core Ruleset
   - Set sensitivity to Medium

2. **Security** → **Bots**
   - Enable Bot Fight Mode

### 8.2 Page Rules (Optional)

Create page rules for better performance:

1. **SSL/TLS** → **Edge Certificates** → **Always Use HTTPS**: ON

2. **Rules** → **Page Rules** → **Create Page Rule**:
   - URL: `yourdomain.com/build/*`
   - Settings: 
     - Cache Level: Cache Everything
     - Edge Cache TTL: 1 month

### 8.3 Caching

1. **Caching** → **Configuration**
   - Caching Level: Standard
   - Browser Cache TTL: Respect Existing Headers

2. **Caching** → **Cache Rules**
   - Create rule to cache static assets (CSS, JS, images)

### 8.4 Security Headers

In your Nginx config, add security headers:

```bash
nano /etc/nginx/sites-enabled/yourdomain.com.conf
```

Add inside the `server` block:

```nginx
add_header X-Frame-Options "SAMEORIGIN" always;
add_header X-Content-Type-Options "nosniff" always;
add_header X-XSS-Protection "1; mode=block" always;
add_header Referrer-Policy "no-referrer-when-downgrade" always;
add_header Content-Security-Policy "default-src 'self' https: data: 'unsafe-inline' 'unsafe-eval';" always;
```

Reload Nginx:

```bash
systemctl reload nginx
```

### 8.5 Rate Limiting

In Cloudflare:
- **Security** → **WAF** → **Rate Limiting Rules**
- Create rule to limit requests per IP (e.g., 100 requests per minute)

---

## 9. Production Optimization

### 9.1 PHP-FPM Optimization

```bash
sudo nano /etc/php/8.3/fpm/pool.d/www.conf
```

Adjust based on your VPS resources:

```ini
pm = dynamic
pm.max_children = 50
pm.start_servers = 10
pm.min_spare_servers = 5
pm.max_spare_servers = 20
pm.max_requests = 500
```

Restart PHP-FPM:

```bash
sudo systemctl restart php8.3-fpm
```

### 9.2 OPcache Configuration

```bash
sudo nano /etc/php/8.3/fpm/conf.d/10-opcache.ini
```

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.revalidate_freq=0
opcache.validate_timestamps=0
opcache.fast_shutdown=1
```

### 9.3 MySQL Optimization

```bash
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
```

Add/modify (adjust based on RAM):

```ini
[mysqld]
innodb_buffer_pool_size = 1G
innodb_log_file_size = 256M
innodb_flush_log_at_trx_commit = 2
innodb_flush_method = O_DIRECT
query_cache_type = 1
query_cache_size = 64M
```

Restart MySQL:

```bash
sudo systemctl restart mysql
```

### 9.4 Laravel Queue Worker

Create systemd service for queue worker:

```bash
sudo nano /etc/systemd/system/laravel-worker.service
```

```ini
[Unit]
Description=Laravel Queue Worker
After=network.target

[Service]
Type=simple
User=myprofile
Group=www-data
Restart=always
RestartSec=5s
ExecStart=/usr/bin/php /home/myprofile/htdocs/yourdomain.com/artisan queue:work database --sleep=3 --tries=3 --max-time=3600

[Install]
WantedBy=multi-user.target
```

Enable and start:

```bash
sudo systemctl enable laravel-worker
sudo systemctl start laravel-worker
sudo systemctl status laravel-worker
```

### 9.5 Laravel Scheduler

Add to crontab:

```bash
crontab -e
```

Add this line:

```cron
* * * * * cd /home/myprofile/htdocs/yourdomain.com && php artisan schedule:run >> /dev/null 2>&1
```

### 9.6 Enable Gzip Compression

Should be enabled by default in CloudPanel, but verify:

```bash
sudo nano /etc/nginx/nginx.conf
```

Ensure gzip settings are enabled:

```nginx
gzip on;
gzip_vary on;
gzip_proxied any;
gzip_comp_level 6;
gzip_types text/plain text/css text/xml text/javascript application/json application/javascript application/xml+rss application/rss+xml font/truetype font/opentype application/vnd.ms-fontobject image/svg+xml;
```

---

## 10. Troubleshooting

### 10.1 500 Internal Server Error

**Check Laravel Logs:**

```bash
tail -f /home/myprofile/htdocs/yourdomain.com/storage/logs/laravel.log
```

**Check Nginx Error Log:**

```bash
sudo tail -f /var/log/nginx/error.log
```

**Common Fixes:**

1. Permissions issue:
   ```bash
   sudo chgrp -R www-data storage bootstrap/cache
   sudo chmod -R ug+rwx storage bootstrap/cache
   ```

2. Missing APP_KEY:
   ```bash
   php artisan key:generate
   ```

3. Cache issues:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   php artisan view:clear
   ```

### 10.2 404 Not Found for Routes

**Issue**: Routes other than homepage return 404.

**Fix**: Check Nginx rewrite rules:

```bash
sudo nano /etc/nginx/sites-enabled/yourdomain.com.conf
```

Ensure this location block exists:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

Reload Nginx:

```bash
sudo systemctl reload nginx
```

### 10.3 CSS/JS Not Loading

**Issue**: Vite assets not loading.

**Fixes:**

1. Rebuild assets:
   ```bash
   npm run build
   ```

2. Clear view cache:
   ```bash
   php artisan view:clear
   ```

3. Check `APP_URL` in `.env` matches your domain with HTTPS

4. Verify manifest file exists:
   ```bash
   ls -la public/build/manifest.json
   ```

### 10.4 Database Connection Failed

**Fixes:**

1. Verify credentials in `.env`
2. Test MySQL connection:
   ```bash
   mysql -u myprofile_user -p myprofile_db
   ```

3. Check MySQL is running:
   ```bash
   sudo systemctl status mysql
   ```

4. Clear config cache:
   ```bash
   php artisan config:clear
   php artisan config:cache
   ```

### 10.5 Session/Cache Issues

**Issue**: Users logged out randomly or cache not working.

**Fixes:**

1. Verify session table exists:
   ```bash
   php artisan session:table
   php artisan migrate --force
   ```

2. Create cache table:
   ```bash
   php artisan cache:table
   php artisan migrate --force
   ```

3. Clear all caches:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   ```

### 10.6 Queue Jobs Not Processing

**Fixes:**

1. Check worker status:
   ```bash
   sudo systemctl status laravel-worker
   ```

2. Restart worker:
   ```bash
   sudo systemctl restart laravel-worker
   ```

3. View worker logs:
   ```bash
   sudo journalctl -u laravel-worker -f
   ```

4. Verify jobs table exists:
   ```bash
   php artisan queue:table
   php artisan migrate --force
   ```

### 10.7 Livewire Not Working

**Issue**: Livewire components not reactive or not loading.

**Fixes:**

1. Rebuild assets with Livewire:
   ```bash
   npm run build
   ```

2. Clear view cache:
   ```bash
   php artisan view:clear
   ```

3. Verify Livewire assets are published:
   ```bash
   php artisan livewire:publish --assets
   ```

### 10.8 Cloudflare SSL Issues

**Issue**: Too many redirects or SSL errors.

**Fixes:**

1. In Cloudflare, set SSL/TLS to **Full (strict)**
2. Ensure site has valid SSL certificate (Let's Encrypt or Cloudflare Origin)
3. Check Nginx is configured for HTTPS

### 10.9 File Upload Issues

**Issue**: File uploads fail or timeout.

**Fixes:**

1. Increase PHP upload limits:
   ```bash
   sudo nano /etc/php/8.3/fpm/php.ini
   ```
   
   ```ini
   upload_max_filesize = 20M
   post_max_size = 20M
   max_execution_time = 300
   ```

2. Increase Nginx limits:
   ```bash
   sudo nano /etc/nginx/nginx.conf
   ```
   
   ```nginx
   client_max_body_size 20M;
   ```

3. Restart services:
   ```bash
   sudo systemctl restart php8.3-fpm
   sudo systemctl reload nginx
   ```

### 10.10 Memory Exhaustion

**Issue**: PHP Fatal error: Allowed memory size exhausted.

**Fix**: Increase PHP memory limit:

```bash
sudo nano /etc/php/8.3/fpm/php.ini
```

```ini
memory_limit = 512M
```

Restart PHP-FPM:

```bash
sudo systemctl restart php8.3-fpm
```

---

## Maintenance & Updates

### Deploying Updates

When pushing updates to production:

```bash
# Pull latest code
git pull origin main

# Update dependencies
composer install --optimize-autoloader --no-dev

# Rebuild assets
npm install
npm run build

# Run migrations
php artisan migrate --force

# Clear and cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Restart queue worker
sudo systemctl restart laravel-worker
```

### Automated Deployment Script

Create deployment script:

```bash
nano ~/deploy.sh
```

```bash
#!/bin/bash

cd /home/myprofile/htdocs/yourdomain.com

# Enable maintenance mode
php artisan down

# Pull latest changes
git pull origin main

# Install/update dependencies
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Run migrations
php artisan migrate --force

# Clear and cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Restart services
sudo systemctl restart laravel-worker

# Disable maintenance mode
php artisan up

echo "Deployment completed!"
```

Make executable:

```bash
chmod +x ~/deploy.sh
```

Run deployment:

```bash
~/deploy.sh
```

---

## Security Checklist

- [ ] `.env` file is not in version control
- [ ] `APP_DEBUG=false` in production
- [ ] `APP_ENV=production`
- [ ] Strong database passwords
- [ ] SSH key authentication enabled (disable password login)
- [ ] Firewall configured (UFW or CloudPanel firewall)
- [ ] Regular backups configured
- [ ] SSL certificate installed and Cloudflare SSL set to Full (strict)
- [ ] File permissions set correctly (755 for directories, 644 for files)
- [ ] Storage and bootstrap/cache writable by web server
- [ ] Security headers configured in Nginx
- [ ] Cloudflare WAF enabled
- [ ] Rate limiting configured
- [ ] Keep system and packages updated
- [ ] Monitor logs regularly

---

## Backup Strategy

### Database Backup

Create daily backup script:

```bash
sudo nano /usr/local/bin/backup-db.sh
```

```bash
#!/bin/bash
BACKUP_DIR="/home/myprofile/backups/mysql"
DATE=$(date +%Y%m%d_%H%M%S)
DB_NAME="myprofile_db"
DB_USER="myprofile_user"
DB_PASS="your-password"

mkdir -p $BACKUP_DIR
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME | gzip > $BACKUP_DIR/${DB_NAME}_${DATE}.sql.gz

# Keep only last 7 days
find $BACKUP_DIR -name "*.sql.gz" -mtime +7 -delete
```

Make executable:

```bash
sudo chmod +x /usr/local/bin/backup-db.sh
```

Add to crontab (daily at 2 AM):

```bash
sudo crontab -e
```

```cron
0 2 * * * /usr/local/bin/backup-db.sh
```

### Application Backup

CloudPanel has built-in backup functionality. Configure it:

1. In CloudPanel: **Sites** → Select your site → **Backups**
2. Configure backup schedule and retention
3. Consider using external backup solutions (AWS S3, Backblaze, etc.)

---

## Performance Monitoring

### Laravel Telescope (Development/Staging Only)

**DO NOT** install Telescope in production unless behind authentication.

### Basic Monitoring

Check site status:

```bash
# Nginx status
sudo systemctl status nginx

# PHP-FPM status
sudo systemctl status php8.3-fpm

# MySQL status
sudo systemctl status mysql

# Queue worker status
sudo systemctl status laravel-worker

# Disk usage
df -h

# Memory usage
free -m
```

### Uptime Monitoring

Consider external monitoring services:
- UptimeRobot (free tier available)
- Pingdom
- StatusCake
- Better Uptime

---

## Additional Resources

- [Laravel Deployment Documentation](https://laravel.com/docs/11.x/deployment)
- [CloudPanel Documentation](https://www.cloudpanel.io/docs/)
- [Cloudflare Documentation](https://developers.cloudflare.com/)
- [Livewire Documentation](https://livewire.laravel.com/)

---

## Support & Troubleshooting

If you encounter issues:

1. Check Laravel logs: `storage/logs/laravel.log`
2. Check Nginx error logs: `/var/log/nginx/error.log`
3. Check PHP-FPM logs: `/var/log/php8.3-fpm.log`
4. Use `php artisan about` to verify configuration
5. Review CloudPanel logs in the admin panel

---

**Document Version**: 1.0  
**Last Updated**: December 29, 2025  
**Laravel Version**: 11.x  
**PHP Version**: 8.3  
**CloudPanel Version**: 2.x
