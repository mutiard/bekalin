  <!-- header -->
  <div class="page-header">
    <h1><strong>Bekal</strong>.in

      <div style="float: right; cursor: pointer;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span>
        </span>
        <div class="col-md-6 col-sm-6 col-xs-6 top-nav-text">
                            <a class="page-scroll" href="{{ route('logout') }}" data-toggle="modal" data-hover="LOGIN" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span style="color:#eb422a;">{{ Auth::user()->name }}</span>  LOGOUT </a>

                        </div>
      </div>
    </h1>
  </div>
  <!-- //header --> 