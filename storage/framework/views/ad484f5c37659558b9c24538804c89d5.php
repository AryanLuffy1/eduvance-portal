<?php $__env->startSection('content'); ?>
<style> tags -->
    <style>
        :root {
            --electric-purple: #5D3FD3;
            --electric-purple-hover: #4000FF;
            --deep-black: #000000;
            --card-bg: #121212;
            --item-bg: #1a1a1a;
            --border-color: #333333;
            --text-main: #ffffff;
            --text-muted: #f5f5f7;
            --ease-premium: cubic-bezier(0.16, 1, 0.3, 1);
        }

        body {
            background-color: var(--deep-black);
            color: var(--text-main);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            min-height: 100vh;
            background-image: radial-gradient(circle at 50% 0%, rgba(93, 63, 211, 0.08) 0%, var(--deep-black) 70%);
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar */
        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
        }

        .text-purple { color: var(--electric-purple) !important; }

        /* Sidebar */
        .dashboard-column {
            background-color: var(--card-bg);
            border: 1px solid rgba(93, 63, 211, 0.25);
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
        }
        .border-purple-top { border-top: 4px solid var(--electric-purple) !important; }

        .btn-purple {
            background-color: var(--electric-purple);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            transition: all 0.4s ease;
        }
        .btn-purple:hover {
            background-color: var(--electric-purple-hover);
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(93, 63, 211, 0.3);
            color: white;
        }

        .btn-outline-secondary {
            color: #cccccc;
            border-color: var(--border-color);
            background-color: var(--item-bg);
            transition: all 0.4s ease;
        }
        .btn-outline-secondary:hover {
            background-color: #2a2a2a;
            color: #ffffff;
            border-color: var(--electric-purple);
        }
        .btn-sidebar-active {
            background-color: rgba(93, 63, 211, 0.15) !important;
            border-color: var(--electric-purple) !important;
            color: var(--electric-purple) !important;
            font-weight: 600;
        }

        .text-muted { color: #a0a0a0 !important; }

        /* Search Bar */
        .search-bar {
            background-color: var(--item-bg);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            color: #fff;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.4s ease;
            width: 100%;
        }
        .search-bar:focus {
            background-color: #222;
            border-color: var(--electric-purple);
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(93, 63, 211, 0.25);
            outline: none;
        }
        .search-bar::placeholder { color: #555; }

        /* ==========================================
           FANNING CARD STACK
           ========================================== */
        .course-container {
            /* Initially hidden for staggered wave reveal */
            display: none;
            margin-bottom: 2rem;
        }

        .card-stack {
            position: relative;
            width: 100%;
            height: 200px;
            cursor: pointer;
            perspective: 800px;
        }

        .stack-card {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            /* jQuery .animate() will handle transform via wrapper properties */
            transition: box-shadow 0.4s ease;
        }

        /* Visual layering: bottom cards peek out with slight offsets */
        .stack-card.layer-3 {
            top: 6px; left: 6px;
            background-color: #0e0e0e;
            z-index: 1;
        }
        .stack-card.layer-2 {
            top: 3px; left: 3px;
            background-color: #111;
            z-index: 2;
        }
        .stack-card.layer-1 {
            top: 0; left: 0;
            background-color: var(--card-bg);
            z-index: 3;
            border-color: rgba(93, 63, 211, 0.3);
        }

        .stack-card.layer-1:hover {
            box-shadow: 0 10px 30px rgba(93, 63, 211, 0.15);
        }

        .stack-card h5 {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }
        .stack-card .badge-module {
            background-color: rgba(93, 63, 211, 0.2);
            color: var(--electric-purple);
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            display: inline-block;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        /* Syllabus Dropdown (Hidden by default) */
        .syllabus-dropdown {
            display: none;
            background-color: var(--item-bg);
            border: 1px solid var(--border-color);
            border-radius: 0 0 16px 16px;
            padding: 1.5rem 2rem;
            margin-top: -10px;
            position: relative;
            z-index: 0;
        }
        .syllabus-dropdown ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .syllabus-dropdown ul li {
            padding: 0.4rem 0;
            color: #ccc;
            font-size: 0.9rem;
            border-bottom: 1px solid #222;
        }
        .syllabus-dropdown ul li:last-child { border: none; }
        .syllabus-dropdown ul li::before {
            content: '▸ ';
            color: var(--electric-purple);
            font-weight: bold;
        }
    </style>


    <!-- Minimal Navbar -->
    <nav class="navbar navbar-dark navbar-custom sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" style="color: var(--text-main); letter-spacing: 1px;" href="index.html">
                EDUVANCE <span style="color: var(--electric-purple);">COURSES</span>
            </a>
        </div>
    </nav>

    <div class="container py-5 mt-2">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold mb-2 display-6">Interactive Course Showcase</h1>
                <p style="color: var(--text-muted);">Explore modules with premium jQuery-powered animations.</p>
            </div>
        </div>

        <!-- Dashboard Grid: col-md-3 sidebar + col-md-9 main -->
        <div class="row g-4">

            <!-- col-md-3 Sidebar -->
            <div class="col-md-3">
                <div class="dashboard-column border-purple-top">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=CS&background=5D3FD3&color=fff&size=100" class="rounded-circle mb-3 shadow" alt="CS" style="border: 3px solid #333;">
                        <h5 class="text-light fw-bold mb-0">Curriculum</h5>
                        <p class="small text-secondary mt-1">Semester 6</p>
                    </div>
                    <h6 class="text-uppercase text-muted fw-bold mb-3 small border-bottom border-secondary pb-2">Navigation</h6>
                    <div class="d-grid gap-2">
                        <a href="lab2.html" class="btn btn-outline-secondary text-start">📊 Dashboard</a>
                        <a href="lab5.html" class="btn btn-outline-secondary text-start">💳 Digital ID</a>
                        <a href="lab6.html" class="btn btn-outline-secondary text-start">⚡ JS Concepts</a>
                        <button class="btn btn-outline-secondary btn-sidebar-active text-start">📚 Course Showcase</button>
                    </div>
                </div>
            </div>

            <!-- col-md-9 Main Content -->
            <div class="col-md-9">

                <!-- Search Bar -->
                <div class="mb-4">
                    <input type="text" id="search-input" class="search-bar" placeholder="🔍  Search Curriculum...">
                </div>

                <!-- Course Grid -->
                <div class="row g-4" id="course-grid">

                    <!-- Course 1 -->
                    <div class="col-md-6 course-container" data-course="Full Stack Development">
                        <div class="card-stack" id="stack-1">
                            <div class="stack-card layer-3"></div>
                            <div class="stack-card layer-2"></div>
                            <div class="stack-card layer-1">
                                <span class="badge-module">Module 01</span>
                                <h5>Full Stack Development</h5>
                                <p class="small text-muted mb-0">HTML, CSS, JS, PHP, MySQL</p>
                            </div>
                        </div>
                        <div class="syllabus-dropdown" id="syllabus-1">
                            <h6 class="text-purple fw-bold mb-2">Syllabus Topics</h6>
                            <ul>
                                <li>Bootstrap 5 Grid & Components</li>
                                <li>JavaScript DOM Manipulation</li>
                                <li>jQuery Events & Animations</li>
                                <li>PHP Backend & Form Handling</li>
                                <li>MySQL CRUD Operations</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Course 2 -->
                    <div class="col-md-6 course-container" data-course="Machine Learning">
                        <div class="card-stack" id="stack-2">
                            <div class="stack-card layer-3"></div>
                            <div class="stack-card layer-2"></div>
                            <div class="stack-card layer-1">
                                <span class="badge-module">Module 02</span>
                                <h5>Machine Learning</h5>
                                <p class="small text-muted mb-0">Python, TensorFlow, Scikit-learn</p>
                            </div>
                        </div>
                        <div class="syllabus-dropdown" id="syllabus-2">
                            <h6 class="text-purple fw-bold mb-2">Syllabus Topics</h6>
                            <ul>
                                <li>Linear & Logistic Regression</li>
                                <li>Decision Trees & Random Forests</li>
                                <li>Neural Networks Fundamentals</li>
                                <li>Convolutional Neural Networks</li>
                                <li>Model Evaluation & Deployment</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Course 3 -->
                    <div class="col-md-6 course-container" data-course="Cloud Computing">
                        <div class="card-stack" id="stack-3">
                            <div class="stack-card layer-3"></div>
                            <div class="stack-card layer-2"></div>
                            <div class="stack-card layer-1">
                                <span class="badge-module">Module 03</span>
                                <h5>Cloud Computing</h5>
                                <p class="small text-muted mb-0">AWS, Docker, Kubernetes</p>
                            </div>
                        </div>
                        <div class="syllabus-dropdown" id="syllabus-3">
                            <h6 class="text-purple fw-bold mb-2">Syllabus Topics</h6>
                            <ul>
                                <li>Cloud Service Models (IaaS, PaaS, SaaS)</li>
                                <li>AWS EC2, S3, Lambda</li>
                                <li>Docker Containerization</li>
                                <li>Kubernetes Orchestration</li>
                                <li>CI/CD Pipelines</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Course 4 -->
                    <div class="col-md-6 course-container" data-course="Cybersecurity Fundamentals">
                        <div class="card-stack" id="stack-4">
                            <div class="stack-card layer-3"></div>
                            <div class="stack-card layer-2"></div>
                            <div class="stack-card layer-1">
                                <span class="badge-module">Module 04</span>
                                <h5>Cybersecurity Fundamentals</h5>
                                <p class="small text-muted mb-0">Encryption, Firewalls, Pen Testing</p>
                            </div>
                        </div>
                        <div class="syllabus-dropdown" id="syllabus-4">
                            <h6 class="text-purple fw-bold mb-2">Syllabus Topics</h6>
                            <ul>
                                <li>Symmetric & Asymmetric Encryption</li>
                                <li>Network Security & Firewalls</li>
                                <li>OWASP Top 10 Vulnerabilities</li>
                                <li>Penetration Testing with Kali Linux</li>
                                <li>Incident Response & Forensics</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Course 5 -->
                    <div class="col-md-6 course-container" data-course="Data Structures and Algorithms">
                        <div class="card-stack" id="stack-5">
                            <div class="stack-card layer-3"></div>
                            <div class="stack-card layer-2"></div>
                            <div class="stack-card layer-1">
                                <span class="badge-module">Module 05</span>
                                <h5>Data Structures & Algorithms</h5>
                                <p class="small text-muted mb-0">Trees, Graphs, Dynamic Programming</p>
                            </div>
                        </div>
                        <div class="syllabus-dropdown" id="syllabus-5">
                            <h6 class="text-purple fw-bold mb-2">Syllabus Topics</h6>
                            <ul>
                                <li>Arrays, Linked Lists, Stacks, Queues</li>
                                <li>Binary Trees & BSTs</li>
                                <li>Graph Traversals (BFS, DFS)</li>
                                <li>Sorting & Searching Algorithms</li>
                                <li>Dynamic Programming Patterns</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Course 6 -->
                    <div class="col-md-6 course-container" data-course="Database Management Systems">
                        <div class="card-stack" id="stack-6">
                            <div class="stack-card layer-3"></div>
                            <div class="stack-card layer-2"></div>
                            <div class="stack-card layer-1">
                                <span class="badge-module">Module 06</span>
                                <h5>Database Management Systems</h5>
                                <p class="small text-muted mb-0">SQL, NoSQL, Normalization</p>
                            </div>
                        </div>
                        <div class="syllabus-dropdown" id="syllabus-6">
                            <h6 class="text-purple fw-bold mb-2">Syllabus Topics</h6>
                            <ul>
                                <li>ER Diagrams & Relational Model</li>
                                <li>SQL Joins, Subqueries, Views</li>
                                <li>Normalization (1NF to BCNF)</li>
                                <li>Transactions & ACID Properties</li>
                                <li>MongoDB & NoSQL Concepts</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- jQuery CDN (MUST INCLUDE for Lab 7) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ==========================================
         JQUERY LOGIC (All inside $(document).ready)
         ========================================== -->
    <script>
        $(document).ready(function() {

            // ==========================================================
            // ANIMATION EFFECTS: Staggered Wave Reveal (Load Event)
            // Courses are display:none initially. On page load, use
            // jQuery .each() with setTimeout to .fadeIn() one-by-one,
            // creating a cascading wave effect left-to-right.
            // ==========================================================
            $('.course-container').each(function(index) {
                var $el = $(this);
                setTimeout(function() {
                    $el.fadeIn(500);
                }, index * 150); // 150ms stagger per card
            });


            // ==========================================================
            // ANIMATION EFFECTS: Floating Orbs/Cards (Continuous Animation)
            // Recursive jQuery .animate() that gently bobs each card-stack
            // up and down continuously using marginTop with 'swing' easing.
            // ==========================================================
            function floatCard($el) {
                $el.animate(
                    { marginTop: '-8px' },
                    { duration: 2000, easing: 'swing', complete: function() {
                        $el.animate(
                            { marginTop: '0px' },
                            { duration: 2000, easing: 'swing', complete: function() {
                                floatCard($el); // Recursive call for infinite loop
                            }}
                        );
                    }}
                );
            }

            // Start the floating effect on each card-stack with a staggered offset
            $('.card-stack').each(function(index) {
                var $stack = $(this);
                setTimeout(function() {
                    floatCard($stack);
                }, index * 400); // Offset so they don't all bob in sync
            });


            // ==========================================================
            // HOVER EVENT: Luftformat Fanning Cards
            // On mouseenter, use jQuery .animate() to fan out the layered
            // cards with translation and rotation. On mouseleave, animate
            // them back to the stacked position.
            // ==========================================================
            $('.card-stack').mouseenter(function() {
                var $layer3 = $(this).find('.layer-3');
                var $layer2 = $(this).find('.layer-2');
                var $layer1 = $(this).find('.layer-1');

                // Fan out: Layer 3 goes left and rotates counter-clockwise
                $layer3.stop(true).animate({
                    left: '-20px',
                    top: '10px'
                }, { duration: 400, easing: 'swing' });
                $layer3.css('transform', 'rotate(-6deg)');

                // Fan out: Layer 2 stays roughly centered but shifts slightly
                $layer2.stop(true).animate({
                    left: '0px',
                    top: '-5px'
                }, { duration: 400, easing: 'swing' });
                $layer2.css('transform', 'rotate(0deg)');

                // Fan out: Layer 1 (top card) goes right and rotates clockwise
                $layer1.stop(true).animate({
                    left: '20px',
                    top: '-10px'
                }, { duration: 400, easing: 'swing' });
                $layer1.css('transform', 'rotate(6deg)');

            }).mouseleave(function() {
                // HOVER EVENT: Collapse cards back to the original stacked position
                var $layer3 = $(this).find('.layer-3');
                var $layer2 = $(this).find('.layer-2');
                var $layer1 = $(this).find('.layer-1');

                $layer3.stop(true).animate({ left: '6px', top: '6px' }, 400);
                $layer3.css('transform', 'rotate(0deg)');

                $layer2.stop(true).animate({ left: '3px', top: '3px' }, 400);
                $layer2.css('transform', 'rotate(0deg)');

                $layer1.stop(true).animate({ left: '0px', top: '0px' }, 400);
                $layer1.css('transform', 'rotate(0deg)');
            });


            // ==========================================================
            // CLICK EVENT: Syllabus Dropdown
            // When the user clicks the top card (layer-1) in a stack,
            // use jQuery .slideToggle(400) to smoothly reveal/hide the
            // syllabus details div below.
            // ==========================================================
            $('.stack-card.layer-1').click(function() {
                // Find the parent .course-container, then the .syllabus-dropdown inside it
                var $container = $(this).closest('.course-container');
                var $syllabus = $container.find('.syllabus-dropdown');

                // Use slideToggle for smooth expand/collapse
                $syllabus.slideToggle(400);
            });


            // ==========================================================
            // FORM INPUT EVENT: Live Search Filter
            // Use .on('keyup') to listen for input. Filter courses by
            // matching the data-course attribute. Use .fadeOut(300) for
            // non-matches and .fadeIn(300) for matches.
            // ==========================================================
            $('#search-input').on('keyup', function() {
                var query = $(this).val().toLowerCase().trim();

                $('.course-container').each(function() {
                    var courseName = $(this).attr('data-course').toLowerCase();

                    if (courseName.indexOf(query) !== -1) {
                        // Match found: fade in
                        $(this).stop(true).fadeIn(300);
                    } else {
                        // No match: fade out
                        $(this).stop(true).fadeOut(300);
                    }
                });
            });

        }); // end $(document).ready
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/labs/lab7.blade.php ENDPATH**/ ?>