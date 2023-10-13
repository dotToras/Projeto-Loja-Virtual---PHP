
<!-- Modal -->
<div class="modal fade" id="meuModal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="meuModalLabel">Minha Avaliação</h4>
            </div>
            <div class="modal-body">
                <form action="insertAvaliacao.php?cd=<?php echo $cdProd?>" method="post">
                    <div class="form-group">
                        <label for="nota">Escolha a Nota (de 1 a 5):</label>
                        <select class="form-control" id="nota" name="nota" required>
                            <option value="1">1 - Ruim</option>
                            <option value="2">2 - Regular</option>
                            <option value="3">3 - Bom</option>
                            <option value="4">4 - Muito Bom</option>
                            <option value="5">5 - Excelente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentário:</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
