
<div class='text-center m-5'>
   <h1 class=''>Administratoriaus modulis</h1>
</div>

<div class='row m-5 text-center'>
    <div class='col'>
        <h1>Studentų Grupės <a class='add-button groups' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/adminPanel/addGroup" method ="POST" class='group-form d-none'>
            <div class='row'>
                <div class='col-9'><input type="text" placeholder="Grupes Pavadinimas" name='Name'></div>
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Grupės Pavadinimas</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['groupList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->GroupId ?></th>
                        <th><?php echo $item->Name ?></th>
                        
                        <th> <a href="<?php echo URLROOT; ?>/adminPanel/deleteGroup/<?php echo $item->GroupId?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class='col'>
        <h1>Dėstomi dalykai <a class='add-button lecture' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/adminPanel/addLecture" method ="POST" class='lecture-form d-none'>
            <div class='row'>
                <div class='col-9'><input type="text" placeholder="Dalyko pavadinimas" name='Name'></div>
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered  text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Dalyko Pavadinimas</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['lectureList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->LectureId ?></th>
                        <th><?php echo $item->Name ?></th>
                        
                        <th> <a href="<?php echo URLROOT; ?>/adminPanel/deleteLecture/<?php echo $item->LectureId?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class='col'>
        <h1>Dėstytojai <a class='add-button lecturer' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/adminPanel/addLecturer" method ="POST" class='lecturer-form d-none'>
            <div class='row'>
                <div class='col-3'><input type="text" placeholder="Destytojo vardas" name='firstName'></div>
                <div class='col-3'><input type="text" placeholder="Destytojo Pavardė" name='lastName'></div>
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered  text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Vardas Pavardė</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['lecturersList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->UserId ?></th>
                        <th><a href="<?php echo URLROOT; ?>/adminPanel/lecturer/<?php echo $item->UserId ?>"><?php echo $item->FullName ?></a></th>
                        <th> <a href="<?php echo URLROOT; ?>/adminPanel/deleteUser/<?php echo $item->UserId?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class='col'>
        <h1>Studentai <a class='add-button student' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/adminPanel/addStudent" method ="POST" class='student-form d-none'>
            <div class='row'>
                <div class='col-3'><input type="text" placeholder="Studento vardas" name='firstName'></div>
                <div class='col-3'><input type="text" placeholder="Studento Pavardė" name='lastName'></div>
                <div class='col-3'><input type="number" min='1' placeholder="Studentu grupė(id)" name='groupId'></div>
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered  text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Vardas Pavardė</th>
                    <th scope='col'>Studentų Grupė</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['userList'] as $item) { ?>
                    <tr>
                        <th><?php echo $item->UserId ?></th>
                        <th><a href='<?php echo URLROOT; ?>/adminPanel/student/<?php echo $item->UserId ?>'><?php echo $item->FullName ?></a></th>
                        <th><?php echo $item->Name ?></th>
                        <th> <a href="<?php echo URLROOT; ?>/adminPanel/deleteUser/<?php echo $item->UserId?>">Trinti</a></th>
                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>


<script>
    let anchors = document.querySelectorAll('.add-button');
    
        anchors.forEach(a => {
        a.addEventListener('click', () => {
            // Different forms
            let form = '';
            if(a.className.includes('student')) form = document.querySelector('.student-form');
            else if(a.className.includes('lecturer')) form = document.querySelector('.lecturer-form')
            else if(a.className.includes('group')) form = document.querySelector('.group-form')
            else if(a.className.includes('lecture')) form = document.querySelector('.lecture-form')



            if(form.classList.contains('d-none')) {
                form.classList.remove('d-none');
            }
            else {
                form.classList.add('d-none');
            }
        });
    });
</script>