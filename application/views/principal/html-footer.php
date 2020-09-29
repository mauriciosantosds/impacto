  <footer class="footer-section bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Sobre a Impacto Desenvolvimento</h3>
          <p>Uma empresa séria, comprometida com a excelencia de seus ensinos e práticas diárias de gestão e coach empresarial e pessoal.</p>
        </div>

        <div class="col-md-3 ml-auto">
          <h3>Links</h3>
          <ul class="list-unstyled footer-links">
            <li><a href="#home-section">Home</a></li>
            <li><a href="#courses-section">Cursos</a></li>
            <li><a href="#programs-section">Treinamentos</a></li>
            <li><a href="#teachers-section">Institucional</a></li>
          </ul>
        </div>

        <div class="col-md-4">
          <h3>Inscreva-se</h3>
          <p>Cadastre seu e-mail para receber novidades mensais e exclusivas!</p>
          <form class="footer-subscribe" id="newslfooter">
            <div class="d-flex mb-5">
              <input type="text" class="form-control rounded-0" placeholder="Email" name="email">
              <button type="submit" class="btn btn-primary rounded-0">
                Inscrever
              </button>
            </div>
          </form>
          <div id="warningf"></div>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
          <p>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Impacto Desenvolvimento</i> </a>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    </p>
          </div>
          </div>
  </footer>
  </div> <!-- .site-wrap -->
  <div class="modal" tabindex="-1" role="dialog" id="buy-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Obrigado por adquirir um de nossos cursos!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Em breve você recebera mais informações sobre a compra no e-mail informado.</p>
        <p>Qualque dúvida entre em contato conosco.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url('js/jquery-3.3.1.min.js')?>"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LcvH6gUAAAAACsq6ZJTmhAQxwgx4exQRHC7p2Tj"></script>
<script src="<?=base_url('js/forms.js')?>"></script>
<?php if (isset($course["id"])) {
        echo "<script>
                    grecaptcha.ready(function () {
                      grecaptcha.execute('6LcvH6gUAAAAACsq6ZJTmhAQxwgx4exQRHC7p2Tj', {
                        action: 'homepage'
                      }).then(function (token) {
                        // add token to form
                        $('#sellf').prepend('<input type=\"hidden\" name=\"g-recaptcha-response\" value=\"' + token + '\">');
                      });
                    });
                    </script>";
    } 
?>
<script src="<?=base_url('js/jquery-migrate-3.0.1.min.js')?>"></script>


<script src="<?=base_url('js/bootstrap.min.js')?>"></script>
<?php 
if (isset($_GET["codigo"])) {
        echo '<script>
              $(document).ready(function () {
                $("#buy-modal").modal("toggle");
              });
                </script>';
    } 
?>
<script src="<?=base_url('js/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('js/jquery.stellar.min.js')?>"></script>
<script src="<?=base_url('js/jquery.countdown.min.js')?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url('js/jquery.easing.1.3.js')?>"></script>
<script src="<?=base_url('js/aos.js')?>"></script>
<script src="<?=base_url('js/jquery.fancybox.min.js')?>"></script>
<script src="<?=base_url('js/jquery.sticky.js')?>"></script>
<script src="<?=base_url('js/main.js')?>"></script>
  
</body>
</html>