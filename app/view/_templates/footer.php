<footer class="footer">
    <div class="container">
        <span class="text-muted">
            Made with <i class="fas fa-heart"></i> by <a href="https://lucasbrum.net" target="_blank">Lucas</a> in <a href="https://pt.wikipedia.org/wiki/Terenos" target="_blank">Terenos</a>. <div class="d-none d-sm-inline">Sources on <a href="https://github.com/sistematico/php-mvc-ajax" target="_blank">Github</a>.
            Proudly hosted by <a href="https://www.owned-networks.net/client_area/aff.php?aff=11" target="_blank">Owned-Networks</a>.</div>
        </span>
    </div>
</footer>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Quote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addform">
                <div class="modal-body">                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quote">Quote <span class="field-required">*</span></label>
                                <input type="text" name="quote" id="quote" placeholder="Quote" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="author">Author <span class="field-required">*</span></label>
                                <input type="text" name="author" id="author" placeholder="Author" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tags">Tags <span class="field-required">*</span></label>
                                <input type="text" name="tags" id="tags" placeholder="Tags" class="form-control">
                            </div>
                        </div>
                    </div>               
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" value="" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addBtn" id="addBtn" class="btn btn-primary">
                        <i class="fa fa-spinner fa-spin" id="spinnerLoader"></i>
                        <span id="buttonLabel">Add</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Quote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editform">
                <div class="modal-body">                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="editquote">Quote <span class="field-required">*</span></label>
                                <input type="text" name="quote" id="editquote" placeholder="Quote" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="editauthor">Author <span class="field-required">*</span></label>
                                <input type="text" name="author" id="editauthor" placeholder="Author" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edittags">Tags <span class="field-required">*</span></label>
                                <input type="text" name="tags" id="edittags" placeholder="Tags" class="form-control">
                            </div>
                        </div>
                    </div>               
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="editid" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="editBtn" id="editBtn" class="btn btn-success">
                        <i class="fa fa-spinner fa-spin" id="spinnerLoader"></i>
                        <span id="buttonLabel">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo URL; ?>js/jquery.min.js"></script>
<script src="<?php echo URL; ?>js/bootstrap.bundle.min.js"></script>
<script>
    var url = "<?php echo URL; ?>";
</script>
<script src="<?php echo URL; ?>js/app.js"></script>
</body>
</html>