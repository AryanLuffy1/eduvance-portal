<?php $__env->startSection('content'); ?>
<style> tags -->
    <style>
        :root {
            /* Cosmos Video Vibe Color Palette */
            --electric-purple: #5D3FD3;
            --electric-purple-hover: #4000FF;
            --deep-black: #050505;
            --card-bg: #121212;
            --input-bg: #1a1a1a;
            --border-color: #333333;
        }

        /* Body Setup for Centering & Dark Mode */
        body {
            background-color: var(--deep-black);
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Background glow effect for the cosmos vibe */
            background-image: radial-gradient(circle at 50% 50%, rgba(93, 63, 211, 0.05) 0%, var(--deep-black) 60%);
        }

        /* Auth Card Styling */
        .auth-card {
            background-color: var(--card-bg);
            border: 1px solid rgba(93, 63, 211, 0.4);
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(93, 63, 211, 0.2);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            position: relative;
        }

        /* Top Header of the Card */
        .auth-header {
            background: linear-gradient(135deg, rgba(93, 63, 211, 0.15) 0%, rgba(93, 63, 211, 0.05) 100%);
            border-bottom: 1px solid rgba(93, 63, 211, 0.3);
            padding: 2rem 2rem 0;
            text-align: center;
        }

        .brand-logo {
            color: var(--electric-purple);
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 0 0 10px rgba(93, 63, 211, 0.5);
        }

        /* Tab Navigation Adjustments */
        .nav-tabs .nav-link {
            color: #888888;
            border: none;
            border-bottom: 2px solid transparent;
            font-weight: 500;
            padding-bottom: 1rem;
        }

        .nav-tabs .nav-link:hover {
            color: #ffffff;
            border-color: transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--electric-purple);
            background-color: transparent;
            border-color: transparent;
            border-bottom: 2px solid var(--electric-purple);
        }

        /* Form Controls Dark Mode Adjustments */
        .form-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: #eeeeee;
            letter-spacing: 0.5px;
        }

        .form-control,
        .input-group-text {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: #ffffff;
        }

        .form-control:focus {
            background-color: #222222;
            border-color: var(--electric-purple);
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(93, 63, 211, 0.3);
        }

        .form-control::placeholder {
            color: #666666;
        }

        .input-group-text {
            color: var(--electric-purple);
            font-weight: bold;
        }

        /* Primary Button Override to Electric Purple */
        .btn-primary {
            background-color: var(--electric-purple);
            border-color: var(--electric-purple);
            color: #ffffff;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: var(--electric-purple-hover) !important;
            border-color: var(--electric-purple-hover) !important;
            box-shadow: 0 0 15px rgba(93, 63, 211, 0.6) !important;
            transform: translateY(-1px);
        }

        /* Custom Checkbox for Dark Mode */
        .form-check-input {
            background-color: var(--input-bg);
            border-color: var(--border-color);
        }

        .form-check-input:checked {
            background-color: var(--electric-purple);
            border-color: var(--electric-purple);
        }

        /* Validation Feedback Tweaks for Dark Theme */
        .valid-feedback {
            color: #20c997;
            /* Teal-ish green looks better on dark */
            font-size: 0.8rem;
        }

        .invalid-feedback {
            color: #ff4d4d;
            /* Bright red */
            font-size: 0.8rem;
        }

        /* Ensure valid input borders are distinct but fit the dark theme */
        .was-validated .form-control:valid,
        .form-control.is-valid {
            border-color: #20c997;
            background-color: rgba(32, 201, 151, 0.05);
        }

        .was-validated .form-control:invalid,
        .form-control.is-invalid {
            border-color: #ff4d4d;
            background-color: rgba(255, 77, 77, 0.05);
        }

        .form-check-label a {
            color: var(--electric-purple);
            text-decoration: none;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }
    </style>


    <div class="auth-card">

        <div class="auth-header">
            <div class="brand-logo mb-1">EduVance</div>
            <p class="small text-secondary mb-4">Secure Portal Access</p>

            <!-- Navigation Tabs to Toggle Between Login and Register -->
            <ul class="nav nav-tabs justify-content-center border-0" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                        type="button" role="tab" aria-controls="login" aria-selected="true">Sign In</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                        type="button" role="tab" aria-controls="register" aria-selected="false">Create Account</button>
                </li>
            </ul>
        </div>

        <div class="card-body p-4 p-sm-5">
            <div class="tab-content" id="authTabsContent">

                <!-- ============================ -->
                <!-- LOGIN FORM                   -->
                <!-- ============================ -->
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">

                    <!-- Form tag includes novalidate and needs-validation for Bootstrap validation -->
                    <!-- Action points to login.php and method is POST as requested -->
                    <form action="login.php" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="form_type" value="login">

                        <!-- Email Input Group -->
                        <div class="mb-4">
                            <label for="loginEmail" class="form-label">University Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="email" class="form-control" id="loginEmail" name="email"
                                    placeholder="student@eduvance.edu" required>
                                <div class="invalid-feedback">
                                    Please enter a valid EduVance email address.
                                </div>
                                <div class="valid-feedback">
                                    Email format looks good!
                                </div>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password"
                                placeholder="••••••••" required>
                            <div class="invalid-feedback">
                                Password is required to access your dashboard.
                            </div>
                            <div class="valid-feedback">
                                Password entered.
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label small text-secondary" for="rememberMe">Remember
                                    me</label>
                            </div>
                            <a href="#" class="small text-decoration-none" style="color: var(--electric-purple);">Forgot
                                password?</a>
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary">Login to Dashboard</button>
                        </div>
                    </form>
                </div>

                <!-- ============================ -->
                <!-- REGISTRATION FORM            -->
                <!-- ============================ -->
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">

                    <!-- Form tag includes novalidate and needs-validation -->
                    <!-- Action points to login.php and method is POST -->
                    <form action="login.php" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="form_type" value="register">

                        <!-- Full Name Input -->
                        <div class="mb-3">
                            <label for="regName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="regName" name="name" placeholder="John Doe"
                                required>
                            <div class="invalid-feedback">
                                Please provide your full name for official records.
                            </div>
                            <div class="valid-feedback">
                                Name format is accepted.
                            </div>
                        </div>

                        <!-- Email Input Group -->
                        <div class="mb-3">
                            <label for="regEmail" class="form-label">University Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="email" class="form-control" id="regEmail" name="email"
                                    placeholder="student@eduvance.edu" required>
                                <div class="invalid-feedback">
                                    A valid university email is required for registration.
                                </div>
                                <div class="valid-feedback">
                                    Email is ready to be verified.
                                </div>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="regPassword" class="form-label">Create Password</label>
                            <input type="password" class="form-control" id="regPassword" name="password" minlength="8"
                                placeholder="Min. 8 characters" required>
                            <div class="invalid-feedback">
                                Your password must be at least 8 characters long.
                            </div>
                            <div class="valid-feedback">
                                Password meets length requirements.
                            </div>
                        </div>

                        <!-- Terms & Conditions Checkbox -->
                        <div class="mb-4 form-check">
                            <input class="form-check-input" type="checkbox" id="termsCheck" required>
                            <label class="form-check-label small text-secondary" for="termsCheck">
                                I agree to the <a href="#">Terms & Conditions</a>
                            </label>
                            <div class="invalid-feedback">
                                You must agree to the terms before submitting.
                            </div>
                            <div class="valid-feedback">
                                Thank you for agreeing.
                            </div>
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary">Enroll Now</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper (Required for Tabs to work) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ============================ -->
    <!-- JAVASCRIPT VALIDATION LOGIC  -->
    <!-- ============================ -->
    <script>
        // Vanilla JavaScript to handle form validation state
        document.addEventListener("DOMContentLoaded", function () {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission if invalid
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {

                    // Check if the form meets the HTML5 validation requirements (required, minlength, type="email", etc.)
                    if (!form.checkValidity()) {

                        // Form is INVALID:
                        // Prevent the default form submission to login.php
                        event.preventDefault();

                        // Stop event bubbling
                        event.stopPropagation();
                    }

                    // Whether valid or invalid, we add the 'was-validated' class.
                    // This tells Bootstrap's CSS to trigger the visual validation states
                    // (green checks for valid fields, red crosses for invalid fields).
                    form.classList.add('was-validated');

                    /* 
                        If the form IS valid (!form.checkValidity() is false), 
                        the code will naturally bypass the preventDefault() and
                        allow the form to submit its data to the PHP backend (login.php)
                        as specified in the <form> action attribute.
                    */

                }, false);
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/labs/lab3.blade.php ENDPATH**/ ?>