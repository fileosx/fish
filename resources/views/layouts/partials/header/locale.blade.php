<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        {{ trans('languages.'. App::getLocale()) }}
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        @foreach (Config::get('app.languages') as $language)
            <li>
                <a href="{{ route('langroute', $language) }}">{{ $language }}</a>
            </li>
        @endforeach
    </ul>
</div>