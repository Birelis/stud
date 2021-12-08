<div class='text-center m-5'>
   <h1 class=''>Studentas: <?php echo $data['user']->username ?>, Grupe: <?php echo $data['user']->Name ?></h1>
</div>

<div class='row m-5 text-center'>
    <div class='col-4'>
        <h1>Studentui Dėstomi dalykai <a class='add-button lecture' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/adminPanel/addUserLecture" method ="POST" class='lecture-form d-none'>
            <div class='row'>
                <div class='col-9'><input type="number" min='1' placeholder="Destomo dalyko id" name='lectureId'></div>
                <input type='hidden' name='userId' value="<?php echo $data['user']->UserId ?>">
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Dėstomo dalyko pavadinimas</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['userLectureList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->LectureUserId ?></th>
                        <th><?php echo $item->Name ?></th>
                        
                        <th> <a href="<?php echo URLROOT; ?>/adminPanel/deleteUserLecture/<?php echo $item->LectureUserId?>/<?php echo $data['user']->UserId ?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class='col-4'>
        <h1>Studento Pažymiai</h1> 
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Pažymys</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['gradesList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->GradeId ?></th>
                        <th><?php echo $item->Grade ?></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    let anchors = document.querySelectorAll('.add-button');
    
    anchors.forEach(a => {
    a.addEventListener('click', () => {
        // Different forms
        let form = '';
        if(a.className.includes('lecture')) form = document.querySelector('.lecture-form');

        if(form.classList.contains('d-none')) {
            form.classList.remove('d-none');
        }
        else {
            form.classList.add('d-none');
        }
    });
});
</script>