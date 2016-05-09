@if(Auth::check() && Auth::user()->type == 'admin')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/home">admin</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/admin/users">Users</a></li>
                    <li><a href="/admin/characters">Characters</a></li>
                    <li><a href="/admin/comparisons">Comparisons</a></li>
                </ul>
                <form class="navbar-form navbar-right" action="/logout" method="get">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default">Log Out</button>
                </form>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container-fluid -->
    </nav>
@endif