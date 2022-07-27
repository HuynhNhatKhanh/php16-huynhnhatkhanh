<div class="card mb-4">
            <div class="card-body d-flex justify-content-between">
                <a href="../index.php" class="btn btn-primary m-0">Back to website</a>
                <a href="logout.php" class="btn btn-info m-0">Logout</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Enter search keyword...."
                            value="">
                        <div class="input-group-append">
                            <button type="submit"
                                class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect"
                                type="button">Search</button>
                            <a href="list.php"
                                class="btn btn-md btn-outline-danger m-0 px-3 py-2 z-depth-0 waves-effect"
                                type="button">Clear</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">RSS List</h4>
                <a href="form.html" class="btn btn-success m-0">Add</a>
            </div>
            <div class="card-body">
                <table class="table table-striped btn-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Link</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ordering</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>https://vnexpress.net/rss/the-thao.rss</td>
                            <td><a href="change-status.php?id=1&status=active" class="btn btn-sm btn-success"><i
                                        class="fas fa-check"></i></a></td>
                            <td>1</td>
                            <td>
                                <a href="form.php?id=1" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=1" class="btn btn-sm btn-danger btn-delete">Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>https://vnexpress.net/rss/the-gioi.rss</td>
                            <td><a href="change-status.php?id=3&status=inactive" class="btn btn-sm btn-danger"><i
                                        class="fas fa-minus"></i></a></td>
                            <td>2</td>
                            <td>
                                <a href="form.php?id=3" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=3" class="btn btn-sm btn-danger btn-delete">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>