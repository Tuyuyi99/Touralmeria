<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>@yield("title")</title>
</head>
<body>
    <header class="animate__animated animate__bounce" id="header">
      <nav class="navbar navbar-dark navHome" id="menuNav" style="height: 70px">
        <div class="container-fluid h-100">
          <div class="row w-100 h-100 text-center d-flex align-items-center">
            <div class="col h-100 d-flex justify-content-start align-items-center" id="navTituloCol">
              <a href="#" class="nav-link" id="navTitulo" style="font-size:2rem; color:white; letter-spacing: 7px; cursor: pointer;">TourAlmería</a>
            </div>

            <div class="col h-100 d-flex align-items-center justify-content-end p-0">
              <div class="row menuCategoriasRow">
                <div class="col-4" id="menuCategoriasPc">
                  <div class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle nav-link-scale" style="color: white; cursor: pointer;" id="dropdownMenuTop" data-bs-toggle="dropdown">
                      Categorías
                      </a>
                      <ul class="dropdown-menu centerVertical" aria-labelledby="dropdownMenuTop">
                    @if(isset($categoriesList))
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalContact">Contáctanos</a>
                        <a class="dropdown-item" href="{{ route('main') }}">Todos</a>  
                    
                      @foreach ($categoriesList as $category)

                        @if($category->id == 1)
                          <a class="dropdown-item" href="{{ route('getMainBaresRestaurantes') }}">{{ $category->name }}</a>  

                        @elseif($category->id == 2)
                          <a class="dropdown-item" href="{{ route('getMainHoteles') }}">{{ $category->name }}</a>
                        
                        @elseif($category->id == 3)
                          <a class="dropdown-item" href="{{ route('getMainMuseos') }}">{{ $category->name }}</a>

                        @elseif($category->id == 4)
                          <a class="dropdown-item" href="{{ route('getMainTurismo') }}">{{ $category->name }}</a>
                        @endif
                        
                      @endforeach
                    @endif
                      </ul>
                  </div>
                </div>

                <div class="col-4" id="menuCategoriasMobile">
                  <button class="navbar-toggler" type="button" onclick="abrirCerrarDesplegableMobile()">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
    
                <div id="menuDesplegableMobile" style="word-wrap: break-word;">
                  <div class="row menuDesplegableMobileCategorias">
                    <div class="col-12">
                      <i class="remove m-2" style="color: #383636; font-weight: bold;" id="menuDesplegableMobileClose" onclick="abrirCerrarDesplegableMobile()">&times;</i>
                    </div>

                      <div class="col-12">
                        <p style="letter-spacing: 2px; margin-bottom: 2rem; font-size: 1.5rem;">TourAlmería</p>
                      </div>    

                    @if(isset($categoriesList))
                        <div class="col-12">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modalContact">Contáctanos</a>
                        </div>
                        <div class="col-12">
                          <a href="{{ route('main') }}">Todos</a>  
                        </div>
                        @foreach ($categoriesList as $category)

                          @if($category->id == 1)
                          <div class="col-12">
                            <a href="{{ route('getMainBaresRestaurantes') }}">{{ $category->name }}</a>  
                          </div>
                          @elseif($category->id == 2)
                          <div class="col-12">
                            <a href="{{ route('getMainHoteles') }}">{{ $category->name }}</a>
                          </div>
                          @elseif($category->id == 3)
                          <div class="col-12">
                            <a href="{{ route('getMainMuseos') }}">{{ $category->name }}</a>
                          </div>
                          @elseif($category->id == 4)
                          <div class="col-12">
                            <a href="{{ route('getMainTurismo') }}">{{ $category->name }}</a>
                          </div>
                          @endif
                          
                        @endforeach
                      @endif
                  </div>
                
                </div>
                <div class="animate__animated animate__fadeIn m-0 p-0" id="desenfoque" onclick="abrirCerrarDesplegableMobile()"></div>

                <div class="col-8 p-0">
                  <div class="input-group" id="boxInputFindHeader">
                    <input type="text" class="form-control textInputWhite" placeholder="Buscar" aria-label="buscador" aria-describedby="buscador" 
                    id="inputFindHeader" style="color:white;" onkeyup="inputFind(this.value)">
                    <i class="fa fa-search inputFindIcon" style="color: white; cursor: pointer; z-index: 9;" id="inputFindIconSearch"></i>
                    <i class="fa fa-times inputFindIcon d-none" style="color: white; cursor: pointer; z-index: 9;" id="inputFindIconClose" onclick="inputFindRemoveText()"></i>
                    <div class="inputFindResult row w-100 p-2 d-flex justify-content-center align-items-center d-none" id="inputFindResult">
                      <div class="lds-ring d-flex justify-content-center"><div></div><div></div><div></div><div></div></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </nav>
    </header>

  <section class="container-header d-flex justify-content-center align-items-center">
    <div class="row text-center m-0" style="position: relative; top: -50px;">
      <div class="col-12" style="height: 5rem;">
        <span id="titleContainerHeader">
            <h1 class="animate__animated animate__bounceInDown text-center">Tour Almería</h1>
        </span>
      </div>
      <div class="col-12">
        <span>
          <h3 class="animate__animated animate__fadeIn" style="letter-spacing: 2px;">@isset($categoryTitle){{ $categoryTitle }} @endisset</h3>
        </span>
      </div>
    </div>

    <div class="w-100 position-absolute" style="height: 240px; overflow: hidden; bottom: -1px; color: white;" id="waveHeader">
      <div style="height: 100%; overflow: hidden;" id="waveHeaderPC">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
          <path d="M-4.22,-3.45 C253.67,166.28 342.27,-66.61 523.98,34.03 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
        </svg>
      </div>

      <div style="height: 100%; overflow: hidden;" id="waveHeaderMobile">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
          <path d="M-8.17,31.08 C264.95,132.72 346.78,-1.47 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
        </svg>
      </div>
    </div>
  </section>

  <div class="modal fade" id="modalContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contáctanos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="text-center">touralmeria@tour.com</h5>
        </div>
      </div>
    </div>
  </div>

    <div>@yield("content")</div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('assets/js/scriptFront.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>