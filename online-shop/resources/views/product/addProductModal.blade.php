<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/admin/products/manage/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">

                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="name">Product name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Select
                            </option>
                            <option value=1>Book
                            </option>
                            <option value=2>Cycle
                            </option>
                        </select>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="subcategory">Sub category</label>
                        <select name="subcategory" id="subcategory" class="form-control" required>
                            <option value="">Select
                            </option>
                            <option value=1>Book
                            </option>
                            <option value=2>Cycle
                            </option>
                        </select>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="price">Price</label>
                        <input type="number" min="1" class="form-control" name="price" id="price" required>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="description">Description</label>
                        <textarea type="text" name="description" id="description" class="md-textarea form-control" rows="4" required></textarea>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <label class="mt-5" for="thumbnail" class="form-label">Upload Thumbnail</label>
                        <input class="form-control" type="file" name="thumbnail" id="thumbnail" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-success" type="submit">Save product</button>
                </div>
        </form>
    </div>
</div>
</div>