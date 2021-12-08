<div class='text-center m-5'>
   <h1>Dalykas: <?php echo $data['lecture']->Name ?></h1>
</div>
<div class='row m-5 text-center'>
    <div class="col-4"></div>
    <div class='col-4'>
        <h1>Pažymiai</h1> 
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Pažymys</th>
                    <th scole='col'>Pridėjimo data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['gradeList'] as $item) { ?>
                   <tr>
                       <th><?php echo $item->GradeId ?></th>
                       <th><?php echo $item->Grade ?></th>
                       <th><?php echo $item->DateAdded ?></th>
                   </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-4"></div>
</div>