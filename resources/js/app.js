import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

import leadForm from './alpine/lead-form';
import faq from './alpine/faq';
import stickyCta from './alpine/sticky-cta';
import simulator from './alpine/simulator';
import cookieConsent from './alpine/cookie-consent';
import { initTracking } from './alpine/tracking';

Alpine.plugin(collapse);

Alpine.data('leadForm', leadForm);
Alpine.data('faq', faq);
Alpine.data('stickyCta', stickyCta);
Alpine.data('simulator', simulator);
Alpine.data('cookieConsent', cookieConsent);

Alpine.start();

// Tracking GTM
document.addEventListener('DOMContentLoaded', initTracking);
