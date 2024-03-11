<?php
// Create unique slugs

if(!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name) : string {
        $modelClass = "App\\Models\\$model";

        if(!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $modelClass does not exist");
        }

        $slug = \Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = \Str::slug($name). '-'. $count;
            $count++;
        }

        return $slug;
    }
}
