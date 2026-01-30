# 🚀 Quick Start Guide - Cyber Theme Portfolio

## 📋 Immediate Actions

### **1. View the New Design** (2 minutes)
```bash
php artisan serve
```
Then open your browser to: **http://localhost:8000/cyber**

---

### **2. Customize Your Content** (10 minutes)

#### **Update Personal Information**

**File:** `resources/views/welcome-cyber.blade.php`

Replace these placeholders:
- Line 11: `Your Name` → Your actual name
- Line 15: Update typewriter strings (or edit `resources/js/app.js` lines 25-30)
- Line 138: `your@email.com` → Your email
- Line 145: GitHub URL
- Line 152: LinkedIn URL

#### **Update Typewriter Effect**

**File:** `resources/js/app.js` (lines 25-30)
```javascript
strings: [
    'Full-Stack Developer',  // ← Change these
    'Laravel Engineer',
    'Problem Solver',
    'IT Student',
],
```

After changing, rebuild:
```bash
npm run build
```

---

### **3. Add Real Projects** (15 minutes)

#### **Option A: Use Database Seeder**

**File:** `database/seeders/DatabaseSeeder.php`

Add this:
```php
use App\Models\Portfolio;

Portfolio::create([
    'title' => 'E-Commerce Platform',
    'description' => 'Full-stack shopping cart with Stripe integration',
    'technologies' => ['Laravel', 'Livewire', 'Stripe', 'MySQL'],
    'github_url' => 'https://github.com/yourusername/project',
    'live_url' => 'https://demo.example.com',
    'is_featured' => true,
    'sort_order' => 1,
]);
```

Run seeder:
```bash
php artisan db:seed
```

#### **Option B: Manual Database Entry**

Use your database client to insert into `portfolios` table.

---

### **4. Make Cyber Theme Default** (2 minutes)

**File:** `routes/web.php`

Change line 6:
```php
Route::get('/', function () {
    return view('welcome-cyber'); // ← Changed from 'welcome'
})->name('home');
```

Now `http://localhost:8000/` shows cyber theme!

---

## 🎨 Customization Options

### **Change Colors**

**File:** `tailwind.config.js`

```javascript
'cyber': {
    'accent': '#10b981',  // ← Change this for primary color
    'blue': '#8b5cf6',    // ← Change this for secondary
},
```

Rebuild:
```bash
npm run build
```

### **Modify Gradient Orbs**

**File:** `resources/views/welcome-cyber.blade.php`

Lines 2-3:
```php
<x-gradient-orb color="emerald" size="600" position="top-right" />
<x-gradient-orb color="violet" size="500" position="bottom-left" />
```

**Options:**
- `color`: emerald, violet, purple, amber
- `size`: 400, 500, 600, 700 (pixels)
- `position`: top-left, top-right, bottom-left, bottom-right

### **Adjust Animation Speed**

**File:** `resources/js/app.js`

Line 12:
```javascript
AOS.init({
    duration: 800,  // ← Change animation duration (ms)
    offset: 100,    // ← Distance from viewport before trigger
});
```

---

## 📱 Testing Checklist

### **Desktop Testing**
- [ ] Hero typewriter animation works
- [ ] All AOS animations trigger on scroll
- [ ] Glass cards have blur effect
- [ ] Project filter works (search + technology)
- [ ] Hover effects on cards
- [ ] Navigation links scroll to sections

### **Mobile Testing**
- [ ] Hamburger menu appears (< 768px width)
- [ ] Masonry grid stacks to 1 column
- [ ] Text is readable (not too small)
- [ ] Glass cards look good on small screens
- [ ] Touch targets are large enough

### **Browser Testing**
- [ ] Chrome/Edge (Chromium)
- [ ] Firefox
- [ ] Safari (if available)

---

## 🔧 Troubleshooting

### **Typewriter Not Working**
1. Check browser console for errors
2. Verify `#hero-typewriter` element exists
3. Clear cache: `php artisan optimize:clear`
4. Rebuild: `npm run build`

### **Glass Effect Not Showing**
- Browser must support `backdrop-filter`
- Try in Chrome/Firefox (Safari may need `-webkit-`)
- Check for CSS errors in inspector

### **AOS Animations Not Triggering**
1. Open DevTools → Network → Check `aos.css` loaded
2. Verify `data-aos` attributes in HTML
3. Try `AOS.refresh()` in console

### **Projects Not Showing**
1. Check database has records: `php artisan tinker` → `Portfolio::count()`
2. Verify `technologies` is JSON array in database
3. Check Livewire console for errors

---

## 📦 Package Management

### **Update Dependencies**
```bash
composer update      # PHP packages
npm update          # Node packages
```

### **Add New NPM Package**
```bash
npm install package-name
npm run build       # Always rebuild after
```

---

## 🌐 Deployment Prep

### **Before Deploying:**
```bash
# 1. Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 2. Build production assets
npm run build

# 3. Set APP_ENV to production in .env
APP_ENV=production
APP_DEBUG=false
```

### **Environment Variables to Update:**
```env
APP_URL=https://yourdomain.com
ASSET_URL=https://yourdomain.com
```

---

## 🎯 Quick Reference

### **Useful Artisan Commands**
```bash
php artisan serve              # Start dev server
php artisan optimize:clear     # Clear all caches
php artisan migrate:fresh      # Reset database
php artisan db:seed           # Seed data
```

### **Useful NPM Commands**
```bash
npm run dev     # Development build (watch mode)
npm run build   # Production build
npm run lint    # Check code quality (if configured)
```

---

## 📞 Need Help?

### **Common File Locations**
- Colors: `tailwind.config.js`
- Animations: `resources/js/app.js`
- Hero section: `resources/views/welcome-cyber.blade.php`
- Projects filter: `app/Livewire/ProjectFilter.php`
- Glass styling: `resources/css/app.css`

### **Debugging Tools**
- Laravel: `php artisan tinker`
- Livewire: Browser DevTools → Livewire tab
- Tailwind: DevTools → Elements → Computed styles

---

**🎉 You're all set! Enjoy your new cyber-minimalist portfolio!**
