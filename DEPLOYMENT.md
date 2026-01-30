# 🚀 Laravel Deployment Guide
## Contabo VPS + CloudPanel + Cloudflare

Complete step-by-step guide for deploying your Living Release Note Portfolio to production.

---

## 📋 Prerequisites Checklist

Before starting, ensure you have:

- [ ] Contabo VPS with CloudPanel installed
- [ ] SSH access credentials to your VPS
- [ ] GitHub repository with your application
- [ ] Cloudflare account with domain added
- [ ] Domain nameservers pointed to Cloudflare
- [ ] GitHub Personal Access Token or SSH key for private repos

---

## Phase 1: CloudPanel Initial Setup

### 1.1 Create New Site

1. Access CloudPanel at `https://your-server-ip:8443`
2. Navigate to **Sites** → **Add Site**
3. Configure site settings:
   ```
   Site Type: PHP
   Domain Name: yourdomain.com
   PHP Version: 8.2 or 8.3
   Vhost Template: Generic PHP
   App: None
   ```
4. Click **Create**

### 1.2 Create MySQL Database

1. Go to **Databases** → **Add Database**
2. Create database:
   ```
   Database Name: portfolio_db
   Database User: portfolio_user
   Password: [Generate strong password - SAVE THIS!]
   ```
3. Click **Create**

### 1.3 Add www Subdomain (Optional)

1. **Sites** → Select your site → **Domains** → **Add Domain**
2. Add `www.yourdomain.com`
3. Enable redirect (www → non-www or vice versa)

---

## Phase 2: SSH & Repository Setup

### 2.1 Connect via SSH

```bash
ssh clpuser@your-server-ip
```

### 2.2 Navigate to Site Directory

```bash
cd /home/clpuser/htdocs/yourdomain.com
```

**Important**: CloudPanel structure:
- Site root: `/home/clpuser/htdocs/yourdomain.com/`
- Public directory: `/home/clpuser/htdocs/yourdomain.com/htdocs/`

### 2.3 Clear Default Files

```bash
# Create backup directory
mkdir -p ~/backups

# Backup and remove default files
mv htdocs/* ~/backups/ 2>/dev/null || true
rm -rf htdocs
```

### 2.4 Setup GitHub SSH Key

```bash
# Generate SSH key
ssh-keygen -t ed25519 -C "your-email@example.com"

# Display public key
cat ~/.ssh/id_ed25519.pub
```

**Action Required**: 
1. Copy the SSH public key
2. Go to GitHub → Settings → SSH and GPG keys → New SSH key
3. Paste the key and save

### 2.5 Clone Repository

```bash
# Clone from GitHub
git clone git@github.com:yourusername/My-Profile.git temp_repo

# Move files to current directory
mv temp_repo/* ./
mv temp_repo/.* ./ 2>/dev/null || true
rm -rf temp_repo

# Verify files
ls -la
```

### 2.6 Create Public Directory Link

```bash
# Create symbolic link to public directory
ln -s /home/clpuser/htdocs/yourdomain.com/public /home/clpuser/htdocs/yourdomain.com/htdocs
```

---

## Phase 3: Application Configuration

### 3.1 Install Composer Dependencies

```bash
cd /home/clpuser/htdocs/yourdomain.com

# Install dependencies (production mode)
composer install --optimize-autoloader --no-dev
```

### 3.2 Setup Environment File

```bash
# Copy environment file
cp .env.example .env

# Edit environment file
nano .env
```

**Configure `.env` file**:

```env
APP_NAME="Living Release Note"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_TIMEZONE=UTC
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=portfolio_user
DB_PASSWORD=your_database_password_here

SESSION_DRIVER=database
SESSION_LIFETIME=120

CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

ADMIN_EMAIL=your-email@gmail.com
GITHUB_USERNAME=your-github-username

ASSET_URL=https://yourdomain.com
```

**Save**: Press `Ctrl+X`, then `Y`, then `Enter`

### 3.3 Generate Application Key

```bash
php artisan key:generate
```

### 3.4 Run Database Migrations

```bash
# Run migrations with seeders
php artisan migrate:fresh --seed --force

# Or just migrations without seeders
# php artisan migrate --force
```

### 3.5 Build Assets

```bash
# Install Node dependencies
npm install

# Build for production
npm run build

# Verify build
ls -la public/build
```

---

## Phase 4: Permissions & Security

### 4.1 Set File Permissions

```bash
cd /home/clpuser/htdocs/yourdomain.com

# Set ownership
sudo chown -R clpuser:clpuser .

# Set directory permissions
sudo find . -type d -exec chmod 755 {} \;

# Set file permissions
sudo find . -type f -exec chmod 644 {} \;

# Storage and cache must be writable
sudo chmod -R 775 storage bootstrap/cache
sudo chgrp -R www-data storage bootstrap/cache
```

### 4.2 Create Storage Link

```bash
php artisan storage:link
```

### 4.3 Secure Environment File

```bash
chmod 600 .env
```

---

## Phase 5: Web Server Configuration

### 5.1 Configure Nginx

1. In CloudPanel: **Sites** → Select your site → **Vhost**
2. Click **Edit Vhost**
3. Replace with the following configuration:

```nginx
server {
  listen 80;
  listen [::]:80;
  listen 443 ssl;
  listen [::]:443 ssl;
  http2 on;
  {{ssl_certificate_key}}
  {{ssl_certificate}}
  server_name yourdomain.com www.yourdomain.com;
  {{root}}

  {{nginx_access_log}}
  {{nginx_error_log}}

  if ($scheme != "https") {
    rewrite ^ https://$host$uri permanent;
  }

  # Security headers
  add_header X-Frame-Options "SAMEORIGIN" always;
  add_header X-Content-Type-Options "nosniff" always;
  add_header X-XSS-Protection "1; mode=block" always;

  # Cloudflare real IP
  set_real_ip_from 103.21.244.0/22;
  set_real_ip_from 103.22.200.0/22;
  set_real_ip_from 104.16.0.0/13;
  set_real_ip_from 172.64.0.0/13;
  set_real_ip_from 173.245.48.0/20;
  set_real_ip_from 188.114.96.0/20;
  set_real_ip_from 190.93.240.0/20;
  set_real_ip_from 197.234.240.0/22;
  set_real_ip_from 198.41.128.0/17;
  real_ip_header CF-Connecting-IP;

  index index.php index.html;

  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }

  location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php8.2-fpm-{{username}}.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
  }

  # Cache static assets
  location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2)$ {
    expires 30d;
    add_header Cache-Control "public, immutable";
  }

  # Deny access to sensitive files
  location ~ /\.(env|git) {
    deny all;
  }

  {{settings}}
}
```

4. Click **Save**

### 5.2 Verify Nginx

```bash
sudo nginx -t
sudo systemctl reload nginx
```

---

## Phase 6: Cloudflare Configuration

### 6.1 Configure DNS Records

1. Log into Cloudflare
2. Select your domain → **DNS** → **Records**
3. Add A record for root domain:
   ```
   Type: A
   Name: @
   IPv4 address: your-vps-ip
   Proxy status: Proxied (orange cloud)
   ```
4. Add CNAME for www:
   ```
   Type: CNAME
   Name: www
   Target: yourdomain.com
   Proxy status: Proxied (orange cloud)
   ```

### 6.2 Configure SSL/TLS

1. **SSL/TLS** → **Overview**
2. Set: **Full (strict)**

3. **SSL/TLS** → **Edge Certificates**
4. Enable:
   - ✅ Always Use HTTPS
   - ✅ Automatic HTTPS Rewrites
   - ✅ Minimum TLS Version: TLS 1.2

### 6.3 Optimization Settings

**Speed** → **Optimization**:
- ✅ Auto Minify: CSS, JavaScript, HTML
- ✅ Brotli
- ✅ Early Hints

**Caching** → **Configuration**:
- Caching Level: Standard
- Browser Cache TTL: Respect Existing Headers

---

## Phase 7: SSL Certificate

### 7.1 Install Let's Encrypt SSL

1. CloudPanel: **Sites** → Select site → **SSL/TLS**
2. Choose **Let's Encrypt**
3. Select domains: `yourdomain.com` and `www.yourdomain.com`
4. Click **Install**

**Note**: This is required even with Cloudflare for Full (strict) mode.

---

## Phase 8: Laravel Optimization

### 8.1 Optimize Application

```bash
cd /home/clpuser/htdocs/yourdomain.com

# Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize composer
composer dump-autoload --optimize
```

### 8.2 Setup Cron Jobs (Optional)

```bash
crontab -e
```

Add:
```
* * * * * cd /home/clpuser/htdocs/yourdomain.com && php artisan schedule:run >> /dev/null 2>&1
```

---

## Phase 9: Testing

### 9.1 Test Website

Visit `https://yourdomain.com` and verify:

- [ ] Site loads without errors
- [ ] HTTPS working (green padlock)
- [ ] Static assets loading (CSS/JS)
- [ ] Livewire components functional
- [ ] Forms submitting correctly
- [ ] Database connections working
- [ ] Contact form sending emails

### 9.2 Check Logs

```bash
# Laravel logs
tail -f storage/logs/laravel.log

# Nginx error logs
sudo tail -f /var/log/nginx/yourdomain.com_error.log
```

### 9.3 Verify Cloudflare

```bash
curl -I https://yourdomain.com | grep -i "cf-ray"
```

You should see Cloudflare headers.

---

## 🔧 Troubleshooting

### 500 Internal Server Error
```bash
# Check permissions
sudo chmod -R 775 storage bootstrap/cache

# Check logs
tail -f storage/logs/laravel.log
```

### Assets Not Loading (404)
```bash
# Rebuild assets
npm run build

# Verify build directory
ls -la public/build

# Check ASSET_URL in .env
```

### Redirect Loop
- Ensure Cloudflare SSL is "Full (strict)"
- Check APP_URL uses https://
- Verify Nginx HTTPS redirect

### Wrong IP in Logs
- Check Cloudflare IP ranges in Nginx config
- Verify TrustProxies middleware

---

## 🔄 Deploying Updates

### Deploy New Changes

```bash
cd /home/clpuser/htdocs/yourdomain.com

# Pull latest code
git pull origin main

# Update dependencies
composer install --optimize-autoloader --no-dev
npm install && npm run build

# Run migrations
php artisan migrate --force

# Clear and re-cache
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## ✅ Post-Deployment Checklist

- [ ] Site accessible via HTTPS
- [ ] www redirect working
- [ ] Database connected
- [ ] Migrations completed
- [ ] Assets loading correctly
- [ ] Livewire functional
- [ ] Email sending working
- [ ] SSL certificate valid
- [ ] Cloudflare caching active
- [ ] Logs being written
- [ ] Forms submitting
- [ ] Error pages customized

---

## 📊 Monitoring & Maintenance

### Regular Tasks

**Weekly**:
- Check error logs
- Monitor disk space: `df -h`
- Review application logs

**Monthly**:
- Update dependencies
- Review security patches
- Clean old logs: `find storage/logs -name "*.log" -mtime +30 -delete`

### Database Backups

Setup automated backups:

```bash
# Add to crontab
0 2 * * * mysqldump -u portfolio_user -p'password' portfolio_db | gzip > ~/backups/db_$(date +\%Y\%m\%d).sql.gz
```

---

## 📞 Support Resources

- **Laravel Docs**: https://laravel.com/docs/11.x
- **CloudPanel Docs**: https://www.cloudpanel.io/docs/
- **Cloudflare Docs**: https://developers.cloudflare.com/
- **Livewire Docs**: https://livewire.laravel.com/

---

## 🎉 Deployment Complete!

Your Laravel application is now live at `https://yourdomain.com`

Remember to:
1. Update your GitHub repository settings
2. Configure backup schedules
3. Setup monitoring alerts
4. Document any custom configurations

**Happy Deploying! 🚀**
