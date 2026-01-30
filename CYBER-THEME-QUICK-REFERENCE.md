# 🎨 Cyber Theme - Component & Utility Quick Reference

## 🎯 Syntax Color Utilities

Use these classes throughout your portfolio for consistent code-aesthetic styling:

```html
<!-- Keywords (blue) - for function names, const, let, etc. -->
<span class="text-syntax-keyword">const</span>

<!-- Strings (emerald) - for success states, primary actions -->
<span class="text-syntax-string">"Hello World"</span>

<!-- Methods (amber) - for featured items, warnings -->
<span class="text-syntax-method">function()</span>

<!-- Variables (violet) - for variable names, secondary actions -->
<span class="text-syntax-variable">myVar</span>

<!-- Comments (gray) - for metadata, labels -->
<span class="text-syntax-comment">// This is a comment</span>

<!-- Errors (red) - for error states -->
<span class="text-syntax-error">Error</span>
```

---

## 🏗️ Bento Grid Layout

### Container
```html
<div class="bento-container">
  <!-- 4-column grid on desktop, single column on mobile -->
</div>
```

### Featured Item (2x2)
```html
<div class="bento-item bento-featured">
  <!-- Spans 2 columns × 2 rows on desktop -->
  <h3 class="font-heading">Featured Project</h3>
  <p>Extended description...</p>
</div>
```

### Standard Item (1x1)
```html
<div class="bento-item">
  <!-- Single grid cell -->
  <h4 class="font-heading">Small Card</h4>
  <p>Brief content...</p>
</div>
```

### Wide Item (2×1)
```html
<div class="bento-item md:col-span-2">
  <!-- Spans 2 columns, 1 row -->
  <div class="flex gap-2">
    <span class="tech-badge">MySQL</span>
    <span class="tech-badge">Redis</span>
  </div>
</div>
```

---

## 🎯 Buttons

### Primary Button (Emerald Glow)
```html
<a href="#" class="cyber-btn">
  <span class="relative z-10">View My Work</span>
</a>
```

### Outline Button (Blue Border)
```html
<a href="#" class="cyber-btn-outline">
  <span class="relative z-10">Get In Touch</span>
</a>
```

---

## 🏷️ Badges & Pills

### Tech Badge
```html
<span class="tech-badge">Laravel</span>
<span class="tech-badge">Tailwind CSS</span>
```

### Category Pill (for filters)
```html
<button class="category-pill">All Projects</button>
<button class="category-pill active">Laravel</button>
```

### Hero Badge (PM/DEV/QA style)
```html
<span class="hero-badge px-4 py-2 rounded-lg bg-syntax-keyword/10 border border-syntax-keyword/30 text-syntax-keyword font-mono">
  PM
</span>
```

---

## 📊 Status Indicators

### Online Status Dot
```html
<div class="flex items-center gap-2">
  <span class="status-dot online"></span>
  <span class="text-syntax-comment">Available for hire</span>
</div>
```

### Featured Status Dot (Orange)
```html
<span class="status-dot featured"></span>
```

---

## 📝 Typography Patterns

### Section Heading with Comment
```html
<h2 class="text-4xl font-heading font-bold">
  <span class="text-syntax-comment">// </span>
  Skills & <span class="text-syntax-string">Expertise</span>
</h2>
```

### Description with Block Comment
```html
<p class="text-gray-400">
  <span class="text-syntax-comment">/** </span>
  Your description text here
  <span class="text-syntax-comment"> */</span>
</p>
```

### Code Variable Declaration
```html
<div class="font-mono">
  <span class="text-syntax-keyword">const </span>
  <span class="text-syntax-variable">role</span>
  <span class="text-white"> = </span>
  <span class="text-syntax-string">"Developer"</span>
  <span class="text-syntax-keyword">;</span>
</div>
```

### Results Counter (Code Style)
```html
<div class="text-sm font-mono">
  <span class="text-syntax-comment">// </span>
  <span class="text-syntax-keyword">const </span>
  <span class="text-syntax-variable">results</span>
  <span> = </span>
  <span class="text-syntax-string">{{ $count }}</span>
  <span class="text-syntax-comment">; // projects found</span>
</div>
```

---

## 🎭 Animations (GSAP)

### Staggered Fade-Up (Hero Badges)
```javascript
gsap.from('.hero-badge', {
  y: 50,
  opacity: 0,
  stagger: 0.2,
  ease: 'power3.out'
});
```

### Scale + Fade (Skills Cards)
```javascript
gsap.from('.bento-item', {
  scrollTrigger: {
    trigger: '.bento-container',
    start: 'top 70%'
  },
  scale: 0.9,
  opacity: 0,
  stagger: 0.15,
  ease: 'back.out(1.4)'
});
```

### Slide from Bottom (Projects)
```javascript
gsap.from('#projects .bento-item', {
  scrollTrigger: {
    trigger: '#projects',
    start: 'top 60%'
  },
  y: 100,
  opacity: 0,
  stagger: 0.2,
  ease: 'power2.out'
});
```

---

## 📦 Livewire Components

### Project Filter with Pills
```php
<div>
  {{-- Category Pills --}}
  <div class="flex gap-3 justify-center">
    <button wire:click="$set('selectedTechnology', 'all')"
            class="category-pill {{ $selectedTechnology === 'all' ? 'active' : '' }}">
      All
    </button>
    @foreach($technologies as $tech)
      <button wire:click="$set('selectedTechnology', '{{ $tech }}')"
              class="category-pill {{ $selectedTechnology === $tech ? 'active' : '' }}">
        {{ $tech }}
      </button>
    @endforeach
  </div>
  
  {{-- Grid with Transition --}}
  <div class="bento-container" wire:transition>
    @forelse($portfolios as $portfolio)
      <div class="bento-item {{ $portfolio->is_featured ? 'bento-featured' : '' }}">
        {{-- Content --}}
      </div>
    @empty
      <div class="col-span-full text-center">
        <p class="text-syntax-error">No projects found</p>
      </div>
    @endforelse
  </div>
  
  {{-- Loading State --}}
  <div wire:loading class="fixed inset-0 backdrop-blur-sm">
    <div class="glass-card">
      <div class="animate-spin">⚡</div>
      <p class="font-mono">Loading...</p>
    </div>
  </div>
</div>
```

---

## 🎨 Reusable Blade Components

### Glass Card
```html
<x-glass-card aos="fade-up" class="p-8">
  <h3>Card Title</h3>
  <p>Card content...</p>
</x-glass-card>
```

### Gradient Orb (Background)
```html
<x-gradient-orb color="emerald" size="700" position="top-right" />
<x-gradient-orb color="violet" size="600" position="bottom-left" />
```

### Bento Grid Container
```html
<x-bento-grid>
  <div class="bento-item bento-featured">Featured</div>
  <div class="bento-item">Small 1</div>
  <div class="bento-item">Small 2</div>
</x-bento-grid>
```

---

## 🎭 AOS Attributes

```html
<!-- Fade Up -->
<div data-aos="fade-up" data-aos-delay="200">Content</div>

<!-- Fade Right/Left -->
<div data-aos="fade-right">Content</div>
<div data-aos="fade-left">Content</div>

<!-- Zoom In -->
<div data-aos="zoom-in" data-aos-duration="600">Content</div>

<!-- Flip -->
<div data-aos="flip-up">Content</div>
```

---

## 📱 Responsive Utilities

```html
<!-- Mobile: stack, Desktop: 4-column grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
  <div class="md:col-span-2">Wide on desktop</div>
  <div>Regular</div>
</div>

<!-- Hide on mobile -->
<div class="hidden md:block">Desktop only</div>

<!-- Show on mobile only -->
<div class="block md:hidden">Mobile only</div>
```

---

## 🎨 Color Reference

| Color         | Hex Code  | Usage                          |
|---------------|-----------|--------------------------------|
| keyword       | `#3b82f6` | Keywords, primary outline      |
| string        | `#10b981` | Success, primary buttons       |
| method        | `#f59e0b` | Featured items, warnings       |
| variable      | `#8b5cf6` | Variables, tertiary actions    |
| comment       | `#6b7280` | Metadata, labels               |
| error         | `#ef4444` | Errors, critical states        |
| cyber-black   | `#020617` | Deep slate background          |

---

## 🔧 Common Patterns

### Project Card (Bento Style)
```html
<div class="bento-item bento-featured">
  <div class="flex items-start justify-between mb-3">
    <h3 class="text-3xl font-heading text-white">{{ $title }}</h3>
    @if($featured)
      <span class="status-dot featured"></span>
    @endif
  </div>
  
  <p class="text-gray-400 text-base mb-6">{{ $description }}</p>
  
  <div class="flex flex-wrap gap-2 mb-6">
    @foreach($technologies as $tech)
      <span class="tech-badge">{{ $tech }}</span>
    @endforeach
  </div>
  
  <div class="flex gap-3">
    <a href="{{ $github }}" class="cyber-btn-outline">Code</a>
    <a href="{{ $live }}" class="cyber-btn">Live</a>
  </div>
</div>
```

### Contact Link (Code Style)
```html
<a href="mailto:email@example.com" class="flex items-center gap-4 group">
  <span class="text-3xl">📧</span>
  <div>
    <div class="text-syntax-comment font-mono text-sm">email:</div>
    <div class="font-semibold text-white group-hover:text-syntax-string">
      "email@example.com"
    </div>
  </div>
</a>
```

---

## 🚀 Performance Tips

1. **Use `wire:transition`** for smooth Livewire updates
2. **Add `data-aos-once="true"`** to prevent re-animation
3. **Debounce inputs** with `wire:model.live.debounce.300ms`
4. **Lazy load images** with `loading="lazy"`
5. **Use `backdrop-blur`** sparingly (GPU intensive)

---

## 📚 Resources

- **Font**: [JetBrains Mono](https://fonts.google.com/specimen/JetBrains+Mono)
- **Icons**: Use emoji (📧 💻 💼 🚀 ⚡ 🔍) for zero dependencies
- **GSAP Docs**: [greensock.com/docs](https://greensock.com/docs/)
- **Livewire**: [livewire.laravel.com](https://livewire.laravel.com)

---

**Quick Start**:
```bash
# Build assets
npm run build

# Start dev server
php artisan serve

# Access cyber theme
http://localhost:8000/cyber
```
