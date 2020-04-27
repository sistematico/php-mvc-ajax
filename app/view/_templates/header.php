<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP MVC AJAX</title>
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo URL; ?>css/main.css">
    <link rel="shortcut icon" href="<?php echo URL; ?>img/favicon.ico">
    <style>#spinnerLoader{
    display: none;
}</style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo URL; ?>">PHP MVC AJAX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>pages/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>pages/credits">Credits</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="btn btn-info mr-2 my-2 my-sm-0">List</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary mr-2 my-2 my-sm-0" data-toggle="modal" data-target="#addModal">Add</button>
                    </li>
                    <li class="nav-item">
                        <button href="javaScript:void(0)" onclick="populate();" type="button" class="btn btn-warning mr-2 my-2 my-sm-0">Populate</button>
                    </li>
                    <li class="nav-item">
                        <button href="javaScript:void(0)" onclick="prune();" type="button" class="btn btn-danger my-2 my-sm-0">Prune</button>
                    </li>
                </ul>
                <form id="searchform" class="form-inline my-2 my-lg-0">
                    <input id="term" name="term" class="form-control mr-sm-2" type="text" placeholder="Search a quote" aria-label="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

<!-- Toast -->
<!-- <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;"> -->
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" style="position: fixed; bottom: 65px; left: 20px;">
    <div class="toast-header">
        <!-- <img src="..." class="rounded mr-2" alt="..."> -->
        <strong class="mr-auto">PHP MVC</strong>
        <small>now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body"></div>
</div>
<!-- </div> -->