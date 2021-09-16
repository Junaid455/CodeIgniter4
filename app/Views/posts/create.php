<?php include(APPPATH.'/Views/layouts/header.php'); ?>

<div class="row">
    <div class="col-md-8 offset-2">
        <h1>Create New Post</h1>
        <?= \Config\Services::validation()->listErrors(); ?>
        <form method="post" action="/post/create" enctype='mulitpart/form-data' >
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Post Title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <input type="text" class="form-control" name="body" id="body" placeholder="Post Body">
            </div>
                <div class="form-group">
                    <label for="thumbnail">Image</label>
                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" placeholder="New Post">
                </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php include(APPPATH.'/Views/layouts/footer.php'); ?>