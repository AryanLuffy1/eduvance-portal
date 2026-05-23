<?php $__env->startSection('content'); ?>
<div class="card bg-dark border-secondary text-white">
    <div class="card-header border-secondary d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add New Assignment</h4>
        <a href="<?php echo e(route('assignments.index')); ?>" class="btn btn-sm btn-outline-light">Back to List</a>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('assignments.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
                <label for="title" class="form-label">Assignment Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-dark text-white border-secondary <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title" value="<?php echo e(old('title')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-dark text-white border-secondary <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="subject" name="subject" value="<?php echo e(old('subject')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control bg-dark text-white border-secondary <?php $__errorArgs = ['due_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="due_date" name="due_date" value="<?php echo e(old('due_date')); ?>" required>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select bg-dark text-white border-secondary <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" required>
                    <option value="pending" <?php echo e(old('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="completed" <?php echo e(old('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-purple px-4 py-2">Save Assignment</button>
        </form>
    </div>
</div>

<style>
    /* Dark theme fix for input date picker */
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/assignments/create.blade.php ENDPATH**/ ?>