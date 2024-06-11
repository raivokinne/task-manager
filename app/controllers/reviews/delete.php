<?php

use App\Models\Review;

Review::delete($id);

redirect('/dashboard/reviews');
