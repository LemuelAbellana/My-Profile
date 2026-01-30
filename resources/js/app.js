import './bootstrap';
import TypeIt from 'typeit';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

// Alpine Components - Livewire v3 includes Alpine automatically
document.addEventListener('livewire:init', () => {
    Alpine.data('scrollProgress', () => ({
        progress: 0,
        init() {
            window.addEventListener('scroll', () => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                this.progress = scrollHeight > 0 ? scrollTop / scrollHeight : 0;
            });
        }
    }));
});

// Initialize on page load (AOS removed)
document.addEventListener('DOMContentLoaded', () => {
    // Prevent auto-scroll on initial page load
    if (window.location.hash) {
        // Temporarily disable smooth scroll
        document.documentElement.style.scrollBehavior = 'auto';
        window.scrollTo(0, 0);
        setTimeout(() => {
            document.documentElement.classList.add('js-ready');
            document.documentElement.style.scrollBehavior = '';
        }, 100);
    } else {
        document.documentElement.classList.add('js-ready');
    }
    
    // GSAP Scroll Animations - Advanced Storytelling
    initScrollAnimations();
    
    // Initialize Projects Carousel
    if (window.initProjectsCarousel) {
        window.initProjectsCarousel();
    }
});

// Initialize TypeIt for Hero Typewriter Effect - Simplified to fix doubled character bug
let typeItInstance = null;

window.initTypewriter = function() {
    const el = document.querySelector('#hero-typewriter');
    if (!el) return;
    
    // Destroy existing instance
    if (typeItInstance) {
        try {
            typeItInstance.destroy();
        } catch (e) {}
        typeItInstance = null;
    }
    
    // Clear completely
    el.textContent = '';
    
    // Create new instance with minimal config
    typeItInstance = new TypeIt(el, {
        strings: ['Full Stack Developer', 'Laravel Engineer', 'Problem Solver', 'IT Student'],
        speed: 100,
        deleteSpeed: 50,
        loop: true,
        waitUntilVisible: true,
        breakLines: false,
        nextStringDelay: 1500
    }).go();
};

// Initialize Swiper Carousel for Projects
window.initProjectsCarousel = function() {
    const swiperEl = document.querySelector('.projects-swiper');
    if (swiperEl) {
        // Destroy existing instance if any
        if (swiperEl.swiper) {
            swiperEl.swiper.destroy(true, true);
        }
        
        // Initialize new Swiper instance
        new Swiper('.projects-swiper', {
            modules: [Navigation, Pagination, Autoplay],
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    }
};

// GSAP ScrollTrigger Animations
function initScrollAnimations() {
    // Hero Section: Staggered fade-up for role badges
    const heroBadges = document.querySelectorAll('.hero-badge');
    if (heroBadges.length > 0) {
        gsap.from(heroBadges, {
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: 'power3.out',
            delay: 0.3
        });
    }
    
    // DISABLED: Skills Bento Grid animation causing visibility issues
    // const bentoItems = document.querySelectorAll('#skills .bento-item');
    // if (bentoItems.length > 0) {
    //     gsap.from(bentoItems, {
    //         scrollTrigger: {
    //             trigger: '#skills .bento-container',
    //             start: 'top 70%',
    //             toggleActions: 'play none none reverse'
    //         },
    //         scale: 0.9,
    //         opacity: 0,
    //         y: 40,
    //         duration: 0.7,
    //         stagger: 0.15,
    //         ease: 'back.out(1.4)'
    //     });
    // }
    
    // DISABLED: Project Cards animation causing visibility issues
    // const projectCards = document.querySelectorAll('#projects .bento-item');
    // if (projectCards.length > 0) {
    //     gsap.from(projectCards, {
    //         scrollTrigger: {
    //             trigger: '#projects',
    //             start: 'top 60%',
    //             toggleActions: 'play none none reverse'
    //         },
    //         y: 100,
    //         opacity: 0,
    //         duration: 0.9,
    //         stagger: {
    //             amount: 0.8,
    //             from: 'start'
    //         },
    //         ease: 'power2.out'
    //     });
    // }
    
    // Parallax Gradient Orbs
    const orbs = document.querySelectorAll('.gradient-orb');
    orbs.forEach((orb, index) => {
        gsap.to(orb, {
            scrollTrigger: {
                trigger: 'body',
                start: 'top top',
                end: 'bottom bottom',
                scrub: 1
            },
            y: -150 * (index + 1),
            ease: 'none'
        });
    });
    
    // Contact Section: Directional slide-in
    const contactCards = document.querySelectorAll('#contact .glass-card');
    contactCards.forEach((card, index) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: '#contact',
                start: 'top 70%',
                toggleActions: 'play none none reverse'
            },
            x: index === 0 ? -80 : 80,
            opacity: 0,
            duration: 1,
            ease: 'power2.out'
        });
    });
}

// Re-initialize on Livewire navigation (SPA-style)
document.addEventListener('livewire:navigated', () => {
    // Re-initialize typewriter if navigated back to homepage
    if (window.initTypewriter) {
        window.initTypewriter();
    }
});

// Listen for mode changes and update body class (keep existing functionality)
document.addEventListener('livewire:initialized', () => {
    Livewire.on('modeChanged', (event) => {
        const mode = event.mode;
        document.body.classList.remove('client-mode', 'dev-mode');
        document.body.classList.add(`${mode}-mode`);
        
        // Toggle wireframe overlays
        const elements = document.querySelectorAll('[data-component]');
        elements.forEach(el => {
            if (mode === 'dev') {
                el.classList.add('dev-wireframe');
            } else {
                el.classList.remove('dev-wireframe');
            }
        });
    });
});
