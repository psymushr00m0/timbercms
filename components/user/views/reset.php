<div class="reset-container">
    <?php if (strlen($this->model->token) > 0) { ?>
        <form action="index.php?component=user&controller=reset&task=reset" method="post">
            <div class="frame">
                <div class="frame-3">
                    <strong>Password:</strong>
                </div>
                <div class="frame-9">
                    <input type="password" name="password" />
                </div>
            </div>
            <div class="frame">
                <div class="frame-3">
                    <strong>Password (again):</strong>
                </div>
                <div class="frame-9">
                    <input type="password" name="password_again" />
                </div>
            </div>
            <input type="hidden" name="token" value="<?php echo $this->model->token; ?>" />
            <button type="submit" class="burgundy-button"><i class="fa fa-users"></i> Reset Password</button>
        </form>
    <?php } else { ?>
        Sorry, but you have not supplied a reset token.
    <?php } ?>
</div>