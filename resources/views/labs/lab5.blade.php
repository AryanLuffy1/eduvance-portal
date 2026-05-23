@extends('layouts.app')

@section('content')
<style> tags -->
    <style>
        :root {
            /* Theme Colors Consistent with Lab 4 & Dashboard */
            --electric-purple: #5D3FD3;
            --electric-purple-hover: #4000FF;
            --deep-black: #000000;
            --card-bg: #121212;
            --item-bg: #1a1a1a;
            --border-color: #333333;
            --text-main: #ffffff;
            --text-muted: #f5f5f7; /* Apple's light gray */
            
            /* Crucial: Premium Easing Animation */
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

        /* Navbar Styling */
        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
        }

        /* Sidebar & Layout Container */
        .dashboard-column {
            background-color: var(--card-bg);
            border: 1px solid rgba(93, 63, 211, 0.25);
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
        }

        .border-purple-top {
            border-top: 4px solid var(--electric-purple) !important;
        }

        /* Primary Button Styles */
        .btn-purple {
            background-color: var(--electric-purple);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            transition: all 0.6s var(--ease-premium);
        }
        
        .btn-purple:hover {
            background-color: var(--electric-purple-hover);
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(93, 63, 211, 0.3);
            color: white;
        }

        /* Sidebar Links Styles */
        .btn-outline-secondary {
            color: #cccccc;
            border-color: var(--border-color);
            background-color: var(--item-bg);
            transition: all 0.6s var(--ease-premium);
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

        /* Custom Form Controls */
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
        
        .form-control::placeholder {
            color: #666;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        /* Digital ID Card Styling & Animations */
        .digital-id-card {
            background: linear-gradient(145deg, #181818 0%, #0a0a0a 100%);
            border: 1px solid rgba(93, 63, 211, 0.4);
            border-radius: 20px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5), inset 0 0 0 1px rgba(255,255,255,0.05);
            
            /* Initial Hidden State (Rubric Requirement) */
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s var(--ease-premium);
        }

        /* State Class to reveal the card smoothly */
        .digital-id-card.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .digital-id-card::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, rgba(93, 63, 211, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .id-brand {
            color: var(--electric-purple);
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 1.2rem;
        }

        .id-field-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #888888;
            margin-bottom: 0.3rem;
        }

        .id-field-value {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 1.2rem;
        }

        .id-name {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
            line-height: 1.2;
        }
        
        .id-email {
            color: var(--electric-purple);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 2.5rem;
        }
        
        .barcode-strip {
            height: 40px;
            width: 100%;
            background: repeating-linear-gradient(
                90deg,
                #fff,
                #fff 2px,
                transparent 2px,
                transparent 5px,
                #fff 5px,
                #fff 6px,
                transparent 6px,
                transparent 10px
            );
            opacity: 0.8;
            margin-top: 2rem;
        }
    </style>


    <!-- Minimal Navbar -->
    <nav class="navbar navbar-dark navbar-custom sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" style="color: var(--text-main); letter-spacing: 1px;" href="index.html">
                EDUVANCE <span style="color: var(--electric-purple);">PORTAL</span>
            </a>
        </div>
    </nav>

    <div class="container py-5 mt-2">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold mb-2 display-6">Profile Settings</h1>
                <p style="color: var(--text-muted);">Manage your account and generate your official digital credentials.</p>
            </div>
        </div>

        <!-- Exact Layout Constraint from Lab 2 -->
        <div class="row g-4">
            
            <!-- col-md-3 Sidebar Layout -->
            <div class="col-md-3">
                <div class="dashboard-column border-purple-top">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Student&background=5D3FD3&color=fff&size=100" class="rounded-circle mb-3 shadow" alt="User Profile" style="border: 3px solid #333;">
                        <h5 class="text-light fw-bold mb-0">System User</h5>
                        <p class="small text-secondary mt-1">Status: Active</p>
                    </div>
                    
                    <h6 class="text-uppercase text-muted fw-bold mb-3 small border-bottom border-secondary pb-2">Navigation</h6>
                    <div class="d-grid gap-2">
                        <a href="lab2.html" class="btn btn-outline-secondary text-start">📊 Dashboard</a>
                        <a href="lab4.html" class="btn btn-outline-secondary text-start">🔒 Privacy Showcase</a>
                        <!-- Active sidebar link styled in purple -->
                        <button class="btn btn-outline-secondary btn-sidebar-active text-start">💳 Digital ID</button>
                    </div>
                </div>
            </div>

            <!-- col-md-9 Main Content Area -->
            <div class="col-md-9">
                <div class="dashboard-column p-4 p-lg-5">
                    
                    <h4 class="fw-bold mb-4 border-bottom border-secondary pb-3">Digital ID Generator</h4>
                    
                    <div class="row g-5 align-items-center">
                        
                        <!-- Generator Form -->
                        <div class="col-lg-5">
                            <form id="idGeneratorForm">
                                <div class="mb-4">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="e.g.   aLeX riVeRa  " required>
                                    <div class="form-text text-secondary small mt-1">We will format your messy capitalization.</div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="phoneNumber" class="form-label">Phone Number (10 digits)</label>
                                    <input type="text" class="form-control" id="phoneNumber" placeholder="1234567890" maxlength="10" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="gradYear" class="form-label">Graduation Year</label>
                                    <input type="text" class="form-control" id="gradYear" placeholder="e.g. 2028" maxlength="4" required>
                                </div>

                                <div id="formError" class="alert alert-danger d-none py-2 px-3 small" role="alert" style="background-color: #3b1414; border-color: #8f2929; color: #ffcccc;"></div>

                                <button type="submit" class="btn btn-purple w-100 py-3 mt-3">Generate ID Card</button>
                            </form>
                        </div>

                        <!-- Digital ID Card Output -->
                        <div class="col-lg-7 d-flex align-items-center justify-content-center">
                            
                            <!-- Card is initially hidden via opacity 0 and transform -->
                            <div id="digitalIdCard" class="digital-id-card w-100">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="id-brand">EDUVANCE</div>
                                    <div class="badge px-3 py-2" style="background-color: var(--electric-purple); font-size: 0.75rem; letter-spacing: 1px;">STUDENT ID</div>
                                </div>

                                <div>
                                    <div id="outName" class="id-name">Student Name</div>
                                    <div id="outEmail" class="id-email">student.name@eduvance.edu</div>
                                    
                                    <div class="row mt-4 pt-2">
                                        <div class="col-6">
                                            <div class="id-field-label">Mobile</div>
                                            <div id="outPhone" class="id-field-value">(000) 000-0000</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="id-field-label">Semesters Left</div>
                                            <div id="outSemesters" class="id-field-value" style="color: var(--electric-purple);">0</div>
                                        </div>
                                    </div>
                                    
                                    <div class="barcode-strip"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

    <!-- ==========================================
         VANILLA JAVASCRIPT LOGIC
         ========================================== -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            const idForm = document.getElementById('idGeneratorForm');
            const digitalIdCard = document.getElementById('digitalIdCard');
            const formError = document.getElementById('formError');
            
            // DOM Elements for Output
            const outName = document.getElementById('outName');
            const outEmail = document.getElementById('outEmail');
            const outPhone = document.getElementById('outPhone');
            const outSemesters = document.getElementById('outSemesters');

            // LAB RUBRIC: Attach an addEventListener to the form
            idForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent page reload
                
                // Clear any previous errors
                formError.classList.add('d-none');
                
                // Fetch inputs
                const rawName = document.getElementById('fullName').value;
                const rawPhone = document.getElementById('phoneNumber').value;
                const rawGradYear = document.getElementById('gradYear').value;

                // ---------------------------------------------------------
                // LAB RUBRIC: String Formatting & Manipulation
                // ---------------------------------------------------------
                
                /* 
                 * 1. Format Full Name into Proper Title Case
                 * Utilizing .trim(), .toLowerCase(), .split(), .charAt(), and .toUpperCase()
                 */
                const cleanedName = rawName.trim().toLowerCase();
                const nameParts = cleanedName.split(/\s+/); // Split by 1 or more spaces
                
                let formattedNameArray = [];
                for (let i = 0; i < nameParts.length; i++) {
                    let part = nameParts[i];
                    if (part.length > 0) {
                        // Capitalize first letter and append the rest of the string
                        let properPart = part.charAt(0).toUpperCase() + part.slice(1);
                        formattedNameArray.push(properPart);
                    }
                }
                const formattedName = formattedNameArray.join(' ');
                
                if (!formattedName) {
                    showError("Please enter a valid name.");
                    return;
                }

                /* 
                 * 2. Create Student Email 
                 * Replacing spaces with dots and appending the domain
                 */
                const emailPrefix = formattedNameArray.join('.').toLowerCase();
                // Utilizing template literals as required
                const generatedEmail = `${emailPrefix}@eduvance.edu`; 

                /* 
                 * 3. Format Phone Number
                 * Utilizing .replace() and .substring()
                 */
                const digitsOnly = rawPhone.replace(/\D/g, ''); // Strip all non-digit characters
                if (digitsOnly.length !== 10) {
                    showError("Phone number must be exactly 10 digits.");
                    return;
                }
                // Use substring to construct (XXX) XXX-XXXX
                const formattedPhone = `(${digitsOnly.substring(0,3)}) ${digitsOnly.substring(3,6)}-${digitsOnly.substring(6,10)}`;


                // ---------------------------------------------------------
                // LAB RUBRIC: Type Conversion
                // ---------------------------------------------------------
                
                /* 
                 * 1. Convert Graduation Year string to a number
                 * Utilizing parseInt()
                 */
                const gradYearNum = parseInt(rawGradYear, 10);
                
                /* 
                 * 2. Validate input by checking for NaN
                 */
                if (isNaN(gradYearNum)) {
                    showError("Graduation year must be a valid number (e.g. 2028).");
                    return;
                }

                // Calculate Semesters Remaining (grad year - current year) * 2
                const currentYear = 2026;
                const semestersRemaining = (gradYearNum - currentYear) * 2;
                
                if (semestersRemaining < 0) {
                    showError("Graduation year cannot be in the past.");
                    return;
                }

                // ---------------------------------------------------------
                // LAB RUBRIC: DOM Update
                // ---------------------------------------------------------
                
                // Inject the manipulated strings and calculated numbers into the UI
                outName.textContent = formattedName;
                outEmail.textContent = generatedEmail;
                outPhone.textContent = formattedPhone;
                outSemesters.textContent = semestersRemaining;
                
                // Smoothly transition the card's opacity to 1 (triggers CSS transition)
                digitalIdCard.classList.add('revealed');
            });
            
            // Helper function to handle error UI
            function showError(msg) {
                formError.textContent = msg;
                formError.classList.remove('d-none');
                digitalIdCard.classList.remove('revealed');
            }
        });
    </script>

@endsection
