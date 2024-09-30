<div class="container-fluid">
    <div class="row bg-primary text-white p-1">
        <div class="col-sm text-center">
            <i class="bi bi-stopwatch"></i> Op werkdagen voor 15:00 besteld, morgen in huis
        </div>
        <div class="col-sm text-center">
            <i class="bi bi-truck"></i> Verzendkosten vanaf &euro;1
        </div>
        <div class="col-sm text-center">
            <i class="bi bi-piggy-bank"></i> Gratis verzending binnen NL > &euro;50
        </div>
        <div class="col-sm text-center">
            <i class="bi bi-bag"></i> Afhalen mogelijk
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-2 offset-md-5 text-center">
                    <a class="navbar-brand text-primary" href="#">Musthaves4U</a>
                </div>
                <div class="col-2 offset-md-3">
                    <form action="{{ route('insyht-larvelous-search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="{{ __('insyht-larvelous::cms.search') }}"
                                   value="{{ $searchQuery ?? '' }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row navbar navbar-expand-lg">
        <div class="col-12">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                @inject('helper', '\Insyht\Larvelous\Helpers\LarvelousHelper')
                <ul class="navbar-nav mb-2 mb-lg-0 ">
                    @foreach($helper->getMenu('main_menu')->items as $item)
                        @if ($item->canHaveChildren() && $item->getChildren()->isNotEmpty())
                            <div class="nav-item dropdown">
                                <a class="text-primary nav-link dropdown-toggle @if ($item->isActive(true)) active
                                @endif" @if ($item->isActive(true)) aria-current="page" @endif href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->getTitle() }}</a>
                                <div class="dropdown-menu">
                                    @foreach($item->getChildren() as $child)
                                        @if (!empty($item->getUrl()))
                                            <div><a class="text-primary dropdown-item @if ($item->isActive()) active @endif" href="/{{ $item->getUrl() }}">{{ $item->getTitle() }}</a></div>
                                        @endif
                                        <div><a class="text-primary dropdown-item @if ($child->isActive()) active @endif" href="/{{ $child->getUrl() }}">{{ $child->getTitle() }}</a></div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="nav-item">
                              <a class="text-primary nav-link @if ($item->isActive()) active @endif" @if($item->isActive()) aria-current="page" @endif href="/{{ $item->getUrl() }}">{{ $item->getTitle() }}</a>
                            </div>
                        @endif
                    @endforeach
                    <div class="nav-item"><a class="text-primary nav-link" href="/">||</a></div>
                    <div class="nav-item dropdown">
                        <a class="text-primary nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
                        <div class="dropdown-menu">
                            <div><a class="text-primary dropdown-item" href="{{ route('voorbeeld-categorie')}}">Categorie</a></div>
                            <div><a class="text-primary dropdown-item" href="{{ route('voorbeeld-categorie') }}">Subcategorie</a></div>
                        </div>
                    </div>
                    <div class="nav-item"><a class="text-primary nav-link" href="{{ route('voorbeeld-winkelwagen') }}">Winkelwagen</a></div>
                    <div class="nav-item"><a class="text-primary nav-link" href="{{ route('voorbeeld-klantgegevens') }}">Klantgegevens</a></div>
                    <div class="nav-item"><a class="text-primary nav-link" href="{{ route('voorbeeld-bevestiging') }}">Bevestiging</a></div>
                    <div class="nav-item"><a class="text-primary nav-link" href="{{ route('voorbeeld-contact') }}">Contact</a></div>
                </ul>
            </nav>
        </div>
    </div>
</div>
