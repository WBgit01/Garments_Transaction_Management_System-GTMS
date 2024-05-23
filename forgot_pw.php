<?php 
$page_title = 'forgot_pw';
include_once 'layout_head.php'; ?>

<div class="form_center">
    <div class="form_container">
        <i class="fa-solid fa-xmark form_close"></i>
        <h2 class="title">Reset Password</h2>
        <p class="descrip_fp">Please input the email that is used to sign in to the portal. You will receive an email containing instructions on how to reset your password.</p>
            <div class="input_box">
                <input type="email" name="email" placeholder="Enter your email">
                <i class="fa-regular fa-envelope email"></i>
            </div>
            <div class="input_group">
                <button class="btn1" button type="submit">Reset Sent</button>
        </form>
    </div>
</div>

<?php include_once 'layout_foot.php' ?>
