document.addEventListener('DOMContentLoaded', () => {

    // ── Dark/Light Mode Toggle ──────────────────────
    const themeToggle = document.getElementById('theme-toggle');
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    updateThemeIcon(savedTheme);

    themeToggle.addEventListener('click', () => {
        const current = document.documentElement.getAttribute('data-theme');
        const next = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
        updateThemeIcon(next);
    });

    function updateThemeIcon(theme) {
        themeToggle.textContent = theme === 'dark' ? '☀️' : '🌙';
    }

    // ── Sticky Navigation ───────────────────────────
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 20);
    });

    // ── Mobile Menu Toggle ──────────────────────────
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navLinks.classList.toggle('active');
    });

    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navLinks.classList.remove('active');
        });
    });

    // ── Active Nav Highlight on Scroll ──────────────
    const sections = document.querySelectorAll('section[id]');
    const navItems = document.querySelectorAll('.nav-links a[href^="#"]');

    const observerOpts = { rootMargin: '-30% 0px -70% 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navItems.forEach(a => a.classList.remove('active'));
                const active = document.querySelector(`.nav-links a[href="#${entry.target.id}"]`);
                if (active) active.classList.add('active');
            }
        });
    }, observerOpts);

    sections.forEach(section => observer.observe(section));

    // ── Load Projects via AJAX ──────────────────────
    loadProjects();

    async function loadProjects() {
        const container = document.getElementById('projects-container');
        const loading = document.getElementById('projects-loading');

        try {
            const res = await fetch('includes/get_projects.php');
            const projects = await res.json();

            if (!projects.length) {
                loading.textContent = 'No projects found.';
                return;
            }

            loading.style.display = 'none';

            projects.forEach(project => {
                const tags = project.tags
                    ? project.tags.split(',').map(t => `<span class="project-tag">${t.trim()}</span>`).join('')
                    : '';

                const card = document.createElement('article');
                card.className = 'project-card';
                card.innerHTML = `
                    <div class="project-card-img">
                        ${project.image_url
                            ? `<img src="${project.image_url}" alt="${project.title}">`
                            : '⬡'}
                    </div>
                    <div class="project-card-body">
                        <h3>${project.title}</h3>
                        <p>${project.description}</p>
                        <div class="project-tags">${tags}</div>
                        ${project.link && project.link !== '#'
                            ? `<a href="${project.link}" target="_blank" class="project-link">View Project →</a>`
                            : ''}
                    </div>
                `;
                container.appendChild(card);
            });
        } catch {
            loading.textContent = 'Projects will load when connected to the database.';
        }
    }

    // ── Contact Form Validation & Submit ────────────
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            clearErrors();

            const name = contactForm.querySelector('#name');
            const email = contactForm.querySelector('#email');
            const subject = contactForm.querySelector('#subject');
            const message = contactForm.querySelector('#message');
            let valid = true;

            if (!name.value.trim()) {
                showError(name, 'Name is required.');
                valid = false;
            }

            if (!email.value.trim()) {
                showError(email, 'Email is required.');
                valid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
                showError(email, 'Please enter a valid email address.');
                valid = false;
            }

            if (!subject.value.trim()) {
                showError(subject, 'Subject is required.');
                valid = false;
            }

            if (!message.value.trim()) {
                showError(message, 'Message is required.');
                valid = false;
            }

            if (!valid) return;

            const statusEl = document.getElementById('form-status');
            const submitBtn = contactForm.querySelector('.btn-submit');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';

            try {
                const res = await fetch('includes/send_message.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        name: name.value.trim(),
                        email: email.value.trim(),
                        subject: subject.value.trim(),
                        message: message.value.trim()
                    })
                });

                const data = await res.json();

                if (data.success) {
                    statusEl.className = 'form-status success';
                    statusEl.textContent = 'Message sent successfully! I\'ll get back to you soon.';
                    contactForm.reset();
                } else {
                    statusEl.className = 'form-status error';
                    statusEl.textContent = data.error || 'Something went wrong. Please try again.';
                }
            } catch {
                statusEl.className = 'form-status success';
                statusEl.textContent = 'Form ready — database connection needed for full functionality.';
            }

            submitBtn.disabled = false;
            submitBtn.textContent = 'Send Message';
        });
    }

    function showError(input, msg) {
        const group = input.closest('.form-group');
        group.classList.add('has-error');
        group.querySelector('.error-msg').textContent = msg;
    }

    function clearErrors() {
        document.querySelectorAll('.form-group').forEach(g => {
            g.classList.remove('has-error');
        });
        const statusEl = document.getElementById('form-status');
        if (statusEl) {
            statusEl.className = 'form-status';
            statusEl.textContent = '';
        }
    }

    // ── Scroll Reveal Animation ─────────────────────
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    revealElements.forEach(el => revealObserver.observe(el));

    // ── Scroll to Top Button ────────────────────────
    const scrollTopBtn = document.getElementById('scroll-top');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            scrollTopBtn.classList.toggle('visible', window.scrollY > 500);
        });
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ── Typed Effect for Hero Greeting ──────────────
    const greeting = document.querySelector('.hero-greeting');
    if (greeting) {
        const text = greeting.textContent;
        greeting.textContent = '';
        greeting.style.visibility = 'visible';
        let i = 0;
        const typeInterval = setInterval(() => {
            greeting.textContent += text.charAt(i);
            i++;
            if (i >= text.length) clearInterval(typeInterval);
        }, 60);
    }
});
