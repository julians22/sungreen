import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
import collapse from '@alpinejs/collapse'
import './splide.js';

Alpine.plugin(intersect)
Alpine.plugin(collapse)
window.Alpine = Alpine

Alpine.start()