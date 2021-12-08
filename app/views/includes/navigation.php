<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Home</a>
        </li>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == ADMINISTRATOR_ID) : ?>
            <li>
                <a href="<?php echo URLROOT; ?>/adminPanel">Panelė(A)</a>
            </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == ADMINISTRATOR_ID) : ?>
        <li>
            <a href="<?php echo URLROOT; ?>/verifyUsers">Nauji vartotojai</a>
        </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == LECTURER_ID) : ?>
            <li>
                <a href="<?php echo URLROOT; ?>/lecturerPanel">Panelė(L)</a>
            </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == STUDENT_ID) : ?>
            <li>
            <a href="<?php echo URLROOT; ?>/studentPanel">Panelė(S)</a>
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
