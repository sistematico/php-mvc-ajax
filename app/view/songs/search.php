<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>quotes">Quotes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search</li>
        </ol>
    </nav>

    <h1>Search</h1>

    <?php if (isset($result) && count($result) > 0) { ?>
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
            <?php foreach ($result as $quote) { ?>
            <tr>
                <th scope="row"><?php if (isset($quote['id'])) echo htmlspecialchars($quote['id'], ENT_QUOTES, 'UTF-8'); ?></th>
                <td><?php if (isset($quote['artist'])) echo htmlspecialchars($quote['artist'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($quote['track'])) echo htmlspecialchars($quote['track'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <?php if (isset($quote['link'])) { ?>
                        <a href="<?php echo htmlspecialchars($quote['link'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><?php echo htmlspecialchars($quote['link'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </td>
                <td><a onClick="javascript: return confirm('Are you sure you want to delete?');" href="<?php echo URL . 'quotes/delete/' . htmlspecialchars($quote['id'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-trash"></i></a></td>
                <td><a href="<?php echo URL . 'quotes/edit/' . htmlspecialchars($quote['id'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-edit"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
                    <?php } else { ?>
                        <p>Nenhum resultado.</p>
                    <?php } ?>
</main>
