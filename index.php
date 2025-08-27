<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sifatul Islam</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <div id="welcome-screen">
        <div class="welcome-text" id="greeting"></div>
    </div>

    <div class="floating-sticker">
        <img src="/image/sticker.png" alt="Among Us Sticker">
    </div>

    <!-- navbar -->
    <div class="nav-bar">
        <ul>
            <li><a href="#home"><span class="nav-icon"><i class="fa-solid fa-house"></i></span><span class="nav-text">
                        home</span></a></li>
            <li><a href="#about"><span class="nav-icon"><i class="fa-solid fa-user"></i></span><span class="nav-text">
                        about</span></a></li>
            <li><a href="#projects"><span class="nav-icon"><i class="fa-solid fa-code"></i></span><span
                        class="nav-text"> projects</span></a></li>
            <li><a href="#contact"><span class="nav-icon"><i class="fa-solid fa-envelope"></i></span><span
                        class="nav-text"> contact</span></a></li>
        </ul>
    </div>

    <!-- Modal -->
    <div id="project-modal" class="modal hidden">
        <div class="modal-content">
            <div class="close-wrapper">
                <span id="modal-close" class="close">&times;</span>
            </div>
            <div id="modal-body"></div>
        </div>
    </div>

    <!-- Contact-modal -->

    <div id="success-modal" class="success-modal hidden">
        <div class="success-modal-content">
            <span class="success-close" onclick="closeModal()">&times;</span>
            <h2>Message Recieved!</h2>
            <p>Thank you for reaching out. I’ll get back to you soon.</p>
        </div>
    </div>

    <!-- project-modal-template -->
    <template id="project-template">
        <div class="project-detail">
            <h2 id="modal-title"></h2>
            <p id="modal-description"></p>
            <p id="modal-arrow"><i class="fa-solid fa-arrow-down"></i></p>
            <img src="" alt="project-image" id="modal-image">
            <div class="modal-text">
                <div class="modal-overview">
                    <p id="project-heading">project overview</p>
                    <div class="project-tag-holder" style="margin-bottom:30px;"></div>
                    <div class="modal-button-holder">
                        <a href="#" class="work-button" id="modal-demo" target="_blank"><i
                                class="fa-solid fa-globe"></i> view demo</a>
                        <a href="#" class="work-button" id="modal-github" target="_blank"><i
                                class="fa-solid fa-code"></i> source code</a>
                    </div>
                </div>
                <p id="modal-text"></p>
            </div>
        </div>
    </template>

    <!-- home -->

    <section id="home">
        <div class="intro">
            <p id="location">based in bangladesh</p>
            <img class="intro-image" src="image/developer.jpg" alt="">
            <p id="intro-heading">quality <span>software & web development</span> synergy</p>
            <p id="intro-subheading">Hi, I'm Sifat. I craft smart software solutions and dynamic web experiences that
                are both powerful and beautifully engineered.</p>
            <div class="intro-button-holder">
                <a href="#projects" class="work-button">see my work <i class="fa-solid fa-angle-right"></i></a>
                <a href="files/resume-sample.pdf" id="resume-button" download><i class="fa-solid fa-download" style="color:#00ffd5;"></i> download
                    resume</a>
            </div>
            <div class="socials-holder">
                <a href="#" class="socials-icon" id="copy-email"><i class="fa-solid fa-envelope"></i></a>
                <a href="https://github.com/sifatul-islam-onik" target="_blank" class="socials-icon"><i
                        class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/sifatul-islam-onik/" target="_blank" class="socials-icon"><i
                        class="fa-brands fa-square-linkedin"></i></a>
                <a href="https://www.facebook.com/sifatul.islam.onik" target="_blank" class="socials-icon"><i
                        class="fa-brands fa-facebook"></i></a>
                <a href="https://t.me/sifatul_islam_onik" target="_blank" class="socials-icon"><i
                        class="fa-brands fa-telegram"></i></a>
            </div>
            <span id="copy-status"></span>
        </div>
    </section>

    <!-- about -->

    <section id="about">
        <h2 class="heading">current technologies</h2>
        <p class="about-text">I'm skilled in a variety of modern technologies that enable me to craft robust,
            high-performance solutions. Here are some of the core tools and frameworks I work with:</p>

        <div class="tech-holder">
            <div class="tech-frontend">
                <h3 class="tech-category-title">Frontend</h3>
                <div class="technology">
                    <img src="/image/logo/html.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">html</div>
                        <div class="technology-subtitle">web structure</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/css.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">CSS</div>
                        <div class="technology-subtitle">web styling</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/js.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">javaScript</div>
                        <div class="technology-subtitle">web interactivity</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/bootstrap.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">bootstrap</div>
                        <div class="technology-subtitle">ui styling toolkit</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/react.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">react</div>
                        <div class="technology-subtitle">ui component library</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/java.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">javaFX</div>
                        <div class="technology-subtitle">java ui toolkit</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/android.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">android</div>
                        <div class="technology-subtitle">mobile app framework</div>
                    </div>
                </div>
            </div>
            <div class="tech-backend">
                <h3 class="tech-category-title">Backend</h3>
                <div class="technology">
                    <img src="/image/logo/php.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">pHP</div>
                        <div class="technology-subtitle">server-side scripting</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/laravel.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">laravel</div>
                        <div class="technology-subtitle">php web framework</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/express.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">express</div>
                        <div class="technology-subtitle">node.js web framework</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/nodejs.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">nodeJs</div>
                        <div class="technology-subtitle">js runtime backend</div>
                    </div>
                </div>
            </div>
            <div class="tech-database">
                <h3 class="tech-category-title">Database</h3>
                <div class="technology">
                    <img src="/image/logo/mysql.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">mySql</div>
                        <div class="technology-subtitle">relational database</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/mongodb.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">mongoDB</div>
                        <div class="technology-subtitle">nosql database</div>
                    </div>
                </div>
                <div class="technology">
                    <img src="/image/logo/firebase.png" alt="" class="technology-logo">
                    <div class="technology-text">
                        <div class="technology-title">firebase</div>
                        <div class="technology-subtitle">realtime database</div>
                    </div>
                </div>
            </div>
        </div>



    </section>

    <section id="experience">
        <h2 class="heading">experience</h2>
        <p class="about-text" style="max-width:1250px; text-align:center;">I'm a 3rd-year <span
                class="highlight">CSE</span> student at <span class="highlight">khulna university of engineering &
                technology</span> with a focus on building practical software solutions. Although I haven't held a
            formal job yet, I've worked on several personal and academic projects using technologies like React,
            Node.js, Laravel, MongoDB, and Firebase. I've also built Android and desktop applications, which have helped
            me develop a solid grasp of both frontend and backend development. I'm looking forward to applying these
            skills in real-world scenarios and continuing to improve as a developer.</p>
    </section>

    <!-- projects -->

    <section id="projects">
        <h2 class="heading">my portfolio</h2>
        <p class="about-text">Here are some of the projects I've worked on, showcasing my skills in web and software
            development:</p>

        <?php
        require 'db.php';

        $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at ASC");
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <script>
            const projectData = <?php echo json_encode($projects, JSON_UNESCAPED_SLASHES); ?>;
        </script>

        <div class="project-holder">
            <?php if ($projects): ?>
                <?php foreach ($projects as $project): ?>
                    <div class="project">
                        <div class="project-image-wrapper">
                            <img src="<?php echo htmlspecialchars($project['image']); ?>"
                                alt="<?php echo htmlspecialchars($project['title']); ?>" class="project-image"
                                data-id="<?php echo $project['id']; ?>" />
                        </div>
                        <div class="project-info">
                            <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <div class="project-tag-holder">
                                <?php
                                $tags = explode(',', $project['tags']);
                                foreach ($tags as $tag): ?>
                                    <span class="project-tag"><?php echo htmlspecialchars(trim($tag)); ?></span>
                                <?php endforeach; ?>
                            </div>

                            <div class="project-link-holder">
                                <?php if (!empty($project['github'])): ?>
                                    <a href="<?php echo htmlspecialchars($project['github']); ?>" class="project-link"
                                        target="_blank">
                                        <i class="fa-solid fa-code"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($project['demo'])): ?>
                                    <a href="<?php echo htmlspecialchars($project['demo']); ?>" class="project-link"
                                        target="_blank">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No projects available yet.</p>
            <?php endif; ?>
        </div>

    </section>

    <!-- contact -->

    <section id="contact">
        <h2 class="heading">get in touch</h2>
        <p class="about-text">I'm always open to discussing new projects, creative ideas, or opportunities to be part of
            your vision. Feel free to reach out!</p>
        <div class="contact-form-holder">
            <form method="post" class="contact-form">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">
                    <span class="btn-text">Send Message</span>
                    <span class="spinner hidden"></span>
                </button>
            </form>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="copyright">
            <a href="/login.php" class="admin-button">
                <i class="fa-solid fa-user-lock"></i>
            </a>
            <div>
                <p class="title">md sifatul islam</p>
                <p class="subtitle">&copy; <?php echo date('Y') ?> | All rights reserved.</p>
            </div>
        </div>
        <div class="links">
            <div class="link-category">
                <h3 class="category-title">navigate</h3>
                <ul>
                    <li><a href="#home">home</a></li>
                    <li><a href="#about">about</a></li>
                    <li><a href="#projects">projects</a></li>
                    <li><a href="#contact">contact</a></li>
                </ul>
            </div>
            <div class="link-category">
                <h3 class="category-title">socials</h3>
                <ul>
                    <li><a href="mailto:sifatul.islam.onik@gmail.com"><i class="fa-solid fa-envelope"></i> <span
                                id="footer-email-short">email</span> <span id="footer-email"
                                style="text-transform:none;">sifatul.islam.onik@gmail.com</span></a></li>
                    <li><a href="https://github.com/sifatul-islam-onik" target="_blank"><i
                                class="fa-brands fa-github"></i> github</a></li>
                    <li><a href="https://www.linkedin.com/in/sifatul-islam-onik/" target="_blank"><i
                                class="fa-brands fa-square-linkedin"></i> linkedIn</a></li>
                    <li><a href="https://www.facebook.com/sifatul.islam.onik" target="_blank"><i
                                class="fa-brands fa-facebook"></i> facebook</a></li>
                    <li> <a href="https://t.me/sifatul_islam_onik" target="_blank"><i class="fa-brands fa-telegram"></i>
                            telegram</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="/js/index.js"></script>
</body>

</html>