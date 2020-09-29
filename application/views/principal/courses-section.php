<div class="site-section courses-title" id="courses-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Faça sua Inscrição</h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
            <div class="row">
                <?php foreach($courses as $c) {?>
                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="<?=base_url('principal/course_single?id='.$c['id'])?>"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <span class="course-price"><?= $c["coursamo"];?></span>
                            <!-- <div class="meta"><span class="icon-clock-o"></span>4 Aulas / 2 Semanas</div> -->
                            <h3><a href="<?=base_url('principal/course_single?id='.$c['id'])?>"><?= $c["coursname"];?></a></h3>
                            <a href="<?=base_url('principal/course_single?id='.$c['id'])?>">Clique aqui e faça a sua inscrição. </a>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-clock-o"></span> Carga horária: <?= $c["courswork"];?> h</div>
                            <!-- <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div> -->
                        </div>
                    </div>
                <?php } ?>   
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <button class="customPrevBtn btn btn-primary m-1">Anterior</button>
                <button class="customNextBtn btn btn-primary m-1">Próximo</button>
            </div>
        </div>
    </div>
</div>