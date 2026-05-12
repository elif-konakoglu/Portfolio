# Product Requirements Document: Full-Stack Professional Portfolio

## 1. Project Vision
A modern, high-performance, and responsive personal portfolio website designed to showcase professional skills, projects, and industrial expertise. The site serves as both a public-facing resume and a private administrative platform to manage content.

## 2. Technical Stack
- **Frontend:** HTML5 (Semantic), CSS3 (Modern features, Grid, Flexbox), JavaScript (ES6+).
- **Backend:** PHP 8.x.
- **Database:** MySQL.
- **Interactivity:** Fetch API (AJAX) for dynamic content loading.
- **State Management:** PHP Sessions & Cookies for Admin Authentication.
- **Data Source:** `CV.pdf` for professional profile data.

## 3. Core Features & Requirements

### 3.1 Public Interface
- **Home/Hero Section:** High-impact introduction with a modern UI.
- **About Me & Skills:** Bio and skill set must be parsed and synchronized from the provided `CV.pdf` to ensure professional accuracy.
- **Experience Section:** Professional history should be extracted from `CV.pdf`.
- **Dynamic Projects Gallery:**
    - Data must be fetched from MySQL via PHP using AJAX.
    - Features project title, description, and tags.
- **Contact Section:**
    - HTML5 Form with JavaScript validation (email format, empty fields).
    - Submissions must be saved to a `messages` table in MySQL.
- **Interactive Elements:**
    - Dark/Light mode toggle.
    - Smooth scrolling and sticky navigation.
    - Resume Feature: A "Download Resume" button must be implemented, linking directly to the `CV.pdf` file.

### 3.2 Administrative Dashboard (Secure)
- **Login System:** Secure PHP session-based login.
- **Project Management:** Create, Read, Update, and Delete (CRUD) functionality for project items.
- **Security:** Basic password hashing and session validation on all admin routes.

### 3.3 UI/UX Design Goals
- **Modern Aesthetic:** Clean typography, ample whitespace, subtle transitions.
- **Responsive:** Fully functional on mobile, tablet, and desktop using a Mobile-First approach.

## 4. Database Schema (MySQL)
- `projects`: `id`, `title`, `description`, `image_url`, `link`, `created_at`.
- `messages`: `id`, `name`, `email`, `subject`, `message`, `submitted_at`.
- `admin`: `id`, `username`, `password_hash`.

## 5. Development Workflow
- Step-by-step implementation following the provided AI Agent Prompt.
- Manual verification of each UI/Logic change before Git commitment.
