<div class='text-center m-5'>
   <h1>Studentas: <?php echo $data['student']->FullName ?></h1>
</div>
<div class='row m-5 text-center'>
    <div class="col-4"></div>
    <div class='col-4'>
        <h1>Studento pažymiai</h1> 
        <form action="<?php echo URLROOT; ?>/lecturerPanel/editGrade" method ="POST" class='grade-form d-none'>
            <input type="hidden" name='gradeId' value=''>
            <input type="hidden" name='userId' value='<?php echo $data['student']->UserId ?>'>

            <div class='row'>
                <div class='col-9'><input style="width: 100%" type="number" min='1' max='10' placeholder="Naujas pažymys" name='grade'></div>
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Pažymys</th>
                    <th scole='col'>Pridėjimo data</th>
                    <th scole="col">Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['gradeList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->GradeId ?></th>
                       <th><?php echo $item->Grade ?></th>
                       <th><?php echo $item->DateAdded ?></th>
                       <th>
                            <a href="javascript:;" data-id="<?php echo $item->GradeId ?>" class='add-button grade'>Redaguoti | </a> 
                            <a href="<?php echo URLROOT ?>/lecturerPanel/deleteGrade/<?php echo $item->GradeId ?>/<?php echo $item->UserId ?>">Trinti</a>
                    </th>
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

                let userInput = document.querySelector('input[name="gradeId"]');
                userInput.value = a.getAttribute('data-id');
            }
            else {
                form.classList.add('d-none');
            }
        });
    });
</script>