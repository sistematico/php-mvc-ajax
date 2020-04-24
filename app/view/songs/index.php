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
            <label for="artist" class="sr-only">Artist</label>
            <input name="artist" type="text" class="form-control" id="artist" placeholder="Artist">
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="track" class="sr-only">Track</label>
            <input name="track" type="text" class="form-control" id="track" placeholder="Track">
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="link" class="sr-only">Link</label>
            <input name="link" type="text" class="form-control" id="link" placeholder="Link">
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
                <th scope="col">Artist</th>
                <th scope="col">Track</th>
                <th scope="col">Link</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quotes as $quote) { ?>
            <tr>
                <th scope="row"><?php if (isset($quote->id)) echo htmlspecialchars($quote->id, ENT_QUOTES, 'UTF-8'); ?></th>
                <td><?php if (isset($quote->artist)) echo htmlspecialchars($quote->artist, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($quote->track)) echo htmlspecialchars($quote->track, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <?php if (isset($quote->link)) { ?>
                        <a href="<?php echo htmlspecialchars($quote->link, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><?php echo htmlspecialchars($quote->link, ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </td>
                <td><a onClick="javascript: return confirm('Are you sure you want to delete?');" href="<?php echo URL . 'quotes/delete/' . htmlspecialchars($quote->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-trash"></i></a></td>
                <td><a href="<?php echo URL . 'quotes/edit/' . htmlspecialchars($quote->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-edit"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <p>Quotes: <?php echo $amount; ?></small></p>
    <?php } ?>
</main>
