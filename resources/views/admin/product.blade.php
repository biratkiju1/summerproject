@include('admin.adminheaders')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Top Products</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewproduct">
             Add Product
            </button>
            <!-- The Modal -->
<div class="modal" id="addnewproduct">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{ URL::to('AddNewProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Title -->
    <label for="title">Title</label>
    <input type="text" name="name" placeholder="Enter Title" class="form-control mb-2" id="name" required>

    <!-- Price -->
    <label for="price">Price (Rs.)</label>
    <input type="text" name="price" placeholder="Enter Price (RS.)" class="form-control mb-2" id="price" required>

    <!-- Quantity -->
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" placeholder="Enter Quantity" class="form-control mb-2" id="quantity" required>

    <!-- Picture -->
    <label for="file">Picture</label>
    <input type="file" name="file" class="form-control mb-2" id="file" required>

    <!-- Description -->
    <label for="description">Description</label>
    <textarea name="description" placeholder="Enter Product Description" class="form-control mb-2" id="description" rows="4" required></textarea>

     <!-- Category Dropdown -->
     <label for="category">Category</label>
    <select name="category" class="form-control mb-2" id="category" required>
        <option value="" disabled selected>Select Category</option>
        <option value="Lipsticks & lip-Gloss">Lipsticks & lip-Gloss</option>
        <option value="Foundation & Highlighter">Foundation & Highlighter</option>
        <option value="Primer & Eye-primer">Primer & Eye-primer</option>
        <option value="Eye Liner">Eye Liner</option>
        <option value="Moisturizer">Moisturizer</option>
        <option value="Eye Shadow">Eye Shadow</option>
        <option value="Bronzer">Bronzer</option>
        <option value="Concealer">Concealer</option>
    </select>

    <!-- Type Dropdown -->
    <label for="type">Type</label>
    <select name="type" class="form-control mb-2" id="type" required>
        <option value="" disabled selected>Select Type</option>
        <option value="hot sales">Hot sales</option>
        <option value="new arrival">New Arrivals</option>
        <option value="sale">Sale</option>
    </select>

    <!-- Submit Button -->
    <input type="submit" name="save" value="Save now"class="btn btn-primary mt-2">
</form>

      </div>

    </div>
  </div>
</div>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Types</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($product as $item)
                    <tr>
                    <td>{{$item->name}}</td>
                    <td>
                    <img src="{{$item->image}}">
                    </td>
                    <td class="font-weight-bold">{{$item->description}}</td>
                    <td class="font-weight-bold">RS.{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td class="font-weight-medium">
                      <div class="badge badge-success">{{$item->category}}</div>
                    </td>
                    <td class="font-weight-medium">
                      <div class="badge badge-info">{{$item->type}}</div>
                    </td>
                  </tr>
                    @endforeach
                    
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
@include('admin.adminfooter')
