<div class='row m-5 text-center'>
    <div class='col'>
        <h1>Studentu Grupes <a class='add-button groups' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/admin/addGroup" method ="POST" class='group-form d-none'>
            <div class='row'>
                <div class='col-9'><input type="text" placeholder="Grupes Pavadinimas" name='Name'></div>
                <div class='col-3'><input type='submit'></div>
            </div>
        </form>
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Grupes Pavadinimas</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['groupList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->GroupId ?></th>
                        <th><?php echo $item->Name ?></th>
                        
                        <th> <a href="<?php echo URLROOT; ?>/admin/deleteGroup/<?php echo $item->GroupId?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class='col'>
        <h1>Destomi dalykai <a class='add-button lecture' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/admin/addLecture" method ="POST" class='lecture-form d-none'>
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
                        
                        <th> <a href="<?php echo URLROOT; ?>/admin/deleteLecture/<?php echo $item->LectureId?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class='col'>
        <h1>Destytojai <a class='add-button lecturer' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/admin/addLecturer" method ="POST" class='lecturer-form d-none'>
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
                    <th scope='col'>Vardas Pavarde</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['lecturersList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->UserId ?></th>
                        <th><a href="<?php echo URLROOT; ?>/lecturer/<?php echo $item->UserId ?>"><?php echo $item->username ?></a></th>
                        <th> <a href="<?php echo URLROOT; ?>/admin/deleteUser/<?php echo $item->UserId?>">Trinti</a></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class='col'>
        <h1>Studentai <a class='add-button student' href="javascript:;"><i class='fas fa-bars'></i></a></h1> 
        <form action="<?php echo URLROOT; ?>/admin/addStudent" method ="POST" class='student-form d-none'>
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
                    <th scope='col'>Vardas Pavarde</th>
                    <th scope='col'>Studentu Grupe</th>
                    <th scope='col'>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['userList'] as $item) { ?>
                    <tr>
                        <th><?php echo $item->UserId ?></th>
                        <th><a href='<?php echo URLROOT; ?>/student/<?php echo $item->UserId ?>'><?php echo $item->username ?></a></th>
                        <th><?php echo $item->Name ?></th>
                        <th> <a href="<?php echo URLROOT; ?>/admin/deleteUser/<?php echo $item->UserId?>">Trinti</a></th>
                    
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