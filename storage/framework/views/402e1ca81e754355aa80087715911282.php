<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Produce']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Produce']); ?>
    <div class="mb-6 flex flex-wrap gap-3">
        <a href="<?php echo e(route('admin.produce-items.create', ['category' => 'fruit'])); ?>" class="inline-flex items-center gap-2 rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark">
            <i class="fa-solid fa-plus"></i> Add Fruit
        </a>
        <a href="<?php echo e(route('admin.produce-items.create', ['category' => 'vegetable'])); ?>" class="inline-flex items-center gap-2 rounded-md bg-teal px-4 py-2 text-sm font-semibold text-white hover:bg-teal-dark">
            <i class="fa-solid fa-plus"></i> Add Vegetable
        </a>
        <a href="<?php echo e(route('admin.produce-items.create', ['category' => 'other'])); ?>" class="inline-flex items-center gap-2 rounded-md bg-muted/30 px-4 py-2 text-sm font-semibold text-ink hover:bg-muted/50">
            <i class="fa-solid fa-plus"></i> Add Other
        </a>
    </div>

    <?php $__currentLoopData = [['Fruits', $fruits, 'fruit'], ['Vegetables', $vegetables, 'vegetable'], ['Other', $others, 'other']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$sectionTitle, $sectionItems, $sectionCategory]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-6">
            <h2 class="mb-2 font-serif text-lg font-semibold"><?php echo e($sectionTitle); ?></h2>
            <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-line">
                <table class="w-full text-left text-sm">
                    <thead class="bg-mist text-muted">
                        <tr>
                            <th class="px-4 py-3 font-medium">Image</th>
                            <th class="px-4 py-3 font-medium">Name</th>
                            <th class="px-4 py-3 font-medium">Status</th>
                            <th class="px-4 py-3 font-medium"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $sectionItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-t border-line">
                                <td class="px-4 py-3">
                                    <?php if($item->image_path): ?>
                                        <img src="<?php echo e(asset($item->image_path)); ?>" alt="<?php echo e($item->name); ?>" class="h-10 w-10 rounded object-cover">
                                    <?php else: ?>
                                        <span class="flex h-10 w-10 items-center justify-center rounded bg-mist text-xl text-muted">
                                          <?php if($item->icon): ?>
                                                <?php echo e($item->icon); ?>

                                            <?php else: ?>
                                            <i class="fa-solid fa-image"></i>
                                            <?php endif; ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 font-semibold"><?php echo e($item->name); ?></td>
                                <td class="px-4 py-3">
                                    <?php if($item->status == 1): ?>
                                        <span style="display:inline-block; padding:4px 10px; background-color:#dcfce7; color:#15803d; border-radius:9999px; font-size:12px; font-weight:600;">
            Active
        </span>
                                    <?php else: ?>
                                        <span style="display:inline-block; padding:4px 10px; background-color:#fee2e2; color:#b91c1c; border-radius:9999px; font-size:12px; font-weight:600;">
            Inactive
        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="<?php echo e(route('admin.produce-items.edit', $item)); ?>" class="font-semibold text-teal-dark hover:underline"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                                    <form method="POST" action="<?php echo e(route('admin.produce-items.destroy', $item)); ?>" class="ml-3 inline" onsubmit="return confirm('Remove this produce item?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="font-semibold text-tomato hover:underline"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td class="px-4 py-6 text-muted" colspan="4">No <?php echo e(strtolower($sectionTitle)); ?> yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\zahrat-al-madina\resources\views/admin/produce-items/index.blade.php ENDPATH**/ ?>