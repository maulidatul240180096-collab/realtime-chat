<nav class="navbar">

    <a href="<?php echo e(route('dashboard')); ?>" class="nav-item chatku">
        ChatKu
    </a>

    <a href="<?php echo e(route('contacts.index')); ?>" class="nav-item">
        Kontak Saya
    </a>

    <a href="<?php echo e(route('profile.index')); ?>" class="nav-item">
        Profil Saya
    </a>

    <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>

        <button class="logout-btn">
             Logout
        </button>
    </form>

</nav><?php /**PATH C:\realtime-chat\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>