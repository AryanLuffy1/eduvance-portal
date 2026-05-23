@extends('layouts.app')

@section('content')
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

        .text-purple {
            color: var(--electric-purple) !important;
        }

        /* Sidebar */
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

        .text-muted {
            color: #a0a0a0 !important;
        }

        /* Alumni Cards */
        .alumni-card {
            background-color: var(--item-bg);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.4s var(--ease-premium);
        }

        .alumni-card:hover {
            border-color: rgba(93, 63, 211, 0.4);
            box-shadow: 0 10px 30px rgba(93, 63, 211, 0.15);
            transform: translateY(-5px);
        }

        .alumni-card img {
            width: 100%;
            height: auto;
            border-bottom: 2px solid var(--electric-purple);
        }

        .alumni-card .card-body {
            padding: 1.5rem;
            text-align: center;
        }

        .alumni-card .card-title {
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }

        .alumni-card .card-text {
            color: var(--text-muted);
            font-size: 0.9rem;
        }
    </style>


    <!-- Minimal Navbar -->
    <nav class="navbar navbar-dark navbar-custom sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" style="color: var(--text-main); letter-spacing: 1px;" href="index.html">
                EDUVANCE <span style="color: var(--electric-purple);">ALUMNI</span>
            </a>
        </div>
    </nav>

    <div class="container py-5 mt-2">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold mb-2 display-6">Global Alumni Directory</h1>
                <p style="color: var(--text-muted);">Connect with our graduates worldwide using AJAX-powered fetching.
                </p>
            </div>
        </div>

        <!-- Dashboard Grid: col-md-3 sidebar + col-md-9 main -->
        <div class="row g-4">

            <!-- col-md-3 Sidebar -->
            <div class="col-md-3">
                <div class="dashboard-column border-purple-top">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Alumni&background=5D3FD3&color=fff&size=100"
                            class="rounded-circle mb-3 shadow" alt="Alumni" style="border: 3px solid #333;">
                        <h5 class="text-light fw-bold mb-0">Community</h5>
                        <p class="small text-secondary mt-1">Global Network</p>
                    </div>
                    <h6 class="text-uppercase text-muted fw-bold mb-3 small border-bottom border-secondary pb-2">
                        Navigation</h6>
                    <div class="d-grid gap-2">
                        <a href="lab2.html" class="btn btn-outline-secondary text-start">📊 Dashboard</a>
                        <a href="lab6.html" class="btn btn-outline-secondary text-start">⚡ JS Concepts</a>
                        <a href="lab7.html" class="btn btn-outline-secondary text-start">📚 Course Showcase</a>
                        <button class="btn btn-outline-secondary btn-sidebar-active text-start">🌍 Alumni
                            Directory</button>
                    </div>
                </div>
            </div>

            <!-- col-md-9 Main Content -->
            <div class="col-md-9">
                <div class="dashboard-column">

                    <div class="d-flex align-items-center mb-4 pb-3 border-bottom border-secondary">
                        <!-- Prominent Load Button -->
                        <button id="btn-load-alumni" class="btn btn-purple shadow-sm">Load Alumni Directory</button>

                        <!-- Bootstrap Loading Spinner (Initially hidden) -->
                        <div id="loading-spinner" class="spinner-border text-purple ms-3" role="status"
                            style="display: none; color: var(--electric-purple);">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    <!-- Error Alert Container -->
                    <div id="error-container"></div>

                    <!-- Data Container -->
                    <div class="row g-4" id="alumni-grid">
                        <!-- Fetched data will be injected here dynamically -->
                        <div class="col-12 text-center py-5" id="empty-state">
                            <p class="text-muted mb-0">Click the button above to fetch alumni data from the Random User
                                API.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- jQuery CDN (MUST INCLUDE) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom jQuery Logic for AJAX -->
    <script>
        $(document).ready(function () {

            // Reference DOM elements
            const $loadBtn = $('#btn-load-alumni');
            const $spinner = $('#loading-spinner');
            const $alumniGrid = $('#alumni-grid');
            const $errorContainer = $('#error-container');

            $loadBtn.click(function () {

                // Show the loading spinner and hide the empty state/error
                $spinner.show();
                $errorContainer.empty();

                // Clear any existing content inside #alumni-grid
                $alumniGrid.empty();

                // AJAX FETCH START
                $.ajax({
                    url: 'https://randomuser.me/api/?results=6',
                    method: 'GET',
                    dataType: 'json',

                    success: function (response) {
                        // Hide the loading spinner
                        $spinner.hide();

                        const users = response.results;

                        // DYNAMIC HTML INJECTION
                        users.forEach(function (user) {
                            // Extract necessary data
                            const imageUrl = user.picture.large;
                            const fullName = `${user.name.first} ${user.name.last}`;
                            const location = user.location.country;

                            // Construct dark-themed Bootstrap Card using template literals
                            const cardHtml = `
                                <div class="col-md-4 mb-4" style="display: none;">
                                    <div class="card alumni-card h-100">
                                        <img src="${imageUrl}" class="card-img-top" alt="${fullName}">
                                        <div class="card-body d-flex flex-column justify-content-center">
                                            <h5 class="card-title">${fullName}</h5>
                                            <p class="card-text">
                                                <small><i class="text-purple fw-bold">📍</i> ${location}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            `;

                            // Append card to grid (initially hidden by inline style)
                            const $cardElement = $(cardHtml);
                            $alumniGrid.append($cardElement);

                            // Smoothly reveal the data using jQuery .fadeIn(600)
                            $cardElement.fadeIn(600);
                        });
                    },

                    error: function (xhr, status, error) {
                        // Hide the spinner
                        $spinner.hide();

                        // Display a Bootstrap danger alert
                        const errorAlert = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #3b1414; border-color: #8f2929; color: #ffcccc;">
                                <strong>Error!</strong> Failed to load directory. Please try again.
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
                            </div>
                        `;
                        $errorContainer.html(errorAlert);

                        // Restore empty state text if the grid is empty
                        if ($alumniGrid.children().length === 0) {
                            $alumniGrid.html(`
                                <div class="col-12 text-center py-5" id="empty-state">
                                    <p class="text-danger mb-0">Failed to fetch data. Check console for details.</p>
                                </div>
                             `);
                        }
                    }
                });
                // AJAX FETCH END

            });
        });
    </script>

@endsection
