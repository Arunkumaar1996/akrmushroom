<div class="" id="vertical-edit"  style="height: 80vh;">
        <form method="post" action="{{url('admin/product/form/edit/store')}}/{{$datas->id}}" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="col-md-12 input-group-sm">
                <label for="Category" class="form-label">Product Category</label>
                <select id="Category" name="Category" class="form-select">
                    <option selected>{{$datas->Category}}</option>
                    <option>Button Mushroom</option>
                    <option>Oyster Mushroom</option>
                </select>
            </div>
            <div class="col-md-12 input-group-sm" >
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" value="{{$datas->productName}}" class="form-control" name="productName" id="productName">
                <div class="error1"></div>
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="weight" class="form-label">Pack Size (in Kg)</label>
                <input type="text" value="{{$datas->weight}}" class="form-control" name="weight" id="weight">
                <div class="error1"></div>
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="price" class="form-label">Product Price (in Rs.)</label>
                <input type="text" value="{{$datas->price}}" class="form-control" name="price" id="price">
                <div class="error1"></div>
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="discount" class="form-label">Product Discount (%)</label>
                <input type="text" value="{{$datas->discount}}" class="form-control" name="discount" id="discount">
                <div class="error1"></div>
            </div>
            <div class="col-md-12 input-group-sm">
                <label for="description" class="form-label">Product Description</label>
                <textarea type="text" value="{{$datas->description}}" rows="3" name="description" class="form-control" id="description">{{$datas->description}}</textarea>
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="image1" class="form-label">Choose best Image 1</label>
                <input type="file" value="{{$datas->image_url1}}" class="form-control" name="image1" id="image1">
                <img src="{{asset('onlineAuction/images/'.$datas->image_url1)}}" width="100px" height="100px" alt="" srcset="">
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="image2" class="form-label">Choose best Image 2</label>
                <input type="file" value="{{$datas->image_url2}}" class="form-control" name="image2" id="image2">
            </div>
            <div class="col-md-4 input-group-sm">
                <label for="image3" class="form-label">Choose best Image 3</label>
                <input type="file" value="{{$datas->image_url3}}" class="form-control" name="image3" id="image3">
            </div>
            <div class="d-grid gap-2 col-3 mx-auto mt-5">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>
    </div>