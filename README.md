# Developing Theme - WordPress

Een modern WordPress thema gebouwd met Tailwind CSS en Advanced Custom Fields (ACF) Blocks. Dit thema biedt een flexibele basis voor het bouwen van websites met een componentgebaseerde aanpak.

## 🛠 Tech Stack

- PHP 8.2+
- WordPress 6.0+
- Composer voor PHP dependencies
- Node.js & NPM voor frontend tooling
- Tailwind CSS voor styling
- ACF Pro voor aangepaste blocks
- Swiper.js voor carousels
- Slick Carousel voor sliders
- Feedback.js voor gebruikersinteractie

## 🚀 Quick Start

```bash
# Clone repository
git clone [repository-url]

# Installeer PHP dependencies
composer install

# Installeer Node modules
npm install

# Start development (Tailwind watch)
npm run watch
```

## 📁 Project Structuur

```
developing-theme/
├── assets/                 # Frontend assets
│   ├── css/               # Tailwind & custom CSS
│   │   ├── app.css        # Custom CSS
│   │   ├── tailwind.css   # Tailwind input
│   │   └── tailwind-output.css # Tailwind output
│   └── js/                # JavaScript modules
│       └── app.js         # Main JavaScript file
├── includes/              # PHP classes & functions
│   ├── theme-setup.php    # Theme registratie en setup
│   ├── enqueue-scripts.php # Scripts en styles
│   ├── class-custom-walker.php # Aangepaste menu walker
│   ├── acf-blocks-loader.php # ACF blocks loader
│   ├── popup-scripts.php  # Scripts voor popups
│   ├── theme-customizer.php # Theme customizer instellingen
│   ├── editor-styles.php  # Editor styling
│   ├── acf-block-examples.php # Voorbeelden van ACF blocks
│   └── images/            # Theme afbeeldingen
│       ├── Favicon.png
│       ├── person-placeholder.jpg
│       └── Watermerk.png
├── resources/             # Theme resources
│   └── blocks/            # ACF blocks
│       ├── contact-map/   # Contact met kaart
│       ├── contact-us/    # Contact formulier
│       ├── content-block/ # Content sectie
│       ├── content-foto/  # Content met foto
│       ├── cta/           # Call-to-action
│       ├── features/      # Features sectie
│       ├── features-met-foto/ # Features met foto
│       ├── hero-home/     # Homepage hero
│       ├── hero-los/      # Losse hero sectie
│       ├── reviews/       # Reviews/testimonials
│       └── usps/          # Unique selling points
├── acf_blocks.php         # ACF blocks registratie
├── functions.php          # Hoofdfuncties bestand
├── header.php             # Header template
├── footer.php             # Footer template
├── index.php              # Index template
├── page.php               # Page template
├── single.php             # Single post template
├── style.css              # Theme stylesheet
├── tailwind.config.js     # Tailwind configuratie
├── package.json           # NPM dependencies
├── composer.json          # Composer dependencies
└── README.md              # Dit bestand
```

## 🧩 ACF Blocks

Het thema bevat de volgende ACF blocks:

### Content Blocks
- **Content Block** - Basis content sectie
- **Content Foto** - Content sectie met afbeelding
- **Hero Home** - Homepage hero sectie
- **Hero Los** - Losse hero sectie

### Feature Blocks
- **Features** - Features sectie
- **Features Met Foto** - Features met afbeeldingen
- **USPs** - Unique selling points

### Contact Blocks
- **Contact Us** - Contact formulier
- **Contact Map** - Contact met kaart

### Call-to-Action
- **CTA** - Call-to-action sectie

### Reviews
- **Reviews** - Testimonials en reviews sectie

## 🎨 Frontend Development

### Tailwind CSS

```bash
# Watch mode
npm run watch
```

Custom Tailwind configuratie in `tailwind.config.js`:
```javascript
module.exports = {
  darkMode: 'false',
  content: [
    "./*.php",
    "./templates/**/*.php",
    "./template-parts/**/*.php",
    "./assets/js/**/*.js",
    "./includes/popups/**/*.php",
    "./includes/acf-fields/**/*.php",
    "./resources/blocks/*.php",
    "./resources/blocks/**/*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter','Segoe UI','sans-serif !important']
      },
      colors: {
        primary: {"50":"#F0F9F2","100":"#E1F3E5","200":"#C3E7CB","300":"#A5DBB1","400":"#87CF97","500":"#69C37D","600":"#4BB763","700":"#4DAA57","800":"#3E8846","900":"#2F6635","950":"#204424"},
        secondary: {"50":"#F0F4F8","100":"#E1EAF1","200":"#C3D5E3","300":"#A5C0D5","400":"#87ABC7","500":"#6996B9","600":"#4B81AB","700":"#1E3A5F","800":"#182E4B","900":"#122237","950":"#0C1623"},
        background: "#F2F9FF"
      }
    }
  },
  plugins: []
};
```

## 📦 Dependencies

### PHP Packages
- ACF Pro (niet in composer, moet apart geïnstalleerd worden)

### NPM Packages
- `tailwindcss`: ^3.4.17
- `@tailwindcss/typography`: ^0.5.15
- `slick-carousel`: ^1.8.1
- `swiper`: ^12.0.2
- `@betahuhn/feedback-js`: ^2.1.25
- `autoprefixer`: ^10.4.20
- `postcss`: ^8.4.49
- `postcss-cli`: ^11.0.0

## 🔍 Gebruik van het thema

1. Installeer WordPress en activeer het thema
2. Zorg dat ACF Pro geïnstalleerd en geactiveerd is
3. Gebruik de Gutenberg editor om pagina's te bouwen met de beschikbare ACF blocks
4. Pas de thema-instellingen aan via de WordPress Customizer

## 🏗️ Thema Architectuur

### Functions.php
Het hoofdbestand laadt alle benodigde includes en de ACF blocks registratie. De code is modulair opgezet voor betere onderhoudbaarheid.

### ACF Blocks Systeem
- **Automatische Loading**: Alle blocks worden automatisch geladen via `includes/acf-blocks-loader.php`
- **Modulaire Structuur**: Elke block heeft zijn eigen map met `acf-block.php` en template bestand
- **Custom Categorie**: Blocks worden gegroepeerd onder "Custom Blocks" categorie

### Styling Systeem
- **Tailwind CSS**: Voor utility-first styling
- **Custom Kleuren**: Primary (groen), Secondary (blauw) en Background kleuren gedefinieerd
- **Responsive Design**: Mobile-first aanpak met Tailwind breakpoints

### JavaScript Integratie
- **Swiper.js**: Voor moderne carousels en sliders
- **Slick Carousel**: Voor compatibiliteit met bestaande sliders
- **Feedback.js**: Voor gebruikersinteractie en feedback

## 🧩 Blocks toevoegen

Om een nieuwe ACF block toe te voegen:

1. Maak een nieuwe map in `resources/blocks/[block-naam]/`
2. Voeg een `acf-block.php` bestand toe voor de ACF configuratie
3. Voeg een template bestand toe (bijv. `[block-naam].php`)
4. De block wordt automatisch geladen door het ACF blocks loader systeem
5. Voeg de ACF velden toe via de ACF interface

## 📝 License

Proprietary - © ReDecem
