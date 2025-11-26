// Menu toggle functionaliteit
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    
    if (menuButton && mobileMenu) {
        // Voeg click event toe
        menuButton.addEventListener('click', function() {
            const isMenuOpen = !mobileMenu.classList.contains('hidden');
            
            if (isMenuOpen) {
                // Menu is open, sluit het met animatie
                mobileMenu.classList.add('hidden');
                menuButton.setAttribute('aria-expanded', 'false');
                
                // Reset menu items voor volgende opening
                const menuItems = mobileMenu.querySelectorAll('ul li');
                menuItems.forEach(item => {
                    item.style.transform = 'translateX(1rem)';
                    item.style.opacity = '0';
                });
            } else {
                // Menu is dicht, open het met animatie
                mobileMenu.classList.remove('hidden');
                menuButton.setAttribute('aria-expanded', 'true');
                
                // Animeer menu items met staggered effect
                const menuItems = mobileMenu.querySelectorAll('ul li');
                menuItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.transform = 'translateX(0)';
                        item.style.opacity = '1';
                    }, index * 100);
                });
            }
        });
    }

    // Submenu functionaliteit voor mobiel
    setupMobileSubmenu();
});

// Functie voor submenu functionaliteit op mobiel
function setupMobileSubmenu() {
    // Voeg CSS toe voor mobiele submenu's
    addMobileSubmenuCSS();
    
    // Alleen uitvoeren in mobiele weergave
    function handleMobileSubmenu() {
        const isDesktop = window.innerWidth >= 1024; // lg breakpoint in Tailwind
        const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children');

        menuItemsWithChildren.forEach(menuItem => {
            const link = menuItem.querySelector('a');
            const submenu = menuItem.querySelector('.sub-menu');
            const icon = menuItem.querySelector('svg');
            
            // Verwijder hover effecten van het icon op mobiel
            if (icon && !isDesktop) {
                icon.classList.remove('transition-transform', 'duration-300', 'group-hover:rotate-180');
                icon.classList.add('transition-transform', 'duration-300');
            } else if (icon && isDesktop) {
                // Herstel hover effecten op desktop
                icon.classList.add('group-hover:rotate-180');
            }

            // Verwijder oude event listeners eerst (om dubbele events te voorkomen)
            if (link.mobileClickHandler) {
                link.removeEventListener('click', link.mobileClickHandler);
                link.mobileClickHandler = null;
            }

            if (!isDesktop) {
                // Op mobiel: eerste klik opent submenu, tweede klik navigeert naar de link
                link.mobileClickHandler = function(e) {
                    // Alleen als er een submenu is
                    if (submenu) {
                        const isExpanded = submenu.classList.contains('mobile-expanded');
                        
                        // Als het submenu al open is, laat de klik doorgaan naar de link
                        if (isExpanded) {
                            return true; // Sta de standaard actie toe (navigeren naar de link)
                        }
                        
                        // Anders voorkom de navigatie en open het submenu
                        e.preventDefault();
                        
                        // Sluit andere open submenu's
                        const allExpandedSubmenus = document.querySelectorAll('.sub-menu.mobile-expanded');
                        allExpandedSubmenus.forEach(menu => {
                            if (menu !== submenu) {
                                menu.classList.remove('mobile-expanded');
                                menu.style.maxHeight = '0px';
                                menu.style.visibility = 'hidden';
                                const parentIcon = menu.parentElement.querySelector('svg');
                                if (parentIcon) {
                                    parentIcon.classList.remove('rotate-180');
                                }
                            }
                        });
                        
                        // Submenu is dicht, open het
                        submenu.classList.add('mobile-expanded');
                        submenu.style.maxHeight = submenu.scrollHeight + 'px';
                        submenu.style.visibility = 'visible';
                        if (icon) {
                            icon.classList.add('rotate-180');
                        }
                        
                        // Log voor debugging
                        console.log('Submenu geopend:', submenu);
                    }
                };
                
                link.addEventListener('click', link.mobileClickHandler);
                
                // Standaard verborgen submenu op mobiel
                if (submenu) {
                    submenu.style.maxHeight = '0px';
                    submenu.style.overflow = 'hidden';
                    submenu.style.visibility = 'hidden';
                    submenu.style.transition = 'max-height 0.3s ease-in-out, visibility 0s';
                    
                    // Zorg dat submenu items zichtbaar zijn op mobiel
                    const submenuItems = submenu.querySelectorAll('li');
                    submenuItems.forEach(item => {
                        const subLink = item.querySelector('a');
                        if (subLink) {
                            subLink.classList.add('block', 'py-1', 'pl-3', 'pr-4', 'text-gray-700', 'hover:bg-gray-50', 'lg:hover:bg-transparent', 'lg:border-0', 'lg:hover:text-primary-700', 'lg:p-0');
                        }
                    });
                }
            } else {
                // Op desktop: reset de styling voor hover functionaliteit
                if (submenu) {
                    submenu.style.maxHeight = '';
                    submenu.style.overflow = '';
                    submenu.style.visibility = '';
                    submenu.classList.remove('mobile-expanded');
                }
            }
        });
    }

    // Initiële setup
    handleMobileSubmenu();

    // Update bij resize
    window.addEventListener('resize', handleMobileSubmenu);
}

// Functie om CSS toe te voegen voor mobiele submenu's
function addMobileSubmenuCSS() {
    // Controleer of de styling al bestaat
    if (document.getElementById('mobile-submenu-styles')) {
        return;
    }
    
    // Maak een style element
    const style = document.createElement('style');
    style.id = 'mobile-submenu-styles';
    style.textContent = `
        @media (max-width: 1023px) {
            /* Verwijder witruimte tussen menu items */
            #mobile-menu ul li {
                margin: 0;
                padding: 0;
            }
            
            #mobile-menu ul li a {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0.35rem 0.5rem;
            }
            
            /* Submenu styling */
            .sub-menu {
                display: block !important;
                position: static;
                box-shadow: none;
                padding-left: 0.75rem;
                border-left: 2px solid #e5e7eb;
                margin-top: 0;
                margin-bottom: 0;
            }
            
            .sub-menu:not(.mobile-expanded) {
                display: block !important;
                max-height: 0 !important;
                visibility: hidden !important;
                opacity: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                border-left: 0 !important;
            }
            
            .sub-menu.mobile-expanded {
                opacity: 1 !important;
                visibility: visible !important;
                padding-left: 0.75rem !important;
                border-left: 2px solid #e5e7eb !important;
            }
            
            /* Dichtere spacing voor submenu items */
            .sub-menu li {
                margin: 0 !important;
            }
            
            .sub-menu li a {
                padding-top: 0.25rem !important;
                padding-bottom: 0.25rem !important;
            }
            
            /* Animatie voor submenu toggle */
            .sub-menu {
                transition: max-height 0.3s ease-in-out, 
                            opacity 0.2s ease-in-out, 
                            visibility 0s linear 0.3s,
                            padding 0.3s ease-in-out,
                            border-left 0.3s ease-in-out,
                            margin 0.3s ease-in-out;
            }
            
            .sub-menu.mobile-expanded {
                transition: max-height 0.3s ease-in-out, 
                            opacity 0.2s ease-in-out, 
                            visibility 0s linear 0s,
                            padding 0.3s ease-in-out,
                            border-left 0.3s ease-in-out,
                            margin 0.3s ease-in-out;
            }
            
            /* Icon animatie alleen op klik, niet op hover */
            .menu-item-has-children a svg {
                transform: rotate(0deg) !important;
            }
            
            .menu-item-has-children a svg.rotate-180 {
                transform: rotate(180deg) !important;
            }
        }
    `;
    
    // Voeg aan document toe
    document.head.appendChild(style);
    
    console.log('Mobiele submenu styling toegevoegd');
}

// Swiper initialisatie voor reviews block
function initializeSwiper() {
    // Controleer of Swiper beschikbaar is
    if (typeof Swiper === 'undefined') {
        console.log('Swiper is niet geladen');
        return;
    }
    
    // Zoek alle Swiper containers
    const swiperContainers = document.querySelectorAll('.mySwiper');
    
    swiperContainers.forEach(container => {
        // Controleer of er al een Swiper instance bestaat
        if (container.swiper) {
            return;
        }
        
        // Initialiseer Swiper
        const swiper = new Swiper(container, {
            slidesPerView: 3,
            spaceBetween: 28,
            centeredSlides: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    centeredSlides: false,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 28,
                    centeredSlides: true,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 32,
                },
            },
        });
        
        console.log('Swiper geïnitialiseerd voor reviews block');
    });
}

// Initialiseer Swiper wanneer de pagina geladen is
document.addEventListener('DOMContentLoaded', function() {
    // Wacht even om er zeker van te zijn dat alle scripts geladen zijn
    setTimeout(initializeSwiper, 100);
});

// Initialiseer Swiper ook na AJAX calls (voor ACF blocks)
document.addEventListener('acf/ready', function() {
    setTimeout(initializeSwiper, 100);
});

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

// PageDone Dropdown Menu Functionaliteit
document.addEventListener('DOMContentLoaded', function() {
    // Selecteer alle dropdown toggle buttons
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Haal het target menu ID op
            const targetId = this.getAttribute('data-target');
            
            if (!targetId) return;
            
            // Zoek het dropdown menu met dit ID
            const dropdownMenu = document.getElementById(targetId);
            
            if (!dropdownMenu) return;
            
            // Check of dit menu al open is
            const isOpen = !dropdownMenu.classList.contains('hidden');
            
            // Sluit alle andere dropdown menus
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdownMenu) {
                    menu.classList.add('hidden');
                }
            });
            
            // Toggle het huidige menu
            if (isOpen) {
                dropdownMenu.classList.add('hidden');
            } else {
                dropdownMenu.classList.remove('hidden');
            }
        });
    });
    
    // Sluit dropdown bij klikken buiten het menu
    document.addEventListener('click', function(e) {
        // Check of de klik buiten een dropdown is
        const isDropdownClick = e.target.closest('.dropdown-toggle') || e.target.closest('.dropdown-menu');
        
        if (!isDropdownClick) {
            // Sluit alle dropdown menus
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
    
    // Sluit dropdown bij ESC toets
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
});