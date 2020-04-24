<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quotes</li>
        </ol>
    </nav>

    <h1>Quotes</h1>

    <?php if (isset($result)) { ?>
        <div class="alert alert-primary" role="alert"><?php echo $result; ?></div>
    <?php } ?>

    <h3>Add a quote</h3>
    <form class="form-inline" action="<?php echo URL; ?>quotes/add" method="post">
        <div class="form-group mb-2 mr-2">
            <label for="quote" class="sr-only">Quote</label>
            <input name="quote" type="text" class="form-control" id="quote" placeholder="Quote">
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="author" class="sr-only">Author</label>
            <input name="author" type="text" class="form-control" id="author" placeholder="Author">
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="tags" class="sr-only">Tags</label>
            <input name="tags" type="text" class="form-control" id="tags" placeholder="Tags">
        </div>
        <button name="submit_add_quote" type="submit" class="btn btn-primary mb-2">Add</button>
    </form>

    <?php if (isset($quotes) && count($quotes) > 0) { ?>
    <h3>List</h3>
    <div class="table-responsive">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Quote</th>
                <th scope="col">Author</th>
                <th scope="col">Tags</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody id="results"></tbody>
    </table>
    </div>
    <p>Quotes: <?php echo $amount; ?></small></p>
    <?php } ?>

    <button id="list" class="btn btn-primary mb-2">List</button>
</main>
