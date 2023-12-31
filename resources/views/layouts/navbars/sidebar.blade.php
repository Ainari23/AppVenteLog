<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __('PS') }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ __('PLASTIC SOLD') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("Laravel Examples") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
        <a data-toggle="collapse" href="#laravelExamples">
          <i class="now-ui-icons design_app"></i>
        <p>
          {{ __("Produits") }}
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse show" id="laravelExamples">
        <ul class="nav">
          <li class="@if ($activePage == 'ajouter-produit') active @endif">
            <a href="{{ route('page.index','produits') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>{{ __('Inserer Produits') }}</p>
            </a>
          </li>
          <li class="@if ($activePage == '/produits/acheter-produit') active @endif">
            <a href="{{ route( 'page.index','/produits/acheter-produit') }}">
              <i class="now-ui-icons education_atom"></i>
              <p> {{ __("liste Produits") }} </p>
            </a>
          </li>
        </ul>
      </div>
      <li class="@if ($activePage == 'panier') active @endif">
        <a href="{{ route('page.index','panier') }}">
          <i class="now-ui-icons shopping_cart-simple"></i>
          <p>{{ __('Panier') }}</p>
        </a>




        <a data-toggle="collapse" href="#laravelExamples">
          <i class="now-ui-icons design_app"></i>
        <p>
          {{ __("Entreprises") }}
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse show" id="laravelExamples">
        <ul class="nav">
          <li class="@if ($activePage == 'Entreprises') active @endif">
            <a href="{{ route('page.index','ajouter-entreprise') }}">
              <i class="now-ui-icons business_briefcase-24"></i>
              <p>{{ __('Ajouter Entreprises') }}</p>
            </a>
          </li>
          <li class="@if ($activePage == '/entreprises/liste-entreprise') active @endif">
            <a href="{{ route( 'page.index','/entreprises/liste-entreprise') }}">
              <i class="now-ui-icons education_atom"></i>
              <p> {{ __("liste Entreprises") }} </p>
            </a>
          </li>
        </ul>
      </div>

      <a data-toggle="collapse" href="#laravelExamples">
        <i class="now-ui-icons design_app"></i>
      <p>
        {{ __("Catégories Produits") }}
        <b class="caret"></b>
      </p>
    </a>
    <div class="collapse show" id="laravelExamples">
      <ul class="nav">
        <li class="@if ($activePage == '/ajouter-catégorie-produit') active @endif">
          <a href="{{ route('page.index','/ajouter-catégorie-produit') }}">
            <i class="now-ui-icons business_briefcase-24"></i>
            <p>{{ __('Ajouter Catégories') }}</p>
          </a>
        </li>
        <li class="@if ($activePage == '/produits/catégorie-produit') active @endif">
          <a href="{{ route( 'page.index','/produits/catégorie-produit') }}">
            <i class="now-ui-icons education_atom"></i>
            <p> {{ __("liste Catégories") }} </p>
          </a>
        </li>
      </ul>
    </div>

      
      <li class="@if ($activePage == 'Fournisseurs') active @endif">
        <a href="{{ route('page.index','ajouter-fournisseur') }}">
          <i class="now-ui-icons shopping_delivery-fast"></i> 
          <p>{{ __('Fournisseur') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class = "">
        <a href="{{ route('page.index','upgrade') }}" class="bg-info">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
