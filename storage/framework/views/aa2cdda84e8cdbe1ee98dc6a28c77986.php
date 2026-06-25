<link rel="stylesheet" href="/css/chat.css">

<div class="chat-container">

    <div class="chat-header">
      <a href="<?php echo e(route('dashboard')); ?>" class="back-icon">
        ←
    </a>

    <div>

    <h3><?php echo e($user->name); ?></h3>

    <small>

        <?php if($user->last_seen && $user->last_seen->diffInMinutes(now()) < 1): ?>

             Online

        <?php else: ?>

             Offline
            <?php echo e($user->last_seen?->diffForHumans()); ?>


        <?php endif; ?>

    </small>

</div>

</div>

<div class="chat-box" id="chatBox">

<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($msg->sender_id == auth()->id()): ?>

        <!-- Pesan saya -->
        <div class="message-row me-row">

            <div class="chat-bubble me">

                <div class="message-text">
                    <?php echo e($msg->message); ?>

                </div>

                <div class="message-time">

                    <?php echo e($msg->created_at->format('H:i')); ?>


                    <?php if($msg->is_read): ?>
                        ✓✓
                    <?php else: ?>
                        ✓
                    <?php endif; ?>

                </div>

            </div>

            <form action="<?php echo e(route('message.destroy',$msg->id)); ?>"
                  method="POST"
                  class="delete-form"
                  onsubmit="return confirm('Hapus pesan ini?')">

                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button type="submit" class="delete-message">
                    🗑
                </button>

            </form>

        </div>

    <?php else: ?>

        <!-- Pesan lawan -->
        <div class="message-row other-row">

            <div class="chat-bubble other">

                <div class="message-text">
                    <?php echo e($msg->message); ?>

                </div>

                <div class="message-time">
                    <?php echo e($msg->created_at->format('H:i')); ?>

                </div>

            </div>

        </div>

    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

    <form class="chat-form" method="POST" action="/message/send">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="receiver_id" value="<?php echo e($user->id); ?>">

        <input type="text" name="message" placeholder="Tulis pesan..." required>

        <button type="submit">Kirim</button>
    </form>

<script>
window.onload = function() {
    let chatBox = document.getElementById('chatBox');
    chatBox.scrollTop = chatBox.scrollHeight;
}
</script>

</div><?php /**PATH C:\realtime-chat\resources\views/chat/show.blade.php ENDPATH**/ ?>