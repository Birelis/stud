<div class="container-login">
    <div class="wrapper-login">
        <h2>Registruotis</h2>

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/register"
                >

                <input type="text" placeholder="Vardas *" name="firstName">
            <span class="invalidFeedback">
                <?php echo $data['firstNameError']; ?>
            </span>

            <input type="text" placeholder="Pavardė *" name="lastName">
            <span class="invalidFeedback">
                <?php echo $data['lastNameError']; ?>
            </span>
            <input type="text" placeholder="Slapyvardis *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

            <input type="email" placeholder="El. Paštas *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>

            <input type="password" placeholder="Slaptažodis *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Pakartokite slaptažodį *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Registruotis</button>

            <p class="options">Prisiregistravęs? <a href="<?php echo URLROOT; ?>/users/login">Prisijunkite!</a></p>
        </form>
    </div>
</div>
