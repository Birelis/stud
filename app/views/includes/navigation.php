<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Home</a>
        </li>
            <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == ADMINISTRATOR_ID) : ?>
                <li>
                    <a href="<?php echo URLROOT; ?>/adminPanel">Admin panel</a>
                </li>
            <?php elseif(isset($_SESSION['role_id']) && $_SESSION['role_id'] == LECTURER_ID) : ?>
                <li>
                    <a href="<?php echo URLROOT; ?>/lecturerPanel">Lecturer panel</a>
                </li>
                <?php elseif(isset($_SESSION['role_id']) && $_SESSION['role_id'] == STUDENT_ID) : ?>
                    <li>
                    <a href="<?php echo URLROOT; ?>/studentPanel">Student panel</a>
                </li>
                <?php endif; ?>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
