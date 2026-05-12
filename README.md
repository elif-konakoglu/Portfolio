# Portfolio — Elif Semiha Konakoğlu

A modern, responsive, full-stack portfolio website built with HTML5, CSS3, JavaScript, PHP, and MySQL. Features a public-facing portfolio showcasing professional experience, skills, and projects, along with a secure admin dashboard for content management.

## Live Features

### Public Site
- **Hero Section** — Animated introduction with profile photo, typed greeting effect, and CV download
- **About Me** — Professional bio with education and background details
- **Skills** — Categorized technical skills (Programming, Deep Learning, ML & Data, Dev Tools, Coursework)
- **Experience** — Interactive timeline of professional and extracurricular history
- **Projects** — Dynamically loaded from MySQL via Fetch API (AJAX)
- **Contact** — Form with client-side validation; submissions saved to the database
- **Dark/Light Mode** — Theme toggle with localStorage persistence
- **Scroll Animations** — Fade-in reveal effects using IntersectionObserver
- **Responsive Design** — Mobile-first layout with hamburger navigation

### Admin Dashboard (`/admin`)
- **Secure Login** — PHP session-based authentication with bcrypt password hashing
- **Project CRUD** — Create, read, update, and delete portfolio projects
- **Messages** — View and manage contact form submissions
- **Dashboard** — Overview with project/message counts and quick actions

## Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3 (Grid, Flexbox, Variables), JavaScript (ES6+) |
| Backend | PHP 8.x |
| Database | MySQL with PDO (prepared statements) |
| Fonts | Inter, JetBrains Mono (Google Fonts) |
| Interactivity | Fetch API for AJAX requests |
| Auth | PHP Sessions, bcrypt hashing |

## Project Structure

```
portfolio/
├── admin/                  # Admin dashboard
│   ├── index.php           # Dashboard overview
│   ├── login.php           # Authentication page
│   ├── logout.php          # Session termination
│   ├── projects.php        # Project list & delete
│   ├── project_form.php    # Create/Edit project form
│   └── messages.php        # Contact message viewer
├── assets/                 # Static assets (images)
├── css/
│   ├── style.css           # Public site styles
│   └── admin.css           # Admin dashboard styles
├── includes/
│   ├── db.php              # PDO database connection
│   ├── auth.php            # Session management helpers
│   ├── get_projects.php    # API: GET projects (JSON)
│   └── send_message.php    # API: POST contact message
├── js/
│   └── main.js             # Frontend interactivity
├── cv.pdf                  # Downloadable resume
├── db_export.sql           # Database schema & seed data
├── index.php               # Main portfolio page
└── .gitignore
```

## Setup

### Prerequisites
- PHP 8.x
- MySQL 5.7+
- A local server environment (XAMPP, WAMP, Laragon, etc.)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/elif-konakoglu/portfolio.git
   ```

2. **Import the database**
   - Open phpMyAdmin or a MySQL client
   - Run `db_export.sql` to create the database, tables, and seed data

3. **Configure the database connection**
   - Open `includes/db.php`
   - Update `$host`, `$dbname`, `$username`, and `$password` if needed

4. **Start the server**
   - Place the project in your server's document root (e.g., `htdocs/`)
   - Navigate to `http://localhost/portfolio`

5. **Admin access**
   - Go to `http://localhost/portfolio/admin/login.php`
   - Default credentials: `admin` / `admin123`
   - **Change the password immediately in production**

## Security

- All database queries use **PDO prepared statements** (SQL injection protection)
- All output uses **`htmlspecialchars()`** (XSS protection)
- Admin passwords stored as **bcrypt hashes**
- Session validation on every admin route
- Input validation on both client and server side

## License

This project is for personal/educational use.
