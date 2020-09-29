<div class="col-12 col-md-8">
    <div class="card margin-top-20">
        <div class="card-header">
            Curso
        </div>
        <div class="card-body">
            <form action="<?=base_url('dash/register_course'); ?>" method="POST">
                <?php if(isset($course["id"])) {?>
                    <input type="hidden" name="id" value="<?=$course['id']?>">
                <?php } ?>
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="name"
                        placeholder="Nome"
                        <?php if (isset($course["coursname"])) { ?>
                            value="<?= $course["coursname"]?>"
                        <?php } ?>
                        required>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <?php if (isset($course["coursdesc"])) {
                        echo '<textarea type="text" class="form-control" name="desc"
                                    placeholder="Descrição" maxlength="746" rows="10" required>'.
                                    $course["coursdesc"].
                                '</textarea>';
                            } else { ?>
                            <textarea type="text" class="form-control" name="desc"
                                    placeholder="Descrição" maxlength="746" rows="10" required></textarea>
                            <?php } ?>
                </div>
                <div class="form-group">
                    <label>Carga Horária (digite no formato HH:MM:SS ex: 22:00:00)</label> 
                    <input type="text" class="form-control" name="workload"
                        placeholder="Carga Horária"
                        <?php if (isset($course["courswork"])) { ?>
                            value="<?= $course["courswork"]?>"
                        <?php } ?>
                        required>
                </div>
                <div class="form-group">
                    <label>Horário (digite no formato HH:MM:SS ex: 22:00:00)</label> 
                    <input type="text" class="form-control" name="hour"
                        placeholder="Horário"
                        <?php if (isset($course["courshour"])) { ?>
                            value="<?= $course["courshour"]?>"
                        <?php } ?> required>
                </div>
                <div class="form-group">
                    <label>Valor (digite no formato 00.00 ex. 25.50)</label>
                    <input type="text" class="form-control" name="amount"
                        placeholder="Valor"
                        <?php if (isset($course["coursamo"])) { ?>
                            value="<?= $course["coursamo"]?>"
                        <?php } ?>
                        required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                <div class="form-group">
                    <?php if (isset($alert)) { ?>
                        <div class="alert alert-success"><?=$alert;?></div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>