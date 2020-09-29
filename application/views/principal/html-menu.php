<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="<?=base_url()?>">
            <div id="logo"></div>
          </a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="<?=base_url('#home-section')?>" class="nav-link">Home</a></li>
                <li><a href="<?=base_url('#courses-section')?>" class="nav-link">Cursos</a></li>
                <li><a href="<?=base_url('#programs-section')?>" class="nav-link">Treinamentos</a></li>
                <li><a href="<?=base_url('#teachers-section')?>" class="nav-link">Institucional</a></li>
                <li><a href="<?=base_url('#contact-section')?>" class="nav-link">Contato</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto"><!-- w-25 -->
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="whats"><a 
                  href="http://api.whatsapp.com/send?1=pt_BR&phone=34984390797" target="_blank"
                    class="nav-link"><i class="icon-whatsapp"></i><span> 34
                      98439-0797</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>