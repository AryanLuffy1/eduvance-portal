<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Assignment Tracker</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000000;
            color: #f8f9fa;
        }
        .sidebar {
            background-color: #5D3FD3;
            min-height: 100vh;
            padding: 20px;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        .sidebar a:hover {
            color: #dcdcdc;
        }
        .main-content {
            padding: 30px;
        }
        .text-purple {
            color: #5D3FD3 !important;
        }
        .bg-purple {
            background-color: #5D3FD3 !important;
            color: white;
        }
        .btn-purple {
            background-color: #5D3FD3;
            color: white;
            border: none;
        }
        .btn-purple:hover {
            background-color: #4a32a8;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <h3 class="mb-4">Student Portal</h3>
                <nav>
                    <a href="<?php echo e(route('assignments.index')); ?>">📋 Assignments</a>
                    <a href="<?php echo e(route('assignments.create')); ?>">➕ Add Assignment</a>
                    
                    <hr class="border-secondary mt-4 mb-3">
                    <h6 class="text-uppercase text-muted fw-bold mb-3 small px-2">Previous Labs</h6>
                    <a href="<?php echo e(route('labs.show', 2)); ?>" class="small">📊 Lab 2: Dashboard</a>
                    <a href="<?php echo e(route('labs.show', 3)); ?>" class="small">🔐 Lab 3: Portal</a>
                    <a href="<?php echo e(route('labs.show', 4)); ?>" class="small">🛡️ Lab 4: Privacy</a>
                    <a href="<?php echo e(route('labs.show', 5)); ?>" class="small">🪪 Lab 5: ID Gen</a>
                    <a href="<?php echo e(route('labs.show', 6)); ?>" class="small">📝 Lab 6</a>
                    <a href="<?php echo e(route('labs.show', 7)); ?>" class="small">📱 Lab 7</a>
                    <a href="<?php echo e(route('labs.show', 8)); ?>" class="small">🌐 Lab 8</a>
                    <a href="<?php echo e(route('labs.show', 9)); ?>" class="small">✉️ Lab 9: Forms</a>
                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 main-content">
                
                <!-- Display Success Message -->
                <?php if(session('success')): ?>
                    <div class="alert alert-dark border-success text-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Display Validation Errors -->
                <?php if($errors->any()): ?>
                    <div class="alert alert-dark border-danger text-danger alert-dismissible fade show" role="alert">
                        <strong>Whoops! Something went wrong.</strong>
                        <ul class="mb-0 mt-2">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/layouts/app.blade.php ENDPATH**/ ?>