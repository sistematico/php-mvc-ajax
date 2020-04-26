<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quotes</li>
        </ol>
    </nav>

    <h1>Quotes</h1>

    <div id="result" class="alert alert-primary" role="alert" style="display:none"></div>

    <button href="javaScript:void(0)" onclick="list();" class="btn btn-info mb-2">List Quotes</button>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addModal">Add Quote</button>
    <button href="javaScript:void(0)" onclick="populate();" type="button" class="btn btn-warning mb-2">Populate Quotes</button>
    <button href="javaScript:void(0)" onclick="prune();" type="button" class="btn btn-danger mb-2">Prune Quotes</button>

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
        <tbody></tbody>
    </table>
    </div>

    <div id="results"></div>

    <p><small id="amount"></small></p>
</main>
