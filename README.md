# Animated Portfolio Website

A modern, responsive portfolio website with stunning animations and interactive elements built with HTML5, CSS3, JavaScript, and PHP.

## Features

### 🎨 Design & Animations
- **Loading Screen**: Elegant loading animation with spinner
- **Smooth Scrolling**: Seamless navigation between sections
- **Parallax Effects**: Dynamic floating shapes and background elements
- **Hover Animations**: Interactive project cards and buttons
- **Fade-in Animations**: Progressive content reveal on scroll
- **Typing Effects**: Dynamic text animations
- **Particle System**: Floating particles in hero section

### 📱 Responsive Design
- Mobile-first approach
- Hamburger menu for mobile devices
- Flexible grid layouts
- Optimized for all screen sizes

### 🚀 Interactive Elements
- **Animated Counters**: Statistics that count up when visible
- **Dynamic Navigation**: Active link highlighting
- **Project Showcases**: Hover effects with overlay links
- **Contact Form**: PHP-powered with validation
- **Scroll-to-Top**: Smooth return to top functionality

### 💼 Sections
1. **Hero Section**: Eye-catching introduction with animated elements
2. **About**: Personal information with animated statistics
3. **Skills**: Technology showcase with icons and animations
4. **Projects**: Portfolio gallery with hover effects
5. **Contact**: Working contact form with PHP backend

## Technologies Used

- **HTML5**: Semantic markup and structure
- **CSS3**: Advanced animations, gradients, and responsive design
- **JavaScript**: Interactive functionality and animations
- **PHP**: Contact form processing and email handling
- **Font Awesome**: Professional icons
- **Google Fonts**: Poppins font family

## Setup Instructions

### 1. Basic Setup
```bash
# Clone or download the project files
# Ensure you have a web server with PHP support (XAMPP, WAMP, or live server)
```

### 2. Configure Contact Form
Edit `contact.php` and update:
```php
$to_email = "your-email@example.com"; // Change to your email address
```

### 3. Customize Content
- Update personal information in `index.html`
- Replace placeholder project images and links
- Modify color scheme in `css/style.css`
- Add your own profile image

### 4. Deploy
- Upload files to your web server
- Ensure PHP mail function is configured
- Test contact form functionality

## File Structure
```
portfolio/
├── index.html          # Main HTML file
├── css/
│   └── style.css      # All styles and animations
├── js/
│   └── script.js      # JavaScript functionality
├── contact.php        # PHP contact form handler
└── README.md         # This file
```

## Customization

### Colors
The website uses a gradient color scheme. Main colors can be changed in CSS:
```css
/* Primary gradient */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Accent gradient */
background: linear-gradient(45deg, #ff6b6b, #feca57);
```

### Animations
All animations are CSS-based with JavaScript triggers:
- Modify timing in CSS `transition` and `animation` properties
- Adjust scroll trigger points in JavaScript `IntersectionObserver`

### Content
- Update text content directly in `index.html`
- Replace project information and links
- Modify social media links in the contact section

## Browser Support
- Chrome (recommended)
- Firefox
- Safari
- Edge
- Mobile browsers

## Performance Features
- Optimized animations using CSS transforms
- Lazy loading for scroll-triggered animations
- Efficient JavaScript event handling
- Minimal external dependencies

## Contact Form Features
- Input validation (client and server-side)
- Spam protection
- Email notifications
- Success/error feedback
- Optional database storage (commented code included)
- Auto-reply functionality (commented code included)

## License
This project is open source and available under the MIT License.

## Credits
- Icons: Font Awesome
- Fonts: Google Fonts (Poppins)
- Animations: Custom CSS3 animations
- Contact Form: Custom PHP implementation

---

**Note**: Remember to update the email address in `contact.php` and customize the content to match your personal information and projects.