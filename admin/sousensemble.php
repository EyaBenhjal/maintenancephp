<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sous_ensembles</h4>
                </div>
                <div class="card-body"id="se_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID_machine</th>
                                <th>Nom sous_ensembles</th>
                                <th>Image</th>
                                <th>Action</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $se = getAll("sous_ensembles");

                            if (mysqli_num_rows($se)>0) {
                                foreach ($se as $item) {
                            ?>
                                    <tr>
                                    <td><?= $item['id']; ?></td>

                                        <td><?= $item['id_ma']; ?></td>
                                        <td><?= $item['nom']; ?></td>

                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['nom']; ?>">
                                        </td>
                                       
                                        <td>
                                        <a href="edit_se.php?id=<?= $item['id']; ?>" class="btn btn-primary">Editer</a>
                                </td>
                                 <td><form action="code.php" method="POST">
                                 <input type="hidden" name="id_ma" value="<?= $item['id']; ?>"> 

                                 <button type="submit" class="btn btn-sm btn-danger" name="delete_se_btn">Delete</button>
                                            </form>
                                            </td>
                                        </td>
                                    </tr>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo 'No records ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>