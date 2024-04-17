<?php
use App\Models\Task;

Task::delete($id);

redirect('/tasks');
