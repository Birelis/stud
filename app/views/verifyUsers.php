<div class='text-center m-5'>
   <h1>Nepatvirtintų vartotojų modulis</h1>
</div>

<div class='row text-center m-5'>
    <div class='col-3'></div>
    <div class='col-6'>
    <h1>Nauji vartotojai</h1> 
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Vardas Pavardė</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['userList'] as $item) { ?>
                   <tr>
                        <th><?php echo $item->UserId ?></th>
                        <th><?php echo $item->FullName ?></th>
                        <th>
                            <a href="<?php echo URLROOT; ?>/verifyUsers/deleteUser/<?php echo $item->UserId?>">Naikinti vartotoja |</a>
                            <a href="<?php echo URLROOT; ?>/verifyUsers/setRole/<?php echo ADMINISTRATOR_ID ?>/<?php echo $item->UserId?>">Paskirti administratoriumi |</a>
                            <a href="<?php echo URLROOT; ?>/verifyUsers/setRole/<?php echo LECTURER_ID ?>/<?php echo $item->UserId?>">Paskirti destytoju |</a>
                            <a href="<?php echo URLROOT; ?>/verifyUsers/setRole/<?php echo STUDENT_ID ?>/<?php echo $item->UserId?>">Paskirti studentu</a>
                        </th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class='col-3'></div>

</div>