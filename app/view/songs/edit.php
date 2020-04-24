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
            <label for="artist" class="sr-only">Artist</label>
            <input name="artist" type="text" class="form-control" id="artist" placeholder="Artist" value="<?php echo htmlspecialchars($quote->artist, ENT_QUOTES, 'UTF-8'); ?>" required />
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="track" class="sr-only">Track</label>
            <input name="track" type="text" class="form-control" id="track" placeholder="Track" value="<?php echo htmlspecialchars($quote->track, ENT_QUOTES, 'UTF-8'); ?>" required />
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="link" class="sr-only">Link</label>
            <input name="link" type="text" class="form-control" id="link" placeholder="Link" value="<?php echo htmlspecialchars($quote->link, ENT_QUOTES, 'UTF-8'); ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($quote->id, ENT_QUOTES, 'UTF-8'); ?>" />
        <button name="submit_update_quote" type="submit" class="btn btn-primary mb-2">Update</button>
    </form>
</main>

