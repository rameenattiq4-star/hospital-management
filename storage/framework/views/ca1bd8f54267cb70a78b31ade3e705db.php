

<?php $__env->startSection('content'); ?>

<div style="max-width: 800px; margin: 40px auto; background: white; padding: 40px; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); border: 1px solid #e2e8f0;">

    <h2 style="color: #0284c7; font-size: 24px; margin-bottom: 5px;">➕ Add New Hospital</h2>
    <p style="color: #64748b; font-size: 13px; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 2px solid #0284c7;">
        Fill in the details below to add a new hospital to the system.
    </p>

    
    <?php if($errors->any()): ?>
        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 15px 20px; border-radius: 10px; margin-bottom: 25px;">
            <ul style="margin: 0; padding-left: 20px; font-size: 13px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="margin-bottom: 4px;">⚠️ <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(url('hospital/create')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

            <div>
                <label style="display: block; font-weight: 700; font-size: 12px; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                    Full Name <span style="color: red;">*</span>
                </label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                    placeholder="Enter full name"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; outline: none; background: #f8fafc;">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label style="display: block; font-weight: 700; font-size: 12px; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                    Email Address <span style="color: red;">*</span>
                </label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                    placeholder="Enter email address"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; outline: none; background: #f8fafc;">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

            <div>
                <label style="display: block; font-weight: 700; font-size: 12px; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                    Age <span style="color: red;">*</span>
                </label>
                <input type="number" name="age" value="<?php echo e(old('age')); ?>"
                    placeholder="Enter age"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; outline: none; background: #f8fafc;">
                <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label style="display: block; font-weight: 700; font-size: 12px; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                    Date of Birth <span style="color: red;">*</span>
                </label>
                <input type="date" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; outline: none; background: #f8fafc;">
                <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

            <div>
                <label style="display: block; font-weight: 700; font-size: 12px; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                    Gender <span style="color: red;">*</span>
                </label>
                <select name="gender" required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; outline: none; background: #f8fafc;">
                    <option value="">-- Select Gender --</option>
                    <option value="m" <?php echo e(old('gender') == 'm' ? 'selected' : ''); ?>>Male</option>
                    <option value="f" <?php echo e(old('gender') == 'f' ? 'selected' : ''); ?>>Female</option>
                </select>
                <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label style="display: block; font-weight: 700; font-size: 12px; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                    Score
                </label>
                <input type="number" name="score" value="<?php echo e(old('score')); ?>"
                    placeholder="Enter score (0-100)"
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; outline: none; background: #f8fafc;">
                <?php $__errorArgs = ['score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 700; font-size: 12px; color: #475569; margin-bottom: 6px; text-transform: uppercase;">
                Hospital Image
            </label>
            <input type="file" name="image" accept="image/*"
                style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; background: #f8fafc;">
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color: #ef4444; font-size: 11px; margin-top: 5px;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit"
                style="background: linear-gradient(135deg, #0284c7, #0369a1); color: white; padding: 13px 32px; border: none; border-radius: 10px; font-size: 14px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);">
                💾 Save Hospital
            </button>
            <a href="<?php echo e(url('hospital')); ?>"
                style="background: #f1f5f9; color: #475569; padding: 13px 28px; border-radius: 10px; text-decoration: none; font-size: 14px; font-weight: 700;">
                ← Cancel
            </a>
        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\hospitalManagement\resources\views/hospital/add.blade.php ENDPATH**/ ?>