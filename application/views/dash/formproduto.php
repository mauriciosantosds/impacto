<div class="col-8 offset-1">
    <div class="card">
        <div class="card-header">
            Produto
        </div>
        <div class="card-body">
            <form action="<?=base_url('dash/buy'); ?>" method="POST">
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="description"
                        placeholder="Descrição">
                </div>
                <div class="form-group">
                    <label>Valor</label>
                    <input type="text" class="form-control" name="amount"
                        placeholder="Valor">
                </div>
                <button type="submit" class="btn btn-primary">Comprar</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>