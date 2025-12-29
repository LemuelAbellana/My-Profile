import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Listen for mode changes and update body class
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

// Initialize body class based on current mode
document.addEventListener('DOMContentLoaded', () => {
    const savedMode = sessionStorage.getItem('preferred_mode') || 'client';
    document.body.classList.add(`${savedMode}-mode`);
});

// Matrix Rain Effect for Dev Mode
function createMatrixRain() {
    const canvas = document.getElementById('matrix-canvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()'.split('');
    const fontSize = 14;
    const columns = canvas.width / fontSize;
    const drops = Array(Math.floor(columns)).fill(1);
    
    function draw() {
        ctx.fillStyle = 'rgba(10, 10, 10, 0.05)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        ctx.fillStyle = '#16a34a';
        ctx.font = fontSize + 'px monospace';
        
        for (let i = 0; i < drops.length; i++) {
            const text = chars[Math.floor(Math.random() * chars.length)];
            ctx.fillText(text, i * fontSize, drops[i] * fontSize);
            
            if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                drops[i] = 0;
            }
            drops[i]++;
        }
    }
    
    setInterval(draw, 33);
}

// Initialize matrix rain if in dev mode
if (document.body.classList.contains('dev-mode')) {
    createMatrixRain();
}
