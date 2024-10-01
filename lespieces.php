<?php
session_start();

include('includes\headeruser.php');
include('coduser.php');



$fiches = getAll("pdrrrr");
?>

<div class="container pdr_data mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Toutes Les Pieces des rechanges</h4>
                </div>
                <div class="card-body" id="fich_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Deplacement magasin</th>
                                <th>Nom</th>
                                <th>Model</th>
                                <th>ref</th>
                                <th>Quantite_stock </th>
                                <th>Nombre</th>

                                <th>Prendre</th>


                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (mysqli_num_rows($fiches) > 0) {
                            foreach ($fiches as $item) {
                        ?>
                            <tr>
                                <td><?= $item['id']; ?></td>
                                <td><?= $item['magasin']; ?></td>
                                <td><?= $item['nom']; ?></td>
                                <td><?= $item['model']; ?></td>
                                <td><?= $item['ref']; ?></td>
                                <td data-q="<?= $item['quantite_stock']; ?>">
    <?= $item['quantite_stock']; ?>
</td>

                                
                                
                                
                                <td>
    <div class="input-group mb-3" style="width:130px">
        <button class="input-group-text decrement-btn" onclick="decrement(this)">-</button>
        <input type="text" class="form-control text-center input-qty bg-white" value="1" name="nombre" readonly>
        <button class="input-group-text increment-btn" onclick="increment(this)">+</button>
    </div>
</td>

<td>
    <a href="#" class="btn btn-primary" onclick="prendre(this)">prendre</a>
</td>

                            </tr>
                        <?php
                            }
                        } else {
                            echo 'No records found';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    

    function prendre(button) {
        const row = button.closest("tr");
        const quantiteStock = parseInt(row.querySelector("td[data-q]").getAttribute("data-q"), 10);
        const input = row.querySelector("input[name='nombre']");
        const nombre = parseInt(input.value, 10);

        if (nombre <= quantiteStock) {
            const nouvelleQuantite = quantiteStock - nombre;
            row.querySelector("td[data-q]").textContent = nouvelleQuantite;
            
        } else 
        
        {
            alert("La quantité demandée dépasse la quantité en stock.");
        }
       
    }
</script>

<?php
include("includes/footer.php");
?>


