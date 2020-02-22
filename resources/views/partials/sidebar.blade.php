<div class="card shadow">
    <div class="card-header">Accounts</div>
    <div class="card-body small">
        <ul class=" list-group list-group-flush">
            <li class="list-group-item">
            <a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <li class=" list-group-item">
            <a href="{{route('setting')}}"><i class="fas fa-cog"></i>Setting</a>
        </li>
        </ul>
    </div>
</div>
<div class="card shadow mt-3">
    <div class="card-header">Quaters</div>
    <div class="card-body small">
        <ul class=" list-group">
            <li class="list-group-item">
                <a href="{{route('quarter.new')}}" class="d-block"><i class="fas fa-plus-circle"></i>Add</a>
            </li>
            <li class=" list-group-item">
                <a href="{{route('quarter.all')}}" class="d-block"><i class="fas fa-cog"></i>Quarters</a>
            </li>
        </ul>
    </div>
</div>
<div class="card shadow mt-3">
    <div class="card-header">Roads</div>
    <div class="card-body small">
        <ul class=" list-group">
            <li class="list-group-item">
                <a href="{{route('road.new')}}" class="d-block"><i class="fas fa-plus-circle"></i>Add</a>
            </li>
            <li class=" list-group-item">
                <a href="{{route('road.all')}}" class="d-block"><i class="fas fa-cog"></i>Road</a>
            </li>
        </ul>
    </div>
</div>


<div class="card shadow mt-3">
    <div class="card-header">Motors</div>
    <div class="card-body small">
        <ul class=" list-group">
            <li class="list-group-item">
                <a href="{{route('motor.new')}}" class="d-block"><i class="fas fa-plus-circle"></i>Add</a>
            </li>
            <li class=" list-group-item">
                <a href="{{route('motors.all')}}" class="d-block"><i class="fas fa-taxi"></i>Drivers</a>
            </li>

        </ul>
    </div>
</div>



