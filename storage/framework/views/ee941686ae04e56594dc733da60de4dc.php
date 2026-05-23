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

        /* Sidebar & Layout */
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
            transition: all 0.4s var(--ease-premium);
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
            transition: all 0.4s var(--ease-premium);
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

        /* Form Styling */
        .form-control {
            background-color: var(--item-bg);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            border-radius: 10px;
            padding: 0.8rem 1rem;
            transition: all 0.3s var(--ease-premium);
        }
        .form-control:focus {
            background-color: #222222;
            border-color: var(--electric-purple);
            color: var(--text-main);
            box-shadow: 0 0 0 0.25rem rgba(93, 63, 211, 0.25);
        }
        .form-control::placeholder { color: #555; }
        .form-label {
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        /* Customized Alerts for Dark Mode */
        .alert-custom-success {
            background-color: rgba(50, 215, 75, 0.1);
            border: 1px solid rgba(50, 215, 75, 0.3);
            color: #32d74b;
            border-radius: 12px;
        }
        .alert-custom-danger {
            background-color: rgba(255, 69, 58, 0.1);
            border: 1px solid rgba(255, 69, 58, 0.3);
            color: #ff453a;
            border-radius: 12px;
        }

        /* Card and Array Styling */
        .record-card {
            background-color: var(--item-bg);
            border: 1px solid var(--border-color);
            border-radius: 14px;
        }
        .record-card .card-header {
            background-color: rgba(0,0,0,0.2);
            border-bottom: 1px solid var(--border-color);
            font-weight: bold;
            color: var(--electric-purple);
        }
        
        .array-box {
            background-color: #0d0d0d;
            border: 1px solid #222;
            border-radius: 8px;
            padding: 1rem;
            font-family: 'SF Mono', 'Fira Code', 'Courier New', Courier, monospace;
            color: #ccc;
            font-size: 0.9rem;
        }
    </style>


    <!-- Minimal Navbar -->
    <nav class="navbar navbar-dark navbar-custom sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" style="color: var(--text-main); letter-spacing: 1px;" href="index.html">
                EDUVANCE <span style="color: var(--electric-purple);">ADMIN</span>
            </a>
        </div>
    </nav>

    <div class="container py-5 mt-2">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold mb-2 display-6">Admin Records Processor</h1>
                <p style="color: var(--text-muted);">Demonstrating server-side PHP data manipulation and validation.</p>
            </div>
        </div>

        <div class="row g-4">

            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="dashboard-column border-purple-top">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=5D3FD3&color=fff&size=100" class="rounded-circle mb-3 shadow" alt="Admin" style="border: 3px solid #333;">
                        <h5 class="text-light fw-bold mb-0">System Admin</h5>
                        <p class="small text-secondary mt-1">PHP Backend</p>
                    </div>
                    <h6 class="text-uppercase text-muted fw-bold mb-3 small border-bottom border-secondary pb-2">Navigation</h6>
                    <div class="d-grid gap-2">
                        <a href="lab2.html" class="btn btn-outline-secondary text-start">📊 Dashboard</a>
                        <a href="lab6.html" class="btn btn-outline-secondary text-start">⚡ JS Concepts</a>
                        <a href="lab8.html" class="btn btn-outline-secondary text-start">🌍 Alumni Directory</a>
                        <button class="btn btn-outline-secondary btn-sidebar-active text-start">⚙️ Records Processor</button>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9">
                <div class="row g-4">
                    
                    <!-- Column 1: Form & String Manipulation Output -->
                    <div class="col-lg-6">
                        <div class="dashboard-column">
                            <h5 class="fw-bold border-bottom border-secondary pb-3 mb-4">Student Record Form</h5>
                            
                            <!-- Display PHP Success Alert -->
                            <?php if(!empty($successMessage)): ?>
                                <div class="alert alert-custom-success mb-4 p-3">
                                    <h6 class="fw-bold mb-3">✅ <?php echo $successMessage; ?></h6>
                                    <ul class="mb-0 small" style="list-style: none; padding-left: 0; line-height: 1.8;">
                                        <li><strong class="text-white">Cleaned Name:</strong> <?php echo htmlspecialchars($cleanedName); ?></li>
                                        <li><strong class="text-white">Original Email:</strong> <?php echo htmlspecialchars($originalEmail); ?></li>
                                        <li><strong class="text-white">Extracted Domain:</strong> <?php echo htmlspecialchars($extractedDomain); ?></li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Display PHP Error Alerts -->
                            <?php if(!empty($emailError)): ?>
                                <div class="alert alert-custom-danger mb-4 p-3 small">
                                    <strong>Error:</strong> <?php echo htmlspecialchars($emailError); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if(!empty($nameError)): ?>
                                <div class="alert alert-custom-danger mb-4 p-3 small">
                                    <strong>Error:</strong> <?php echo htmlspecialchars($nameError); ?>
                                </div>
                            <?php endif; ?>

                            <!-- The HTML Form submitting to PHP -->
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="mb-3">
                                    <label for="student_name" class="form-label">Raw Student Name</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="e.g. jOhN dOe" value="<?php echo isset($_POST['student_name']) ? htmlspecialchars($_POST['student_name']) : ''; ?>">
                                    <div class="form-text text-secondary small">PHP will format this to Proper Case.</div>
                                </div>
                                <div class="mb-4">
                                    <label for="student_email" class="form-label">Student Email Address</label>
                                    <input type="text" class="form-control" id="student_email" name="student_email" placeholder="john@example.com" value="<?php echo isset($_POST['student_email']) ? htmlspecialchars($_POST['student_email']) : ''; ?>">
                                    <div class="form-text text-secondary small">PHP will validate via preg_match Regex.</div>
                                </div>
                                <button type="submit" class="btn btn-purple w-100 py-3">Process Record</button>
                            </form>
                        </div>
                    </div>

                    <!-- Column 2: Array Operations Output -->
                    <div class="col-lg-6">
                        <div class="dashboard-column">
                            <h5 class="fw-bold border-bottom border-secondary pb-3 mb-4">Array Operations</h5>
                            
                            <div class="card record-card mb-4">
                                <div class="card-header">Original Arrays</div>
                                <div class="card-body">
                                    <p class="small text-muted mb-1">$cs_students:</p>
                                    <div class="array-box mb-3">
                                        [<?php echo implode(", ", $cs_students); ?>]
                                    </div>
                                    <p class="small text-muted mb-1">$it_students:</p>
                                    <div class="array-box">
                                        [<?php echo implode(", ", $it_students); ?>]
                                    </div>
                                </div>
                            </div>

                            <div class="card record-card mb-4">
                                <div class="card-header">Merged & Sorted Master List</div>
                                <div class="card-body">
                                    <div class="array-box" style="color: var(--electric-purple);">
                                        [<?php echo implode(", ", $merged_students); ?>]
                                    </div>
                                    <div class="mt-3 small">
                                        <?php if($isSorted): ?>
                                            <span style="color: #32d74b;"><strong>✓</strong> <?php echo $sortingValidationMsg; ?></span>
                                        <?php else: ?>
                                            <span style="color: #ff453a;"><strong>✗</strong> <?php echo $sortingValidationMsg; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center bg-dark p-3 rounded border border-secondary mt-4">
                                <span class="fw-semibold">Is "<?php echo $searchTarget; ?>" enrolled?</span>
                                <span class="badge <?php echo $isEnrolled ? 'bg-success' : 'bg-danger'; ?> fs-6 py-2 px-3">
                                    <?php echo $enrollmentStatus; ?>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/labs/lab9.blade.php ENDPATH**/ ?>