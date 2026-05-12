<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elif Semiha Konakoglu — Software Engineer specializing in AI, Machine Learning, and Full-Stack Development.">
    <title>Elif Semiha Konakoğlu | Software Engineer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- ═══ Navigation ═══ -->
    <nav class="navbar">
        <div class="container">
            <a href="#hero" class="nav-logo">elif<span>.</span>dev</a>
            <div class="nav-links">
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#experience">Experience</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <button class="theme-toggle" id="theme-toggle" aria-label="Toggle dark mode">🌙</button>
                <button class="hamburger" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- ═══ Hero Section ═══ -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content">
                <span class="hero-greeting">Hello, I'm</span>
                <h1>Elif Semiha<br>Konakoğlu</h1>
                <p class="hero-description">
                    Software Engineering graduate passionate about Artificial Intelligence, 
                    Machine Learning, and building intelligent systems that solve real-world problems.
                </p>
                <div class="hero-cta">
                    <a href="#projects" class="btn btn-primary">View My Work</a>
                    <a href="cv.pdf" download class="btn btn-outline">Download CV ↓</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-graphic">
                    <span class="hero-initials">EK</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ About Section ═══ -->
    <section id="about">
        <div class="container">
            <div class="section-title">
                <h2>About Me</h2>
                <p>A blend of engineering discipline and creative problem-solving.</p>
            </div>
            <div class="about-grid">
                <div class="about-text">
                    <p>
                        I'm a Software Engineering graduate from Haliç University (2022–2026) with a deep focus on 
                        Artificial Intelligence and Machine Learning. My academic journey has been complemented by 
                        hands-on experience in enterprise software development and AI research.
                    </p>
                    <p>
                        My graduation project — an AI-powered E-commerce Product Intelligence Platform — combines 
                        automated visual tagging with similarity search, reflecting my passion for building systems 
                        that bridge computer vision and practical business applications.
                    </p>
                    <p>
                        Beyond technical skills, I'm a scholar of the Google AI &amp; Technology Academy (selected 
                        among 31,700 applicants) and a participant in the Aspire Leaders Program, a global initiative 
                        by a Harvard University spin-off.
                    </p>
                </div>
                <div>
                    <div class="about-info">
                        <div class="about-info-item">
                            <div class="label">Location</div>
                            <div class="value">Istanbul, Turkey</div>
                        </div>
                        <div class="about-info-item">
                            <div class="label">University</div>
                            <div class="value">Haliç University</div>
                        </div>
                        <div class="about-info-item">
                            <div class="label">Degree</div>
                            <div class="value">B.Sc. Software Engineering</div>
                        </div>
                        <div class="about-info-item">
                            <div class="label">Email</div>
                            <div class="value">elifkonakoglu@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ Skills Section ═══ -->
    <section id="skills" class="section-alt">
        <div class="container">
            <div class="section-title">
                <h2>Technical Skills</h2>
                <p>Technologies and tools I work with on a daily basis.</p>
            </div>
            <div class="skills-grid">
                <div class="skill-category">
                    <div class="skill-category-icon">💻</div>
                    <h3>Programming Languages</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">Python</span>
                        <span class="skill-tag">Java</span>
                        <span class="skill-tag">C#</span>
                        <span class="skill-tag">ABAP</span>
                        <span class="skill-tag">SQL</span>
                    </div>
                </div>
                <div class="skill-category">
                    <div class="skill-category-icon">🧠</div>
                    <h3>Deep Learning Frameworks</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">TensorFlow</span>
                        <span class="skill-tag">PyTorch</span>
                    </div>
                </div>
                <div class="skill-category">
                    <div class="skill-category-icon">📊</div>
                    <h3>ML &amp; Data Science</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">NumPy</span>
                        <span class="skill-tag">Pandas</span>
                        <span class="skill-tag">Scikit-learn</span>
                        <span class="skill-tag">OpenCV</span>
                    </div>
                </div>
                <div class="skill-category">
                    <div class="skill-category-icon">🛠️</div>
                    <h3>Dev Tools</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">Git / GitHub</span>
                        <span class="skill-tag">Docker</span>
                    </div>
                </div>
                <div class="skill-category">
                    <div class="skill-category-icon">📚</div>
                    <h3>Core Coursework</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">Data Structures & Algorithms</span>
                        <span class="skill-tag">AI</span>
                        <span class="skill-tag">Machine Learning</span>
                        <span class="skill-tag">OOP</span>
                        <span class="skill-tag">Software Architecture</span>
                        <span class="skill-tag">Software Testing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ Experience Section ═══ -->
    <section id="experience">
        <div class="container">
            <div class="section-title">
                <h2>Experience</h2>
                <p>Professional and extracurricular highlights from my journey.</p>
            </div>
            <div class="timeline">

                <div class="timeline-item">
                    <div class="timeline-header">
                        <h3>Intern SAP ABAP Developer</h3>
                        <span class="timeline-date">Jun 2025 – Jul 2025</span>
                    </div>
                    <div class="timeline-company">FOMS Global · Istanbul, Turkey</div>
                    <ul>
                        <li>Collaborated with senior developers to debug and refine custom ABAP programs and data structures to meet specific client requirements.</li>
                        <li>Designed and implemented end-to-end SAP ABAP solutions, including ALV reports and SmartForms, to automate data retrieval and streamline business reporting.</li>
                        <li>Analyzed and optimized enterprise workflows by developing custom interfaces (BAPIs/RFCs), improving data consistency and reducing manual processing time.</li>
                    </ul>
                </div>

                <div class="timeline-item">
                    <div class="timeline-header">
                        <h3>Sports Leader</h3>
                        <span class="timeline-date">Mar 2024 – Jun 2025</span>
                    </div>
                    <div class="timeline-company">Decathlon · Istanbul, Turkey</div>
                    <ul>
                        <li>Improved team performance by streamlining stock control, documentation, and performance tracking across the Water &amp; Winter Sports department.</li>
                        <li>Led sales, stock, and merchandising analysis for Canoe &amp; Stand Up Paddle Equipment, achieving a top-three nationwide ranking.</li>
                        <li>Prepared departmental reports and presentations to support data-driven decisions.</li>
                    </ul>
                </div>

                <div class="timeline-item">
                    <div class="timeline-header">
                        <h3>Samsung Innovation Campus — AI Program</h3>
                        <span class="timeline-date">Nov 2025 – Jan 2026</span>
                    </div>
                    <div class="timeline-company">Samsung · Capstone: Satellite-Based Urban Analytics with YOLOv11</div>
                    <ul>
                        <li>Completed intensive training in Machine Learning, Data Science, NLP, and Computer Vision.</li>
                        <li>Built a deep learning pipeline using YOLOv11 to detect buildings and vehicles from xView satellite imagery for urban analytics.</li>
                    </ul>
                </div>

                <div class="timeline-item">
                    <div class="timeline-header">
                        <h3>Google AI &amp; Technology Academy</h3>
                        <span class="timeline-date">Dec 2025 – Present</span>
                    </div>
                    <div class="timeline-company">Google Turkey · Scholar (1 of 1,500 from 31,700 applicants)</div>
                    <ul>
                        <li>Selected for multidisciplinary training in AI, Data Analysis, Entrepreneurship, and Project Management.</li>
                        <li>Actively participating in hands-on coding sessions and team-oriented workshops.</li>
                    </ul>
                </div>

                <div class="timeline-item">
                    <div class="timeline-header">
                        <h3>Aspire Leaders Program</h3>
                        <span class="timeline-date">Jan 2026 – Present</span>
                    </div>
                    <div class="timeline-company">Aspire Institute (Harvard University spin-off)</div>
                    <ul>
                        <li>Selected for a global leadership development program empowering high-potential, first-generation students.</li>
                        <li>Developing skills in leadership, communication, strategic thinking, and global collaboration.</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══ Projects Section ═══ -->
    <section id="projects" class="section-alt">
        <div class="container">
            <div class="section-title">
                <h2>Projects</h2>
                <p>A selection of work showcasing my technical abilities.</p>
            </div>
            <div class="projects-grid" id="projects-container"></div>
            <div id="projects-loading">Loading projects...</div>
        </div>
    </section>

    <!-- ═══ Contact Section ═══ -->
    <section id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Get In Touch</h2>
                <p>Have a project in mind or want to collaborate? Let's talk.</p>
            </div>
            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Let's work together</h3>
                    <p>
                        I'm always open to new opportunities, collaborations, and interesting conversations 
                        about AI, software engineering, and technology.
                    </p>
                    <div class="contact-details">
                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">📧</div>
                            <div class="contact-detail-text">
                                <div class="label">Email</div>
                                <div class="value">elifkonakoglu@gmail.com</div>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">📱</div>
                            <div class="contact-detail-text">
                                <div class="label">Phone</div>
                                <div class="value">+90 505 998 8091</div>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">🔗</div>
                            <div class="contact-detail-text">
                                <div class="label">LinkedIn</div>
                                <div class="value"><a href="https://linkedin.com/in/elif-semiha-konakoglu" target="_blank">elif-semiha-konakoglu</a></div>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="contact-detail-icon">🐙</div>
                            <div class="contact-detail-text">
                                <div class="label">GitHub</div>
                                <div class="value"><a href="https://github.com/elif-konakoglu" target="_blank">elif-konakoglu</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="contact-form" id="contact-form">
                    <div id="form-status" class="form-status"></div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name">
                        <span class="error-msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com">
                        <span class="error-msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="What's this about?">
                        <span class="error-msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Tell me about your project or idea..."></textarea>
                        <span class="error-msg"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-submit">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- ═══ Footer ═══ -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="https://github.com/elif-konakoglu" target="_blank">GitHub</a>
                    <a href="https://linkedin.com/in/elif-semiha-konakoglu" target="_blank">LinkedIn</a>
                    <a href="mailto:elifkonakoglu@gmail.com">Email</a>
                </div>
                <p class="footer-copy">&copy; <?php echo date('Y'); ?> Elif Semiha Konakoğlu. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
