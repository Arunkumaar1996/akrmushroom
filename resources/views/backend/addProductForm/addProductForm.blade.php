<div class="" id="vertical-example"  style="height: 80vh;">
    
 
<form method="post" action="{{route('admin.product.form.save')}}" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 input-group-sm">
                <label for="Category" class="form-label">Product Category</label>
                <select id="Category" name="Category" class="form-select">
                    <option selected>Choose...</option>
                    <option>Button Mushroom</option>
                    <option>Oyster Mushroom</option>
                </select>
            </div>
            <div class="col-md-12 input-group-sm">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="productName" id="productName">
                <div class="error1"></div>
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="weight" class="form-label">Pack Size (in Kg)</label>
                <input type="text" class="form-control" name="weight" id="weight">
                <div class="error1"></div>
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="price" class="form-label">Price (in Rs.)</label>
                <input type="text" class="form-control" name="price" id="price">
                <div class="error1"></div>
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="discount" class="form-label">Discount (%)</label>
                <input type="text" class="form-control" name="discount" id="discount">
                <div class="error1"></div>
            </div>
            <div class="col-md-12 input-group-sm">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" rows="3" name="description" class="form-control" id="description"></textarea>
            </div>
            <div class="col-md-6 input-group-sm">
                <label for="image1" class="form-label">Choose best Image 1</label>
                <input type="file" class="form-control" name="image1" id="image1">
            </div>
            <div class="col-md-6 input-group-sm">
                <label for="image2" class="form-label">Choose best Image 2</label>
                <input type="file" class="form-control" name="image2" id="image2">
            </div>
            <div class="col-md-6 input-group-sm">
                <label for="image3" class="form-label">Choose best Image 3</label>
                <input type="file" class="form-control" name="image3" id="image3">
            </div>
            <div class="d-grid gap-2 col-3 mx-auto mt-5">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

</div>