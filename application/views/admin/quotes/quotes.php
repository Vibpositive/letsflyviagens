    <?php if (isset($results)) { ?>
        <table class="table table-striped" style="margin-top:20px;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome de Usuario</th>
                    <th scope="col">Tipo de Cotacao</th>
                    <th scope="col">Data</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $data) : ?>
                    <tr>
                        <th scope="row"><?php echo $data->id ?></th>
                        <td><?php echo $data->username ?></td>
                        <td><?php echo $data->quote_type ?></td>
                        <td><?php echo $data->date ?></td>
                        <td>
                        <a href="<?php echo base_url() . "admin/quotes/view/" . $data->id ?>">
                            <button type="button" class="btn btn-info">Acessar</button>
                        </a>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome de Usuario</th>
                    <th scope="col">Tipo de Cotacao</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="row">Nada encontrado</th>
                        <td>Nada encontrado</td>
                        <td>Nada encontrado</td>
                        <td>Nada encontrado</td>
                    </tr>
            </tbody>
        </table>
    <?php } ?>

    <?php if (isset($links)) { ?>
        <?php echo $links ?>
    <?php } ?>