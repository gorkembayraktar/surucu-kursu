<div class="breadcrumb-wrap {{ $class }} br-4">
    <div class="overlay op-8 bg-downriver"></div>
    <div class="container">
        <div class="breadcrumb-title">
            <h2>{{ $title }}</h2>
            <ul class="breadcrumb-menu list-style">
                <li>
                    <a href="/">Anasayfa </a>
                </li>
                @isset($parentTitle)
                <li><a href="{{ $parentUrl }}">{{ $parentTitle }}</a></li>
                @endisset
                <li>{{ $title }}</li>
            </ul>
        </div>
    </div>
</div>