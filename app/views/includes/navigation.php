<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Pagrindinis</a>
        </li>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == ADMINISTRATOR_ID) : ?>
            <li>
                <a href="<?php echo URLROOT; ?>/adminPanel">Panėlė(A)</a>
            </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == ADMINISTRATOR_ID) : ?>
        <li>
            <a href="<?php echo URLROOT; ?>/verifyUsers">Nauji vartotojai</a>
        </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == LECTURER_ID) : ?>
            <li>
                <a href="<?php echo URLROOT; ?>/lecturerPanel">Panėlė(D)</a>
            </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == STUDENT_ID) : ?>
            <li>
            <a href="<?php echo URLROOT; ?>/studentPanel">Panėlė(S)</a>
        </li>
        <?php endif; ?>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Atsijungti</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Prisijungti</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
