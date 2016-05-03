@if(Auth::check())
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
                <a class="navbar-brand" href="/home">yungbuck</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Leaderboards<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/battlenet/2v2">2v2</a></li>
                            <li><a href="/battlenet/3v3">3v3</a></li>
                            <li><a href="/battlenet/5v5">5v5</a></li>
                            <li><a href="/battlenet/rbg">RBG</a></li>
                        </ul>
                    </li>
                    <li><a href="/saved">Saved Characters</a></li>
                    <li><a href="/compare">Compare</a></li>
                </ul>
                <form class="navbar-form navbar-right" action="/logout" method="get">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default">Log Out</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div> <!-- /.container-fluid -->
    </nav>
@endif