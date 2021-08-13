<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Projects</title>
</head>
<body>
@forelse($projects as $project)
    <a href="{{ $project->path() }}"></a>
    {{ $project->title }}
    {{ $project->description }}
@empty
    <li>No projects yet</li>
@endforelse
</body>
</html>
