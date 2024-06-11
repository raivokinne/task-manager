<?php

use App\Models\Room;

Room::delete($id);
redirect('/rooms');
