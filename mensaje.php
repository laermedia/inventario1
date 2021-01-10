<?php if(!empty($messageFail)): ?>
    <div class="messageFail">
        <h1 class="msgIcon">!</h1><p class="text2Art"><?= $messageFail ?></p>
    </div>
<?php endif; ?>

<?php if(!empty($message)): ?>
    <div class="message">
        <h1 class="msgIcon">✓</h1><p class="text2Art"><?= $message ?></p>
    </div>
<?php endif; ?>