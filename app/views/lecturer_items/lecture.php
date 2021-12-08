<div class='text-center m-5'>
   <h1>Dalykas: <?php echo $data['lecture']->Name?></h1>
</div>
<div class='row m-5 text-center'>
    <div class="col-4"></div>
    <div class='col-4'>
        <h1>Dalyko studentai</h1> 
        <form action="<?php echo URLROOT; ?>/lecturerPanel/addGrade" method ="POST" class='grade-form d-none'>
            <input type="hidden" name='lectureId' value='<?php echo $data['lecture']->LectureId ?>'>
            <input type="hidden" name='userId' value=''>
            <div class='row'>
                <div class='col-9'><input style="width: 100%" type="number" min='1' max='10' placeholder="Pažymys" name='grade'></div>
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Studento Vardas Pavardė</th>
                    <th scole='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['studentList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->LectureUserId ?></th>
                        <th><a href='<?php echo URLROOT; ?>/lecturerPanel/student/<?php echo $item->UserId ?>'><?php echo $item->FullName ?></a></th>
                        <th><a href="javascript:;" class='add-button grade' data-id="<?php echo $item->UserId ?>">Pridėti pažymį</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-4"></div>
</div>


<script>
    let anchors = document.querySelectorAll('.add-button');
    
        anchors.forEach(a => {
        a.addEventListener('click', () => {
            let form = '';
            if(a.className.includes('grade')) form = document.querySelector('.grade-form');

            if(form.classList.contains('d-none')) {
                form.classList.remove('d-none');

                let userInput = document.querySelector('input[name="userId"]');
                userInput.value = a.getAttribute('data-id');
            }
            else {
                form.classList.add('d-none');
            }
        });
    });
</script>
