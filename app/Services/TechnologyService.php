<?php

namespace App\Services;

use App\Models\Technology;
use App\Interface\TechnologyServiceInterface;

class TechnologyService implements TechnologyServiceInterface
{
    public function index()
    {
        return Technology::all();
    }

    public function store(array $data)
    {
        return Technology::create($data);
    }

    public function show($id)
    {
        return Technology::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $technology = Technology::findOrFail($id);
        $technology->update($data);
        return $technology;
    }

    public function destroy($id)
    {
        $technology = Technology::findOrFail($id);
        $technology->delete();
    }
}
