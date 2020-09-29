<div class="col-12 col-md-9">
    <div class="card margin-top-20">
        <div class="card-header">
            Cursos
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Carga horária</th>
                            <th scope="col">Horário</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $c) { ?>
                            <tr>
                            <th scope="row"><?=$c["coursname"];?></th>
                            <td><?=$c["courswork"];?></td>
                            <td><?=$c["courshour"];?></td>
                            <td><?=$c["coursamo"];?></td>
                            <td>
                                <?php $id = $c["id"]; ?>
                                <?=anchor($uri = base_url('dash/update_course?id='.$id), $title = 'Alterar', array('class'=>'btn btn-warning'));?>
                                <?=anchor($uri = base_url('dash/delete_course?id='.$id), $title = 'Remover', array('class'=>'btn btn-danger'));?>
                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>