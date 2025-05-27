// CI4 Tailwind Template - JavaScript Entry Point
// Version 2.0 with Alpine.js components

// Import CSS
import '../css/app.css';

// Import Alpine.js
import Alpine from 'alpinejs';

// Initialize dark mode BEFORE Alpine starts
function initDarkMode() {
  const theme = localStorage.getItem('theme') || 'light';
  if (theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
}

// Call dark mode initialization immediately
initDarkMode();

// Store darkMode component function on window
window.darkMode = function() {
  return {
    isDark: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
    
    init() {
      console.log('🌙 Dark mode component initialized, isDark:', this.isDark);
      
      // Watch for changes
      this.$watch('isDark', value => {
        console.log('🌙 Dark mode changed to:', value);
        if (value) {
          document.documentElement.classList.add('dark');
          localStorage.setItem('theme', 'dark');
        } else {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('theme', 'light');
        }
      });
    },
    
    toggle() {
      console.log('🌙 Dark mode toggle called');
      this.isDark = !this.isDark;
    }
  };
};

// Store navbar component function on window
window.navbar = function() {
  return {
    isOpen: false,
    isScrolled: false,
    
    init() {
      console.log('🧭 Navbar component initialized');
      
      // Watch for scroll events
      window.addEventListener('scroll', () => {
        this.isScrolled = window.scrollY > 50;
      });
      
      // Close mobile menu when clicking outside
      document.addEventListener('click', (e) => {
        if (!this.$el.contains(e.target)) {
          this.isOpen = false;
        }
      });
      
      // Close mobile menu on escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
          this.isOpen = false;
        }
      });
    },
    
    toggle() {
      console.log('🧭 Navbar toggle called, isOpen will be:', !this.isOpen);
      this.isOpen = !this.isOpen;
    },
    
    close() {
      console.log('🧭 Navbar close called');
      this.isOpen = false;
    }
  };
};

// Debug: Check functions are defined
console.log('🔍 Before Alpine start - Functions defined:', {
  darkMode: typeof window.darkMode,
  navbar: typeof window.navbar
});

// Make Alpine available globally
window.Alpine = Alpine;

// Start Alpine.js
Alpine.start();

// App initialization
console.log('🚀 CI4 Tailwind Template v2.0 loaded!');
console.log('✅ Tailwind CSS active');
console.log('✅ Alpine.js initialized');
console.log('✅ Dark mode component ready');
console.log('✅ Navbar component ready');

// Final debug info
console.log('🔍 Final check - Components available:', {
  darkMode: typeof window.darkMode,
  navbar: typeof window.navbar,
  Alpine: typeof window.Alpine
});
