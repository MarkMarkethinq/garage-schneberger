// Mobile Menu - Liquid Glass Design
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    const backdrop = document.getElementById('mobile-menu-backdrop');
    const menuCard = document.getElementById('mobile-menu-card');
    const contactInfo = document.getElementById('mobile-menu-contact');
    let isMenuOpen = false;
    
    if (menuButton && mobileMenu) {
        // Toggle menu
        menuButton.addEventListener('click', function() {
            if (isMenuOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
        
        // Close menu when clicking on backdrop
        if (backdrop) {
            backdrop.addEventListener('click', closeMobileMenu);
        }
        
        // Close menu with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMobileMenu();
            }
        });
        
        // Close menu when clicking on a menu link (not submenu toggles)
        mobileMenu.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (link && !link.querySelector('.mobile-submenu-toggle')) {
                // Small delay to allow navigation
                setTimeout(closeMobileMenu, 100);
            }
        });
    }
    
    function openMobileMenu() {
        isMenuOpen = true;
        mobileMenu.classList.remove('hidden');
        menuButton.setAttribute('aria-expanded', 'true');
        
        // Lock scroll on body (works on iOS too)
        document.body.style.overflow = 'hidden';
        document.body.style.position = 'fixed';
        document.body.style.width = '100%';
        document.body.style.top = `-${window.scrollY}px`;
        document.documentElement.style.backgroundColor = 'rgba(28, 28, 30, 0.95)';
        document.body.style.backgroundColor = 'rgba(28, 28, 30, 0.95)';
        
        // Toggle icons and colors
        if (hamburgerIcon) hamburgerIcon.classList.add('hidden');
        if (closeIcon) closeIcon.classList.remove('hidden');
        if (menuButton) menuButton.classList.add('text-white', 'hover:bg-white/10');
        if (menuButton) menuButton.classList.remove('text-gray-700', 'hover:bg-gray-100');
        
        // Animate backdrop
        requestAnimationFrame(() => {
            if (backdrop) backdrop.classList.remove('opacity-0');
            if (backdrop) backdrop.classList.add('opacity-100');
            
            // Animate menu card
            setTimeout(() => {
                if (menuCard) {
                    menuCard.classList.remove('translate-y-8', 'opacity-0');
                    menuCard.classList.add('translate-y-0', 'opacity-100');
                }
            }, 100);
            
            // Animate contact info
            setTimeout(() => {
                if (contactInfo) {
                    contactInfo.classList.remove('translate-y-8', 'opacity-0');
                    contactInfo.classList.add('translate-y-0', 'opacity-100');
                }
            }, 200);
            
            // Stagger animate menu items (start after card animation)
            const menuItems = mobileMenu.querySelectorAll('.mobile-menu-item');
            menuItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateX(-1rem)';
                item.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                }, 400 + (index * 80));
            });
        });
    }
    
    function closeMobileMenu() {
        isMenuOpen = false;
        menuButton.setAttribute('aria-expanded', 'false');
        
        // Restore scroll position and background
        const scrollY = document.body.style.top;
        document.body.style.overflow = '';
        document.body.style.position = '';
        document.body.style.width = '';
        document.body.style.top = '';
        document.documentElement.style.backgroundColor = '';
        document.body.style.backgroundColor = '';
        window.scrollTo(0, parseInt(scrollY || '0') * -1);
        
        // Toggle icons and colors
        if (hamburgerIcon) hamburgerIcon.classList.remove('hidden');
        if (closeIcon) closeIcon.classList.add('hidden');
        if (menuButton) menuButton.classList.remove('text-white', 'hover:bg-white/10');
        if (menuButton) menuButton.classList.add('text-gray-700', 'hover:bg-gray-100');
        
        // Animate out
        if (backdrop) {
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
        }
        
        if (menuCard) {
            menuCard.classList.remove('translate-y-0', 'opacity-100');
            menuCard.classList.add('translate-y-8', 'opacity-0');
        }
        
        if (contactInfo) {
            contactInfo.classList.remove('translate-y-0', 'opacity-100');
            contactInfo.classList.add('translate-y-8', 'opacity-0');
        }
        
        // Hide menu after animation
        setTimeout(() => {
            if (!isMenuOpen) {
                mobileMenu.classList.add('hidden');
                
                // Reset submenu states
                const expandedSubmenus = mobileMenu.querySelectorAll('.mobile-submenu.expanded');
                expandedSubmenus.forEach(submenu => {
                    submenu.classList.remove('expanded');
                    submenu.style.maxHeight = '0';
                });
                
                const rotatedIcons = mobileMenu.querySelectorAll('.mobile-submenu-toggle.rotate-180');
                rotatedIcons.forEach(icon => icon.classList.remove('rotate-180'));
            }
        }, 300);
    }
    
    // Mobile submenu toggle
    setupMobileMenuSubmenus();
});

// Setup mobile submenu toggles
function setupMobileMenuSubmenus() {
    const submenuItems = document.querySelectorAll('.mobile-menu-item.has-submenu');
    
    submenuItems.forEach(item => {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.mobile-submenu');
        const icon = link.querySelector('.mobile-submenu-toggle');
        
        if (link && submenu) {
            // Hide submenu initially
            submenu.style.maxHeight = '0';
            submenu.style.overflow = 'hidden';
            submenu.style.transition = 'max-height 0.3s ease-in-out';
            
            link.addEventListener('click', function(e) {
                const isExpanded = submenu.classList.contains('expanded');
                
                if (!isExpanded) {
                    // First click: expand submenu, prevent navigation
                    e.preventDefault();
                    
                    // Close other submenus
                    const allSubmenus = document.querySelectorAll('.mobile-submenu.expanded');
                    allSubmenus.forEach(sub => {
                        if (sub !== submenu) {
                            sub.classList.remove('expanded');
                            sub.style.maxHeight = '0';
                            const parentIcon = sub.parentElement.querySelector('.mobile-submenu-toggle');
                            if (parentIcon) parentIcon.classList.remove('rotate-180');
                        }
                    });
                    
                    // Expand this submenu
                    submenu.classList.add('expanded');
                    submenu.style.maxHeight = submenu.scrollHeight + 'px';
                    if (icon) icon.classList.add('rotate-180');
                }
                // Second click: allow navigation
            });
        }
    });
}

// AOS (Animate On Scroll) initialisatie
function initializeAOS() {
    // Controleer of AOS beschikbaar is
    if (typeof AOS === 'undefined') {
        console.log('AOS is niet geladen, probeer opnieuw...');
        // Probeer opnieuw na een korte delay
        setTimeout(initializeAOS, 200);
        return;
    }
    
    // Controleer of AOS al geïnitialiseerd is
    if (AOS.refresh) {
        console.log('AOS al geïnitialiseerd, refresh...');
        AOS.refresh();
        return;
    }
    
    // Initialiseer AOS met standaard instellingen
    AOS.init({
        duration: 800, // Duur van de animatie in milliseconden
        easing: 'ease-in-out', // Easing functie
        once: true, // Animate slechts één keer
        offset: 100, // Offset vanaf de viewport in pixels
        delay: 0, // Delay in milliseconden
        anchorPlacement: 'top-bottom', // Wanneer de animatie moet starten
        disable: false, // Zorg dat AOS niet uitgeschakeld is
        startEvent: 'DOMContentLoaded', // Start event
        initClassName: 'aos-init', // Class toegevoegd na initialisatie
        animatedClassName: 'aos-animate', // Class toegevoegd tijdens animatie
        useClassNames: false, // Gebruik data-aos-* attributen
        disableMutationObserver: false, // Zet aan voor betere compatibiliteit
        debounceDelay: 50, // Debounce delay voor resize events
        throttleDelay: 99, // Throttle delay voor scroll events
    });
    
    console.log('AOS geïnitialiseerd');
}

// Initialiseer AOS wanneer de pagina geladen is
document.addEventListener('DOMContentLoaded', function() {
    // Wacht even om er zeker van te zijn dat alle scripts geladen zijn
    setTimeout(initializeAOS, 100);
});

// Initialiseer AOS ook na AJAX calls (voor ACF blocks)
document.addEventListener('acf/ready', function() {
    setTimeout(initializeAOS, 100);
});

// Fallback: probeer AOS te initialiseren na window load
window.addEventListener('load', function() {
    setTimeout(initializeAOS, 200);
});

// Fallback: probeer AOS te initialiseren na een korte delay
setTimeout(initializeAOS, 500);

// Counter Animatie
function initializeCounters() {
    const counters = document.querySelectorAll('.counter-number');
    
    if (counters.length === 0) return;
    
    const animateCounter = (counter) => {
        const target = parseFloat(counter.getAttribute('data-target'));
        const suffix = counter.getAttribute('data-suffix') || '';
        const duration = 2000; // 2 seconden
        const startTime = performance.now();
        
        // Bepaal of het een decimaal getal is
        const isDecimal = target % 1 !== 0;
        
        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing functie voor soepele animatie
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const current = target * easeOutQuart;
            
            // Format het getal
            if (isDecimal) {
                counter.textContent = current.toFixed(1);
            } else {
                counter.textContent = Math.floor(current);
            }
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                // Eindig met exacte waarde
                counter.textContent = isDecimal ? target.toFixed(1) : target;
            }
        };
        
        requestAnimationFrame(updateCounter);
    };
    
    // Intersection Observer voor animatie bij zichtbaarheid
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5,
        rootMargin: '0px'
    });
    
    counters.forEach(counter => {
        // Reset naar 0
        counter.textContent = '0';
        observer.observe(counter);
    });
}

// Initialiseer counters
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(initializeCounters, 100);
});

// Re-initialiseer na AJAX calls (voor ACF blocks)
document.addEventListener('acf/ready', function() {
    setTimeout(initializeCounters, 100);
});