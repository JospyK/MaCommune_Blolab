<!DOCTYPE html>
<html  lang="en">
<head>
    @include("dashboard.partials._head")
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            @include("dashboard.partials._nav")

            @include("dashboard.partials._mainSidebar")

        </nav>
    

        @include("dashboard.partials._body")

    </div>
    <!-- ./wrapper -->

    @include("dashboard.partials._javascript")
</body>
</html>