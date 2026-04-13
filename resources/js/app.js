import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

// Composants existants
import leadForm from './alpine/lead-form';
import faq from './alpine/faq';
import stickyCta from './alpine/sticky-cta';
import simulator from './alpine/simulator';
import cookieConsent from './alpine/cookie-consent';

// Composants partagés LP

// Composants LP1
import lp1Quiz from './alpine/lp1/quiz';
import lp1Calculator from './alpine/lp1/loss-calculator';
import lp1Chatbot from './alpine/lp1/chatbot';
import lp1BookingModal from './alpine/lp1/booking-modal';

// Composants LP2
import lp2Calculator from './alpine/lp2/time-calculator';
import lp2Chatbot from './alpine/lp2/chatbot';

// Tracking
import { initTracking } from './alpine/tracking';

// Init Alpine
Alpine.plugin(collapse);

// Existants
Alpine.data('leadForm', leadForm);
Alpine.data('faq', faq);
Alpine.data('stickyCta', stickyCta);
Alpine.data('simulator', simulator);
Alpine.data('cookieConsent', cookieConsent);

// Partagés LP

// LP1
Alpine.data('lp1Quiz', lp1Quiz);
Alpine.data('lp1Calculator', lp1Calculator);
Alpine.data('lp1Chatbot', lp1Chatbot);
Alpine.data('lp1BookingModal', lp1BookingModal);

// LP2
Alpine.data('lp2Calculator', lp2Calculator);
Alpine.data('lp2Chatbot', lp2Chatbot);

Alpine.start();

// Post-init
import { initCounters } from './alpine/shared/counters';
import { initScrollAnimations } from './alpine/shared/scroll-anim';

document.addEventListener('DOMContentLoaded', () => {
    initTracking();
    initCounters();
    initScrollAnimations();
});
