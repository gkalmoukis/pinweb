@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Something goes wrong</h4>
        <ol>
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ol>
        <hr>
        <p class="mb-0">Peace</p>
    </div>
@endif