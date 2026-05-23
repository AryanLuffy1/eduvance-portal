<?php $__env->startSection('content'); ?>
<style>
        :root {
            --electric-purple: #5D3FD3;
            --electric-purple-hover: #4000FF;
            --deep-black: #050505;
            --card-bg: #121212;
            --item-bg: #1a1a1a;
            --border-color: #333333;
        }
        
        body {
            background-color: var(--deep-black); 
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: radial-gradient(circle at 50% 0%, rgba(93, 63, 211, 0.08) 0%, var(--deep-black) 70%);
            min-height: 100vh;
        }
        
        .text-purple { color: var(--electric-purple) !important; }
        .bg-purple { background-color: var(--electric-purple) !important; color: white; }
        
        /* Interactive Button Styles */
        .btn-purple {
            background-color: var(--electric-purple);
            color: white;
            border: 1px solid var(--electric-purple);
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-purple:hover {
            background-color: var(--electric-purple-hover);
            border-color: var(--electric-purple-hover);
            color: white;
            box-shadow: 0 0 15px rgba(93, 63, 211, 0.5);
            transform: translateY(-1px);
        }
        
        .btn-outline-secondary {
            color: #cccccc;
            border-color: var(--border-color);
            background-color: var(--item-bg);
            transition: all 0.3s ease;
        }
        .btn-outline-secondary:hover {
            background-color: #2a2a2a;
            color: #ffffff;
            border-color: var(--electric-purple);
        }
        
        /* Dashboard Container Columns */
        .dashboard-column {
            background-color: var(--card-bg);
            border: 1px solid rgba(93, 63, 211, 0.25);
            border-radius: 12px;
            padding: 1.5rem; 
            height: 100%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        
        .border-purple-top { border-top: 4px solid var(--electric-purple) !important; }
        
        /* Navbar */
        .navbar-custom {
            background-color: rgba(18, 18, 18, 0.95);
            border-bottom: 1px solid rgba(93, 63, 211, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .text-muted {
            color: #a0a0a0 !important;
        }
        
        .inner-card {
            background-color: var(--item-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
        }

        /* ==========================================
           MODAL DARK THEME OVERRIDES
           ========================================== */
        .modal-content {
            background-color: #111111; /* Extremely dark gray matching constraints */
            color: #ffffff;
            border: 1px solid rgba(93, 63, 211, 0.4);
            box-shadow: 0 10px 40px rgba(0,0,0,0.8);
            border-radius: 12px;
        }
        
        .modal-header, .modal-footer {
            border-color: var(--border-color);
        }
        
        /* Ensure all modal form inputs match the dark aesthetic */
        .form-control, .form-select {
            background-color: var(--item-bg);
            border: 1px solid var(--border-color);
            color: #ffffff;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: #222222;
            border-color: var(--electric-purple);
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(93, 63, 211, 0.25);
        }
        
        .form-control::placeholder {
            color: #666;
        }
        
        /* Invert the Bootstrap close "X" icon to be white */
        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }
        
        /* ==========================================
           DYNAMIC DETAILS TOGGLE UI (Vanilla JS)
           ========================================== */
        #extendedDetails {
            /* Smooth transitions for the collapsible div */
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin-top: 0 !important;
            border: none !important;
        }
        
        #extendedDetails.show {
            max-height: 200px;
            opacity: 1;
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
            margin-top: 1rem !important;
            border: 1px solid var(--border-color) !important;
        }
    </style>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm mb-4 sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-purple" href="index.html" style="letter-spacing: 1px;">EDUVANCE</a>
            <span class="navbar-text text-light ms-auto d-none d-sm-inline" id="datetime"></span>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mb-5">
        
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-light fw-bold border-bottom border-secondary pb-2">Student Dashboard</h2>
                <p class="text-muted">Welcome back! Manage your academic progress below.</p>
            </div>
        </div>

        <div class="row g-4">
            
            <!-- COLUMN 1: User Profile & Quick Links -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="dashboard-column border-purple-top">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Student+User&background=5D3FD3&color=fff&size=100" class="rounded-circle mb-3 shadow" alt="User Profile" style="border: 3px solid #333;">
                        <h4 class="text-light fw-bold mb-0">Jane Doe</h4>
                        <p class="text-purple small fw-semibold">Information Technology, Sem 6</p>
                    </div>
                    
                    <h6 class="text-uppercase text-muted fw-bold mb-3 small border-bottom border-secondary pb-2">Quick Links</h6>
                    <div class="d-grid gap-2">
                        <!-- Buttons upgraded to trigger Bootstrap Modals -->
                        <button class="btn btn-outline-secondary text-start" type="button" data-bs-toggle="modal" data-bs-target="#courseRegModal">📄 Course Registration</button>
                        <button class="btn btn-outline-secondary text-start" type="button" data-bs-toggle="modal" data-bs-target="#feePaymentModal">💳 Fee Payment</button>
                        <button class="btn btn-outline-secondary text-start" type="button" data-bs-toggle="modal" data-bs-target="#examScheduleModal">📅 Exam Schedule</button>
                        
                        <button class="btn btn-purple mt-3 shadow-sm" type="button" data-bs-toggle="modal" data-bs-target="#updateProfileModal">Update Profile</button>
                    </div>
                </div>
            </div>
            
            <!-- COLUMN 2: Main Content Area -->
            <div class="col-12 col-md-6 col-lg-6">
                <div class="dashboard-column">
                    <h4 class="text-light fw-bold mb-4 border-bottom border-secondary pb-2">Recent Announcements</h4>
                    
                    <!-- Announcement Card 1 -->
                    <div class="card mb-4 inner-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title text-light mb-0">Mid-Term Results Declared</h5>
                                <span class="badge bg-danger rounded-pill">New</span>
                            </div>
                            <h6 class="card-subtitle mb-3 text-purple small">Posted: 2 hours ago</h6>
                            <p class="card-text text-muted">The results for all Semester 6 subjects have been published. Please check the Quick Stats section or the main portal to view your detailed marks.</p>
                            
                            <!-- Trigger for Vanilla JS Dynamic Reveal -->
                            <button id="btnViewDetails" class="btn btn-sm btn-outline-light px-3">View Details</button>
                            
                            <!-- Hidden Div that will be dynamically expanded -->
                            <div id="extendedDetails" class="bg-dark rounded px-3 border border-secondary mt-3">
                                <p class="mb-0 text-light" style="font-size: 0.9rem;">
                                    <strong>Extended details:</strong> The grading curve has been adjusted by +2% for advanced subjects. If you notice any discrepancies in your individual mark sheets, please ensure you contact the registrar's office via the portal support system before this Friday at 5:00 PM.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Announcement Card 2 -->
                    <div class="card inner-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title text-light mb-0">Lab Assignment 2 Deadline</h5>
                                <span class="badge bg-warning text-dark rounded-pill">Due Soon</span>
                            </div>
                            <h6 class="card-subtitle mb-3 text-purple small">Posted: Yesterday</h6>
                            <p class="card-text text-muted">Reminder: Your Full Stack Development Lab 2 assignment regarding the Bootstrap Grid System is due this Friday at 11:59 PM.</p>
                            
                            <!-- Trigger for File Upload Modal -->
                            <button class="btn btn-sm btn-purple shadow-sm" data-bs-toggle="modal" data-bs-target="#submitAssignmentModal">Submit Assignment</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- COLUMN 3: Quick Stats -->
            <div class="col-12 col-md-12 col-lg-3">
                <div class="dashboard-column border-purple-top">
                    <h4 class="text-light fw-bold mb-4 border-bottom border-secondary pb-2">Quick Stats</h4>
                    <div class="mb-4 inner-card p-3 shadow-sm">
                        <h6 class="text-muted fw-bold mb-2">Current GPA</h6>
                        <h2 class="display-5 fw-bold text-light mb-0">8.7<span class="fs-5 text-muted">/10</span></h2>
                    </div>
                    <div class="mb-4 inner-card p-3 shadow-sm">
                        <h6 class="text-muted fw-bold mb-2">Total Attendance</h6>
                        <h2 class="display-6 fw-bold text-purple mb-2">85%</h2>
                        <div class="progress bg-dark" style="height: 10px; border: 1px solid #333;">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted mt-2 d-block">Good standing (Min 75%)</small>
                    </div>
                    <div class="inner-card p-3 shadow-sm">
                        <h6 class="text-muted fw-bold mb-2">Credits Earned</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="fw-bold text-light mb-0">120</h3>
                            <span class="badge bg-success">On Track</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- ==========================================
         INTERACTIVE MODALS
         ========================================== -->

    <!-- 1. Course Registration Modal -->
    <div class="modal fade" id="courseRegModal" tabindex="-1" aria-labelledby="courseRegModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="courseRegModalLabel">Course Registration</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-4">
                            <label class="form-label text-light">Select Elective Subject</label>
                            <select class="form-select">
                                <option selected disabled>Choose a course...</option>
                                <option value="1">Artificial Intelligence</option>
                                <option value="2">Cloud Computing</option>
                                <option value="3">Cybersecurity Fundamentals</option>
                                <option value="4">Advanced Web Development</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-light">Select Lab Batch</label>
                            <select class="form-select">
                                <option selected disabled>Choose a batch...</option>
                                <option value="b1">Batch B1 (Morning)</option>
                                <option value="b2">Batch B2 (Afternoon)</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-purple" data-bs-dismiss="modal">Register Course</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Fee Payment Modal -->
    <div class="modal fade" id="feePaymentModal" tabindex="-1" aria-labelledby="feePaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content text-center py-3">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <h6 class="text-muted mb-2 text-uppercase fw-bold" style="letter-spacing: 1px;">Outstanding Balance</h6>
                    <h2 class="display-5 fw-bold text-light mb-4">$4,500</h2>
                    <p class="small text-secondary mb-0">Due by: November 15th, 2026</p>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-center pt-2 pb-4 px-4">
                    <button type="button" class="btn btn-purple w-100 py-2 shadow-sm" data-bs-dismiss="modal">Pay Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Exam Schedule Modal -->
    <div class="modal fade" id="examScheduleModal" tabindex="-1" aria-labelledby="examScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="examScheduleModalLabel">Mid-Term Exam Schedule</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="table-responsive">
                        <!-- Dark Bootstrap Table -->
                        <table class="table table-dark table-striped table-hover mb-0">
                            <thead style="border-bottom: 2px solid var(--electric-purple);">
                                <tr>
                                    <th scope="col" class="py-3 px-4 text-muted">Date</th>
                                    <th scope="col" class="py-3 text-muted">Subject</th>
                                    <th scope="col" class="py-3 text-muted">Time</th>
                                    <th scope="col" class="py-3 text-muted">Room</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-3 fw-semibold">Oct 15, 2026</td>
                                    <td class="py-3">Advanced Algorithms</td>
                                    <td class="py-3"><span class="badge bg-secondary">10:00 AM</span></td>
                                    <td class="py-3">Hall A</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 fw-semibold">Oct 18, 2026</td>
                                    <td class="py-3">Machine Learning</td>
                                    <td class="py-3"><span class="badge bg-secondary">02:00 PM</span></td>
                                    <td class="py-3">Lab 402</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 fw-semibold">Oct 20, 2026</td>
                                    <td class="py-3">Cloud Computing</td>
                                    <td class="py-3"><span class="badge bg-secondary">09:00 AM</span></td>
                                    <td class="py-3">Hall B</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-purple">Download PDF</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Update Profile (ID Generator Form from Lab 5) Modal -->
    <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="updateProfileModalLabel">Update Profile & ID</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <p class="small text-muted mb-4">Update your official registry details used to generate your digital Student ID.</p>
                    <form>
                        <div class="mb-4">
                            <label class="form-label text-light">Full Name</label>
                            <input type="text" class="form-control" placeholder="e.g. John Doe" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-light">Phone Number</label>
                            <input type="text" class="form-control" placeholder="1234567890" maxlength="10" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-light">Graduation Year</label>
                            <input type="text" class="form-control" placeholder="e.g. 2028" maxlength="4" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-purple" data-bs-dismiss="modal">Generate ID</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. Submit Assignment Modal -->
    <div class="modal fade" id="submitAssignmentModal" tabindex="-1" aria-labelledby="submitAssignmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="submitAssignmentModalLabel">Submit Assignment</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <form>
                        <div class="mb-4">
                            <label for="assignmentFile" class="form-label text-light">Upload File (.pdf, .zip, .html)</label>
                            <!-- Bootstrap native file input -->
                            <input class="form-control" type="file" id="assignmentFile" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-light">Comments to Professor (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="Add any notes here..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- Triggers close to simulate upload -->
                    <button type="button" class="btn btn-purple px-4" data-bs-dismiss="modal">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper (Required for Modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- ==========================================
         VANILLA JAVASCRIPT LOGIC
         ========================================== -->
    <script>
        // 1. Live Clock Utility
        function updateDashboardTime() {
            const now = new Date();
            const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            const datetimeElement = document.getElementById('datetime');
            if (datetimeElement) {
                datetimeElement.textContent = now.toLocaleDateString('en-US', options);
            }
        }
        updateDashboardTime();
        setInterval(updateDashboardTime, 60000);

        // 2. Interactive "View Details" Toggle Logic (Lab Requirement)
        document.addEventListener("DOMContentLoaded", function() {
            const btnViewDetails = document.getElementById('btnViewDetails');
            const extendedDetails = document.getElementById('extendedDetails');
            
            if(btnViewDetails && extendedDetails) {
                btnViewDetails.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Toggle the custom 'show' class which triggers the CSS max-height transition
                    extendedDetails.classList.toggle('show');
                    
                    // Dynamically update button text based on DOM state
                    if (extendedDetails.classList.contains('show')) {
                        btnViewDetails.textContent = 'Hide Details';
                    } else {
                        btnViewDetails.textContent = 'View Details';
                    }
                });
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/labs/lab2.blade.php ENDPATH**/ ?>