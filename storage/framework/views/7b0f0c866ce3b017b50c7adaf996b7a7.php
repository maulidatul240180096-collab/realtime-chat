<link rel="stylesheet" href="/css/profile.css">

<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<div class="profile-container">

    <div class="profile-card">

        <div class="profile-avatar">

    <?php if(auth()->user()->photo): ?>

        <img src="<?php echo e(asset('storage/' . auth()->user()->photo)); ?>">

    <?php else: ?>

        <?php echo e(strtoupper(substr(auth()->user()->name,0,1))); ?>


    <?php endif; ?>

</div>

        <div class="profile-name">

            <?php echo e(auth()->user()->name); ?>


        </div>

        <div class="profile-phone">

            <?php echo e(auth()->user()->phone); ?>


        </div>

        <div class="profile-email">

            <?php echo e(auth()->user()->email); ?>


        </div>

        <div class="profile-bio">

    <?php echo e(auth()->user()->status ?? 'Halo, saya menggunakan ChatKu ❤️'); ?>


</div>
        <div class="profile-menu">

            <a href="<?php echo e(route('profile.edit.my')); ?>"
               class="menu-btn">

                 Edit Profil

            </a>

        </div>

    </div>

</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\realtime-chat\resources\views/profile/index.blade.php ENDPATH**/ ?>