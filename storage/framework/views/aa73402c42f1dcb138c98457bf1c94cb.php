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

    <!-- CARD PROFIL -->
    <div class="profile-card">

        <div class="profile-avatar">

            <?php if(Auth::user()->photo): ?>
                <img src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>">
            <?php else: ?>
                <?php echo e(strtoupper(substr(Auth::user()->name,0,1))); ?>

            <?php endif; ?>

        </div>

        <div class="profile-name">
            <?php echo e(Auth::user()->name); ?>

        </div>

        <div class="profile-email">
            <?php echo e(Auth::user()->email); ?>

        </div>

        <div class="profile-status">
            <?php echo e(Auth::user()->status ?? 'Halo, saya menggunakan ChatKu ❤️'); ?>

        </div>

    </div>


    <!-- EDIT PROFIL -->
    <div class="profile-section">

        <h2>Edit Profil</h2>

        <form method="POST"
              action="<?php echo e(route('profile.update')); ?>"
              enctype="multipart/form-data">

            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>

            <div class="form-group">

                <label>Foto Profil</label>

                <input type="file" name="photo">

            </div>


            <div class="form-group">

                <label>Nama</label>

                <input
                    type="text"
                    name="name"
                    value="<?php echo e(Auth::user()->name); ?>"
                >

            </div>


            <div class="form-group">

                <label>Status</label>

                <input
                    type="text"
                    name="status"
                    value="<?php echo e(Auth::user()->status); ?>"
                >

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo e(Auth::user()->email); ?>"
                >

            </div>

            <button class="save-btn">

                Simpan Profil

            </button>

        </form>

    </div>


    <!-- UBAH PASSWORD -->
    <div class="profile-section">

        <h2>Ubah Password</h2>

        <form method="POST" action="<?php echo e(route('password.update')); ?>">

            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            <div class="form-group">

                <label>Password Lama</label>

                <input
                    type="password"
                    name="current_password"
                >

            </div>


            <div class="form-group">

                <label>Password Baru</label>

                <input
                    type="password"
                    name="password"
                >

            </div>


            <div class="form-group">

                <label>Konfirmasi Password Baru</label>

                <input
                    type="password"
                    name="password_confirmation"
                >

            </div>

            <button class="save-btn">

                Ubah Password

            </button>

        </form>

    </div>


    <!-- LOGOUT DAN HAPUS AKUN -->
    <div class="danger-zone">

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>

            <button class="logout-btn">

                Logout

            </button>

        </form>


        <form method="POST" action="<?php echo e(route('profile.destroy')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>

            <button class="delete-btn">

                Hapus Akun

            </button>

        </form>

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
<?php endif; ?><?php /**PATH C:\realtime-chat\resources\views/profile/edit.blade.php ENDPATH**/ ?>