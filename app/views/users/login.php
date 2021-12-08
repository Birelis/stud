
<div class="container-login">
    <div class="wrapper-login">
        <h2>Prisijungti</h2>

        <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
            <input type="text" placeholder="Slapyvardis *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

            <input type="password" placeholder="Slaptažodis *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Prisijungti</button>

            <p class="options">Neturite paskyros? <a href="<?php echo URLROOT; ?>/users/register">Susikurikite paskyra!</a></p>
        </form>
    </div>
</div>
