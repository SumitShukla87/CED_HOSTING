<?php require "sidebar.php";?>
<div class="main-content" id="panel">
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">
                            Default
                        </h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="fas fa-home">
                                        </i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="dashboard.php">Dashboards</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Create Category
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
                <!-- -->
            </div>
        </div>
    </div>
    <div class="container pt-5 mt-5 pl-5 pr-5 mb-5 pb-5">
        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Choose Category</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Add Sub-Category</label>
                <input class="form-control" type="text" placeholder="Enter Sub-Category Here" id="example-text-input">
            </div>
            <input type="submit" class="btn btn-outline-danger" value="Add-Sub-category">
        </form>
    </div>

<?php require "footer.php";?>