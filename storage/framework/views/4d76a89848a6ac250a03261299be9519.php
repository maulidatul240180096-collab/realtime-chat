<link rel="stylesheet" href="/css/contact.css">

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

<div class="contact-container">
<div class="contact-header">

    <h1 class="contact-title">
        Kontak Anda
    </h1>

    <div class="contact-actions">

        <a href="<?php echo e(route('dashboard')); ?>"
           class="back-btn">

            ← Menu

        </a>

        <a href="<?php echo e(route('contacts.create')); ?>"
           class="add-contact-btn">

            + Tambah Kontak

        </a>

    </div>

</div>

    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="contact-card">

            <div class="avatar">
                <?php echo e(strtoupper(substr($contact->contact_name,0,1))); ?>

            </div>

            <div class="contact-info">

                <div class="contact-name">
                    <?php echo e($contact->contact_name); ?>

                </div>

                <div class="contact-phone">
                    <?php echo e($contact->contact_phone); ?>

                </div>

                <?php if($contact->registeredUser): ?>

                    <div class="status online">
                        🟢 Pengguna Terdaftar
                    </div>

                    <a href="<?php echo e(route('chat.show',$contact->registeredUser->id)); ?>"
                       class="chat-btn">

                        Chat

                    </a>

                <?php else: ?>

                    <div class="status offline">
                        ⚫ Belum Terdaftar
                    </div>

                <?php endif; ?>

            </div>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php endif; ?><?php /**PATH C:\realtime-chat\resources\views/contacts/index.blade.php ENDPATH**/ ?>