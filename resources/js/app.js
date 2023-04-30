import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import './bootstrap';
import '../css/app.css'; 
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
