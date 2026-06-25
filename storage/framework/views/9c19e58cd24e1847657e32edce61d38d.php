<link rel="stylesheet" href="/css/dashboard.css">

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

<div class="dashboard-container">

    <form action="<?php echo e(route('dashboard')); ?>" method="GET">

    <input
        type="text"
        name="search"
        value="<?php echo e(request('search')); ?>"
        placeholder="🔍 Cari kontak..."
        class="search-box">

</form>
    <div class="chat-list">

        <?php $__empty_1 = true; $__currentLoopData = $chatList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <a href="<?php echo e(route('chat.show',$chat['user']->id)); ?>"
           class="chat-item">

           <div class="avatar">

    <?php if($chat['user']->photo): ?>

        <img src="<?php echo e(asset('storage/'.$chat['user']->photo)); ?>">

    <?php else: ?>

        <?php echo e(strtoupper(substr($chat['user']->name,0,1))); ?>


    <?php endif; ?>

</div>

   <div class="chat-info">

    <div class="chat-top">

        <div class="chat-name">
            <?php echo e($chat['user']->name); ?>

        </div>

        <div class="chat-right">

            <div class="chat-time">
                <?php echo e($chat['last_message']->created_at->format('H:i')); ?>

            </div>

            <?php if($chat['unread'] > 0): ?>

                <div class="unread-badge">
                    <?php echo e($chat['unread']); ?>

                </div>

            <?php endif; ?>

        </div>

    </div>

    <div class="chat-message">
        <?php echo e($chat['last_message']->message); ?>

    </div>

</div>

        </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="empty-chat">
                Belum ada chat

            </div>

        <?php endif; ?>

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
<?php endif; ?><?php /**PATH C:\realtime-chat\resources\views/dashboard.blade.php ENDPATH**/ ?>