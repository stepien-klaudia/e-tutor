@extends('layouts.app')


@section('content')
<div class="container pt-5" >
              <div class="row">
                <div class="col-md-8 order-md-2 col-lg-9">
                  <div class="container-fluid">
                    <div class="row   mb-5">
                      <div class="col-12">
                        <div class="btn-group">
                          <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                          <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                        </div>
                        <div class="dropdown float-right">
                          <label class="mr-2">Ogłoszeń na stronie:</label>
                          <a class="btn btn-lg btn-light dropdown-toggle anouncement-actual-count" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">5<span class="caret"></span></a>
                          <div class="dropdown-menu anouncement-count" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                            <a class="dropdown-item" href="#">5</a>
                            <a class="dropdown-item" href="#">10</a>
                            <a class="dropdown-item" href="#">15</a>
                            <a class="dropdown-item" href="#">20</a>                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" id = "announcements-wrapper">
                        @foreach($announcements as $announcement)
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-0">
                                    <div class="card-img-top">
                                        <img src="https://static.vecteezy.com/system/resources/thumbnails/001/486/411/small/open-book-icon-free-vector.jpg" class="img-fluid mx-auto d-block" alt="Card image cap">
                                    </div>
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                        <a href="{{route('announcement_show',$announcement)}}" class=" font-weight-bold text-dark text-uppercase small"> {{ $announcement->name }}</a>
                                    </h4>
                                    <h5 class="font-weight-bold text-dark ">
                                        <i>{{ $announcement -> place }}</i>
                                    </h5>
                                    <h5 class="card-price small text-dark ">
                                    <i>{{$announcement->price}}zł/godz.</i>
                                    </h5>
                                </div>
                            </div>
                    </div>
                    @endforeach
                    </div>
                    <div class="dropdown float-md-right">
                          <label class="mr-2">Ogłoszeń na stronie:</label>
                          <a class="btn btn-light btn-lg dropdown-toggle anouncement-actual-count" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">5<span class="caret"></span></a>
                          <div class="dropdown-menu anouncement-count" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">5</a>
                            <a class="dropdown-item" href="#">10</a>
                            <a class="dropdown-item" href="#">15</a>
                            <a class="dropdown-item" href="#">20</a>
                          </div>
                        </div>
                  </div>
                </div>
                <form class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
                  <h3 class="mt-0 mb-5">Ogłoszenia <span class="text" style = "color:#00c2e4">{{count($announcements)}}</span> </h3>
                  <h6 class="text-uppercase font-weight-bold mb-3">Przedmioty</h6>
                  @foreach($categories as $category)
                  <div class="mt-2 mb-2 pl-2">
                    
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name ="filter[categories][]" id="category-{{$category->id}}" value = "{{$category->id}}">
                      <label class="custom-control-label" for="category-{{$category->id}}">{{$category->name}}</label>
                    </div>
                    
                  </div>
                  @endforeach
                  <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                  <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Poziom nauczania</h6>
                  @foreach($levels as $level)
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name = "filter[levels][]" id="level-{{$level->id}}" value = "{{$level->id}}">
                      <label class="custom-control-label" for="level-{{$level->id}}">{{$level->name}}</label>
                    </div>
                  </div>
                  @endforeach
                  <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                  <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Miejsce</h6>
                  <div class="place-filter-control">
                    <input type="text" name = "filter[place]" class="form-control w-70 pull-left mb-2" placeholder="Zdalnie" id="place">
                  </div>
                  <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                  <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Cena</h6>
                  <div class="price-filter-control">
                    <input type="number" name = "filter[price_min]" class="form-control w-50 pull-left mb-2" placeholder="50" id="price-min-control">
                    <input type="number" name = "filter[price_max]" class="form-control w-50 pull-right" placeholder="150" id="price-max-control">
                  </div>
                  <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">
                  <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                  <a href="#" class="btn btn-lg btn-block btn-primary mt-5" id = "filter-button">Zastosuj</a>
                </form>

              </div>
            </div>
  @endsection

  @section('js-files')
        <script src = "{{ asset('js/welcome.js')}}"></script>
  @endsection