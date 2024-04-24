<?php

namespace App\controllers\projects;

use App\Models\Project;

$projects = Project::all();

return view(
    'projects/index', [
        'projects' => $projects
    ]
);
