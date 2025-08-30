# Sifatul Islam - Portfolio Website

A modern, responsive portfolio website showcasing software and web development projects with an integrated admin dashboard for content management.

## 🌟 Features

### Frontend Features
- **Responsive Design**: Mobile-first approach with smooth animations and modern UI
- **Interactive Welcome Screen**: Multi-language greeting animation on page load
- **Smooth Navigation**: Sticky navigation bar with smooth scrolling between sections
- **Dynamic Project Showcase**: Interactive project gallery with modal popups
- **Technology Stack Display**: Organized showcase of frontend, backend, and database technologies


### Backend Features
- **PHP Backend**: Server-side processing with PDO database connections
- **MySQL Database**: Relational database for storing projects and contact messages
- **Admin Dashboard**: Secure admin panel for content management
- **Project Management**: Add, edit, and delete projects through admin interface
- **Contact Message Management**: View and manage incoming contact messages
- **File Upload System**: Secure image upload for project thumbnails
- **Email Integration**: PHPMailer integration for contact form notifications
- **Session Management**: Secure login/logout system

### Admin Dashboard Features
- **Secure Authentication**: Login system with session management
- **Project CRUD Operations**:
  - Add new projects with images, descriptions, and links
  - Delete existing projects
  - View all projects in a manageable interface
- **Message Management**: View and delete contact form submissions
- **Responsive Admin UI**: Mobile-friendly admin interface
- **File Upload Validation**: Secure image upload with type validation

## 🛠️ Technology Stack

### Frontend
- **HTML5**: Semantic markup structure
- **CSS3**: Custom styling with animations and responsive design
- **JavaScript**: Interactive functionality and dynamic content
- **Font Awesome**: Icon library for UI elements
- **Google Fonts**: Raleway font family

### Backend
- **PHP**: Server-side scripting and logic
- **MySQL**: Relational database management
- **PDO**: Database abstraction layer
- **PHPMailer**: Email functionality
- **Session Management**: User authentication and security

### Development Tools
- **Git**: Version control
- **Apache**: Web server (with .htaccess configuration)

## 📁 Project Structure

```
portfolio/
├── index.php              # Main portfolio page
├── dashboard.php          # Admin dashboard
├── login.php             # Admin login
├── logout.php            # Admin logout
├── contact_form.php      # Contact form handler
├── db.php               # Database connection
├── config.php           # Configuration settings
├── .htaccess           # Apache configuration
├── css/
│   ├── index.css       # Main stylesheet
│   └── admin.css       # Admin dashboard styles
├── js/
│   ├── index.js        # Main JavaScript
│   └── admin.js        # Admin dashboard JavaScript
├── pages/
│   ├── add-project.php     # Add project functionality
│   ├── delete-project.php  # Delete project interface
│   ├── messages.php        # View contact messages
│   └── delete-message.php  # Delete message functionality
├── uploads/            # Project image uploads
├── image/              # Static images and logos
├── files/              # Static files (resume)
├── logo/               # Logo assets
└── PHPMailer/          # Email library
```

## 📧 Contact Form

The contact form includes:
- Name, email, and message fields
- Client-side and server-side validation
- Email notification to admin
- Database storage of messages
- Success/error feedback to users

## 👨‍💻 Admin Features

### Dashboard Sections
1. **Messages**: View and manage contact form submissions
2. **Add Project**: Upload new projects with images and details
3. **Delete Project**: Remove existing projects
4. **Logout**: Secure session termination

### Project Management
- Upload project images (JPG, JPEG, PNG, GIF, WEBP)
- Add project title, subtitle, and description
- Include technology tags
- Add GitHub and demo links
- Automatic timestamp creation

## 👤 Author

**Sifatul Islam**
- Email: sifatul.islam.onik@gmail.com
- GitHub: [sifatul-islam-onik](https://github.com/sifatul-islam-onik)
- LinkedIn: [sifatul-islam-onik](https://www.linkedin.com/in/sifatul-islam-onik/)
- Facebook: [sifatul.islam.onik](https://www.facebook.com/sifatul.islam.onik)
- Telegram: [sifatul_islam_onik](https://t.me/sifatul_islam_onik)

---

*This portfolio showcases modern web development practices with a focus on user experience, security, and maintainability.*