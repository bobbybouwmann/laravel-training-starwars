
<div class="col-sm-6">

    <div class="card mb-4">

        <div class="card-body">

            <h4 class="card-title">{{ $planet->getName() }}</h4>

            <p class="card-text">
                <button type="button" class="btn btn-primary">
                    Movie appearances <span class="badge badge-light">{{ $planet->getMovieCount() }} times</span>
                </button>
            </p>

            <p class="card-text">
                <small class="text-muted">
                    Population: {{ $planet->getPopulation() }}<br>
                    Climate: {{ $planet->getClimate() }}<br>
                    Diameter: {{ $planet->getDiameter() }}
                </small>
            </p>

        </div>

    </div>

</div>
