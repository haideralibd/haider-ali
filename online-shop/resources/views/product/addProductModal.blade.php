<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <label data-error="wrong" data-success="right" for="form34">Product name</label>
                    <input type="text" id="form34" class="form-control validate">
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form29">Category</label>
                    <select name="category" id="category_id" class="form-control" onchange="find_sub_category()">
                        <option value="">Select
                        </option>
                        <option value="Book">Book
                        </option>
                        <option value="Cycle">Cycle
                        </option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-tag prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form32">Sub category</label>
                    <select name="category" id="category_id" class="form-control" onchange="find_sub_category()">
                        <option value="">Select
                        </option>
                        <option value="Book">Book
                        </option>
                        <option value="Cycle">Cycle
                        </option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-tag prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form32">Price</label>
                    <input type="number" min="1" class="form-control" name="add_price" id="price">
                </div>

                <div class="md-form">
                    <i class="fas fa-pencil prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form8">Description</label>
                    <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                </div>
                
                <div class="md-form">
                    <i class="fas fa-pencil prefix grey-text"></i>
                    <label class="mt-5" for="formFile" class="form-label">Upload Thumbnail</label>
                    <input class="form-control" type="file" id="formFile">
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Save product</button>
            </div>
        </div>
    </div>
</div>