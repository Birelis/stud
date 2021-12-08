<div class='text-center m-5'>
   <h1>Destytojas: <?php echo $data['user']->username ?></h1>
</div>

<div class='row m-5 text-center'>
    <div class='col-4'></div>
    <div class='col-4'>
        <h1>Priskirti dėstomi dalykai <a class='add-button lectures' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/adminPanel/addLecturerLecture" method ="POST" class='lectures-form d-none'>
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
                <?php foreach($data['lecturesList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->LectureLecturerId ?></th>
                        <th><?php echo $item->Name ?></th>
                        
                        <th> <a href="<?php echo URLROOT; ?>/adminPanel/deleteLecturerLecture/<?php echo $item->LectureLecturerId?>/<?php echo $data['user']->UserId ?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class='col-4'></div>

</div>

<script>
    let anchors = document.querySelectorAll('.add-button');
    
    anchors.forEach(a => {
        a.addEventListener('click', () => {
            // Different forms
            let form = '';
            if(a.className.includes('lectures')) form = document.querySelector('.lectures-form');

            if(form.classList.contains('d-none')) {
                form.classList.remove('d-none');
            }
            else {
                form.classList.add('d-none');
            }
        });
    });
</script>