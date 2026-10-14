<?php
    $item = $item ?? null;
    $defaultCategory = $defaultCategory ?? 'other';
?>

<div>
    <label for="name" class="mb-1 block text-sm font-semibold">Name</label>
    <input id="name" name="name" value="<?php echo e(old('name', $item?->name)); ?>" class="w-full rounded-md border border-line px-3 py-2">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-tomato"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<div>
    <label for="category" class="mb-1 block text-sm font-semibold">Category</label>
    <select id="category" name="category" class="w-full rounded-md border border-line px-3 py-2">
        <?php $__currentLoopData = ['fruit' => 'Fruit', 'vegetable' => 'Vegetable', 'other' => 'Other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>" <?php if(old('category', $item?->category ?? $defaultCategory) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-tomato"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<div>
    <label for="image_path" class="mb-1 block text-sm font-semibold">Image</label>
    <input type="file" id="image_path" name="image_path" accept="image/*" class="w-full rounded-md border border-line px-3 py-2">
    <?php if($item?->image_path): ?>
        <p class="mt-2 text-sm text-muted">Current image: <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>" class="mt-1 h-20 w-auto rounded"></p>
    <?php else: ?>
        <?php if(!empty($item->icon)): ?>
            <p class="mt-2 text-sm text-muted">Icon: <span style="font-size: 24px"><?php echo e($item->icon); ?></span></p>
        <?php else: ?>
            <i class="fa-solid fa-image"></i>
        <?php endif; ?>
    <?php endif; ?>
    <?php $__errorArgs = ['image_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-tomato"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div>
    <label for="sort_order" class="mb-1 block text-sm font-semibold">Sort order</label>
    <input id="sort_order" name="sort_order" type="number" min="0" value="<?php echo e(old('sort_order', $item?->sort_order ?? 0)); ?>" class="w-full rounded-md border border-line px-3 py-2">
    <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-tomato"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div>
    <label for="status" class="mb-1 block text-sm font-semibold">Status</label>
    <select id="status" name="status" class="w-full rounded-md border border-line px-3 py-2">
        <?php if(empty($item?->status) && is_null($item?->status)): ?>
            <option value="1" selected>Active</option>
        <?php else: ?>
            <option value="1" <?php echo e(old('status', $item?->status) == 1 ? 'selected' : ''); ?>>Active</option>
            <option value="0" <?php echo e(old('status', $item?->status) == 0 ? 'selected' : ''); ?>>InActive</option>
        <?php endif; ?>

    </select>
    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-tomato"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<?php /**PATH C:\laragon\www\zahrat-al-madina\resources\views/admin/produce-items/_form.blade.php ENDPATH**/ ?>