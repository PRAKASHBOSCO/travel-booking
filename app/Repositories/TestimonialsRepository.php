<?php

namespace App\Repositories;

use App\Models\Testimonials;

use App\Repositories\Contracts\ITestimonialsRepository;

class TestimonialsRepository extends AbstractRepository implements ITestimonialsRepository {
    protected $model = Testimonials::class;
}