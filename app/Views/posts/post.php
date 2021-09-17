<?php include(APPPATH.'/Views/layouts/header.php'); ?>

<div class="row">
    <div class="col-md-8 offset-2">
        <h1>Show Post</h1>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($data as $d) {
            echo '<tr>
                <th scope="row">'.$d['id'].'</th>
                <td>'.$d["title"].'</td>
                <td>'.$d["body"].'</td>
                <td>'.$d["slug"].'</td>
            </tr>';            
            }
        ?>
        </tbody>
        </table>

    </div>
</div>
<?php include(APPPATH.'/Views/layouts/footer.php'); ?>