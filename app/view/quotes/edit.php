<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>quotes">Quotes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <h1>Quotes</h1>
    <h3>Edit a quote</h3>

    <form class="form-inline" action="<?php echo URL; ?>quotes/update" method="post">
        <div class="form-group mb-2 mr-2">
            <label for="quote" class="sr-only">Quote</label>
            <input name="quote" type="text" class="form-control" id="quote" placeholder="Quote" value="<?php echo htmlspecialchars($quote->quote, ENT_QUOTES, 'UTF-8'); ?>" required />
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="author" class="sr-only">Author</label>
            <input name="author" type="text" class="form-control" id="author" placeholder="Author" value="<?php echo htmlspecialchars($quote->author, ENT_QUOTES, 'UTF-8'); ?>" required />
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="tags" class="sr-only">Tags</label>
            <input name="tags" type="text" class="form-control" id="tags" placeholder="tags" value="<?php echo htmlspecialchars($quote->tags, ENT_QUOTES, 'UTF-8'); ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($quote->id, ENT_QUOTES, 'UTF-8'); ?>" />
        <button name="submit_update_quote" type="submit" class="btn btn-primary mb-2">Update</button>
    </form>
</main>

