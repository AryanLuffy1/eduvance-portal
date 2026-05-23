<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Assignment Tracker</h2>
    <a href="<?php echo e(route('assignments.create')); ?>" class="btn btn-purple">Add New Assignment</a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover border-secondary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Subject</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($assignment->id); ?></td>
                    <td><?php echo e($assignment->title); ?></td>
                    <td><?php echo e($assignment->subject); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($assignment->due_date)->format('M d, Y')); ?></td>
                    <td>
                        <?php if($assignment->status == 'completed'): ?>
                            <span class="badge bg-success">Completed</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('assignments.edit', $assignment->id)); ?>" class="btn btn-sm btn-outline-light text-purple border-purple">Edit</a>
                        
                        <form action="<?php echo e(route('assignments.destroy', $assignment->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">No assignments found. Let's create one!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    .border-purple {
        border-color: #5D3FD3 !important;
    }
    .text-purple {
        color: #5D3FD3 !important;
    }
    .text-purple:hover {
        color: white !important;
        background-color: #5D3FD3 !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/assignments/index.blade.php ENDPATH**/ ?>