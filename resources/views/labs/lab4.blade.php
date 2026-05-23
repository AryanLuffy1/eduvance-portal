@extends('layouts.app')

@section('content')
<style> tags -->
    <style>
        :root {
            /* Theme Colors */
            --electric-purple: #5D3FD3;
            --electric-purple-hover: #4000FF;
            --deep-black: #000000;
            --card-bg: #0a0a0a;
            --border-color: #222222;
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
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar Styling */
        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            transition: all 0.6s var(--ease-premium);
        }

        /* Generic Premium Card Base */
        .premium-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px; /* Rounded corners constraint */
            padding: 2.5rem; /* Plenty of whitespace constraint */
            transition: all 0.6s var(--ease-premium);
        }
        
        .premium-card:hover {
            border-color: rgba(93, 63, 211, 0.4);
            box-shadow: 0 10px 40px rgba(93, 63, 211, 0.08);
        }

        /* Primary Button */
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

        /* ==========================================
           SECTION 1: Hide/Show Content UI Styles
           ========================================== */
        .gpa-value {
            font-size: 4rem;
            font-weight: 700;
            color: var(--text-main);
            display: inline-block;
            /* Initially Hidden State */
            opacity: 0;
            transform: translateY(15px);
            /* Smooth reveal transition */
            transition: all 0.6s var(--ease-premium);
        }
        
        /* State Class to be toggled by JS */
        .gpa-value.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* ==========================================
           SECTION 2: Fluid Color Morphing UI Styles
           ========================================== */
        .fee-card {
            border: 1px solid #ff453a;
            color: #ff453a;
            transition: all 0.6s var(--ease-premium);
        }
        
        .fee-card h5, .fee-card p, .fee-card h2 {
            transition: color 0.6s var(--ease-premium);
            color: inherit; /* Inherits the card's color to morph easily */
        }
        
        /* Success state class morphs the card to green */
        .fee-card.paid {
            border-color: #32d74b;
            color: #32d74b;
        }

        .btn-pay {
            background-color: #ff453a;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            transition: all 0.6s var(--ease-premium);
        }
        
        /* Paid button state */
        .btn-pay.paid-state {
            opacity: 0.5;
            background-color: #32d74b;
        }

        /* ==========================================
           SECTION 3: Complex DOM Manipulation UI Styles
           ========================================== */
        .slider-wrapper {
            width: 100%;
            overflow: hidden; /* Crucial: Hides horizontal scrollbar */
            position: relative;
            padding: 10px 0;
        }
        
        .slider-track {
            display: flex;
            gap: 24px;
            /* The transition that creates the buttery smooth Artkit panning effect */
            transition: transform 0.6s var(--ease-premium);
            width: max-content;
        }
        
        .achievement-card {
            width: 320px;
            height: 420px;
            border-radius: 20px;
            background-color: #111;
            border: 1px solid var(--border-color);
            flex-shrink: 0;
            display: flex;
            align-items: flex-end;
            padding: 24px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            transition: all 0.6s var(--ease-premium);
        }

        /* Dark gradient overlay so white text is always readable over images */
        .achievement-card::before {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0; height: 60%;
            background: linear-gradient(to top, rgba(0,0,0,0.95), transparent);
            z-index: 1;
        }

        .achievement-card > div {
            position: relative;
            z-index: 2;
        }

        .slider-controls {
            display: flex;
            gap: 12px;
        }
        
        .btn-slider {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.6s var(--ease-premium);
        }
        
        .btn-slider:hover:not(:disabled) {
            border-color: var(--electric-purple);
            color: var(--electric-purple);
            transform: scale(1.05);
        }
        
        .btn-slider:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }
        
        .text-light-gray {
            color: var(--text-muted);
        }
    </style>


    <!-- Minimal Navbar -->
    <nav class="navbar navbar-dark navbar-custom sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" style="color: var(--text-main); letter-spacing: 1px;" href="index.html">
                EDUVANCE <span style="color: var(--electric-purple);">PRIVACY</span>
            </a>
        </div>
    </nav>

    <div class="container py-5 mt-3">
        <!-- Dashboard Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="fw-bold mb-3 display-5">Student Showcase</h1>
                <p class="text-light-gray fs-5 mx-auto" style="max-width: 650px;">A premium look at your academic journey, featuring fluid transitions and strict privacy controls.</p>
            </div>
        </div>

        <!-- Row for GPA and Fees Cards -->
        <div class="row g-4 mb-5 pb-4">
            
            <!-- Requirement 1 UI: Hide/Show GPA -->
            <div class="col-md-6">
                <div class="premium-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="text-light-gray fw-semibold mb-2">Cumulative GPA</h5>
                        <p class="small text-secondary">Your data is hidden by default to protect your privacy in public spaces.</p>
                    </div>
                    <div class="text-center my-4" style="height: 90px; display: flex; align-items: center; justify-content: center;">
                        <!-- Hidden state handled by CSS initial styles -->
                        <span id="gpaValue" class="gpa-value">3.92</span>
                    </div>
                    <div>
                        <button id="btnToggleGPA" class="btn-purple w-100 py-3">Reveal GPA</button>
                    </div>
                </div>
            </div>

            <!-- Requirement 2 UI: Fluid Color Morphing -->
            <div class="col-md-6">
                <!-- fee-card handles the initial red border and text -->
                <div id="feeCard" class="premium-card fee-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h5 id="feeTitle" class="fw-semibold mb-2">Semester Fee Status</h5>
                        <p id="feeDesc" class="small mb-4">Action required: Your semester fees are currently outstanding.</p>
                    </div>
                    <div class="text-center my-4">
                        <h2 id="feeAmount" class="fw-bold display-4">$4,500</h2>
                    </div>
                    <div>
                        <button id="btnPayFee" class="btn-pay w-100 py-3">Pay Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Requirement 3 UI: Complex DOM Manipulation (Artkit.cc Style Slider) -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <h3 class="fw-bold mb-2">Achievements Gallery</h3>
                        <p class="text-light-gray mb-0">Swipe through your latest certifications and awards.</p>
                    </div>
                    <div class="slider-controls">
                        <!-- Controls to manipulate DOM transform -->
                        <button id="btnPrev" class="btn-slider" disabled>&#8592;</button>
                        <button id="btnNext" class="btn-slider">&#8594;</button>
                    </div>
                </div>

                <!-- Overflow hidden container -->
                <div class="slider-wrapper" id="sliderWrapper">
                    <!-- The track that moves -->
                    <div id="sliderTrack" class="slider-track">
                        
                        <!-- Unsplash placeholder images mapped to the aesthetic -->
                        <div class="achievement-card" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80');">
                            <div>
                                <h5 class="fw-bold text-white mb-1">Hackathon Winner</h5>
                                <p class="small text-light-gray mb-0">First Place - 2025</p>
                            </div>
                        </div>
                        
                        <div class="achievement-card" style="background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80');">
                            <div>
                                <h5 class="fw-bold text-white mb-1">Dean's List</h5>
                                <p class="small text-light-gray mb-0">Fall Semester - 2025</p>
                            </div>
                        </div>
                        
                        <div class="achievement-card" style="background-image: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80');">
                            <div>
                                <h5 class="fw-bold text-white mb-1">Research Grant</h5>
                                <p class="small text-light-gray mb-0">AI & Machine Learning</p>
                            </div>
                        </div>
                        
                        <div class="achievement-card" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80');">
                            <div>
                                <h5 class="fw-bold text-white mb-1">Global Summit</h5>
                                <p class="small text-light-gray mb-0">Student Representative</p>
                            </div>
                        </div>
                        
                        <div class="achievement-card" style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80');">
                            <div>
                                <h5 class="fw-bold text-white mb-1">Open Source Contributor</h5>
                                <p class="small text-light-gray mb-0">100+ Commits Merged</p>
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
            
            // ---------------------------------------------------------
            // LAB RUBRIC 1: Hide/Show Content & Change Text
            // ---------------------------------------------------------
            const btnToggleGPA = document.getElementById('btnToggleGPA');
            const gpaValue = document.getElementById('gpaValue');
            let isGpaRevealed = false;

            // Use addEventListener('click') as required
            btnToggleGPA.addEventListener('click', function() {
                isGpaRevealed = !isGpaRevealed;
                
                // Use classList.toggle to add/remove the CSS class that changes opacity and transform
                gpaValue.classList.toggle('revealed');
                
                // Use .textContent to change the button text based on state
                if (isGpaRevealed) {
                    btnToggleGPA.textContent = "Hide GPA";
                } else {
                    btnToggleGPA.textContent = "Reveal GPA";
                }
            });


            // ---------------------------------------------------------
            // LAB RUBRIC 2: Change Style (Fluid Color Morphing)
            // ---------------------------------------------------------
            const btnPayFee = document.getElementById('btnPayFee');
            const feeCard = document.getElementById('feeCard');
            const feeTitle = document.getElementById('feeTitle');
            const feeDesc = document.getElementById('feeDesc');
            const feeAmount = document.getElementById('feeAmount');

            btnPayFee.addEventListener('click', function() {
                // Add a class that triggers CSS color and border morphing to green
                feeCard.classList.add('paid');
                
                // Change text content to reflect the new state
                feeTitle.textContent = "Status: Cleared";
                feeDesc.textContent = "Thank you! Your semester fees have been paid in full.";
                feeAmount.textContent = "$0.00";
                
                // Disable the button and change its text
                btnPayFee.textContent = "Payment Successful";
                
                // Disable the button using native property
                btnPayFee.disabled = true;
                
                // Fade opacity by adding class (alternatively could use btnPayFee.style.opacity = '0.5')
                btnPayFee.classList.add('paid-state');
            });


            // ---------------------------------------------------------
            // LAB RUBRIC 3: Complex DOM Manipulation (Sliding Track)
            // ---------------------------------------------------------
            const track = document.getElementById('sliderTrack');
            const btnPrev = document.getElementById('btnPrev');
            const btnNext = document.getElementById('btnNext');
            const wrapper = document.getElementById('sliderWrapper');
            
            let currentSlideIndex = 0;
            // Card width (320px) + Track Gap (24px) = 344px to slide per click
            const slideDistance = 344; 
            const totalCards = 5;
            
            // Function to calculate and apply transform style
            function updateSliderDOM() {
                // Use .style to apply the CSS transform for smooth panning
                track.style.transform = `translateX(-${currentSlideIndex * slideDistance}px)`;
                
                // Disable 'Prev' if we are at the start
                if (currentSlideIndex === 0) {
                    btnPrev.disabled = true;
                } else {
                    btnPrev.disabled = false;
                }
                
                // Calculate how many cards fit in the current wrapper width
                const wrapperWidth = wrapper.offsetWidth;
                const visibleCards = Math.floor(wrapperWidth / slideDistance);
                
                // Disable 'Next' if the remaining cards fit in the viewport
                const maxIndex = Math.max(0, totalCards - visibleCards);
                
                if (currentSlideIndex >= maxIndex) {
                    btnNext.disabled = true;
                } else {
                    btnNext.disabled = false;
                }
            }

            btnNext.addEventListener('click', function() {
                currentSlideIndex++;
                updateSliderDOM();
            });

            btnPrev.addEventListener('click', function() {
                currentSlideIndex--;
                updateSliderDOM();
            });

            // Recalculate on window resize to ensure correct button states
            window.addEventListener('resize', updateSliderDOM);
            
            // Initial call to set up UI
            updateSliderDOM();
        });
    </script>

@endsection
