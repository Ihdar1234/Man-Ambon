import '../css/app.css'; // Tailwind CSS
import AOS from 'aos';
import 'aos/dist/aos.css'; // AOS CSS via npm

import Alpine from 'alpinejs';
import 'lucide';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
});

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({ duration: 800 });
});