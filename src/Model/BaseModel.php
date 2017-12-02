<?php

namespace Pressutto\Deck\Model;

abstract class BaseModel
{
    /**
     * Fill the object with the provided $attributes array
     *
     * @param $attributes array
     * @throws \InvalidArgumentException
     */
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }

            if (method_exists($this, 'validate' . ucfirst($key))
                && !call_user_func([$this, 'validate' . ucfirst($key)], $value)) {
                throw new \InvalidArgumentException('Invalid argument: ' . $key);
            }

            $this->{$key} = $value;
        }
    }
}
