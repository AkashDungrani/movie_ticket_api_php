<?php

include('config/config.php');

$config = new Config();

$fetched_movie_obj = $config->fetch_all_movie();

if (isset($_REQUEST['btn_add'])) {
    $name = $_REQUEST['name'];
    $ind_id = $_REQUEST['ind_id'];
    $lang_id = $_REQUEST['lang_id'];
    $view_id = $_REQUEST['view_id'];
    $seat_id = $_REQUEST['seat_id'];
    $price_id = $_REQUEST['price_id'];   // a.array

    $res = $config->insert_movie($name, $ind_id, $lang_id, $view_id, $seat_id, $price_id);
    if ($res) {
        header("Location: success.php");
    } else {
        echo "Product insertion failed...";
    }
}

if (isset($_REQUEST['delete_id'])) {
    $delete_id = $_REQUEST['delete_id'];

    $res = $config->delete_movie($delete_id);

    if ($res == 1) {
        echo "Deleted suucessfull...";
    } else {
        echo "Deletion failed...";
    }
}

$single_fetched_movie = null;

if (isset($_REQUEST['id'])) {
    $edit_id = $_REQUEST['id'];

    $obj = $config->fetch_single_movie($id);

    $single_fetched_product = mysqli_fetch_assoc($obj);
}

if (isset($_REQUEST['btn_update'])) {
    $name = $_REQUEST['name'];
    $ind_id = $_REQUEST['ind_id'];
    $lang_id = $_REQUEST['lang_id'];
    $view_id = $_REQUEST['view_id'];
    $seat_id = $_REQUEST['seat_id'];
    $price_id = $_REQUEST['price_id'];
    $id = $_REQUEST['id'];



    $res = $config->update_movie($name, $ind_id, $lang_id, $view_id, $seat_id, $price_id, $id);

    if ($res) {
        echo "Product info updated...";
    } else {
        echo "Product info updation failed...";
    }
}

?>


<html>

<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <div class="col col-4">
            <form action="" method="POST" enctype="multipart/form-data">
                Name: <input class="form-control" name="name" type="text" value="<?php if ($single_fetched_movie != null) {
                                                                                        echo $single_fetched_movie['name'];
                                                                                    } ?>" /> <br />
                Industry_id: <input class="form-control" name="ind_id" type="number" value="<?php if ($single_fetched_movie != null) {
                                                                                                echo $single_fetched_movie['ind_id'];
                                                                                            } ?>" /> <br />
                Language_Id: <input class="form-control" name="lang_id" type="number" value="<?php if ($single_fetched_movie != null) {
                                                                                                    echo $single_fetched_movie['lang_id'];
                                                                                                } ?>" /> <br />
                View_Id: <input class="form-control" name="view_id" type="number" value="<?php if ($single_fetched_movie != null) {
                                                                                                echo $single_fetched_movie['view_id'];
                                                                                            } ?>" /> <br />
                Seat_Id: <input class="form-control" name="seat_id" type="number" value="<?php if ($single_fetched_movie != null) {
                                                                                                echo $single_fetched_movie['seat_id'];
                                                                                            } ?>" /> <br />
                Price_Id: <input class="form-control" name="price_id" type="number" value="<?php if ($single_fetched_movie != null) {
                                                                                                echo $single_fetched_movie['price_id'];
                                                                                            } ?>" /> <br />

                <button class="btn <?php if (@$_REQUEST['id']) {
                                        echo "btn-info";
                                    } else {
                                        echo "btn-primary";
                                    } ?>" name="<?php if (@$_REQUEST['id']) {
                                                    echo "btn_update";
                                                } else {
                                                    echo "btn_add";
                                                } ?>">
                    <?php if (@$_REQUEST['edit_id']) {
                        echo "UPDATE";
                    } else {
                        echo "ADD";
                    } ?>
                </button>
            </form>
        </div>

        <div class="col col-6">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Industry_id</th>
                        <th>Language_Id</th>
                        <th>View_Id</th>
                        <th>Seat_Id</th>
                        <th>Price_Id</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($record = mysqli_fetch_assoc($fetched_movie_obj)) { ?>
                        <tr>
                            <td><?php echo $record['id']; ?></td>
                            <td><?php echo $record['name']; ?></td>
                            <td><?php echo $record['ind_id']; ?></td>
                            <td><?php echo $record['lang_id']; ?></td>
                            <td><?php echo $record['view_id']; ?></td>
                            <td><?php echo $record['seat_id']; ?></td>
                            <td><?php echo $record['price_id']; ?></td>
                            <td>
                                <a href="index.php?edit_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-warning">EDIT</button>
                                </a>
                            </td>
                            <td>
                                <a href="index.php?delete_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-danger">DELETE</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>