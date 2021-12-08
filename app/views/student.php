
<div class='text-center m-5'>
   <h1>Studento modulis</h1>
</div>

<div class='row m-5 text-center'>
    <div class="col-4"></div>
    <div class='col-4'>
        <h1>Jūsų mokomieji dalykai</h1> 
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Dalyko pavadinimas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['lecturesList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->LectureUserId ?></th>
                        <th><a href="<?php echo URLROOT; ?>/studentPanel/lecture/<?php echo $item->LectureId?>"><?php echo $item->Name ?></a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-4"></div>


</div>